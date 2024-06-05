<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        
        
        $user = Auth::user(); // الحصول على المستخدم الحالي
        $reservations = Reservation::where('user_id', $user->id)->get(); // جلب جميع الحجوزات للمستخدم

        return view('user.index', [
            'reservations' => $reservations, // تمرير جميع الحجوزات إلى العرض
        ]);
    }

    public function notifications() {
        return view('user.notifications');
    }
}
