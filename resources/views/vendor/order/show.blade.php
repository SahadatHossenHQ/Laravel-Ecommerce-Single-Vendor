@extends('layouts.vendor.app')

@section('title', 'Order Information')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Order Information</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->

<section class="content">
    <div class="container-fluid">
        <div class="card" style="background:transparent;">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="card-title">Customer Information</h3>
                    </div>
                    @php
                       $order_dt=DB::table('multi_order')->where('order_id',$order->id)->where('vendor_id',auth()->id())->first();
                    @endphp
                    <div class="col-sm-6 text-right">
                         @if ($order_dt->status == 0)
                        <a title="Processing" href="{{routeHelper('order/status/processing/'. $order->id)}}" onclick="alert('Are you sure change status this order?')" class="btn btn-primary btn-sm">
                            <i class="fas fa-running"></i>
                            Processing
                        </a>
                        @elseif ($order_dt->status == 1)
                          <a title="Shipping" href="{{routeHelper('order/status/shipping/'. $order->id)}}" onclick="alert('Are you sure change status this order?')" class="btn btn-primary btn-sm">
                            <i class="fas fa-running"></i>
                            Shipping
                        </a>
                        @endif
                      
                        <a href="{{routeHelper('order/print/'. $order->id)}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{$order->first_name}}</td>
                            <th>Order ID</th>
                            <td>{{$order->order_id}}</td>
                        </tr>
                        <tr>
                            <th>Invoice</th>
                            <td>{{$order->invoice}}</td>
                            <th>Company Name</th>
                            <td>{{$order->company_name}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$order->country}}</td>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th>Town</th>
                            <td>{{$order->town}}</td>
                            <th>District</th>
                            <td>{{$order->district}}</td>
                        </tr>
                        <tr>
                            <th>Post Code</th>
                            <td>{{$order->post_code}}</td>
                            <th>Phone</th>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$order->email}}</td>
                            <th>Shipping Method</th>
                            <td>{{$order->shipping_method}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td colspan="3">{{$order->payment_method}}</td>
                        </tr>
                        @if ($order->payment_method == 'Bkash' || $order->payment_method == 'Nagad' || $order->payment_method == 'Rocket')
                        <tr>
                            <th>Mobile Number</th>
                            <td>{{$order->mobile_number}}</td>
                            <th>Transaction ID</th>
                            <td>{{$order->transaction_id}}</td>
                        </tr>
                        @elseif ($order->payment_method == 'Bank')
                        <tr>
                            <th>Bank Name</th>
                            <td>{{$order->bank_name}}</td>
                            <th>Account Number</th>
                            <td>{{$order->account_number}}</td>
                        </tr>
                        <tr>
                            <th>Holder Name</th>
                            <td>{{$order->holder_name}}</td>
                            <th>Branch Name</th>
                            <td>{{$order->branch_name}}</td>
                        </tr>
                        <tr>
                            <th>Routing Number</th>
                            <td colspan="3">{{$order->routing_number}}</td>
                        </tr>
                        @endif
                        @php
                            $total=0;
                            $ids=[];
                        @endphp
                        @foreach ($order->orderDetails as $key => $item)
                            @if($item->product->user_id==auth()->id())
                               @php
                                    $total+=$item->total_price;
                                @endphp
                            @endif
                           @php
                            $whole=\App\Models\Product::find($item->product_id);
                                     if (!in_array("$whole->user_id", $ids)) {
                                         $ids[]=$whole->user_id;
                                     }
                           @endphp
                        @endforeach
                         <?php
                            $seller_count= sizeof($ids);
                        ?>
                        <tr>
                          
                            <th>Coupon Code</th>
                            <td>{{$order->coupon_code}}</td>
                            <th>Subtotal</th>
                            <td>{{$total}} <strong>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></td>
                        </tr>
                          @php
                          $part=DB::table('multi_order')->where('order_id',$order->id)->where('vendor_id',auth()->id())->sum('partial_pay');
                          $discount=DB::table('multi_order')->where('order_id',$order->id)->where('vendor_id',auth()->id())->sum('discount');
                           @endphp
                        <tr>
                            <th>Shipping Charge</th>
                            <td>{{$order->shipping_charge/$seller_count}} <strong>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></td>
                            <th>Discount</th>
                            <td>{{$discount}} <strong>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></td>
                        </tr>
                       
                           
                            <tr>
                            <th>partial pay  </th>
                            <td>{{$part}} <strong>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></td>
                            <th>Total</th>
                            <td>{{$total+($order->shipping_charge/$seller_count)}} <strong>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></td>
                           
                        </tr>
                        
                         
                        <tr>
                             <th>Due</th>
                            <td>{{($total+($order->shipping_charge/$seller_count)-$part)-$discount}} <strong>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></td>
                            <th>Status</th>
                            <td>
                                @if ($order_dt->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($order_dt->status == 1)
                                    <span class="badge badge-primary">Processing</span>
                                @elseif ($order_dt->status == 2)
                                    <span class="badge badge-danger">Canceled</span>
                                     @elseif ($order_dt->status == 4)
                                    <span class="badge" style="background: #7db1b1;">Shipping</span>
                                 @elseif ($order_dt->status == 5)
                                    <span class="badge badge-danger">Refund</span>
                                @else 
                                    <span class="badge badge-success">Delivered</span>
                                @endif    
                            </td>
                        </tr>
                        @if($order_dt->status ==5)
                        <tr>
                            <th>Refund Method</th>
                            <td>{{$order->refund_method}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" style="background:transparent;">
            <div class="card-header">
                <h2 class="card-title">Order Products</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Title</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $key => $item)
                            @if($item->product->user_id==auth()->id())
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        <img src="{{asset('uploads/product/'.$item->product->image)}}" alt="Product Image" width="80px" height="80px">
                                    </td>
                                    <td>
                                        <a href="{{route('admin.product.show', $item->product->id)}}" target="_blank">{{$item->title}}</a>
                                    </td>
                                    <td>{{$item->size}}</td>
                                    <td>{{$item->color}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr>  
                                @endif
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
