<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Product;
use Livewire\Component;

class ManageProducts extends Component
{
    public function render()
    {
        $products = Product::get();
        
        return view('livewire.inventory.manage-products', compact('products'));
    }
}
