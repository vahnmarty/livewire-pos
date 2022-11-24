<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function officialReceipt($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        return view('pos.official-receipt', compact('transaction'));
    }

    public function temporaryReceipt($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        return view('pos.temporary-receipt', compact('transaction'));
    }
}
