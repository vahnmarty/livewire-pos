<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function isCompleted()
    {
        return $this->completed_at;
    }
}
