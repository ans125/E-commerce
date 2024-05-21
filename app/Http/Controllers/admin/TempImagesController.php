<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TempImagesController extends Controller
{
    public function create(Request $request){

        $images = $request->image;

        if(!empty($images)){
        $ext = $images->getClientOriginalExtension();
        $newName = time().".".$ext;
        
        $tempImage = new TempImage;
        $tempImage->name = $newName;
        $tempImage->save();
        $images->move(public_path().'/temp', $newName);

        // generate thumb gallery
        $sourcePath = public_path().'/temp/'.$newName;
        $desPath = public_path().'/temp/thumb/'.$newName;
        $image = Image::make($sourcePath);
        $image->fit(300,275);
        $image->save($desPath);


        return response()->json(['status' => true,
         'image_id' => $tempImage->id,
         'ImagePath'=>asset('/temp/thumb/'.$newName),
         'message' => 'Image uploaded successfully']);
    } else {
        return response()->json(['message' => 'No images uploaded'], 400);
    }
    }
}


