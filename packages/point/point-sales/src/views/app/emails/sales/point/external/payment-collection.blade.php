<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mail Payment Collection</title>

    <style>
        a {
            text-decoration: none;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
            
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            font-weight: 300;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .5rem 1rem;
            font-size: 1rem;
            border-radius: .25rem;
        }

        .btn-check {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }

        .btn-success {
            color: #fff;
            background-color: #5cb85c;
            border-color: #5cb85c;
        }

        .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d9534f;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
<div class="invoice-box">
    Hi, {{ $payment_collection->person->name }}. You have an email sales payment collection from <br>
    @if($warehouse->store_name)
    <strong style="font-size:18px; text-transform: uppercase;">{{$warehouse->store_name}}</strong> <br/>
    <font style="font-size:12px;text-transform: capitalize;">
        {{$warehouse->address}} <br/>
        {{$warehouse->phone}} 
    </font>
    @else
        Store Name <br/>
        Addess......... <br/>
        Phone Number 
    @endif
    <br/> <br/>
    <table cellpadding="0" cellspacing="0" style="padding: 20px 0;">
        <tr>
            <td style="width: 20%">
                Form Number
            </td>
            <td>
                :
            </td>
            <td>
                {{ $payment_collection->formulir->form_number }}</a>
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Form Date
            </td>
            <td>
                :
            </td>
            <td>
                {{ \DateHelper::formatView($payment_collection->formulir->form_date) }}
            </td>
        </tr>
        <tr>
            <td style="width: 20%">
                Customer
            </td>
            <td>
                :
            </td>
            <td>
                {{ $payment_collection->person->codeName }}
            </td>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>
                Reference Number
            </td>
            <td>
                Notes
            </td>
            <td align="right">
                Amount
            </td>
        </tr>

       @foreach($payment_collection->details as $payment_collection_detail)
            <tr class="item">
                <td>
                    {{\Point\Framework\Helpers\ReferHelper::getReferBy(get_class($payment_collection_detail),$payment_collection_detail->id,get_class($payment_collection),$payment_collection->id)->formulir->form_number}}
                </td>
                <td>
                    {{$payment_collection_detail->detail_notes}}
                </td>
                <td>
                    {{number_format_quantity($payment_collection_detail->amount)}}
                </td>
            </tr>
        @endforeach
        <tr></tr>
        @if(count($payment_collection->others)> 0)
        <tr class="heading">
            <td>
                Reference Number
            </td>
            <td>
                Notes
            </td>
            <td align="right">
                Amount
            </td>
        </tr>
        @endif
        @foreach($payment_collection->others as $payment_collection_other)
        <tr class="item">
            <td>
                {{ $payment_collection_other->coa->account }}
            </td>
            <td>
                {{$payment_collection_other->other_notes}}
            </td>
            <td align="right">
                {{number_format_quantity($payment_collection_other->amount)}}
            </td>
        </tr>
        @endforeach
        <tr></tr>
        <tr class="heading">
            <td>Total
            </td>
            <td>
            </td>
            <td align="right">
                {{number_format_quantity($payment_collection->total_payment)}}
            </td>
        </tr>
    </table>
    </div>
</body>
</html>
