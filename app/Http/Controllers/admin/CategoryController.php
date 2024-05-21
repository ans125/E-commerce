<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\TempImage;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $categories = Category::latest();
        if(!empty($request->get('keyword'))){
            $categories = $categories->where('name','like','%'.$request->get('keyword').'%');
        }

        $categories = $categories->paginate(10);
        return view('admin.category.list', compact('categories'));



        // try {
        //     $categories = $this->categoryRepository->all();
        //     $keyword = $request->input('keyword');
        //     if ($keyword) {
        //         $categories = $this->categoryRepository->searchByName($keyword);
        //         return $categories;
        //     } else {
        //         echo"error";
        //     }
        //     return view('admin.category.list', compact('categories', 'keyword'));
            
        // } catch (\Exception $e) {
        //     // Log or handle the exception as needed
        //     return back()->with('error', 'An error occurred while fetching categories: ' . $e->getMessage());
        // }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
 /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required|unique:categories',
    ]);
    if ($validator->passes()) {

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->showHome = $request->showHome;
        $category->save();

        $oldImage = $category->image;

        // save image
        if(!empty($request->image_id)){
            $tempImage = TempImage::find($request->image_id);
            $extArray = explode('.', $tempImage->name);
            $ext = last($extArray);

            $newImageName = $category->id.'-'.time().'.'.$ext;
            $sPath = public_path().'/temp/'.$tempImage->name;
            $dPath = public_path().'/uploads/category/'.$newImageName;
            File::copy($sPath,$dPath);


            $category->image = $newImageName;
            $category->save();

            File::delete(public_path().'/uploads/category/'.$oldImage);

        }

        session()->flash('success', 'Category added successfully');
        return response()->json(['status'=> true,
        'errors' => 'Category Added successfully']);

    } else {
        return response()->json(['status'=> false,
    'errors' => $validator->errors()]);
    }
}
// {
//     $validator = Validator::make($request->all(), [
//         'name' => 'required',
//         'slug' => 'required|unique:categories',
//         'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define validation rules for the image
//     ]);

//     if ($validator->passes()) {
//         try {
//             $data = [
//                 'name' => $request->name,
//                 'slug' => $request->slug,
//                 'status' => $request->status,
//             ];

//             // Store the image in the 'categories' table
//             if ($request->hasFile('image')) {
//                 $imagePath = $request->file('image')->store('category_images', 'public');
//                 $data['image'] = $imagePath;
//             }

//             $category = $this->categoryRepository->create($data);

//             session()->flash('success', 'Category added successfully');
//             return response()->json([
//                 'status' => true,
//                 'message' => 'Category added successfully'
//             ]);

//         } catch (\Exception $e) {
//             // Handle any exceptions (e.g., database errors)
//             session()->flash('error', 'Failed to add category: ' . $e->getMessage());
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Failed to add category: ' . $e->getMessage()
//             ]);
//         }
//     } else {
//         // Handle validation errors
//         return response()->json([
//             'status' => false,
//             'message' => $validator->errors()->all()
//         ]);
//     }
    // }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $category = Category::find($id);

        if(empty($category)) {  
        return redirect()->route('categories.index');
    }   

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if(empty($category)) {  
        return response()->json(['status'=> false,'notFound'=>true,
        'message'=> 'Category Not found']);
    }  
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id.',id',
]);
if ($validator->passes()) {

    $category = new Category();
    $category->name = $request->name;
    $category->slug = $request->slug;
    $category->status = $request->status;
    $category->showHome = $request->showHome;
    $category->save();

    // save image
    if(!empty($request->image_id)){
        $tempImage = TempImage::find($request->image_id);
        $extArray = explode('.', $tempImage->name);
        $ext = last($extArray);

        $newImageName = $category->id.'.'.$ext;
        $sPath = public_path().'/temp/'.$tempImage->name;
        $dPath = public_path().'/uploads/category/'.$newImageName;
        File::copy($sPath,$dPath);


        $category->image = $newImageName;
        $category->save();
    }

    session()->flash('success', 'Category updated successfully');
    return response()->json(['status'=> true,
    'errors' => 'Category updated successfully']);

} else {
    return response()->json(['status'=> false,
'errors' => $validator->errors()]);
}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if(empty($category)){
            return redirect()->route('categories.index');
        }


        File::delete(public_path().'/uploads/category/'.$category->image);

        session()->flash("success",'Category Deleted Successfully');
        $category->delete();

        return response()->json(['status'=> true,
        'message'=> 'Category Deleted Successfully']);
    }

    public function getSlug(Request $request)
    {
        try {
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);
            }
            
            return response()->json([
                'status' => true,
                'slug' => $slug ?? null, // If $slug is not set, return null
            ]);
        } catch (\Exception $e) {
            // Catch any exceptions that occur during the execution of the try block
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(), // Return the error message
            ]);
        }
        
    }
    
}
