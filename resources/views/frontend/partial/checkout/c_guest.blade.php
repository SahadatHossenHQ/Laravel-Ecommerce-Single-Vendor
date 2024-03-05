@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="Checkout cart product"/>
<meta name='keywords' content="" />
@endpush

@section('title', 'Checkout cart product')

@section('content')
@php
$order=App\Models\Order::where('user_id',auth()->id())->select('address','shipping_charge','town','district','thana')->first();
if(empty($order)){
    $town=''; $address=''; $district='';$thana='';
}
@endphp
<style>
    .arrow-in {

        top: 5px;
    }

    .arrow2 .icofont-simple-down {
        display: block;
    }

    .arrow2 .icofont-simple-right {
        display: none;
    }

    .collapsed .arrow2 .icofont-simple-down {
        display: none !important;
    }

    .collapsed .arrow2 .icofont-simple-right {
        display: block !important;
    }
</style>
<div id="checkout">
    <div class="container">
        <form action="{{route('order.store_guest')}}" method="POST">
            @csrf
            <input type="hidden" name="checkout_user_type" value="guest">
            <div class="row mt-3">
                <div class="col-md-8 offset-md-2 alert-message">
                    <div class="alert"></div>
                </div>
                <div class="widget3 col-md-7">

                    <h4 class="form-title"><span>1</span> Billing Info </h4>
                    <div class="card">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="first_name">Full Name <sup style="color: red;"></sup>*</label>
                                <input required value="{{-- {{auth()->user()->name}} --}}" name="first_name" id="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror" type="text" />
                                @error('first_name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="">
                                <!-- <label for="last_name">Last Name <sup style="color: red;"></sup>*</label> -->
                                <input required value="null" name="last_name" id="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror" type="hidden" />

                            </div>

                            <div class="form-group ">
                                <!-- <label for="country">Country/Region <sup style="color: red;">*</sup></label> -->
                                <input name="country" id="country" value="{{ setting('COUNTRY_SERVE') ?? 'Bangladesh' }}"
                                    class="form-control @error('country') is-invalid @enderror" type="hidden" />
                                @error('country')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Division <sup style="color: red;">*</sup></label>
                                <select name="city" id="divisions"
                                    class="form-control @error('city') is-invalid @enderror"
                                    onchange="divisionsList();">
                                    <option disabled>Select Division</option>
                                    <option @isset($order->town) @if($order->town =='Barishal')selected @endif @endisset
                                        value="Barishal">Barishal</option>
                                    <option @isset($order->town) @if($order->town=='Chattogram')selected @endif
                                        @endisset value="Chattogram">Chattogram</option>
                                    <option @isset($order->town) @if($order->town =='Dhaka')selected @endif @endisset
                                        value="Dhaka">Dhaka</option>
                                    <option @isset($order->town) @if($order->town =='Khulna')selected @endif @endisset
                                        value="Khulna">Khulna</option>
                                    <option @isset($order->town) @if($order->town =='Mymensingh')selected @endif
                                        @endisset value="Mymensingh">Mymensingh</option>
                                    <option @isset($order->town) @if($order->town =='Rajshahi')selected @endif @endisset
                                        value="Rajshahi">Rajshahi</option>
                                    <option @isset($order->town) @if($order->town =='Rangpur')selected @endif @endisset
                                        value="Rangpur">Rangpur</option>
                                    <option @isset($order->town) @if($order->town =='Sylhet')selected @endif @endisset
                                        value="Sylhet">Sylhet</option>
                                </select>
                                <!--/ Division Section-->

                                @error('city')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                            </div>
                            <div class="form-group col-md-6">
                                <label for="district">District <sup style="color: red;">*</sup></label>
                                <select name="district" class="form-control @error('district') is-invalid @enderror"
                                    id="distr" onchange="thanaList();">
                                    <option disabled>Select District</option>
                                    @isset($order->district)
                                    <option selected value="{{$order->district}}">{{$order->district}}</option>
                                    @endisset
                                </select>
                                <!--/ Districts Section-->
                                @error('district')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="district">Thana <sup style="color: red;">*</sup></label>
                                <select name="thana" class="form-control @error('district') is-invalid @enderror"
                                    id="polic_sta">
                                    <option disabled>Select Thana</option>
                                    @isset($order->thana)
                                    <option selected value="{{$order->thana}}">{{$order->thana}}</option>
                                    @endisset
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Address <sup style="color: red;">*</sup></label>
                                <input required name="address"
                                    placeholder="For Example: House# 123, Street# 123, ABC Road" id="address"
                                    class="form-control @error('address') is-invalid @enderror" type="text"
                                    value="{{$order->address ?? $address}}" />
                                @error('address')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <!-- <div class="form-group">
                            <label for="postcode">Postcode / ZIP(optional)</label>
                            <input  name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror" type="text"  />
                            @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div> -->

                            <div class="form-group col-md-6">
                                <label for="phone">Phone <sup style="color: red;">*</sup></label>
                                <input value="" required name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror" type="number" />
                                @error('phone')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email Address <sup style="color: red;">*</sup></label>
                                <input value="{{-- {{auth()->user()->email}} --}}" required name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" type="text" />
                                @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="company">Company (optional)</label>
                                <input name="company" id="company"
                                    class="form-control @error('company') is-invalid @enderror" type="text" />
                                @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>




                <div class="widget3 col-md-5">
                    <div class="row">
                        <!-- <div class="widget3 col-md-12">
                            <h4 class="form-title"><span>2</span>Shipping Method </h4>
                            <div class="card">
                                <div class="form-group ofl">
                                    <input name="shipping_method" value="Free"  style="margin-right: 5px;position: relative;top: 0px;" type="radio">
                                    <label for="free">Free</label>
                                </div>
                                <div style="margin:0" class="form-group ofl">
                                    <input name="shipping_method" value="Prime"  style="margin-right: 5px;position: relative;top: 0px;" type="radio"><label for="bank">Prime</label>
                                </div>
                                @error('shipping_method')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div> -->
                        <style>
                            #accordion .card {
                                padding: 0 !important;
                            }

                            #accordion .card-body {
                                padding: 0;
                                margin-top: 10px;
                            }

                            #accordion .card-header {
                                padding: 0;
                            }

                            #accordion .card-header h5 div {
                                font-size: 15px;
                                padding: 10px;
                                background: var(--primary_color);
                                color: white;
                                cursor: pointer;
                            }

                            label img {
                                width: 100px;
                                height: 50px;
                                object-fit: contain;
                            }

                            .pa label {
                                text-align: center;
                                box-shadow: 0px 0px 6px gainsboro;
                                padding: 10px 20px;
                                border-radius: 5px;
                                position: relative;
                                cursor: pointer;
                            }

                            .payment_method {
                                position: absolute;
                                z-index: -9;
                            }
                        </style>
                        <div class="widget-3 col-md-12">
                            <div class="widget3">
                                <h4 class="form-title"><span>3</span>Payment Method</h4>
                                <div class="card pa">
                                    <div class="form-row">

                                        <div id="accordion" class="col-12">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <div class="" data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            Online Pay
                                                        </div>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        @if(setting('g_aamar')=='true')
                                                        <label for="aamarpay">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="aamarpay" id="aamarpay">
                                                            <img src="{{asset('/')}}icon/aamarpay_logo.png">
                                                            Aamarpay
                                                        </label>
                                                        @endif
                                                        @if(setting('g_uddok')=='true')
                                                        <label for="uddoktapay">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="uddoktapay"
                                                                id="uddoktapay">
                                                            <img src="{{asset('/')}}icon/uddoktapay.png">
                                                            Uddoktapay
                                                        </label>
                                                        @endif



                                                        @if(setting('g_wallate')=='true')
                                                        <label for="wallate">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="wallate" id="wallate">
                                                            <img src="{{asset('/')}}icon/wallet.png">
                                                            Wallate
                                                            <p>{{auth()->user()->wallate}}</p>
                                                        </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <div class=" collapsed" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            Offline Pay
                                                        </div>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        @if(setting('g_cod')=='true')
                                                        <label for="cod">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="Cash on Delivery"
                                                                id="cod">
                                                            <img src="{{asset('/')}}icon/delivery-man.png">
                                                            Cash on delivery
                                                        </label>
                                                        @endif
                                                        @if(setting('g_bkash')=='true')
                                                        <label for="Bkash">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="Bkash" id="Bkash">
                                                            <img src="{{asset('/')}}icon/bkash.png">
                                                            Bkash
                                                        </label>
                                                        @endif
                                                        @if(setting('g_nagad')=='true')
                                                        <label for="Nagad">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="Nagad" id="Nagad">
                                                            <img src="{{asset('/')}}icon/nagad.png">
                                                            Nagad
                                                        </label>
                                                        @endif
                                                        @if(setting('g_rocket')=='true')
                                                        <label for="Rocket">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="Rocket" id="Rocket">
                                                            <img src="{{asset('/')}}icon/rocket.png">
                                                            Rocket
                                                        </label>
                                                        @endif
                                                        @if(setting('g_bank')=='true')
                                                        <label for="Bank">
                                                            <input type="radio" name="payment_method"
                                                                class="payment_method" value="Bank" id="Bank">
                                                            <img src="{{asset('/')}}icon/bank.png">
                                                            Bank
                                                        </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">

                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                    data-parent="#accordion">

                                                </div>
                                            </div>
                                        </div>


                                        @error('payment_method')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <p class="mt-2" id="appended"
                                        style="background: #dcdcdc80;padding: 10px;border-radius: 5px;margin-bottom: 10px;">
                                    </p>
                                    <div id="payment-details">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="form-title"><span>4</span>Order Summary </h4>
                    <div class="card">
                        <?php 
                            $stotal=0;
                            $ids=[];
                            $cartCollection= Cart::content();
                            $data= $cartCollection->sortBy('weight');
         
                        ?>
                        @foreach ($data as $item)



                        <div style="margin-bottom: 10px;display: flex;" class="product">
                            <img style="width:50px" src="{{asset('uploads/product/'.$item->options->image)}}" alt="">
                            <a style="margin-left:10px"
                                href="{{route('product.details', $item->options->slug)}}">{{$item->name}}</a>
                            <?php 
                            
                             $whole=\App\Models\Product::find($item->id);
                             if (!in_array("$whole->user_id", $ids)) {
                                 $ids[]=$whole->user_id;
                             }

                            
                                if($item->qty>=6 && $whole->whole_price >0){

                                 $istotal=$item->qty*$whole->whole_price;
                                 $stotal+=$item->qty*$whole->whole_price;
                            }else{
                                $istotal=$item->subtotal;
                                $stotal+=$item->subtotal;
                            }?>
                            <span style="flex: 1 auto;text-align: right;">{{$istotal.'.00'}}</span>
                        </div>
                        @endforeach
                        <?php
                            $seller_count= sizeof($ids);
                        ?>
                        <input type="hidden" name="stotal" value="{{$stotal}}">
                        <input type="hidden" name="seller_count" id="seller_count" value="{{$seller_count}}">
                        <div class="form-group">
                            <div class="form-group instruction">
                                <a class="collapsed" data-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <span><label for="">Coupon</label> </span><span class="arrow"></span>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <input type="text" id="coupon" class="form-control" placeholder="Coupon Code" />
                                    <button type="button" class="btn btn-primary btn-block py-2"
                                        id="apply-coupon">Apply</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="0" id="partial_paid" name="partial_paid" class="form-control"
                            placeholder="Partial Amount" />
                        <!-- <div class="form-group">-->
                        <!--    <div class="form-group instruction">-->
                        <!--        <a data-toggle="collapse" href="#collapseWall" role="button" aria-expanded="false" aria-controls="collapseWall">-->
                        <!--            <span><label for="">Use Wallate</label> </span> =={{-- {{auth()->user()->wallate}} --}}<span class="arrow"></span>-->
                        <!--        </a>-->
                        <!--        <div class="collapse" id="collapseWall">-->


                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <hr>

                        <div class="rvinfo">
                            <span>Subtotal</span>
                            <span><span id="sub-total">{{$stotal}}</span><strong> {{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></span>
                        </div>
                        <div class="rvinfo">
                            <span>
                                Shipping Charge @if ($stotal > setting('shipping_free_above'))(Free)@endif
                            </span>
                            <span>
                                +
                                @if ($stotal > setting('shipping_free_above'))
                                    0.00
                                @else
                                    <span id="ship-charge">
                                        @if(isset($order->shipping_charge))

                                        {{$order->single_charge*$seller_count}}

                                        @else 0.00 @endif
                                    </span>
                                @endif
                                <strong> {{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong>
                            </span>
                        </div>
                        <div class="rvinfo coupon">
                            <span>Coupon <span class="coupon-name"></span></span>
                            <span>- <span
                                    id="coupon">{{Session::has('coupon') ? number_format(Session::get('coupon')['discount'], 2, '.', ',') : '0.00'}}</span><strong>
                                        {{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}</strong></span>
                        </div>

                        <hr>
                        <div class="rvinfo">
                            <span>Total</span>
                            <h4>
                                @if (Session::has('coupon'))
                                @php
                                $sub_total = $stotal;
                                $discount = Session::get('coupon')['discount'];
                                $rep_sub = str_replace(',', '', $sub_total);
                                $total = number_format($rep_sub - $discount, 2, '.', ',');
                                @endphp
                                @endif
                                <strong>
                                    @if ($stotal > setting('shipping_free_above'))
                                        {{ $stotal }}
                                    @else
                                        <span id="total">{{$total ?? $stotal}}</span> {{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}
                                    @endif
                                </strong>
                            </h4>
                        </div>
                    </div>
                    <input value="Order" type="submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('/')}}assets/frontend/js/city.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#apply-coupon', function (e) {
            e.preventDefault();
            $('#coupon').removeClass('is-invalid');
            let stotal = "{!! $stotal !!}";
            let code = $('input#coupon').val();
            let seller_count = $('#seller_count').val();
            let shipping_charge = 0;
            if ($("select[name='city']").val() == 'Dhaka') {
                let charge = "{!! setting('shipping_charge') !!}";
                shipping_charge += parseInt(charge);
            } else {
                let charge = "{!! setting('shipping_charge_out_of_range') !!}";
                shipping_charge += parseInt(charge);
            }
            shipping_charge = parseInt(shipping_charge) * parseInt(seller_count);
        
            if (code != '') {
                $.ajax({
                    type: 'GET',
                    url: '/apply/coupon/' + code + '/' + stotal,
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        $('.alert-message').removeClass('d-none');
                        if (response.alert == 'success') {
                            $('.alert-message .alert').removeClass('alert-danger').addClass('alert-success').text(response.message);

                            $('span#ship-charge').text(number_format(shipping_charge, 2, '.', ','));
                            $('span#coupon').text(number_format(response.discount, 2, '.', ','));
                            let total = response.total + shipping_charge;
                            $('span#total').text(number_format(total, 2, '.', ','));
                            $('span.coupon-name').text('(' + code + ')');

                            $('#coupon').val('')
                        } else {
                            $('.alert-message .alert').removeClass('alert-success').addClass('alert-danger').text(response.message);

                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            } else {
                $('#coupon').addClass('is-invalid');
            }
            setTimeout(() => {
                $('.alert-message .alert').removeClass('alert-danger alert-success').text('');
            }, 10000);
        });

        $(document).on('click', '.payment_method', function (e) {
            $("label").css("background", "white");
            $(this).parent("label").css("background", "yellow");
            let method = $(this).val();
            let html = '';
            var bkash = "{!! setting('bkash') !!}";
            var nogod = "{!! setting('nagad') !!}"
            var rocket = "{!! setting('rocket') !!}"
            var bank = "{!! setting('bank_name') !!}"
            var branch = "{!! setting('branch_name') !!}"
            var holder = "{!! setting('holder_name') !!}"
            var account = "{!! setting('bank_account') !!}"
            var routing = "{!! setting('routing') !!}"
            var appended = $('#appended');
            if (method == 'Bkash') {
                appended.html(bkash + ' - এই নাম্বারে টাকা পাঠিয়ে নিচের ফিল্ডে  Transaction ID টি দিন');
            } else if (method == 'Nagad') {
                appended.html(nogod + ' - এই নাম্বারে টাকা পাঠিয়ে নিচের ফিল্ডে  Transaction ID টি দিন');
            } else if (method == 'Rocket') {
                appended.html(rocket + ' - এই নাম্বারে টাকা পাঠিয়ে নিচের ফিল্ডে  Transaction ID টি দিন');
            } else if (method == 'Bank') {
                appended.html('নিচে দেয়া ব্যাংকে টাকা পাঠিয়ে নিচের ফিল্ডগুলো পূরণ করুন <br> ' + 'Bank Name: ' + bank + '<br>Branch: ' + branch + '<br>holder: ' + holder + '<br>Account: ' + account + '<br>Routing: ' + routing);
            } else if (method == 'Cash on Delivery') {

                appended.html('পণ্য হাতে পেয়ে টাকা দিন। ');
            } else {
                appended.html('');
            }
            if (method == 'Bkash' || method == 'Nagad' || method == 'Rocket') {
                html += '<div class="form-group">'
                html += '<label for="mobile_number">Mobile Number</label>'
                html += '<input required type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter your mobile number"/>'
                html += '</div>'
                html += '<div class="form-group">'
                html += '<label for="transaction_id">Transaction ID</label>'
                html += '<input required type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="Enter transaction ID"/>'
                html += '</div>'
            } else if (method == 'Bank') {
                html += '<div class="form-group">'
                html += '<label for="bank_name">Bank Name</label>'
                html += '<input required type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter bank name"/>'
                html += '</div>'
                html += '<div class="form-group">'
                html += '<label for="account_number">Account Number</label>'
                html += '<input required type="text" name="account_number" id="account_number" class="form-control" placeholder="Enter account number"/>'
                html += '</div>'
                html += '<div class="form-group">'
                html += '<label for="holder_name">Holder Name</label>'
                html += '<input required type="text" name="holder_name" id="holder_name" class="form-control" placeholder="Enter holder name"/>'
                html += '</div>'
                html += '<div class="form-group">'
                html += '<label for="branch">Branch Name</label>'
                html += '<input required type="text" name="branch" id="branch" class="form-control" placeholder="Enter branch name"/>'
                html += '</div>'
                html += '<div class="form-group">'
                html += '<label for="routing">Routing Number</label>'
                html += '<input required type="text" name="routing" id="routing" class="form-control" placeholder="Enter routing number"/>'
                html += '</div>'
            } else {
                html = '';
            }
            $('#payment-details').html(html);
        })
        $(document).on('change', '#divisions', function (e) {
            div();
        });
        function div() {
            let shipping_charge = 0;
            let seller_count = $('#seller_count').val();
            if ($("select[name='city']").val() == 'Dhaka') {
                let charge = "{!! setting('shipping_charge') !!}";
                shipping_charge += parseInt(charge);
            } else {
                let charge = "{!! setting('shipping_charge_out_of_range') !!}";
                shipping_charge += parseInt(charge);
            }

            shipping_charge = parseInt(shipping_charge) * parseInt(seller_count);

            let subtotal = $('span#sub-total').text();
            let coupon = $('span#coupon').text();

            let rep_subtotal = subtotal.replace(',', '');
            let rep_coupon = coupon.replace(',', '');

            let total = (parseInt(rep_subtotal) + shipping_charge) - parseInt(rep_coupon);
            $('span#ship-charge').text(number_format(shipping_charge, 2, '.', ','));
            $('span#total').text(number_format(total, 2, '.', ','));
        }
        div()

        function number_format(number, decimals, dec_point, thousands_sep) {
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                toFixedFix = function (n, prec) {
                    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                    var k = Math.pow(10, prec);
                    return Math.round(n * k) / k;
                },
                s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    });
</script>
@endpush