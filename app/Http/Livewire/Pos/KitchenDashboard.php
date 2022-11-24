<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionOrder;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class KitchenDashboard extends Component
{
    use LivewireAlert;
    
    public function render()
    {
        $transactions = $this->activeOrders();
        return view('livewire.pos.kitchen-dashboard', compact('transactions'))->layout('layouts.pos');
    }

    public function activeOrders()
    {
        return Transaction::with('orders')->whereDate('created_at', date('Y-m-d'))->whereNull('completed_at')->get();
    }

    public function serve($orderId)
    {
        $order = TransactionOrder::find($orderId);
        $order->completed_at = now();
        $order->save();
    }

    public function undoServe($orderId)
    {
        $order = TransactionOrder::find($orderId);
        $order->completed_at = null;
        $order->save();
    }

    public function completeTransaction($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $transaction->completed_at = now();
        $transaction->save();

        $this->alert('success', 'Order successfully completed!');
    }
}
