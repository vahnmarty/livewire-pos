@extends('layouts.print')

@section('content')
<div class="text-center">
    <h3>BANMARTE COFFEE</h3>
    <p>Zone Meteor, Suarez</p>
    <p>Iligan City</p>
    <p>VAT Registered TIN: 000-000-000-0000</p>
    <p>MIN:123456789</p>
    <p>SN: 000-000</p>

    <h2 style="margin: 1em 0;">#{{ $transaction->order_number }}</h2>
</div>

<div>
    <p>POS </p>
</div>

<div>
    <table>
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

<div style="padding: 2em 0">
    <table style="text-align: left;">
        <tbody>
            <tr>
                <td>VAT Sales</td>
                <td style="text-align: right;">
                    {{ number_format($transaction->vat_sales, 2) }}
                </td>
            </tr>
            <tr>
                <td>Non-VAT Sales</td>
                <td style="text-align: right;">
                    {{ number_format($transaction->non_vat_sales, 2) }}
                </td>
            </tr>
            <tr>
                <td>Zero-Rated Sales</td>
                <td style="text-align: right;">
                    {{ number_format($transaction->zero_rated_sales, 2) }}
                </td>
            </tr>
            <tr>
                <td>Total Sales</td>
                <td style="text-align: right;">
                    {{ number_format($transaction->total_sales, 2) }}
                </td>
            </tr>
            <tr>
                <td>Total VAT</td>
                <td style="text-align: right;">
                    {{ number_format($transaction->total_vat, 2) }}
                </td>
            </tr>
            <tr>
                <td>VAT Exemption</td>
                <td style="text-align: right;">
                    {{ number_format($transaction->vat_exemption, 2) }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div style="text-align: center">
    <p>
        <strong>Trans No: {{ sprintf('%09d', 1) }}</strong>
        <strong>{{ $transaction->created_at->format('m/d/Y h:i:s') }}</strong>
    </p>
    <p style="margin-top: 1em;">Thank you, Please come again!</p>
</div>

<div style="padding: 2em 0">
    <p style="width: 100%; display: table;">
        <span style="display: table-cell; width: 100px;">Customer: </span>
        <span style="display: table-cell; border-bottom: 1px solid black;"></span>
    </p>
    <p style="width: 100%; display: table;">
        <span style="display: table-cell; width: 100px;">Address: </span>
        <span style="display: table-cell; border-bottom: 1px solid black;"></span>
    </p>
    <p style="width: 100%; display: table;">
        <span style="display: table-cell; width: 100px;">TIN: </span>
        <span style="display: table-cell; border-bottom: 1px solid black;"></span>
    </p>
    <p style="width: 100%; display: table;">
        <span style="display: table-cell; width: 100px;">SC ID No: </span>
        <span style="display: table-cell; border-bottom: 1px solid black;"></span>
    </p>
    <p style="width: 100%; display: table;">
        <span style="display: table-cell; width: 100px;">Signature: </span>
        <span style="display: table-cell; border-bottom: 1px solid black;"></span>
    </p>
</div>

<div class="text-center" style="margin-top: 2em">
    <p>POS System Provider:</p>
    <p>BanHub Solutions</p>
    <p>Zone Meteor, Suarez, Iligan City</p>
    <p>TIN: 000-000-000-0000</p>
    <p>BIR Accreditation: #000-123456789</p>
    <p>Issued: 03/31/2020 - Until: 07/31/2025</p>
    <p>PTU No.: 000-000</p>

    <p style="margin-top: 2em; text-transform:uppercase">This receipt shall be valid for Five (5) years<br> from the date of the permit to use</p>
</div>
@endsection