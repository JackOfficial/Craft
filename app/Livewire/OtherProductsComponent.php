<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;

class OtherProductsComponent extends Component
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
       
    public function render()
    {
        $otherProducts = Products::all();
        return view('livewire.other-products-component', compact('otherProducts'));
    }
}
