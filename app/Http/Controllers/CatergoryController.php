<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Catergory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\Exceptions\UploadErrorException;



class CatergoryController extends Controller
{
    //show catergories
    public function show(){
        
        $data = DB::table('catergory')->get()->toArray();
        return Inertia::render('Admin/Catergory/Catergory',['Catergories'=> $data]);
    }

    // create a new catergory
    public function create(Request $request)
{
   
    $validated = $request->validate([
        'catergory_name' => 'string|required|min:3|max:20',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
    ]);

    // checking if request has an image
    if ($request->hasFile('image')) {

        try {
            $imagePath = $request->file('image')->getRealPath();

            $uploadedImage = Cloudinary::upload($imagePath, [
                'folder' => 'laravue/Catergory',
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

     Catergory::create($validated);

     return back()->with('message', 'Catergory added successfully');
 }

//  updating a catergory
  public function update(Request $request){

    // getting category to be updated
    $category = Catergory::findOrFail($request->id);

    $validated = $request->validate([
        'catergory_name' => 'string|required|min:3|max:20',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
    ]);

    $category->fill($request->only([
         'catergory_name'
    ]));

    
     
    if($request->hasFile('image')){

        try {
           
            //deleting an image
           $response = Cloudinary::destroy($category->publicId);

           if($response->headers["Status"][0] === '200 OK'){
            //uploading new image
           $imagePath = $request->file('image')->getRealPath();

           $uploadedImage = Cloudinary::upload($imagePath, [
               'folder' => 'laravue/Catergory',
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

    return back()->with('message',"Catergory updated successfully");
  }
  
  public function delete(Request $request){

     $category = Catergory::find($request->id);
    
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
