<?php

namespace App\Livewire;

use Livewire\Component;

class ShoppingcartComponent extends Component
{
    public function increaseQty($id){
        \Cart::update($id, array(
            'quantity' => 1, 
          ));
          $this->dispatch('productAddedToCart');
    }

    public function decreaseQty($id){
        \Cart::update($id, array(
            'quantity' => -1, 
          ));
          $this->dispatch('itemRemovedFromCart');
    }

    public function deleteItem($id){
        $deleteItem = \Cart::remove($id);
        if($deleteItem){
           $this->dispatch('itemRemovedFromCart');
        }
    }

    public function render()
    {
        $cartItems = \Cart::getContent(); 
        $total = \Cart::getTotal();
        return view('livewire.shoppingcart-component', compact('cartItems', 'total'));
    }
}
