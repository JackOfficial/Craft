<?php

namespace App\Livewire;

use App\Models\Products;
// use Darryldecode\Cart\Cart;
use Livewire\Component;
// use Cart;

class ProductComponent extends Component
{
    public function addProductToCart($id){
     $product = Products::findOrFail($id);
     \Cart::session(7)->add(array(
            'id' => $id, // inique row ID
            'name' => $product->product,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        dd("Product added to the cart");
        // if($addProduct){
        //     dd("Product added to the cart");
        // }
        // else{
        //     dd("Product could not be added to the cart");
        // }
     
    }

    public function render()
    {
        $products = Products::all();  
        return view('livewire.product-component', compact('products'));
    }
}
