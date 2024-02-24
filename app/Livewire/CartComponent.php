<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class CartComponent extends Component
{
    public $cartCollection, $getTotalQuantity;
    //protected $listeners = ['productAddedToCart'];

    #[On('productAddedToCart', 'itemRemovedFromCart')]

    public function productAddedToCart(){
        $this->cartCollection = \Cart::getContent();
    }

    public function itemRemovedFromCart(){
        $this->cartCollection = \Cart::getContent();
    }

    public function mount() 
    {
        $this->cartCollection = \Cart::getContent();
        $this->getTotalQuantity = \Cart::getTotalQuantity();
    }

    public function render()
    {
        // $userId = auth()->user()->id; // or any string represents user identifier
        return view('livewire.cart-component');
    }
}
