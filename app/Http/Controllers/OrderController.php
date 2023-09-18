<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DeliveryDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
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

            DB::commit();

            return back()->with('message', 'Order placed successfully');

        } 
        catch (\Throwable $th) {

            echo '<pre>';
            echo  $th->getMessage();
            echo '</pre>';

            exit();
            DB::rollBack();
            return back()->with('message', 'An error occurred. Try again later.');
        }
    }
    
}
