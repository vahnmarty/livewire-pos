<?php

namespace App\Http\Livewire\Pos;

use Auth;
use App\Models\Branch;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Transaction;
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

    public $order_number;

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
        $this->generateOrderNumber();
    }

    public function generateOrderNumber()
    {
        $this->order_number = (new Transaction)->generateOrderNumber();
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

        $transaction = $this->createTransaction();

        try {
            $this->createOrders($transaction);

            $this->createPayment($transaction);

            $this->alert('success', 'Order created successfully');

            $this->reset(['order_number', 'orders', 'total', 'subtotal', 'discount', 'cash', 'customer', 'notes']);

            $this->generateOrderNumber();
        } catch (\Throwable $th) {

            $transaction->delete();
            throw $th;
        }
        
    }

    public function createTransaction()
    {
        $transaction = new Transaction;
        $transaction->cashier_id = Auth::id();
        $transaction->order_number = $transaction->generateOrderNumber();
        $transaction->customer_name = $this->customer;
        $transaction->subtotal = $this->subtotal;
        $transaction->total_discount = $this->discount;
        $transaction->total = $this->total;
        $transaction->cash = $this->cash;
        $transaction->save();

        return $transaction;
    }

    public function createOrders(Transaction $transaction)
    {
        foreach($this->orders as $order){
            $this->createOrder($transaction, $order);
        }
    }

    public function createOrder(Transaction $transaction, $product)
    {
        $transaction->orders()->create([
            'product_id' => $product['id'],
            'product_name' => $product['name'],
            'product_price' => $product['price'],
            'quantity' => $product['quantity'],
            'subtotal' => $product['quantity'] * $product['price'],
            'total' => $product['quantity'] * $product['price']
        ]);
    }

    public function createPayment(Transaction $transaction)
    {
        $transaction->payments()->create([
            'method' => Transaction::PAYMENT_CASH,
            'amount' => $this->cash,
            'change' => $this->change,
            'reference' => null,
        ]);
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
