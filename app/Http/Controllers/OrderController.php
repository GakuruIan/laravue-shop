<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\DeliveryDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
//    creating an order
    public function create(Request $request){
       
        $validatedData = $request->validate([
             'order' => 'required',
             'amount'=>'required'
        ]);


        // getting users orders
        $orders = $request->input('order');

        $orderItems = [];

        try {
            DB::beginTransaction();

                $order = Order::create([
                    'amount' => $request->input('amount'),
                    'tracking_id' => Str::random(10),
                ]);
    
                foreach ($orders as $orderData) {
                    $productID = $orderData['productID'];

                    foreach ($orderData['order_details'] as $detail) {
                        $detail['product_id'] = $productID;
                        $detail['order_id'] = $order->id;
                        $orderItems [] = $detail;
                    }
                }

             OrderItems::insert($orderItems);

             $stripe_session = $this->Stripe_session($orders,$order->id);
                
           
             //updating the session id in order
             $updateOrder = Order::find($order->id);

             $updateOrder->session_id = $stripe_session->id;

             $updateOrder->save();
             
             DB::commit();
             
             return Inertia::location($stripe_session->url);; 
        } 
        catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('message', 'An error occurred. Try again later.');
        }
    }

    // create a stripe session
    public function Stripe_session($Orders,$orderID){

        Stripe::setApiKey(config('stripe.ak'));

        $line_items = [];

        foreach($Orders as $order){
            
            $line_item = [
                'price_data' => [
                    'currency' => 'kes',
                    'product_data' => [
                        'name' => $order['name'],
                        'images' => [$order['image']],
                        'metadata' => [
                             'orderID' => $orderID
                        ],
                    ],
                    'unit_amount' => $order['price'] * 100, 
                ],
                'quantity' => $order['total_quantity'],
            ];

            $line_items[] = $line_item;
        }


        try {

            $session = Session::create([
                'payment_method_types' => ['card'],
                'shipping_address_collection' => ['allowed_countries' => ['US', 'KE']],
                 'shipping_options' => [
                    [
                      'shipping_rate_data' => [
                        'type' => 'fixed_amount',
                        'fixed_amount' => [
                          'amount' => 0,
                          'currency' => 'kes',
                        ],
                        'display_name' => 'Free shipping',
                        'delivery_estimate' => [
                          'minimum' => [
                            'unit' => 'business_day',
                            'value' => 5,
                          ],
                          'maximum' => [
                            'unit' => 'business_day',
                            'value' => 7,
                          ],
                        ],
                      ],
                    ],
                    [
                      'shipping_rate_data' => [
                        'type' => 'fixed_amount',
                        'fixed_amount' => [
                          'amount' => 150000,
                          'currency' => 'kes',
                        ],
                        'display_name' => 'Next day air',
                        'delivery_estimate' => [
                          'minimum' => [
                            'unit' => 'business_day',
                            'value' => 1,
                          ],
                          'maximum' => [
                            'unit' => 'business_day',
                            'value' => 1,
                          ],
                        ],
                      ],
                    ],
                  ],
                 'line_items' => $line_items,
                 'mode' => 'payment',
                 'success_url' => route('success')."?session_id={CHECKOUT_SESSION_ID}",
                 'cancel_url' =>route('cancel'),
                 'phone_number_collection' => ['enabled' => true],
            ]);

        } catch (\Throwable $th) {
           echo $th->getMessage();
           exit();
        }
        catch (ApiErrorException $e) {
            echo json_encode(['error' => $e->getMessage()]);
            exit();
        }

        return $session;
    }


    // fetching a users order
    public function FetchUserOrders(){

        // if(Auth::check()){
        //     // add a nullable user_id in orders for tracking

        //     return  Inertia::render('Orders/Order');
        // }

        // return redirect('/login');

        return Inertia::render('Orders/Order');
    }

    
}
