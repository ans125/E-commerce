<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function create(){
        $data = [];
        $categories = Category::orderBy('name','asc')->get();
        $brands = Brand::orderBy('name','asc')->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        return view("admin.products.create", $data);
    } 

    public function store(Request $request) {
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'sku' => 'required',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_feature' => 'required|in:Yes,No',
        ];
    
        if($request->track_qty == 'Yes') {
            $rules['qty'] = 'required|numeric';
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if($validator->passes()){
            $product = Product::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'price' => $request->price,
                'compare_price' => $request->compare_price,
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'is_feature' => $request->is_feature,
                'sku' => $request->sku,
                'barcode' => $request->barcode,
                'track_qty' => $request->track_qty,
                'qty' => $request->track_qty == 'Yes' ? $request->qty : null,
                'status' => $request->status,
            ]);
    
            // Save images
            if($request->has('image_array')) {
                foreach($request->image_array as $tempImageId) {
                    $tempImageInfo = TempImage::find($tempImageId);
                    if($tempImageInfo) {
                        $extArray = explode('.', $tempImageInfo->name);
                        $ext = end($extArray);
    
                        $productImage = new ProductImage();
                        $productImage->product_id = $product->id;
                        $productImage->save();
    
                        $imageName = $product->id . '-' . $productImage->id . '-' . time() . '.' . $ext;
                        $productImage->image = $imageName;
                        $productImage->save();
    
                        // Ensure directory structure exists
                        $destinationDirectory = public_path('/uploads/product/');
                        if (!file_exists($destinationDirectory)) {
                            mkdir($destinationDirectory, 0777, true);
                        }
    
                        // Save large image
                        $sourcePath = public_path('/temp/' . $tempImageInfo->name);
                        $largeDestPath = public_path('/uploads/product/large/' . $imageName);
                        $image = Image::make($sourcePath);
                        $image->resize(1400, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $image->save($largeDestPath);
    
                        // Save small image
                        $smallDestPath = public_path('/uploads/product/small/' . $imageName);
                        $image = Image::make($sourcePath);
                        $image->fit(300, 300);
                        $image->save($smallDestPath);
                    }
                }
            }
    
            return response()->json(['status' => true, 'message' => 'Product added successfully']);
        }
    }
        
}
