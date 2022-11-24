@extends('layouts.print')

@section('content')
<div class="text-center">
    <h3>BANMARTE COFFEE</h3>
    <p>{{ $transaction->created_at->format('F d Y h:i a') }}</p>
    <h2 style="margin: 1em 0;">#{{ $transaction->order_number }}</h2>
</div>

<div>
    <table style="width: 100%; border-collapse: collapse; ">
        <thead style="background-color: #eee;">
            <tr>
                <th style="text-align: left;">Item</th>
                <th style="text-align: right">Qty</th>
                <th style="text-align: right">Price</th>
                <th style="text-align: right">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction->orders as $order)
            <tr>
                <td>{{ $order->product_name }}</td>
                <td style="text-align: right;">{{ (int) $order->quantity }}</td>
                <td style="text-align: right;">{{ number_format($order->product_price, 1) }}</td>
                <td style="text-align: right;">{{ number_format($order->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot style="padding: 1em 0; ">
            <tr style="border-top: 1px dashed #000">
                <th style="text-align: left;">TOTAL:</th>
                <th colspan="2">{{ $transaction->getTotalItems() }} Items</th>
                <th style="text-align: right;">{{ number_format($transaction->total, 2) }}</th>
            </tr>
            <tr>
                <td style="text-align: left;">Payment Received:</td>
                <td colspan="2"></td>
                <td style="text-align: right;">{{ number_format($transaction->cash, 2) }}</td>
            </tr>
            <tr style="border-top: 1px dashed #000">
                <th style="text-align: left;">CHANGE:</th>
                <th colspan="2"></th>
                <th style="text-align: right;">{{ number_format($transaction->change, 2) }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection