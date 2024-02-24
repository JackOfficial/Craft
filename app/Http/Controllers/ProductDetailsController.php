<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use App\Models\Products;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class ProductDetailsController extends Controller
{
   public function details($id){
   $product = Products::findOrFail($id);
   $photos = Photos::join('products', 'photos.product_id', 'products.id')
   ->where('products.id', $id)
   ->select('photos.*')
   ->get();
   $products = Products::all(); 
   return view('detail', compact('product', 'photos'));
   }
}
