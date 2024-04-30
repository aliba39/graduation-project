<?php 
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

 
class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
 
    public function session(Request $request)
    {
        $stripeSecretKey = config('stripe.sk');
if (empty($stripeSecretKey)) {
    return response()->json(['error' => 'Stripe Secret Key is not set'], 500);
}
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
 
        $product_name = $request->get('product_name');
        $total_price = $request->get('total');
        $two0 = "00";
        $total = "$total_price$two0";
 
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $product_name,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
 
        return redirect()->away($session->url);
    }
 
    public function success()
    {
        return "Thanks for you order You have just completed your payment. The sealer will reach out to you as soon as possible";
    }
}