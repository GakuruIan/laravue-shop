<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\productImages;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Validation\ValidationException;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\Exceptions\UploadErrorException;

// ! refactor the queries according to the relationships
// ! Create make a separate admin site

class productsController extends Controller
{
    // fetch all products
    public function index(){

        $products = DB::table('products')
            ->join('category','products.category_id','=','category.id')
            ->select('products.*','category.category_name')
            ->get()->toArray();

        return Inertia::render('Admin/Products/Products',['products'=>$products]);
    }

    // Fetch trending Products
    public function TrendingProducts(){
        $products = products::with('images')->where('views','>',1)->limit(4)->get();
        return response()->json($products);
    }

    // add product to wishlist
    public function AddToWishList(Request $request){
    
        $validated = $request->validate([
            'product_id'=>'required',
             'user_id'=>'required',
        ]);

        // !check that user doesnt add the same product twice

        Wishlist::create($validated);
        
        return redirect()->back()->with(['message'=>'Product added successfully']);
    }

    // Fetch featured products
    public function FeaturedProducts(){
        $productWithImages = [];

        $results = DB::table('featured')
        ->join('products','featured.product_id','=','products.id')
        ->join('productImages','featured.product_id','=','productImages.product_id')
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

        return response()->json($productWithImages);
    }

    // Fetch Related products
    public function RelatedProducts(Request $request){

        $productWithImages = [];

        $results = DB::table('products')
        ->join('productImages','products.id','=','productImages.product_id')
        ->select('products.id','products.name','products.price','productImages.image','productImages.publicId',)
        ->where('products.category_id', '=', $request->id)
        ->limit(4)
        ->get()
        ->toArray();

        foreach($results as $row){
            $product_id = $row->id;

            if(!isset($productWithImages[$product_id])){

                $productWithImages [$product_id] = [
                    'id'=>$row->id,
                    'name'=>$row->name,
                    'price'=>$row->price,
                    'images'=>[]
                ];

                if ($row->image) {
                    $productWithImages [$product_id]['images'][] = [
                        'image' => $row->image,
                    ];
                } 
            }
           
        }

        return response()->json($productWithImages );
    }

