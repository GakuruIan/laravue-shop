<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    // fetch all products
   public function Index(){

    $products = products::with(['category' => function ($query) {
        $query->select('id', 'category_name');
    }, 'images'])
    ->get();

    return Inertia::render('Shop/Shop',['products'=>$products]);
   }

//    Fetch a single product 
    public function FetchProduct(Request $request){

        $product = products::with(['category' => function ($query) {
            $query->select('id', 'category_name');
        }, 'images'])->find($request->id);

        DB::table('products')->where('id',$request->id)->increment('views',1);

        return Inertia::render('Product/Product',['product'=>$product]);
    }
}
