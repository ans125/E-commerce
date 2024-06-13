<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TempImagesController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:10240', // 10MB in kilobytes
        ]);

        $imageFile = $request->file('image');
        
        if ($imageFile) {
            $ext = $imageFile->getClientOriginalExtension();
            $newName = time() . "." . $ext;

            // Save the image info in the database
            $tempImage = new TempImage;
            $tempImage->name = $newName;
            $tempImage->save();

            // Move the uploaded file to the temp directory
            $imageFile->move(public_path('temp'), $newName);

            // Generate thumb gallery
            $sourcePath = public_path('temp/' . $newName);
            $desPath = public_path('temp/thumb/' . $newName);
            $image = Image::make($sourcePath);
            $image->fit(300, 275);
            $image->save($desPath);

            return response()->json([
                'status' => true,
                'image_id' => $tempImage->id,
                'ImagePath' => asset('temp/thumb/' . $newName),
                'message' => 'Image uploaded successfully'
            ]);
        } else {
            return response()->json(['message' => 'No images uploaded'], 400);
        }
    }
}
