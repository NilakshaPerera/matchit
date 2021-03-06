<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MatchIT by Sussex Companions</title>
    
    <style>
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
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
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
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }


    @media print{
   .noprint{
       display:none;
   }
}

    </style>
</head>

<body id="printable">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: {{ $payment->reference_no }}<br>
                                Created: {{ $payment->date }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Sussex Companions<br>
                                Sussex<br>
                                United Kingdom
                            </td>
                            
                            <td>
                                {{ $payment->user->name }}<br>
                                {{ $payment->user->email }}<br>
                                {{ $payment->user->address }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                  
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Credit Card
                </td>
                
                <td>
                   
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item/Service
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                   @if ($isEvent)
                        Event - {{ $payment->booking->event->eventType->name }} on {{ $payment->booking->event->date }}
                   @else
                        Due Membership Fees - {{ $payment->date}}
                   @endif
                  
                </td>
                
                <td>
                    £{{ $payment->amount }}
                </td>
            </tr>
            
            <tr class="total">
                <td>
                    &nbsp;
                </td>
                
                <td>
                   Total: £{{ $payment->amount }}
                </td>
            </tr>

            <tr class="">
                <td width="100%" >
                   <input class="noprint" type="button" onclick="idElementPrint()" value="Print PDF">
                </td>
            </tr>
        </table>
    </div>

    <script>
        function idElementPrint(){
        var printContents = document.getElementById('printable').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
}
    </script>
    
</body>
</html>