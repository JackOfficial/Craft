<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photos;
use App\Models\ProductCategories;
use App\Models\Products;
use Intervention\Image\ImageManager;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productsCounter = Products::count();
        $products = Products::join('product_categories', 'products.product_category_id', 'product_categories.id')
        ->select('products.*', 'product_categories.category')
        ->get();
        return view("admin.manage.products", compact('products', 'productsCounter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategories::all();
        return view("admin.add.product", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'product' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'photo.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);
             
            $manager = new ImageManager(['driver' => 'gd']); //it works

            $photo_name = $request->file('photo')[0]->getClientOriginalName();
            $newPhoto = 'Craft Image-'.date('Ymd').'-'.$photo_name;

           $category = Products::create([
                'product_category_id'=>$request->input('category'),
                'product'=>$request->input('product'),
                'photo' => $newPhoto,
                'price'=>$request->input('price'),
                'quantity'=>$request->input('quantity'),
                'description'=>$request->input('description'),
                ]);

                if($category){

                    if ($request->hasFile('photo')) {
                        foreach($request->file('photo') as $photo){
                            $getClientOriginalName = $photo->getClientOriginalName();
                            $newPhoto = 'Craft Image-'.date('Ymd').'-'.$getClientOriginalName;
                            $image_path = $photo->storeAs('photos/products',$newPhoto,'public');
                            
                            $image = $manager->make('storage/photos/products/'.$newPhoto)->fit(600, 400);
                            $image->save('storage/photos/product_photos_thumb/'.$newPhoto);

                            Photos::create([
                                'product_id' => $category->id,
                                'photo' => $image_path,
                            ]);
                        }
                         }

                    return redirect()->back()->with('productSuccess','Product Added successfully');
                }
                else{
                    return redirect()->back()->with('productFail','Product could not be Added');
                }
    }

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
    public function edit(string $id)
    {
        $categories = ProductCategories::all();
        $product = Products::findOrFail($id);
        return view('admin.edit.product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'product' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'photo.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);
             
            $manager = new ImageManager(['driver' => 'gd']); //it works

            if ($request->hasFile('photo')) {
                $photo_name = $request->file('photo')[0]->getClientOriginalName();
                $newPhoto = 'Craft Image-'.date('Ymd').'-'.$photo_name;
    
               $product = Products::where('id', $id)->update([
                    'product_category_id'=>$request->input('category'),
                    'product'=>$request->input('product'),
                    'photo' => $newPhoto,
                    'price'=>$request->input('price'),
                    'quantity'=>$request->input('quantity'),
                    'description'=>$request->input('description'),
                    ]);

                    if ($product) {
                        foreach($request->file('photo') as $photo){
                            $getClientOriginalName = $photo->getClientOriginalName();
                            $newPhoto = 'Craft Image-'.date('Ymd').'-'.$getClientOriginalName;
                            $image_path = $photo->storeAs('photos/products',$newPhoto,'public');
                            
                            $image = $manager->make('storage/photos/products/'.$newPhoto)->fit(600, 400);
                            $image->save('storage/photos/product_photos_thumb/'.$newPhoto);

                            Photos::create([
                                'product_id' => $id,
                                'photo' => $image_path,
                            ]);
                        }
                         }
            }
            else{
                $product = Products::where('id', $id)->update([
                    'product_category_id'=>$request->input('category'),
                    'product'=>$request->input('product'),
                    'price'=>$request->input('price'),
                    'quantity'=>$request->input('quantity'),
                    'description'=>$request->input('description'),
                    ]); 
            }

                if($product){
                    return redirect()->back()->with('productSuccess','Product Added successfully');
                }
                else{
                    return redirect()->back()->with('productFail','Product could not be Added');
                }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $getPhoto = ::findOrFail($id)->photo;
        // $file_path = "storage/" . $getPhoto;
        // if(file_exists($file_path)){
        //     $deletePhoto = unlink($file_path);
        //     if($deletePhoto){
        //         $deletePhoto = unlink('storage/photos/category_thumbnail/' . substr($getPhoto, 16, strlen($getPhoto)));
        //     }
        // }
        // else{
        //     $deletePhoto = true; 
        // }
    }
}
