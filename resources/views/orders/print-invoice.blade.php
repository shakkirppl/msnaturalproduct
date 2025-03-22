<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .company-info {
            text-align: left;
        }
        .invoice-title {
            text-align: center;
            flex-grow: 1;
        }
        .invoice-details, .bill-to, .description-table {
            width: 100%;
            margin-top: 20px;
        }
        .invoice-details td, .bill-to td {
            padding: 5px;
            border: 1px solid #ddd;
        }
        .description-table {
            width: 100%;
            border-collapse: collapse;
        }
        .description-table, 
        .description-table th, 
        .description-table td {
            border: 1px solid black;
        }
        .description-table th {
            background-color: #f2f2f2; 
            color: black;
            padding: 10px;
            text-align: left;
        }
        .description-table td {
            padding: 8px;
            text-align: left;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
        }

        .invoice-details-container {
        text-align: right; /* Aligns content to the right */
        margin-top: 10px;
    }
    .invoice-details {
        display: inline-table; /* Keeps the table compact */
        border-collapse: collapse;
        width: auto; 
    }
    .invoice-details td {
        padding: 10px;
        border: 1px solid #ddd;
    }
    
    </style>
</head>
<body>
    <div class="header">
        <div class="company-info">
            <h4><strong>MS NATURAL PRODUCTS </strong><br>
            THURAKKAL KONDOTTY <br>
            GSTIN/UIN: 32BQGPA4018M3Z3
            State Name : Kerala, Code : 32
        </h4>
            
        </div>
        <div class="invoice-title">
            <h2>TAX INVOICE</h2>
        </div>
    </div>
    
    <div class="invoice-details-container">
    <table class="invoice-details">
        <tr>
            <td><strong>Invoice:</strong> {{ $order->order_no }}</td>
            <td><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
        </tr>
    </table>
</div>
    <table class="bill-to">
        <tr>
            <td>
                <strong>Buyer (Bill to):</strong><br>
                Name: {{ $order->billing_first_name }} {{ $order->billing_second_name }}<br>
                Address: {{ $order->billing_address }}<br>
                <!-- City: {{ $order->billing_city }}<br> -->
                Post Code: {{ $order->billing_post_code }}<br>
                State: @foreach($order->billingstate as $bs) {{ $bs->state_name }} @endforeach<br>
                <!-- Country: @foreach($order->billingcountry as $bc) {{ $bc->country_name }} @endforeach<br> -->
                Phone: {{ $order->billing_phone }}
            </td>
        </tr>
    </table>
    
    <table class="description-table">
    <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Taxable Value</th>
            <th>CGST (9%)</th>
            <th>SGST (9%)</th>
            <th>IGST (18%)</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->detail as $details)
            @php
                $taxable_value = $details->price / 1.18 * $details->quantity; // Price excluding GST
                $cgst = ($taxable_value * 9) / 100;
                $sgst = ($taxable_value * 9) / 100;
                $igst = ($taxable_value * 18) / 100;
            @endphp
            <tr>
                <td>{{ $details->product_name }} - {{ $details->size }}</td>
                <td>{{ $details->quantity }}</td>
                <td class="amount-cell">{{ number_format($taxable_value, 2) }}</td>
                @if($order->state == 'Kerala')
                    <td class="amount-cell">{{ number_format($cgst, 2) }}</td>
                    <td class="amount-cell">{{ number_format($sgst, 2) }}</td>
                    <td class="amount-cell">-</td> <!-- No IGST for Kerala -->
                @else
                    <td class="amount-cell">-</td>
                    <td class="amount-cell">-</td>
                    <td class="amount-cell">{{ number_format($igst, 2) }}</td>
                @endif
                <td class="amount-cell">{{ number_format($details->price * $details->quantity, 2) }}</td>
            </tr>
        @endforeach

        <!-- Summary Section -->
        <tr class="shipping-row">
            <td colspan="6" class="label-cell"><strong>Shipping Charge</strong></td>
            <td class="amount-cell">{{ number_format($order->shipping_charge, 2) }}</td>
        </tr>
        <tr class="total-row">
            <td colspan="6" class="total-label"><strong>Grand Total</strong></td>
            <td class="total-amount">{{ $currency }}{{ number_format($order->total_amount, 2) }}</td>
        </tr>
    </tbody>
</table>

<!-- Tax Amount in Words -->
<p><strong>Tax Amount (in words):</strong> {{ ucwords($order->tax_in_words) }}</p>

<!-- Declaration -->
<div class="declaration">
    <p><strong>Declaration:</strong></p>
    <p>We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.</p>
    <p><strong>for MS NATURAL PRODUCTS</strong></p>
    <p>Authorized Signatory</p>
</div>

<!-- Footer -->
<div class="footer">
    <p>Thank you for your business!</p>
    <p>If you have any questions, please contact: info@msnaturalproducts.com</p>
</div>
</body>
</html>
