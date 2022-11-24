<?php

namespace App\Http\Livewire\Pos;

use App\Models\Branch;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Transaction;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ActiveOrders extends Component
{
    use LivewireAlert;
    
    public Branch $branch;

    public $categories = [], $products = [], $orders = [];
    public $category_id;
    public $subtotal = 0, $total = 0, $discount = 0.00;

    public $cash = 0, $change = 0;

    public $customer, $notes;

    public $order_number, $order_type;

    public $transactions = [];

    public $transaction_id;

    public function render()
    {
        return view('livewire.pos.active-orders')->layout('layouts.pos');
    }

    public function mount($branchId)
    {
        $this->branch = Branch::findOrFail($branchId);
        $this->getTransactions();
    }

    public function getTransactions()
    {
        $this->transactions = Transaction::get();
    }

    public function select($id)
    {
        $this->reset('orders');
        $this->transaction_id = $id;

        $transaction = Transaction::find($id);
        $this->orders = $transaction->orders->toArray();
        $this->order_type = $transaction->order_type;
        $this->order_number = $transaction->order_number;
        $this->customer = $transaction->customer_name;
        $this->cash = $transaction->cash;
        $this->change = $transaction->change;
        $this->subtotal = $transaction->subtotal;
        $this->total = $transaction->total;
    }
}
