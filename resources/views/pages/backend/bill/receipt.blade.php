<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: monospace;
            width: 300px;
            margin: auto;
        }
        h3, p {
            text-align: center;
            margin: 4px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 4px 0;
        }
        .total {
            border-top: 1px dashed #000;
            margin-top: 8px;
            padding-top: 8px;
        }
        .text-right {
            text-align: right;
        }
        @media print {
            button { display: none; }
        }
    </style>
</head>
<body>

<h3>Im Bassing Restourant</h3>
<p>Receipt</p>
<p>Invoice: INV-{{ str_pad($bill->id, 5, '0', STR_PAD_LEFT) }}</p>
<p>Date: {{ $bill->created_at->format('d M Y H:i') }}</p>

<hr>

<table>
    @foreach ($bill->cart->items as $item)
        <tr>
            <td>
                {{ $item->product->name }}
                @if ($item->variant)
                    <br><small>{{ $item->variant->name }}</small>
                @endif
                <br>{{ $item->qty }} x {{ number_format($item->price) }}
            </td>
            <td class="text-right">
                {{ number_format($item->qty * $item->price) }}
            </td>
        </tr>
    @endforeach
</table>

<div class="total">
    <p>Total : Rp {{ number_format($bill->total) }}</p>
    <p>Paid  : Rp {{ number_format($bill->paid) }}</p>
    <p>Change: Rp {{ number_format($bill->change) }}</p>
</div>

<hr>

<p>Thank You 🙏</p>

<div style="text-align:center">
    <button onclick="window.print()">Print</button>
</div>

</body>
</html>
