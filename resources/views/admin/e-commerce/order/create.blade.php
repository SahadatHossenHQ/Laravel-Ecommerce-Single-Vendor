@extends('layouts.admin.e-commerce.app')

@section('title', 'Order Now')

@push('css')
<link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/toast.min.css">
@endpush

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order Now</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Order Now</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">Order Now</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{routeHelper('product')}}" class="btn btn-danger">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.product.order.store')}}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="card">
                            <div class="card-header bg-success">
                                <h2 class="card-title">Billing Info</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name <sup style="color: red;"></sup>*</label>
                                        <input required name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" type="text"  />
                                        @error('email')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last Name <sup style="color: red;"></sup>*</label>
                                        <input required name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" type="text"  />
                                        @error('last_name')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="company">Company (optional)</label>
                                        <input required name="company" id="company" class="form-control @error('company') is-invalid @enderror" type="text"  />
                                        @error('email')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">Country/Region <sup style="color: red;">*</sup></label>
                                        <input name="country" id="country" class="form-control @error('country') is-invalid @enderror" type="text"  />
                                        @error('country')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Street address <sup style="color: red;">*</sup></label>
                                        <input required name="address" id="address" class="form-control @error('address') is-invalid @enderror" type="text"  />
                                        @error('address')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">Town/City <sup style="color: red;">*</sup></label>
                                        <input required name="city" id="city" class="form-control @error('city') is-invalid @enderror" type="text"  />
                                        @error('city')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="district">District <sup style="color: red;">*</sup></label>
                                        <input required name="district" id="district" class="form-control @error('district') is-invalid @enderror" type="text"  />
                                        @error('email')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="postcode">Postcode / ZIP(optional)</label>
                                        <input required name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror" type="text"  />
                                        @error('email')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone <sup style="color: red;">*</sup></label>
                                        <input required name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" type="text"  />
                                        @error('phone')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email Address <sup style="color: red;">*</sup></label>
                                        <input required name="email" id="email" class="form-control @error('email') is-invalid @enderror" type="text"  />
                                        @error('email')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-success">
                                <h2 class="card-title">Shipping Method</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Shipping Method</label> <br>
                                        <input name="shipping_method" value="Free" type="radio"> Free
                                        <input name="shipping_method" value="Prime" type="radio"> Prime
                                    </div>
                                    @error('shipping_method')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
        
                                    <div class="form-group col-md-6">
                                        <label for="payment_method">Payment Method</label>
                                        <select required name="payment_method" id="payment_method" class="form-control @error('payment_method') is-invalid @enderror">
                                            <option value="">Select Payment Method</option>
                                            <option value="Bkash">Bkash</option>
                                            <option value="Nagad">Nagad</option>
                                            <option value="Rocket">Rocket</option>
                                            <option value="Bank">Bank</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                        </select>
                                        @error('payment_method')
                                            <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-row" id="payment-details"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header bg-success">
                                <h2 class="card-title">Order Summary</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-row">

                                    <div class="col-md-12">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Qty</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image" width="60px">    
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.product.show', $product->id)}}">{{$product->title}}</a>
                                                    </td>
                                                    <td>{{$product->regular_price}}</td>
                                                    <td>
                                                        @foreach ($product->colors as $color)
                                                            <input type="radio" name="color" id="color" value="{{$color->name}}"> {{$color->name}}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($product->sizes as $size)
                                                            <input type="radio" name="size" id="size" value="{{$size->name}}"> {{$size->name}}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" name="qty" id="qty" value="1" style="width:80px">   
                                                        <input type="hidden" name="id" id="id" value="{{$product->id}}">   
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="coupon">Apply Coupon:</label>
                                                    <input type="text" class="form-control" id="coupon" placeholder="Enter coupon here">
                                                    <small class="form-text text-danger"></small>
                                                </div>
                                                <button type="button" id="apply-coupon" class="btn btn-primary" >
                                                    <i class="fas fa-plus-circle"></i>
                                                    Apply
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th width="40%">Subtotal</th>
                                                            <td id="subtotal">{{$product->regular_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quantity</th>
                                                            <td id="quantity">1</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping Charge</th>
                                                            <td id="shipping_charge">0</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Coupon (<span id="coupon_name">{{Session::has('coupon') ? Session::get('coupon')['name'] : ''}}</span>)</th>
                                                            <td id="coupon_charge">{{Session::has('coupon') ? Session::get('coupon')['discount'] : '0'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total</th>
                                                            <td id="total">0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i>
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    

</section>
<!-- /.content -->

@endsection

@push('js')
<script src="{{asset('/')}}assets/frontend/js/toast.min.js"></script>

    <script>

        let quantity        = parseInt($('td#quantity').text());
        let subtotal        = parseInt($('td#subtotal').text());
        let coupon_charge   = parseInt($('td#coupon_charge').text());
        let shipping_charge = parseInt($('td#shipping_charge').text());

        calculateAmount(subtotal, quantity, shipping_charge, coupon_charge);


        function calculateAmount(subtotal, quantity, shipping_charge, coupon) {

            let total = (subtotal * quantity) + shipping_charge + coupon;
            $('td#total').text(total);
        }

        $(document).on('input', '#qty', function(e) {

            let quantity        = $(this).val();
            let subtotal        = parseInt($('td#subtotal').text());
            let coupon_charge   = parseInt($('td#coupon_charge').text());
            let shipping_charge = parseInt($('td#shipping_charge').text());

            $('input#qty').val(quantity);
            $('td#quantity').text(quantity);
            calculateAmount(subtotal, quantity, shipping_charge, coupon_charge);

        })

        // calculateAmount(subtotal, qty, shipping_charge, coupon);

        $(document).on('click', '#apply-coupon', function(e) {
            e.preventDefault();

            $('#coupon').removeClass('is-invalid');

            let code     = $('input#coupon').val();
            let id       = "{!! $product->id !!}";
            let subtotal = parseInt($('td#subtotal').text());
            let shipping_charge = parseInt($('td#shipping_charge').text());
            let quantity = parseInt($('td#quantity').text());

            if (code != '') {
                $.ajax({
                    type: 'GET',
                    url: '/admin/apply/coupon/'+code+'/'+id,
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        
                        if (response.alert == 'Success') {
                            calculateAmount(subtotal, quantity, shipping_charge, response.discount);
                            
                            $('td#coupon_charge').text(response.discount);
                            $('span#coupon_name').text(code);
                            $('#coupon').val('');
                        } 
                        
                        $.toast({
                            heading: response.alert,
                            text: response.message,
                            icon: response.alert.toLowerCase(),
                            position: 'top-right',
                            stack: false
                        });
                    },
                    error: function(xhr) {
                        $.toast({
                            heading: xhr.status,
                            text: xhr.responseJSON.message,
                            icon: 'error',
                            position: 'top-right',
                            stack: false
                        });
                    }
                });
            }
            else {
                $('#coupon').addClass('is-invalid');
            }
                
        });

        $(document).on('change', '#payment_method', function (e) { 
            let method = $(this).val();
            let html = '';
            if (method == 'Bkash' || method == 'Nagad' || method == 'Rocket') {
                html += '<div class="form-group col-md-6">'
                html += '<label for="mobile_number">Mobile Number</label>'
                html += '<input required type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter your mobile number"/>'
                html += '</div>'
                html += '<div class="form-group col-md-6">'
                html += '<label for="transaction_id">Transaction ID</label>'
                html += '<input required type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="Enter transaction id"/>'
                html += '</div>'
            } 
            else if (method == 'Bank') {
                html += '<div class="form-group col-md-6">'
                html += '<label for="bank_name">Bank Name</label>'
                html += '<input required type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter bank name"/>'
                html += '</div>'
                html += '<div class="form-group col-md-6">'
                html += '<label for="account_number">Account Number</label>'
                html += '<input required type="text" name="account_number" id="account_number" class="form-control" placeholder="Enter account number"/>'
                html += '</div>'
                html += '<div class="form-group col-md-6">'
                html += '<label for="holder_name">Holder Name</label>'
                html += '<input required type="text" name="holder_name" id="holder_name" class="form-control" placeholder="Enter holder name"/>'
                html += '</div>'
                html += '<div class="form-group col-md-6">'
                html += '<label for="branch">Branch Name</label>'
                html += '<input required type="text" name="branch" id="branch" class="form-control" placeholder="Enter branch name"/>'
                html += '</div>'
                html += '<div class="form-group col-md-6">'
                html += '<label for="routing">Routing Number</label>'
                html += '<input required type="text" name="routing" id="routing" class="form-control" placeholder="Enter routing number"/>'
                html += '</div>'
            }

            $('#payment-details').html(html);
        })

        $(document).on('click', 'input[name="shipping_method"]', function(e) {
            let shipping_charge = 0;
            
            if ($("input[name='shipping_method']:checked").val() == 'Prime') {
                let charge = "{!! setting('shipping_charge') !!}";
                shipping_charge += parseInt(charge);
            } 
            else {
                shipping_charge += 0;
            }

            $('td#shipping_charge').text(shipping_charge);

            let subtotal      = parseInt($('td#subtotal').text());
            let quantity      = parseInt($('td#quantity').text());
            let coupon_charge = parseInt($('td#coupon_charge').text());

            calculateAmount(subtotal, quantity, shipping_charge, coupon_charge);
        });
    </script>
@endpush