@extends('layouts.frontend.app')


@section('title', 'Account')

@section('content')
<style>
	.item {
  text-align: center;
}
.dasboard .card {
  margin-bottom: 25px;
  color: #333;
  font-size: 15px;
  text-transform: uppercase;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.4s;
  border: 2px solid gainsboro;
  padding: 30px 10px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1) !important;
}

.item  p {
  margin: 0;
  text-align: center;
}
.dasboard .card i, .transction .card i {
  font-size: 35px;
  margin-bottom: 10px;
}
</style>
<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <?php 
                $low_products=\App\Models\Product::where('quantity','<','6')->where('user_id',auth()->id())->count();
                if($low_products>0){
            ?>
            <style>
                .low-warning{
            padding: 8px 30px;
            border-radius: 5px;
            color: white;
            margin-top: 20px;
                }
            </style>
                <a class="btn-danger col-md-12 low-warning" href="{{route('vendor.low.product')}}">
                    You have {{$low_products}} low quantity product.
                </a>
        <?php }?>
          <div class="customar-menu col-md-3">
                  @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9 dasboard" style="padding:0">
                <div class="cr row" style="padding: 20px;">
                   <!--  <div class="col-lg-6 col-md-6 col-sm-6 col-6 item">
                        <div class="card" style="background:transparent;">
                             
                            Refer Code
                             <p style="background: gainsboro;text-transform:initial !important;border-radius: 5px;">{{auth()->user()->username}}</p>
                        </div>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-6 item">
                        <div class="card" style="background:transparent;">
                             
                            Refer buy link
                            <div class="">
                                <input  style="position: absolute;z-index: -99;width:5px" readonly  id="refer_link" type="text" value="https://shopasiabd.com/register?code={{auth()->user()->username}}">
                            
                             <button id="copyLink" class="btn btn-primary">Copy Link</button>
                            </div>
                        </div>
                    </div> -->
                    
                    <!--<div class="col-lg-4 col-md-4 col-sm-4 col-6 item">-->
                    <!--    <div class="card" style="background:transparent;">-->
                    <!--         <p><i class="fas fa-coins"></i></p>-->
                    <!--         Pending Point-->
                    <!--         <p>{{auth()->user()->pen_point}}</p>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-4 col-md-4 col-sm-4 col-6 item">-->
                    <!--    <div class="card" style="background:transparent;">-->
                    <!--         <p><i class="fas fa-coins"></i></p>-->
                    <!--         Total Point-->
                    <!--         <p>{{auth()->user()->point}}</p>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">-->
                    <!--    <div class="card" style="background:transparent;">-->
                    <!--         <p><i class="fas fa-money-bill"></i></p>-->
                    <!--         My Wallate-->
                    <!--         <p>{{auth()->user()->wallate}}</p>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">
                        <div class="card" style="background:transparent;">
                             <p><i class="fas fa-newspaper"></i></p>
                             Total Blogs
                             <p>{{$blog}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">
                        <div class="card" style="background:transparent;">
                             <p><i class="fas fa-box"></i></p>
                             Total Order
                              <p>{{$order}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">
                        <div class="card" style="background:transparent;">
                             <p><i class="fas fa-balance-scale"></i></p>
                             Pending Order
                             <p>{{$pending}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">
                        <div class="card" style="background:transparent;">
                             <p><i class="fas fa-hourglass-start"></i></p>
                             Processing Order
                             <p>{{$processing}}</p>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">
                        <div class="card" style="background:transparent;">
                             <p><i class="fas fa-plane"></i></p>
                             Shipping Order
                             <p>{{$shipping}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">
                        <div class="card" style="background:transparent;">
                             <p><i class="fas fa-thumbs-up"></i></p>
                             Pickuped Order
                             <p>{{$delevery}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item">
                        <div class="card" style="background:transparent;">
                             <p><i class="fa fa-window-close  color-white shadow-l timeline-icon"></i></p>
                             Cancel Order
                             <p>{{$cancel}}</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $(document).on('click', '#copyLink', function(e) {
            var element = $("#refer_link");
            element.val($(element).val()).select();
            document.execCommand("copy");
            $.toast({
                heading: 'Success',
                text: 'Link Copy Successfully.',
                icon: 'success',
                position: 'top-right',
                stack: false
            });
        });
    </script>
<script src="{{asset('/')}}assets/frontend/js/city.js"></script>
@endpush