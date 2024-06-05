<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\ReservationNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        // التحقق من توفر مفتاح Stripe
        $stripeSecretKey = config('stripe.sk');

        if (empty($stripeSecretKey)) {
            return response()->json(['error' => 'Stripe Secret Key is not set'], 500);
        }
        
        try {
            \Stripe\Stripe::setApiKey($stripeSecretKey);

            $offerName = $request->input('offer_name');
            $dzdToUsdRate = 200; 
            $totalPrice = $request->input('total'); 
            $amountInUsd = $totalPrice * $dzdToUsdRate ; 
            $reservationId = $request->input('reservation_id');

            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'USD',
                            'product_data' => [
                                'name' => $offerName,
                            ],
                            'unit_amount' => $amountInUsd,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('success', ['offer_name' => $offerName, 'amount' => $amountInUsd]),
                'cancel_url' => route('reservations.paymentPage', ['reservation_id' => $reservationId]),
            ]);

            // إعادة توجيه المستخدم إلى صفحة الدفع على Stripe
            return redirect()->away($session->url);
        } catch (\Exception $e) {
            // التعامل مع الأخطاء
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function success(Request $request)
    {
        $admin = User::where('utype', 'ADM')->first();
        $admin->has_new_notification = true;
        $admin->save();  

        ReservationNotification::create([
            'user_id' => $admin->id,
            'type' => 'ADM',
            'message' => 'تم دفع حجز جديد ' ,
        ]);

        // الحصول على معلومات المستخدم
        $user = auth()->user();
        $offerName = $request->input('offer_name');
        $amountInUsd = $request->input('amount');

        // إرسال البريد الإلكتروني
         Mail::to($user->email)->send(new PaymentSuccess($user, $offerName, $amountInUsd)); 
    
        return view('reservations.success');
    }  

    
}
