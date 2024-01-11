@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="{{$shop->name}}"/>
<meta name='keywords' content="@foreach(\App\Models\Tag::all() as $tag){{$tag->name.', '}}@endforeach" />
@endpush

@section('title', $shop->name)

@section('content')

<!--================vendor profile  Area start=================-->
<style>
    .product-page-vendor .product{
        margin: 0 !important;
        box-shadow: none;
        border: none;
        margin-bottom: 10px !important
    }
</style>
<div class="vendor-profile ">
    <div class="card">
          <div class="container">
               <div class="vendor">
                    <div class="vendor-cover">
                         <img src="{{asset('uploads/shop/cover/'.$shop->cover_photo)}}" alt="Cover Photo">
                         <div class="vendor-profile">
                              <img  src="{{asset('uploads/shop/profile/'.$shop->profile)}}" alt="Profile">
                              <h4><b>{{$shop->name}}</b></h4>
                         </div>
                    </div>
               </div>
               <div class="profile-tabs">
                    <!-- Button trigger modal -->
                        <!--<button type="button" class="more"  data-toggle="modal" data-target="#exampleModalLong">-->
                        <!--    More Details About The Shop-->
                        <!--</button>-->
                        <div style="margin-bottom: 20px;" class="search-box">
                            <form action="{{route('search.product.vendor')}}" method="GET" id="form">
                                <div class="input-group">
                                    <input type="hidden" name="id" value="{{$shop->slug}}">
                                    <input type="hidden" name="sort" value="New To Old">
                                    <input required placeholder="Search On this Shop" class="sear" type="search" name="keyword">
                                    <button class="input-group-addon" type="submit"><i class="icofont icofont-search"></i></button>
                                </div>
                            </form>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-group">
                                        <h5><b>Address</b></h5>
                                        <hr>
                                        <p><i class="fas fa-map-marker-alt"></i>{{$shop->address}}</p>
                                    </div>
                                </div>
                                <div class="modal-body">
                                        <div class="modal-group">
                                        <h5><b>Contact</b></h5>
                                        <hr>
                                        <p><i class="fas fa-phone-square-alt"></i> {{$shop->user->phone}}</p>
                                        <p><i class="fas fa-envelope"></i> {{$shop->user->email}}</p>
                                        </div>
                                    </div>
                                <div class="modal-body">
                                    <div class="modal-group">
                                        <h5><b>Description</b></h5>
                                        <hr>
                                        <p>{{$shop->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div>
    </div>
<!--================product  Area star t=================-->
<style>
    .products .product .thumbnail{
        height:170px !important;
    }
</style>
<div class="products product-page-vendor">
    <div class="container ">
        <h3 class="title">Top Product</h3>
            <div class="row" style="margin-bottom: 10px;">
                <x-filter-component />
            </div>
            <div class="row" id="grid-view">
                @forelse ($products as $product)
                    <x-product-grid-view :product="$product"  classes="product col-lg-2 col-md-3 col-sm-4 col-4"/>
                @empty
                    <x-product-empty-component />
                @endforelse
            </div>
           <div class="row " id="list-view" style="display: none;">
                @forelse ($products as $product)
                    <x-product-list-view :product="$product"  classes="product col-lg-2 col-md-3 col-sm-4 col-4"/>
                @empty
                    <x-product-empty-component />
                @endforelse
            </div>
     </div>
</div>
<!--================product  Area End=================-->
</div>
<!--================vendor pro  Area End=================-->

<x-add-cart-modal />
@include('components.cart-modal-attri')
@endsection

@push('js')
    <script>
        $(document).ready(function () {

           

            $('.value-plus').on('click', function () {
                var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.val(), 10) + 1;
                divUpd.val(newVal);
                $('input#qty').val(newVal);
            });

            $('.value-minus').on('click', function () {
                var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.val(), 10) - 1;
                if (newVal >= 1) {
                    divUpd.val(newVal);
                    $('input#qty').val(newVal);
                }

            });

             $(document).on('submit', '#addToCart', function(e) {
                e.preventDefault();

                let url      = $(this).attr('action');
                let type     = $(this).attr('method');
                let btn      = $(this);
                let formData = $(this).serialize();

                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $(btn).attr('disabled', true);
                    },
                    success: function (response) {
                        if(response.alert!='Congratulations'){
             
                            $.toast({
                                heading: 'Warning',
                                text: response.message,
                                icon: 'warning',
                                position: 'top-right',
                                stack: false
                            });
                        }else{
                        $('span#total-cart-amount').text(response.subtotal);

                        $.toast({
                            heading: 'Congratulations',
                            text: response.message,
                            icon: 'success',
                            position: 'top-right',
                            stack: false
                        });

                        $('#cart-modal').modal('hide');
                        }
                    },
                    complete: function() {
                        $(btn).attr('disabled', false);
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
            })

            $(document).on('change', 'select#sort', function() {

                let value = $(this).val();

                $('input[name="sort"]').val(value);

                $('form#form').submit();
            });
        });
        
    </script>
<script>
   var site_url = "{{ url('/') }}";   
   var slug = "{{$shop->slug }}";   
   var page = 1;
   
   load_more(page);


    function load_more(page){
        var _totalCurrentResult=$(".product").length;
        $.ajax({
            url: site_url + "/vendor/"+slug+"?page=" + page,
            type: "get",
            datatype: "html",
            data:{
                        skip:_totalCurrentResult
                },
            beforeSend: function()
            {
                $('.ajax-loading').show();
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('.ajax-loading').hide();
                $("#grid-view").append(result[0]);
                $("#list-view").append(result[1]);
                if(result[0].length==0){
                }else{
                   
                    setTimeout(function() {
                        page++;
                        load_more(page);
                    }, 3000);
                }
            },
            
        })
        
       
    }
</script>
@endpush