<?php

namespace App\Livewire;

use App\Models\ProductCategories;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = ProductCategories::all();
        return view('livewire.category-component', compact('categories'));
    }
}
