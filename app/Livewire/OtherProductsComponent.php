<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;

class OtherProductsComponent extends Component
{
    public function render()
    {
        $otherProducts = Products::all();
        return view('livewire.other-products-component', compact('otherProducts'));
    }
}
