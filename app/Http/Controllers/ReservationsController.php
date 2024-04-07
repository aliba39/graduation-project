<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationsController extends Controller
{
    public function index()
    {
        return view('reservations.index', ['reservations' => reservation::all()]);
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function create()
    {
        return view('reservations.create');
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        $reservation = new reservation();

        $reservation->first_name = strip_tags($request->input('first_name')); 
        $reservation->family_name = strip_tags($request->input('family_name')); 
        $reservation->phone_number = strip_tags($request->input('phone_number')); 
        $reservation->address = strip_tags($request->input('address')); 
        $reservation->city = strip_tags($request->input('city')); 
        $reservation->country = strip_tags($request->input('country')); 
        $reservation->number_people = strip_tags($request->input('number_people')); 
        $reservation->birth_certificate = strip_tags($request->input('birth_certificate')); 
        $reservation->passport = strip_tags($request->input('passport')); 
        $reservation->user_id = auth()->user()->id;



        $reservation -> save();
        
        return redirect()->route('offers.index');
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function show($reservation)
    {
        return view('reservations.show', ['reservation' => reservation::findOrFail($reservation)]);
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function edit($reservation)
    {
       /*  return view('reservations.edit', ['reservation' => reservation::findOrFail($reservation)]); */
    }
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
    public function update(Request $request, $reservation)
    {

        /* $to_update = reservation::findOrFail($reservation); 

        $to_update->first_name = strip_tags($request->input('first_name')); 
        $to_update->family_name = strip_tags($request->input('family_name')); 
        $to_update->phone_number = strip_tags($request->input('phone_number')); 
        $to_update->address = strip_tags($request->input('address')); 
        $to_update->city = strip_tags($request->input('city')); 
        $to_update->country = strip_tags($request->input('country')); 
        $to_update->number_people = strip_tags($request->input('number_people')); 
        $to_update->birth_certificate = strip_tags($request->input('birth_certificate')); 
        $to_update->passport = strip_tags($request->input('passport')); 

        $to_update->save();
        
        return redirect()->route('reservations.show', $reservation); */
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
