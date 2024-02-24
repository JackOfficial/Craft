<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use Intervention\Image\ImageManager;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategories::all();
        $categoriesCounter = ProductCategories::count();
        return view("admin.manage.categories", compact("categories", "categoriesCounter"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("admin.add.category");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);

            $image_path = null; 
            $manager = new ImageManager(['driver' => 'gd']); //it works

            if ($request->hasFile('photo')) {
                $getClientOriginalName = $request->file('photo')->getClientOriginalName();
                $newPhoto = 'Craft Image-'.date('Ymd').'-'.$getClientOriginalName;
                $image_path = $request->file('photo')->storeAs('photos/category', $newPhoto, 'public');
                $image = $manager->make('storage/photos/category/'.$newPhoto)->fit(500, 400);
                $image->save('storage/photos/category_thumbnail/'.$newPhoto);
                 }

           $category = ProductCategories::create([
                'category'=>$request->input('category'),
                'description'=>$request->input('description'),
                'photo'=> $image_path,
                ]);

                if($category){
                    return redirect()->back()->with('categorySuccess','Category Added successfully');
                }
                else{
                    return redirect()->back()->with('categoryFail','Category could not be Added');
                }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = ProductCategories::findOrFail($id);
        return view('admin.show.category', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ProductCategories::findOrFail($id);
        return view('admin.edit.category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'nullable' => ['required', 'string', 'max:2000'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);

            $image_path = null; 
            $manager = new ImageManager(['driver' => 'gd']); //it works

            if ($request->hasFile('photo')) {
                $getClientOriginalName = $request->file('photo')->getClientOriginalName();
                $newPhoto = 'Craft Image-'.date('Ymd').'-'.$getClientOriginalName;
                $image_path = $request->file('photo')->storeAs('photos/category', $newPhoto, 'public');
                $image = $manager->make('storage/photos/category/'.$newPhoto)->fit(500, 400);
                $image->save('storage/photos/category_thumbnail/'.$newPhoto);

                $category = ProductCategories::where('id', $id)->update([
                    'category'=>$request->input('category'),
                    'description'=>$request->input('description'),
                    'photo'=> $image_path,
                    ]);
                 }
                 else{
                    $category = ProductCategories::where('id', $id)->update([
                        'category'=>$request->input('category'),
                        'description'=>$request->input('description'),
                        ]); 
                 }

                if($category){
                    return redirect()->route('admin.product-categories.index')->with('categorySuccess','Category Updated successfully');
                }
                else{
                    return redirect()->route('admin.product-categories.index')->with('categoryFail','Category could not be Updated');
                }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getPhoto = ProductCategories::findOrFail($id)->photo;
        $file_path = "storage/" . $getPhoto;
        if(file_exists($file_path)){
            $deletePhoto = unlink($file_path);
            if($deletePhoto){
                $deletePhoto = unlink('storage/photos/category_thumbnail/' . substr($getPhoto, 16, strlen($getPhoto)));
            }
        }
        else{
            $deletePhoto = true; 
        }

        $category = ProductCategories::where('id',$id)->delete();
         if($category){
           if($deletePhoto){
                return redirect()->back()->with('categorySuccess', 'Product deleted successfully');
            }
            else{
                return redirect()->back()->with('categorySuccess', 'Failed to delete photo');
            } 
        }
        else{
            return redirect()->back()->with('categoryFail', 'Product could not be deleted');
        }
    }
}
