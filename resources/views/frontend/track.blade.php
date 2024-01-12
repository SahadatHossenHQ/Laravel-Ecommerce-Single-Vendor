@extends('layouts.frontend.app')

@section('title', 'Shopping Now')

@section('content')
<style>
    form .form2{
        border: solid 1px rgba(0, 0, 0, 0.1);
padding: 20px;
border-radius: 5px;
margin-top: 50px;
background: white
    }
</style>
<div class="wrapper">

        <form class="col-md-6  offset-md-3" action="{{route('tracking')}}" method="post">
            @csrf
            <div class="form form2">
                
                <div class="form-group ">
                    <label>Invoice No. <sup style="color: red;">*</sup></label>
                    <p>Paste Your Invoice Number Without #</p>
                    <input type="text" name="invoice" id="invoice" class="form-control" required />
                </div>
                <input  class="form-control" type="submit" value="Track">
            </div>
        </form>
       
        @if(isset($order))
        <style>
        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
    </style>
        <div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
           
            <main>
           
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->size}}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{number_format($item->price, 2, '.', ',')}}</td>
                            <td>{{number_format($item->total_price, 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                  
                </table>
                
            </main>
            <div class="timeline-body">
            <div class="timeline-deco"></div>

            <div class="timeline-item mt-4">
                <i class="fa fa-eject bg-highlight color-white shadow-l timeline-icon"></i>
                <div class="timeline-item-content rounded-s">
                    <h5 class="font-400 pt-1 pb-1">
                        Order has left our supply center.<br>
                    </h5>
                </div>
            </div>	
           	
            <div class="timeline-item">
                <i class="fas fa-hourglass-start nav-icon bg-teal-dark shadow-l timeline-icon"></i>
                <div class="timeline-item-content rounded-s">
                    <h5 class="font-400 pt-1 pb-1">
                        Your order is being processing please wait<br>
                    </h5>
                </div>
            </div>	
           
            @if($order->status==1 || $order->status==3 || $order->status==4)
            <div class="timeline-item">
                <i class="fa fa-thumbs-up bg-teal-dark shadow-l timeline-icon"></i>
                <div class="timeline-item-content rounded-s">
                    <h5 class="font-400 pt-1 pb-1">
                        Order has been successfull.You wil receive your product shortly<br>
                    </h5>
                </div>
            </div>	
            @endif				
            @if($order->status==1 || $order->status==3 || $order->status==4)
            <div class="timeline-item">
                <i class="fa fa-plane bg-blue2-dark shadow-l timeline-icon"></i>
                <div class="timeline-item-content rounded-s">
                    <h5 class="font-400 pt-1 pb-1">
                        Arrived at Shipping Company.<br>
                    </h5>
                </div>
            </div>	
            @endif	
            
            @if($order->status==3)
            <div class="timeline-item">
                <i class="fa fa-check bg-green1-dark shadow-l timeline-icon"></i>
                <div class="timeline-item-content rounded-s">
                    <h5 class="font-400 pt-1 pb-1">
                        Order Arrived and Picked Up!<br> Thank you for your Purchase<br>
                    </h5>
                </div>
            </div>	
            @endif	


            @if($order->status==2)
            <div class="timeline-item mt-4">
                <i class="fa fa-window-close bg-highlight color-white shadow-l timeline-icon"></i>
                <div class="timeline-item-content rounded-s">
                    <h5 class="font-400 pt-1 pb-1">
                        Order is Cancel.<br>
                    </h5>
                </div>
            </div>
            @endif

        </div>
          
        </div>
        <div></div>
    </div>
</div>
        @endif
</div>


@endsection