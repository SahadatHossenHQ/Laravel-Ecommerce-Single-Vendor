<?php
use App\Models\ShopInfo;
$shop = ShopInfo::where('user_id', 1)->first();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Invoice</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
       
    <style>
       

        @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
*{
  margin: 0;
  box-sizing: border-box;
  -webkit-print-color-adjust: exact;
}
body{
  background: #E0E0E0;
  font-family: 'Roboto', sans-serif;
}
::selection {background: #ff9501; color: #FFF;}
::moz-selection {background: #ff9501; color: #FFF;}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
.col-left {
    float: left;
}
.col-right {
    float: right;
}
h1{
  font-size: 1.5em;
  color: #444;
}
h2{font-size: 1.2em;}
h3{
  font-size: .9em;
  font-weight: 400;
  line-height: 2em;
}
p{
  font-size: .75em;
  color: #666;
  line-height: 1.2em;
}
a {
    text-decoration: none;
    color: #00a63f;
}

#invoiceholder{
  width:100%;
  height: 100%;
  padding:0;
}
#invoice{
  position: relative;
  margin: 0 auto;
  width: 803px;
  background: #FFF;
}

[id*='invoice-']{ /* Targets all id with 'col-' */
/*  border-bottom: 1px solid #EEE;*/
  padding: 20px;
}

#invoice-top{min-height: 150px;border-bottom: 2px solid #999fb7}
#invoice-mid{min-height: 150px;}
#invoice-bot{ min-height: 200px;}

.logo{
    display: inline-block;
    vertical-align: middle;
    width: 110px;
    overflow: hidden;
}
.info{
    display: inline-block;
    vertical-align: middle;
    margin-left: 20px;
}
.logo img,
.clientlogo img {
    width: 100%;
}
.clientlogo{
    display: inline-block;
    vertical-align: middle;
    width: 50px;
}
.clientinfo {
    display: inline-block;
    vertical-align: middle;
}
.title{
  padding:25px 10px;
}
.title p{text-align: right; padding-top:3px; font-size:.8em;}

h2 {
    margin-bottom: 5px;
    color: #444;
}
.col-right td {
    color: #666;
    padding: 5px 8px;
    border: 0;
    font-size: 0.75em;
    border-bottom: 1px solid #eeeeee;
}
.col-right td label {
    margin-left: 5px;
    font-weight: 600;
    color: #444;
}
.cta-group a {
    display: inline-block;
    padding: 7px;
    border-radius: 4px;
    background: rgb(196, 57, 10);
    margin-right: 10px;
    min-width: 100px;
    text-align: center;
    color: #fff;
    font-size: 0.75em;
}
.cta-group .btn-primary {
    background: #00a63f;
}
.cta-group.mobile-btn-group {
    display: none;
}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
    padding: 10px;
    border-bottom: 1px solid #cccaca;
    font-size: 0.70em;
    text-align: left;
}

.tabletitle th {
  border-bottom: 2px solid #ddd;
  text-align: right;
}
.tabletitle th:nth-child(2) {
    text-align: left;
}
th {
    font-size: 0.7em;
    text-align: left;
    padding: 5px 10px;
}
.item{width: 50%;}
.list-item td {
    text-align: right;
}
.list-item td:nth-child(2) {
    text-align: left;
}
.total-row th,
.total-row td {
    text-align: right;
    font-weight: 700;
    font-size: .75em;
    border: 0 none;
}
.table-main {
    
}
footer {
    border-top: 1px solid #eeeeee;;
    padding: 15px 20px;
}

@media screen and (max-width: 767px) {
    h1 {
        font-size: .9em;
    }
    #invoice {
        width: 100%;
    }

    [id*='invoice-'] {
        padding: 20px 10px;
    }
    .logo {
        width: 140px;
    }
    .title {
        float: none;
        display: inline-block;
        vertical-align: middle;
        margin-left: 40px;
    }
    .title p {
        text-align: left;
    }
    .col-left,
    .col-right {
        width: 100%;
    }
    .table {
        margin-top: 20px;
    }
    #table {
        white-space: nowrap;
        overflow: auto;
    }
    td {
        white-space: normal;
    }
    .cta-group {
        text-align: center;
    }
    .cta-group.mobile-btn-group {
        display: block;
        margin-bottom: 20px;
    }
     /*==================== Table ====================*/
    .table-main {
        border: 0 none;
    }  
      .table-main thead {
        border: none;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
      }
      .table-main tr {
        border-bottom: 2px solid #eee;
        display: block;
        margin-bottom: 20px;
      }
      .table-main td {
        font-weight: 700;
        display: block;
        padding-left: 40%;
        max-width: none;
        position: relative;
        border: 1px solid #cccaca;
        text-align: left;
      }
      .table-main td:before {
        /*
        * aria-label has no advantage, it won't be read inside a table
        content: attr(aria-label);
        */
        content: attr(data-label);
        position: absolute;
        left: 10px;
        font-weight: normal;
        text-transform: uppercase;
      }
    .total-row th {
        display: none;
    }
    .total-row td {
        text-align: left;
    }
    footer {text-align: center;}
}

    </style>
