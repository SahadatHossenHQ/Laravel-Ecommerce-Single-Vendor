@extends('layouts.frontend.app')

@push('meta')
    
@endpush

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/jquery-ui1.css">
@endpush

@section('content')
<!--================product  Area start=================-->
<div class="container product-page">
    <h3 class="title" style="text-align: center;padding: 30px 0px;">Customer Favorites</h3>
    <div class="row">
        <!-- tittle heading -->
        <div class="side-bar col-md-3">
            
            <form action="">
                    
                <div class="range">
                    <h3 class="title" style="padding-top: 10px;margin-bottom: 5px;">Customer Favorites</h3>
                    <ul class="dropdown-menu6">
                        <li>
                            <div id="slider-range"></div>
                            
                            <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                            
                        </li>
                    </ul>
                </div>
                
                <div class="left-side">
                    <h3 class="title" style="padding-top: 10px;margin-bottom: 5px;">Customer Favorites</h3>
                    <ul>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Vegetarian</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Non-Vegetarian</span>
                        </li>
                    </ul>
                </div>
                
                <div class="customer-rev left-side">
                    <h3 class="title" style="padding-top: 10px;margin-bottom: 5px;">Customer Favorites</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span>5.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                <span>4.5</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
        
        <div class="products col-md-9">
            <div class="container">
                <div class="row " style="border-left: 1px solid #ccc;border-top: 1px solid #ccc;">
                    
                    @forelse ($tag->products as $product)
                        <x-product-grid-view :product="$product" />
                    @empty
                        <x-product-empty-component />
                    @endforelse
                    
                </div>
            </div>
        </div>
        <!--================product  Area End=================-->

        <!-- //product right -->
    </div>
</div>
  <!-- //top products -->
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
@endpush