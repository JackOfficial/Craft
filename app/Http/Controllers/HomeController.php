<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
      $categories = ProductCategories::all(); 
      $products = Products::all();  
      return view('index', compact('categories', 'products'));
    }
}
