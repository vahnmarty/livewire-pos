<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    const PAYMENT_CASH = 'cash';

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
}
