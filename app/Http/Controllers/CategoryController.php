<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\Exceptions\UploadErrorException;


// ! Refactor all the queries with the relationships

class CategoryController extends Controller
{
    //show catergories
    public function show(){
        
        $data = DB::table('category')->get()->toArray();
        return Inertia::render('Admin/Category/Category',['Categories'=> $data]);
    }

    // all Catergories
    public function FetchCatergories(){
        $data = DB::table('category')->select('id','category_name','image')->get()->toArray();
        return response()->json($data);
    }

    // Fetch products of a certain category
    public function CategoryProducts(Request $request){
        $categoryName = $request->name;

        $Catergory = Category::where('category_name',$request->name)->first();

        if($Catergory){
            $products = products::whereHas('category', function ($query) use ($categoryName) {
                $query->where('category_name', $categoryName);
            })->with('images')->get();
    
            return Inertia::render('Category/Category',['Category'=> $Catergory,'Products'=>$products]);
        }

        return redirect('/shop');
    }

    // create a new catergory
    public function create(Request $request)
        {
        
            $validated = $request->validate([
                'category_name' => 'string|required|min:3|max:20',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
            ]);

            // checking if request has an image
            if ($request->hasFile('image')) {

                try {
                    set_time_limit(90);
                    $imagePath = $request->file('image')->getRealPath();

                    $uploadedImage = Cloudinary::upload($imagePath, [
                        'folder' => 'laravue/Category',
                        'transformation' => [
                            'width' => 700,
                            'height' => 800,
                            'quality' => 'auto',
                            'fetch' => 'auto',
                            'crop' => 'scale',
                        ],
                    ]);

                    $imageUrl = $uploadedImage->getSecurePath();
                    $publicId = $uploadedImage->getPublicId();

                    $validated['image'] = $imageUrl;
                    $validated['publicId'] = $publicId;

                } catch (UploadApiException $e) {
                    //add a rollback incase of failure
                    throw ValidationException::withMessages(['message' => 'Error uploading Image.']);
                }
            }

            Category::create($validated);

            return back()->with('message', 'Category added successfully');
        }

//  updating a catergory
  public function update(Request $request){

    // getting category to be updated
    $category = Category::findOrFail($request->id);

    $validated = $request->validate([
        'category_name' => 'string|required|min:3|max:20',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
    ]);

    $category->fill($request->only([
         'category_name'
    ]));

    
     
    if($request->hasFile('image')){

        try {
           
            //deleting an image
           $response = Cloudinary::destroy($category->publicId);

           if($response->headers["Status"][0] === '200 OK'){
            //uploading new image
           $imagePath = $request->file('image')->getRealPath();

           $uploadedImage = Cloudinary::upload($imagePath, [
               'folder' => 'laravue/Category',
               'transformation' => [
                   'width' => 700,
                   'height' => 800,
                   'quality' => 'auto',
                   'fetch' => 'auto',
                   'crop' => 'scale',
               ],
           ]);

           $imageUrl = $uploadedImage->getSecurePath();
           $publicId = $uploadedImage->getPublicId();

           $category->image = $imageUrl;
           $category->publicId = $publicId;

        }

           
        } 
        catch (\Exception $th) {
            return back()->with('message','Image Deletion failed');
        }  
        catch(UploadApiException $e) {
            return back()->with('message','Image Upload failed');
        } 
    }

    $category->save();

    return back()->with('message',"Category updated successfully");
  }
  
  public function delete(Request $request){

     $category = Category::find($request->id);
    
     try {
        $response=Cloudinary::destroy($category->publicId);
        
        if($response->headers["Status"][0] === '200 OK'){
            $category->delete();
        }

     } catch (\Throwable $th) {
        return back()->with('message','Image Deletion failed');
     }
   
     return back()->with('message','Category deleted successfully');
  }

}
