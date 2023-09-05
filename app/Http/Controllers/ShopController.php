<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    // fetch all products
   public function Index(){

    $productWithImages = [];

        $results = DB::table('products')
        ->join('productImages','products.id','=','productImages.product_id')
        ->join('catergory','products.category_id','=','catergory.id')
        ->select('products.*','productImages.image','productImages.publicId','catergory.catergory_name')
        ->get()
        ->toArray();

        foreach($results as $row){
            $product_id = $row->id;

            if(!isset($productWithImages[$product_id])){

                $productWithImages [$product_id] = [
                    'id'=>$row->id,
                    'name'=>$row->name,
                    'price'=>$row->price,
                    'color'=>$row->colors,
                    'size'=>$row->size,
                    'stock'=>$row->stock,
                    'images'=>[],
                    'category_name'=> $row->catergory_name
                ];

                if ($row->image) {
                    $productWithImages [$product_id]['images'][] = [
                        'image' => $row->image,
                    ];
                } 
            }
           
        }

        return Inertia::render('Shop/Shop',['products'=>$productWithImages]);
   }

//    Fetch a single product 
    public function FetchProduct(Request $request){
        $productWithImages = [];

        $results = DB::table('products')
        ->join('productImages','products.id','=','productImages.product_id')
        ->join('catergory','products.category_id','=','catergory.id')
        ->select('products.*','productImages.image','productImages.publicId','catergory.catergory_name')
        ->where('products.id','=',$request->id)
        ->get()
        ->toArray();

        foreach($results as $row){
            $product_id = $row->id;

            if(!isset($productWithImages[$product_id])){

                $productWithImages [$product_id] = [
                    'id'=>$row->id,
                    'name'=>$row->name,
                    'price'=>$row->price,
                    'color'=>$row->colors,
                    'size'=>$row->size,
                    'stock'=>$row->stock,
                    'description'=>$row->description,
                    'images'=>[],
                    'category_name'=> $row->catergory_name
                ];

                
            }
            if ($row->image) {
                $productWithImages [$product_id]['images'][] = [
                    'image' => $row->image,
                ];
            } 
        }

        return Inertia::render('Product/Product',['product'=>$productWithImages]);
    }
}
