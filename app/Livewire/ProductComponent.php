<?php

namespace App\Livewire;

use App\Models\Favorite;
use App\Models\Products;
// use Darryldecode\Cart\Cart;
use Livewire\Component;
// use Cart;

class ProductComponent extends Component
{
    public function addProductToCart($id){
     $product = Products::findOrFail($id);
     $userId = auth()->user()->id;

     $addToCart = \Cart::add(array(
        'id' => $id, // inique row ID
        'name' => $product->product,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
    ));

       if($addToCart){
           // dd("Product added to the cart");
            $this->dispatch('productAddedToCart');
        }
        else{
            dd("Product could not be added to the cart");
        }
    }

    public function addToFavorite($id){
        $userId = auth()->id();
          $addToFavorite = Favorite::create([
           'user_id' => $userId,
           'product_id' => $id
          ]);
    
          if($addToFavorite){
             dd("Added");
          }
          else{
            dd("Failed");
          }
        }

    public function render()
    {
        $products = Products::all();  
        return view('livewire.product-component', compact('products'));
    }
}
