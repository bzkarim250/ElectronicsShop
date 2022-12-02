<?php
    
namespace App\Http\Controllers;
     
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use App\Models\Order;
     
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from LaravelTus.com." 
        ]);
        // placing order
        $newOrder=Order::create([
            'product_id'=>$request['product_id'],
            'client_address'=>$request['client_address'],
            'amount'=>$request['amount'],
            'supplier_id'=>$request['supplier_id'],
            'client_id'=>$request['client_id'],
            'quantity'=>$request['quantity']
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}