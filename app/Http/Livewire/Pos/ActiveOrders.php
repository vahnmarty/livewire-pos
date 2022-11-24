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

    public $orders = [];
    public $subtotal = 0, $total = 0, $discount = 0.00;

    public $cash = 0, $change = 0;

    public $customer, $notes;

    public $order_number, $order_type;

    public $transactions = [];

    public $transaction_id, $receipt_transaction_id;

    protected $listeners = ['viewReceipt', 'confirmCheckout'];

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
        $this->transactions = Transaction::whereNull('completed_at')->get();
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

    public function pay()
    {
        if($this->cash < $this->total){
            $this->alert('error', 'Insufficient cash!');
            return false;
        }

        $transaction = Transaction::find($this->transaction_id);
        $transaction->paid_at = now();
        $transaction->completed_at = now();
        $transaction->cash = $this->cash;
        $transaction->change = $this->change;
        $transaction->save();

        $this->createPayment($transaction);

        $this->alert('success', 'Order created successfully', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'View Receipt',
            'onConfirmed' => 'viewReceipt',
        ]);

        $this->getTransactions();

        $this->reset(['orders', 'cash', 'change', 'total', 'subtotal', 'discount', 'transaction_id', 'customer', 'notes']);

        $this->dispatchBrowserEvent('closemodal-pay');
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

    public function viewReceipt()
    {   
        $transaction = Transaction::find($this->transaction_id);

        if( $transaction->paid_at ){
            $this->emit('openWindow', route('pos.official-receipt', $this->transaction_id));
        }else{
            $this->emit('openWindow', route('pos.temporary-receipt', $this->transaction_id));
        }
        
    }
}
