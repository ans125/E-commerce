<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BrandController extends Controller
{   
    public function index(Request $request){
        $brands = Brand::latest('id');
        if($request->get('keyword')){
            $brands = $brands->where('name','like','%'.$request->keyword.'%');
        }
        $brands = $brands->paginate(10); 
        
        return view("admin.brands.list", compact("brands"));
    }
    public function create(){

        return view("admin.brands.create");
    }
    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:brands',
]);
        if($validator->passes()){
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->save();
            return response()->json(['status'=>true,
            'message'=> 'Brand added succesfully']);

        }else{
            return response()->json(['status'=> false,
            'errors' => $validator->errors()]); }
    }

    public function edit(string $id, Request $request)
    {
        $brand = Brand::find($id);

        if(empty($brand)) {  
        
        session()->flash('error','record not found.');
        return redirect()->route('categories.index');
    }   

        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $brand = Brand::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            session()->flash('error', 'Record not found.');
            return response()->json(['status' => false, 'notFound' => true]);
        }
    
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $brand->id . ',id',
        ]);
    
        if ($validator->passes()) {
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->save();
    
            return response()->json(['status' => true, 'message' => 'Brand updated successfully']);
        } else {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
    }
               

}
