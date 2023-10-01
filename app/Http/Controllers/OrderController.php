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

class OrderController extends Controller
{
//    creating an order
    public function create(Request $request){

        $validatedData = $request->validate([
            'firstname' => 'required|max:10|min:3',
            'lastname' => 'required|max:10|min:3',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'county' => 'required|min:5|max:20',
            'subcounty' => 'required|min:5|max:20',
            'ward' => 'required|min:5|max:20',
            'amount' => 'required|numeric',
        ]);


    
        // creating delivery details 
        $deliveryDetails = [
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phonenumber'],
            'county' => $validatedData['county'],
            'sub_county' => $validatedData['subcounty'],
            'ward' => $validatedData['ward'],
        ];
    
        // getting users orders
        $orders = $request->input('order');

        $orderItems = [];

        try {
            DB::beginTransaction();

                $order = Order::create([
                    'amount' => $validatedData['amount'],
                    'tracking_id' => Str::random(10),
                ]);
                
                $deliveryDetails['order_id'] = $order->id;

                DeliveryDetails::create($deliveryDetails);
    
                foreach ($orders as $orderData) {
                    $productID = $orderData['productID'];

                    foreach ($orderData['order_details'] as $detail) {
                        $detail['product_id'] = $productID;
                        $detail['order_id'] = $order->id;
                        $orderItems [] = $detail;
                    }
                }

             OrderItems::insert($orderItems);

             $stripe_session = $this->Stripe_session($orders);

             //DB::commit();

             return redirect()->away($stripe_session->url);
        } 
        catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('message', 'An error occurred. Try again later.');
        }
    }

    // create a stripe session
    public function Stripe_session($Orders){

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
                            'order_details' => json_encode($order['order_details']),
                        ],
                    ],
                    'unit_amount' => $order['total_amount'] * 100, 
                ],
                'quantity' => $order['total_quantity'],
            ];

            $line_items[] = $line_item;
        }
        


        try {

            $session = Session::create([
                'payment_method_types' => ['card'],
                 'line_items' => $line_items,
                 'mode' => 'payment',
                 'success_url' => route('success'),
                 'cancel_url' =>route('cancel')
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