    // Fetch a specific product - Admin
    public function FetchProduct(Request $request){
        $productWithImages = [];

        $results = DB::table('products')
        ->join('productImages','products.id','=','productImages.product_id')
        ->select('products.*','productImages.image','productImages.publicId')
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
                    'description'=>$row->description,
                    'stock'=>$row->stock,
                    'images'=>[],
                    'category_name'=> $row->category_id
                ];
   
                
            }
            if ($row->image) {
                $productWithImages [$product_id]['images'][] = [
                    'image' => $row->image,
                    'public'=> $row->publicId
                ];
            }
        }

        return response()->json($productWithImages);
    }

    // ! add database transcation in here
    // Create a new product
    public function create(Request $request){

       $validated = $request->validate([
         'name'=>'string|required|min:3|max:30',
         'price'=>'required|min:0',
         'color'=>'string|nullable|max:30|min:3',
         'size'=>'string',
         'description'=>'required|string|min:5|max:255',
         'stock'=>'required',
         'images.*'=>'required|image|mimes:jpeg,png,jpg|max:5120',
         'category_id'=>'required'
       ]);


       $uploadedImages = [];
       $failedUploads = [];

       if($request->hasFile('images')){
        
            $Images = $request->file('images');

            foreach ($Images as $key => $image) {

                try{
                    set_time_limit(90);
                    $uploadedImage = Cloudinary::upload($image->getRealPath(), [
                        'folder' => 'laravue/Products',
                        'transformation' => [
                            'width' => 700,
                            'height' => 800,
                            'quality' => 'auto',
                            'fetch' => 'auto',
                            'crop' => 'scale',
                        ],
                    ]);

                    

                    $uploadedImages[$key] = [
                        'image' => $uploadedImage->getSecurePath(),
                        'publicId' => $uploadedImage->getPublicId()
                    ];

                } catch (UploadApiException $e) {
                    $failedUploads[] = $image->getClientOriginalName();
                    throw ValidationException::withMessages(['message' => 'Error uploading Image.']);
                }
                catch (TimeoutException $e){
                     throw ValidationException::withMessages(['message' => 'Execution took too long. Try again after a few minutes']);
                }
            }

            // create product and get the id of the product 
            if(empty($failedUploads)){
                
                $product = [
                        'name'=>$validated['name'],
                        'price'=>$validated['price'],
                        'colors'=>$validated['color'],
                        'size'=>$validated['size'],
                        'description'=>$validated['description'],
                        'stock'=>$validated['stock'],
                        'category_id'=>$validated['category_id']
                ];

                $Product=products::create($product);

                $product_id = $Product->id;
     
                foreach($uploadedImages as $values){
                    productImages::create([
                        'image'=>$values['image'],
                        'publicId'=>$values['publicId'],
                        'product_id'=>$product_id
                    ]);
                   }
                   
                  return back()->with('message', 'Product added successfully');
            }
            else{
                return back()->with('message', 'Could not create product');
            }
       }
    }

   
    // function to upload to cloudinary
    public function uploadPhotos($Images,$path){
        $failedUploads = [];

        foreach ($Images as $key => $image) {

            try{
                set_time_limit(90);
                $uploadedImage = Cloudinary::upload($image->getRealPath(), [
                    'folder' => $path,
                    'transformation' => [
                        'width' => 700,
                        'height' => 800,
                        'quality' => 'auto',
                        'fetch' => 'auto',
                        'crop' => 'scale',
                    ],
                ]);

                

                $uploadedImages[$key] = [
                    'image' => $uploadedImage->getSecurePath(),
                    'publicId' => $uploadedImage->getPublicId()
                ];

            } catch (UploadApiException $e) {
                $failedUploads[] = $image->getClientOriginalName();
                throw ValidationException::withMessages(['message' => 'Error uploading Image.']);
            }
            catch (TimeoutException $e){
                 throw ValidationException::withMessages(['message' => 'Execution took too long. Try again after a few minutes']);
            }
        }
         
       
        return [$failedUploads,$uploadedImages];
    }


    // function to delete a product image in cloudinary
    public function delete($id){
        $failedDeletions=[];

        $Images = DB::table('productImages')
        ->select('productImages.id','productImages.publicId')
        ->where('product_id','=',$id)
        ->get()
        ->toArray();
        
        foreach($Images as $image){
            try {
                set_time_limit(90);

                $response=Cloudinary::destroy($image->publicId);
                
                if($response->headers["Status"][0] === '200 OK'){
                    productImages::where('publicId','=',$image->publicId)->delete();
                }
        
             } catch (\Throwable $th) {
                $failedDeletions[]= $image->getClientOriginalName();
                return back()->with('message','Image Deletion failed');
             }
        }

      return $failedDeletions;
    }
    
    // update a product
    public function UpdateProduct(Request $request){

        $failedUploads=[];
        $UploadedImages=[];

        $Product = products::findOrFail($request->id);

       $validated = $request->validate([
            'name'=>'string|required|min:5|max:30',
            'price'=>'required|min:0',
            'color'=>'string|required|max:30|min:3',
            'size'=>'string',
            'description'=>'required|string|min:5|max:60',
            'stock'=>'required',
            'images.*'=>'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'category_id'=>'nullable'
          ]);

         
          if($request->hasFile('images')){
            $Images = $request->file('images');

             $failedDeletions = $this->delete($request->id);

            if(empty($failedDeletions)){

              [$failedUploads,$uploadedImages] = $this->uploadPhotos($Images,'laravue/Products');

              $FailedUploads = $failedDeletions;
              $UploadedImages = $uploadedImages;
            }
          }

          if(empty($failedUploads)){
            
            $product = [
                'name'=>$validated['name'],
                'price'=>$validated['price'],
                'colors'=>$validated['color'],
                'size'=>$validated['size'],
                'description'=>$validated['description'],
                'stock'=>$validated['stock'],
                'category_id'=>$validated['category_id']
              ];

            $results = $Product->update($product);
              
            if(!empty($UploadedImages)){

                foreach($UploadedImages as $values){

                    productImages::create([
                        'image'=>$values['image'],
                        'publicId'=>$values['publicId'],
                        'product_id'=>$Product->id
                    ]);
                }

            }
             

            return back()->with('message',"Product updated successfully");
          }

          return back()->with('message',"An error occurred could not update product");
    }

    // Delete a product
    public function DeleteProduct(products $product){
        $failedDeletions = [];
        
        $failedDeletions = $this->delete($product->id);

       if(empty($failedDeletions)){
        $product->delete();
       }
    }

}
