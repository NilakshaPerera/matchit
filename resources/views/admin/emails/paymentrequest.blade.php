<!DOCTYPE html>       
<html><head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/jpg" href="{{ url('/assets_app/images/favicon.png') }}">
    <title>MatchIT by Sussex Companions Invoice</title>
    
    <style>

    .btn{
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 0.9rem;
        line-height: 1.6;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    } 
    
    .btn-primary{
        color: #fff!important;
        background-color: #3490dc;
        border-color: #3490dc;
    }

    a {
        color:#fff;
        text-decoration: none;
        background-color: transparent;
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
    
    @media  only screen and (max-width: 600px) {
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


    @media  print{
   .noprint{
       display:none;
   }
}

    </style>
</head>

<body id="printable">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tbody><tr class="top">
                <td colspan="2">
                    <table>
                        <tbody><tr>
                            <td class="title">
                                <img src="{{url('/assets_app/images/logo2.png')}}" style="">
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tbody><tr>
                            <td>Hello {{ $user->name }},
                            <br>
                            We are sending this email because you have due membership fee of {{ $due }}£. Please click the below link to visit our payment terminal to complete your payment.<br></td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
            
            <tr style="text-align:center">
                <td><a class="btn btn-primary" href="{{  route('payment', [$user->id , 'membership', 0]) }}" target="_blank" >Make Payment</a></td>
            </tr>
            <tr class="total" style="text-align:center">
                &nbsp;        
            </tr>
            
            <tr class="total" style="text-align:center">
                <td><b>Sussex Companion Club Team</b></td>                
            </tr>

        </tbody>
        </table>
    </div>

</body>
</html>