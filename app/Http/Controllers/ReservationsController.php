<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\ReservationNotification;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Session;

class ReservationsController extends Controller
{
    public function index()
    {
        return view('reservations.index', ['reservations' => reservation::all()]);
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function create(Request $request)
    {
        $offer_id = $request->query('offer_id'); 
        $offer = Offer::findOrFail($offer_id);

        return view('reservations.create', [
            'offer_id' => $offer_id, 
            'offer' => $offer,
        ]);
        
    }
/*--------------------------------------------------------------------------------------------------*/
    private function setReservationAttributes($reservation, Request $request)
    {
        $reservation->first_name = strip_tags($request->input('first_name'));
        $reservation->family_name = strip_tags($request->input('family_name'));
        $reservation->phone_number = strip_tags($request->input('phone_number'));
        $reservation->address = strip_tags($request->input('address'));
        $reservation->city = strip_tags($request->input('city'));
        $reservation->country = strip_tags($request->input('country'));
        $reservation->number_people = strip_tags($request->input('number_people'));
        $reservation->offer_type = strip_tags($request->input('offer_type'));

        if ($request->hasFile('birth_certificate')) {
            $path = $request->file('birth_certificate')->store('images', 'public');
            $reservation->birth_certificate = $path;
        }

        if ($request->hasFile('passport')) {
            $path = $request->file('passport')->store('images', 'public');
            $reservation->passport = $path;
        }

        $reservation->offer_id = $request->input('offer_id'); 
    }

/*--------------------------------------------------------------------------------------------------*/ 
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'number_people' => 'required|integer',
            'birth_certificate' => 'nullable|image|max:2048',
            'passport' => 'nullable|image|max:2048',
            'offer_type' => 'required|string|max:255',
            'offer_id' => 'required|exists:offers,id',
        ]);

        $reservation = new Reservation();
        $this->setReservationAttributes($reservation, $request);
        $reservation->user_id = auth()->user()->id;

        $reservation->save(); 

        ReservationNotification::create([
            'reservation_id' => $reservation->id,
            'user_id' => 1, 
            'message' => 'تم إنشاء حجز جديد.',
        ]);

        Session::flash('message', 'تم إرسال طلبكم بنجاح ');

        return redirect('request-sent');
    }
/*--------------------------------------------------------------------------------------------------*/
    public function notifications()
    {
        // جلب الإشعارات غير المقروءة للمستخدم
        $notifications = ReservationNotification::where('user_id', 1) // افترض أن admin هو المستخدم رقم 1
                                            ->where('is_read', false)
                                            ->get();

        return view('admin.notifications', ['notifications' => $notifications]);
    }
/*--------------------------------------------------------------------------------------------------*/
public function destroyNotifications($id)
    {
        $notification = ReservationNotification::findOrFail($id);
        $notification->delete();

        return redirect()->route('admin.notifications'); 
    }
/*--------------------------------------------------------------------------------------------------*/
    public function markAsRead($id)
    {
        $notification = ReservationNotification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();
        return redirect()->route('admin.notifications'); 
    }
/*--------------------------------------------------------------------------------------------------*/
    public function show($reservation)
    {
        return view('reservations.show', ['reservation' => reservation::findOrFail($reservation)]);
    }
/*--------------------------------------------------------------------------------------------------*/
    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id); 
        $reservation->approved = true; 
        $reservation->save(); 
        session()->flash('success', 'تمت الموافقة على حجزك. يرجى المتابعة لصفحة الدفع.');
        return redirect()->route('reservations.payment', ['offer_id' => $reservation->offer_id]);
    }
/*--------------------------------------------------------------------------------------------------*/
    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id); 
        $reservation->delete(); 
        session()->flash('error', 'تم رفض حجزك. نعتذر عن الإزعاج.');
        return redirect()->route('reservations.index');
    }
/*--------------------------------------------------------------------------------------------------*/
    public function paymentPage($offer_id)
    {
        $offer = Offer::findOrFail($offer_id); 
        return view('reservations.payment', ['offer' => $offer]); 
    }
/*--------------------------------------------------------------------------------------------------*/
    public function edit($reservation)
    {
       return view('reservations.edit', ['reservation' => reservation::findOrFail($reservation)]); 
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function update(Request $request, $reservation)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'number_people' => 'required|integer',
            'birth_certificate' => 'nullable|image|max:2048',
            'passport' => 'nullable|image|max:2048',
            'offer_id' => 'required|exists:offers,id',
        ]);

        $to_update = reservation::findOrFail($reservation);

        $to_update->first_name = strip_tags($request->input('first_name'));
        $to_update->family_name = strip_tags($request->input('family_name'));
        $to_update->phone_number = strip_tags($request->input('phone_number'));
        $to_update->address = strip_tags($request->input('address'));
        $to_update->city = strip_tags($request->input('city'));
        $to_update->country = strip_tags($request->input('country'));
        $to_update->number_people = strip_tags($request->input('number_people'));

        if ($request->hasFile('birth_certificate')) {
            $path = $request->file('birth_certificate')->store('images', 'public');
            $to_update->birth_certificate = $path;
        }

        if ($request->hasFile('passport')) {
            $path = $request->file('passport')->store('images', 'public');
            $to_update->passport = $path;
        }

        $to_update->offer_id = $request->input('offer_id'); 

        $to_update->save();
        
        return redirect()->route('reservations.index', $reservation); 
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function destroy($reservation)
    {
        $to_delete = reservation::findOrFail($reservation);
        $to_delete->delete();
        return redirect()->route('reservations.index'); 
    }

}
