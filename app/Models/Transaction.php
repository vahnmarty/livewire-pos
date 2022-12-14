<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    const PAYMENT_CASH = 'cash';

    const DINE_IN = 'dine-in';
    const TAKE_OUT = 'take-out';

    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(TransactionOrder::class);
    }

    public function payments()
    {
        return $this->hasMany(TransactionPayment::class);
    }

    public function generateOrderNumber()
    {
        return self::whereDate('created_at', date('Y-m-d'))->count() + 1;
    }

    public function getTotalItems()
    {
        $quantity = 0;

        foreach($this->orders as $order){
            $quantity+= $order['quantity'];
        }

        return $quantity;
    }

    public function hasCompleteOrders()
    {
        foreach($this->orders as $order){
            if(!$order->completed_at){
                return false;
            }
        }
        
        return true;
    }

    public function isPaid()
    {
        return $this->paid_at;
    }

    public function isDineIn()
    {
        return $this->order_type == self::DINE_IN;
    }

    public function scopeCompleted($query){
        return $query->whereNotNull('completed_at');
    }

    public function scopePaid($query){
        return $query->whereNotNull('paid_at');
    }
    

    public function scopeReportable($query){
        return $query->completed()->paid()->whereNull('cancelled_at');
    }
}
