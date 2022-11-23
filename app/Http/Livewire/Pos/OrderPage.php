<?php

namespace App\Http\Livewire\Pos;

use App\Models\Branch;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class OrderPage extends Component
{
    use LivewireAlert;
    
    public Branch $branch;

    public $categories = [], $products = [], $orders = [];
    public $category_id;
    public $subtotal = 0, $total = 0, $discount = 0.00;

    public $cash = 0, $change = 0;

    public $customer, $notes;

    protected $rules = [
        'orders.*' => 'required',
        'cash' => 'gte:total',
        'subtotal' => 'required',
        'total' => 'required',
        'customer' => 'nullable',
        'notes' => 'nullable'
    ];

    public function render()
    {
        $this->summarize();

        return view('livewire.pos.order-page')->layout('layouts.pos');
    }

    public function mount($branchId)
    {
        $this->branch = Branch::findOrFail($branchId);
        $this->categories = Category::get();
        $this->products = Product::get();
    }

    public function setCategory($categoryId)
    {
        $this->category_id = $categoryId;
    }

    public function selectProduct($productId)
    {
        $product = Product::find($productId);

        $collect = collect($this->orders);
        
        $alreadyInCart = collect($this->orders)->where('id', $productId)->first();

        if($alreadyInCart){
            foreach($this->orders as  $index => $order)
            {
                if($order['id'] == $productId)
                {
                    $this->orders[$index]['quantity'] = $order['quantity'] + 1;
                }
            }
            
            
        }else{
            $array = $product->toArray();
            $array['quantity'] = 1;
            $this->orders[] = $array;
        }
    }

    public function summarize()
    {
        $subtotal = 0;
        $total = 0;

        foreach($this->orders as $order)
        {
            $subtotal += $order['quantity'] * $order['price'];
        }

        $this->subtotal = $subtotal;
        $this->total = $this->subtotal - $this->discount;
    }

    public function checkout()
    {
        $this->validateOrders();

        $this->validateCash();

        $data = $this->validate();

    }

    public function validateOrders()
    {
        if(!count($this->orders)){
            $this->alert('error', 'Please select an order!');
        }
    }

    public function validateCash()
    {
        if($this->cash < $this->total){
            $this->alert('error', 'Insufficient cash!');
        }
    }
}