</head>
<body>
  <div id="invoiceholder">
  <div id="invoice" class="">
    
    <div id="invoice-top">
      <div class="col-left logo"><img src="{{asset('uploads/setting/'.setting('logo'))}}" alt="Logo" /></div>
      <div class="col-right title">
            <div class="company-details">
                <h2>{{$shop->name ?? ""}}</h2>
                <p>{{setting('SITE_INFO_ADDRESS')}}</p>
                <p>{{setting('SITE_INFO_PHONE')}}</p>
                <p>{{setting('SITE_INFO_SUPPORT_MAIL')}}</p>
            </div>
          

      </div><!--End Title-->
    </div><!--End InvoiceTop-->


    
    <div id="invoice-mid">   
    
    <div class="part-1" style="padding-bottom:30px;">
        
        <div class="clearfix">
            <div class="col-left">
                <div class="clientinfo">
                     <div class="text-gray-light"></div>
                      
                        
                    <h3 id="supplier">INVOICE TO: </h3>
                    <h2 id="address">{{$order->first_name}}</h2>
                    <p style="line-height: 20px;font-size: 0.75em;">
                        
                         <span id="city">{{$order->address}}</span>
                         
                        @if($order->town!==null)
                           <br>
                           City: <span id="city">{{$order->town}}, District: {{$order->district}}, Thana: {{$order->thana}}</span>
                        @endif
                        
                        @if($order->email!== "noreply@mail.com")
                         <br>
                         <span id="email">{{$order->email}}</span>
                        @endif
                        
                        <br>
                       
                        <span id="country">{{$order->phone}}</span></p>
                </div>
            </div>
            <div class="col-right">
                <div id="">
                <h2>INVOICE: {{$order->invoice}}</h2>
                <p>Invoice Date: <span id="">{{date('d M Y', strtotime($order->created_at))}}</span>.</p>
              </div>
            </div>
        </div>   
    </div>
    
    <div class="part-2">
        <div id="table">
        <table class="table-main">
         <thead style="background:#f1f1f5;">
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Attribute</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
        
       <tbody>
                        @foreach ($order->orderDetails as $key => $item)
                        
                              <tr style="text-transform: capitalize;">
                            <td data-label="Serial :" class="tableitem">{{$key+1}}</td>
                            <td data-label="Name :" class="tableitem">{{$item->title}}</td>
                            <td data-label="Attribute :" class="tableitem">
                            <?php  
                               $data= json_decode($item->size);
                               if($data!=Null && $data!='""' && $data!='[]' && $data!='"\"\""'){
                                foreach($data as $key => $attr){
                                    $value=DB::table('attribute_values')->where('id',$attr)->first();
                                    $name=DB::table('attributes')->where('slug',$key)->first();
                                  echo $vl= $name->name.': '.$value->name.' ';
                                    
                                       
                                   
                                }}
                            ?>
                            </td>
                            <td data-label="Color :" class="tableitem">
                                <?php
                                    if($item->color!='blank'){
                                        echo $item->color;
                                    };
                                ?></td>
                            <td data-label="Quantity :" class="tableitem"> {{$item->qty}}</td>
                            <td data-label="Price :" class="tableitem">{{number_format($item->price, 2, '.', ',')}}</td>
                              <td data-label="Subtotal :" class="tableitem">{{number_format($item->total_price, 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    
        </table>
      </div><!--End Table-->
    </div>
    
      
           
        
    </div><!--End Invoice Mid-->
    
    <div id="invoice-bot" style="padding-bottom:10px;">
      
      <div class="clearfix">
            <div class="col-left">
                
            </div>
            <div class="col-right">
                <table class="table"> 
                    <tbody>
                     
                         
                         
                        
                        <tr>
                            <td colspan="2">Sub Total:</td>
                            <td>{{number_format($order->subtotal, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Shipping Charge:</td>
                            <td>+{{number_format($order->shipping_charge, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Coupon ({{$order->coupon_code}}): </td>
                            <td>-{{number_format($order->discount, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Grand Total:</td>
                            <td>{{number_format($order->total, 2, '.', ',')}}</td>
                        </tr>
                         <tr>
                            <td colspan="2">Partial Payment:</td>
                            <td style="color:#008000">
                                 @php
                                $part=App\Models\PartialPayment::where('order_id',$order->id)->where('status',1)->sum('amount');
                                @endphp
                                {{$part}} 
                            </td>
                        </tr>
                          <tr  style="font-weight:bold">
                            <td colspan="2">Due:</td>
                            <td>{{$order->total-$part}}</td>
                        </tr>
                        <tr>
                           
                           
                        @if($order->pay_staus==null)
                           
                              <td colspan="2">Payment Status:  </td>
                            <td style="color:#C41E3A">Unpaid</td>
                        @else
                             <td colspan="2">Payment Status:  </td>
                            <td style="color:#008000">Paid</td>
                        @endif
                        </tr>
                        <tr>
                             @if($order->pay_staus!=null)
                            
                            <td colspan="2">Payment Date:  </td>
                            <td>{{$order->pay_date}}</td>
                        @endif
                        <tr>
                            <td colspan="2">Payment Method:</td>
                            <td>{{$order->payment_method}}</td>
                        </tr>
                        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>     
       
       <div class="message" style="padding:25px 0px; text-align:center;">
        <h2 style="color: #228B22; font-weight: 300;">Thank You! &#128522;</h2>
    </div>
      
    </div><!--End InvoiceBot-->
    <div class="invoice-footer" style="border-top: 2px solid #999fb7;">
        <div class="message" style="padding:20px 0 40px 0; text-align:center;">
        <p style="padding: 5px 0px; font-weight: 300;">Powered by <a href="https://www.youngstarsit.com/" target="_blank" style="color:#ff9501; display:inline-block;">YoungStars IT</a></p>
    </div>
    </div>
  
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script>-->
    <!--    window.addEventListener("load", function() {-->
    <!--        Popup($('#invoice')[0].outerHTML);-->
    <!--        function Popup(data) -->
    <!--        {-->
    <!--            window.print();-->
    <!--            return true;-->
    <!--        }-->
    <!--    });-->
    <!--</script>-->
  

</body>
</html>