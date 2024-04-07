<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OffersController extends Controller
{
    //-----------------------------------------------------------------
    public function index()
    {
        return view('offers.index', ['offers' => offer::all()]);

    }
    //-----------------------------------------------------------------
    public function create()
    {
        return view('offers.create');
    }
    //-----------------------------------------------------------------
    public function store(Request $request)
    {
        $offer = new offer();

        $offer->title = strip_tags($request->input('title')); 
        $offer->prix_12 = strip_tags($request->input('prix_12')); 
        $offer->prix_13 = strip_tags($request->input('prix_13')); 
        $offer->prix_14 = strip_tags($request->input('prix_14')); 
        $offer->hotel_1 = strip_tags($request->input('hotel_1')); 
        $offer->hotel_2 = strip_tags($request->input('hotel_2')); 
        $offer->discription = strip_tags($request->input('discription')); 
        $offer->image = strip_tags($request->input('image')); 
        $offer->stay_makh = strip_tags($request->input('stay_makh')); 
        $offer->stay_madina = strip_tags($request->input('stay_madina')); 
        $offer->date_in = strip_tags($request->input('date_in')); 
        $offer->date_out = strip_tags($request->input('date_out')); 
        $offer->airport_1= strip_tags($request->input('airport_1')); 
        $offer->airport_2 = strip_tags($request->input('airport_2'));

        $offer -> save();
        
        return redirect()->route('offers.index');
    }



    //-----------------------------------------------------------------
    public function show($offer)
    {
        return view('offers.show', ['offer' => offer::findOrFail($offer)]);
    }
    //-----------------------------------------------------------------
    public function edit($offer)
    {
        return view('offers.edit', ['offer' => offer::findOrFail($offer)]); 
    }
    //-----------------------------------------------------------------
    public function update(Request $request, $offer)
    {

        $to_update = offer::findOrFail($offer);

        $to_update->title = strip_tags($request->input('title')); 
        $to_update->prix_12 = strip_tags($request->input('prix_12')); 
        $to_update->prix_13 = strip_tags($request->input('prix_13')); 
        $to_update->prix_14 = strip_tags($request->input('prix_14')); 
        $to_update->hotel_1 = strip_tags($request->input('hotel_1')); 
        $to_update->hotel_2 = strip_tags($request->input('hotel_2')); 
        $to_update->discription = strip_tags($request->input('discription')); 
        $to_update->image = strip_tags($request->input('image')); 
        $to_update->stay_makh = strip_tags($request->input('stay_makh')); 
        $to_update->stay_madina = strip_tags($request->input('stay_madina')); 
        $to_update->date_in = strip_tags($request->input('date_in')); 
        $to_update->date_out = strip_tags($request->input('date_out')); 
        $to_update->airport_1= strip_tags($request->input('airport_1')); 
        $to_update->airport_2 = strip_tags($request->input('airport_2'));

        $to_update -> save();
        
        return redirect()->route('offers.show', $offer); 
    }
    //-----------------------------------------------------------------
    public function destroy($id)
    {
        $to_delete = offer::findOrFail($offer);
        $to_delete->delete();
        return redirect()->route('offers.index'); 
    }
}
