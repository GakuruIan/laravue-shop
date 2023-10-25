<?php

namespace App\Http\Controllers;

use Stripe\Event;
use Stripe\Stripe;
use Inertia\Inertia;
use App\Models\Order;
use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaymentController extends Controller
{
    //after  successful payment
    public function Success(Request $request){
        $sessionId = $request->get('session_id');
        
        Stripe::setApiKey(config('stripe.ak'));
        
        try {
          $session = Session::retrieve($sessionId);

          $order = Order::where('session_id',$sessionId)->first();

          $Customer =  [
            'name' => $session->customer_details->name,
            'email'=> $session->customer_details->email,
          ];
          
          if(!$order){
            throw new NotFoundHttpException();
          }
          
          if($order){
              $order->payment_status = 'paid';
              $order->amount = $session->amount_total/100;
              $order->shipping_fee = ($session->amount_total - $session->amount_subtotal) / 100;
              $order->save();
          }

          return Inertia::render('Success/success',['customer'=> $Customer]);
        } 
        catch (\Throwable $th) {
           return back()->with('message', $th->message);
        }
  
        
      }

    //   incase of cancellation

    public function Cancel(){
        return Inertia::render('Failure/Failure');
    }

    public function Webhook(){
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Event::constructFrom(
                json_decode($payload, true)
            );
        } 
        
        catch(\UnexpectedValueException $e) {
            http_response_code(400);
        }
        
        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $paymentIntent = $event->data->object; 

                $sessionId = $paymentIntent->id;
                $order = Order::where('session_id',$sessionId)->first();
                
                if($order && $order->payment_status === 'unpaid'){
                    $order->payment_status = 'paid';
                    $order->amount = $paymentIntent->amount_total/100;
                    $order->shipping_fee = ($paymentIntent->amount_total - $paymentIntent->amount_subtotal)/100;

                    $order->save();

                    // ! fix the 500 status 

                    // Fetch order details after update
                    $Order=Order::where('session_id',$sessionId)->first();
                    Mail::to($paymentIntent->customer_details->email)->queue(new OrderEmail($order,$paymentIntent->customer_details->name));
                }

               
            break;

            default:
                echo 'Received unknown event type ' . $event->type;
        }
        
        return response('',200);
    }
}
