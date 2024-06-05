<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\ReservationNotification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

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
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'phone_number' => ['required', 'regex:/^(\+213|0)(5|6|7)[0-9]{8}$/'],
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'number_people' => 'required|integer|between:1,4',
            'birth_certificate' => 'nullable|image|max:2048',
            'passport' => 'nullable|image|max:2048',
            'offer_type' => 'required|string|max:255',
            'offer_id' => 'required|exists:offers,id',
        ]);

        // Create and save the reservation
        $reservation = new Reservation();
        $this->setReservationAttributes($reservation, $request);
        $reservation->user_id = auth()->user()->id;
        $reservation->save(); 

        // Notify the admin user
        $adminUser = User::where('utype', 'ADM')->first();
        if ($adminUser) {
            $adminUser->has_new_notification = true;
            $adminUser->save();
    
            ReservationNotification::create([
                'reservation_id' => $reservation->id,
                'user_id' => $adminUser->id,
                'message' => 'تم إنشاء حجز جديد.',
            ]);
        }
        // Redirect to the request-sent page
        return redirect('request-sent');
    }
/*--------------------------------------------------------------------------------------------------*/
    public function show($reservation)
    {
        return view('reservations.show', ['reservation' => reservation::findOrFail($reservation)]);
    }
/*--------------------------------------------------------------------------------------------------*/
    public function approve(Request $request, $reservation_id)
    {
        if (Auth::user()->utype !== 'ADM') {
            abort(403, 'غير مصرح لك.');
        }

        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->approved = true;
        $reservation->save();

        $user = User::findOrFail($reservation->user_id); 
        $user->has_new_notification = true;
        $user->save();

        ReservationNotification::create([
            'reservation_id' => $reservation->id,
            'user_id' => $reservation->user_id, 
            'message' => 'تم الموافقة على حجزك يمكنك الدفع الان',
        ]);

        return response()->json(['status' => 'success']); 
    }
/*--------------------------------------------------------------------------------------------------*/
    public function reject($reservation_id)
    {
        if (Auth::user()->utype !== 'ADM') {
            abort(403, 'غير مصرح لك.');
        }

        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->delete();

        $user = User::findOrFail($reservation->user_id);
        $user->has_new_notification = true;
        $user->save();

        ReservationNotification::create([
            'reservation_id' => $reservation_id,
            'user_id' => $reservation->user_id, 
            'message' => 'تم رفض حجزك ',
        ]);
        return response()->json(['status' => 'success']); 
    }
/*--------------------------------------------------------------------------------------------------*/
    public function paymentPage(Request $request, $reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id); 
        return view('reservations.paymentPage', ['reservation' => $reservation]);
    }
/*--------------------------------------------------------------------------------------------------*/
    public function reservation_notifications(Request $request)
    {
        $user = $request->user();

        if ($user->utype !== 'ADM' && $user->utype !== 'USR') {
            return redirect()->route('home.index');
        }

        $reservation_notifications = ReservationNotification::where('user_id', $user->id)->get();
        

        return view('notifications.reservation_notifications', ['reservation_notifications' => $reservation_notifications]);
    }
/*--------------------------------------------------------------------------------------------------*/
    public function check(Request $request)
    {
        return response()->json(['has_new_notification' => $request->user()->has_new_notification]); 

    }
/*--------------------------------------------------------------------------------------------------*/
    public function markAsRead($notification_id)
    {
        $notification = ReservationNotification::findOrFail($notification_id);
        $notification->update(['is_read' => true]);

        $user = User::findOrFail($notification->user_id);
        $hasNewNotifications = ReservationNotification::where('user_id', $user->id)
                                                    ->where('is_read', false)
                                                    ->exists();
        $user->has_new_notification = $hasNewNotifications;
        $user->save();

        return redirect()->route('notifications')->with('success', 'تم تحديد الإشعار كمقروء بنجاح.');
    }
/*--------------------------------------------------------------------------------------------------*/
    public function destroyNotifications($notification_id)
    {
        $notification = ReservationNotification::findOrFail($notification_id);
        $user_id = $notification->user_id;
        $notification->delete();

        $user = User::findOrFail($user_id);
        $hasNewNotifications = ReservationNotification::where('user_id', $user_id)
                                                    ->where('is_read', false)
                                                    ->exists();
        $user->has_new_notification = $hasNewNotifications;
        $user->save();

        return redirect()->route('notifications')->with('success', 'تم حذف الإشعار بنجاح.');

    }
/*--------------------------------------------------------------------------------------------------*/
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $offer = Offer::findOrFail($reservation->offer_id); // افتراض أن لديك نموذج عرض مرتبط بالحجز

        return view('reservations.edit', [
            'reservation' => $reservation,
            'offer' => $offer
        ]);
    }
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
        
        return redirect()->route('reservations.show', $reservation); 
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
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    