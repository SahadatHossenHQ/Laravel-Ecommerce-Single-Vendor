@extends('layouts.frontend.app')


@section('title', 'Account')

@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
                  @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9 products " style="margin-top: 20px">
              <div class="customer-right">
                  
                <div class="row " id="list-view">
                    <div class="col-md-12 product">
                    @if(!empty(Session::get('massage2')))
                    <span style="margin-bottom: 20px;display: block;color: #1cc88a;text-align: center;background: white;padding: 5px;border-radius: 5px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1) !important;"> {{ Session::get('massage2')}}</span>
                    @endif
                    </div>
                    @forelse ($wishlist as $wish_prod)
                    @foreach($wish_prod->wishlist as $product)
                    <div class="product col-lg-12" style="height: initial;">
    <div class="product-wrapper list-comp">
        <div class="pin row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="{{route('product.details', $product->slug)}}">
                        <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                    </a>
                </div>
            </div>
            
            <div class="details col-md-8">
                <a href="{{route('product.details', $product->slug)}}">
                    <h4><strong>{{$product->title}}</strong></h4>
                    <p style="margin-bottom: 10px">  {!!$product->short_description !!}</p>
                </a> 
              
                <table>
                   <tbody>
                        <tr>
                        <th>MRP </th>

                          <td>
                             @if($product->discount_price>0 || $product->price)
             <h6><strong style="color: var(--optional_color)">Tk.{{$product->price ?? $product->discount_price}}</strong> <del>Tk.{{$product->regular_price}}</del></h6>
            @else
               <h6><strong style="color: var(--optional_color)">Tk.{{$product->regular_price}}</strong></h6>
            @endif</td>
                    </tr>
                    <tr>
                        <th>Brand  </th>
                        <td><strong style="margin: 0px 10px">:</strong>{{$product->brand->name}}</td>
                    </tr>
                     <tr>
                        <th>Size  </th>
                        <td><strong style="margin: 0px 10px">:</strong>@foreach ($product->sizes as $size) {{$size->name}}@endforeach</td>
                    </tr>
                     <tr>
                        <th>Colour  </th>
                        <td><strong style="margin: 0px 10px">:</strong>@foreach ($product->colors as $color){{$color->name}} @endforeach</td>
                    </tr>
                   </tbody>
                </table>
                 <div class="rating1">
                    @php
                        if ($product->reviews->count() > 0) {
                            $average_rating = $product->reviews->sum('rating') / $product->reviews->count();
                        } else {
                            $average_rating = 0;
                        }
                    @endphp
                    <div>
                        @if ($average_rating == 0)
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating > 0 && $average_rating < 1.5)
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 1.5 && $average_rating < 2)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 2 && $average_rating < 2.5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 2.5 && $average_rating < 3)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 3 && $average_rating < 3.5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 3.5 && $average_rating < 4)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 4 && $average_rating < 4.5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 4.5 && $average_rating < 5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        @elseif ($average_rating > 5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        @endif
                         <span style="color: #333;display: inline-block;">{{$average_rating}} rating</span>
                    </div>
                </div>
               
                
                <div class="list-card">
                    <input style="margin-right: 10px;" data-url="{{route('product.info', $product->slug)}}" id="productInfo" type="submit" value="add to cart">
                    <a style="text-align: center;" href="{{route('wishlist.remove',['item'=>$wish_prod->id])}}" class="redirect">Remove</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
                    @endforeach
                        @empty
                    @endforelse
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@include('components.cart-modal-attri')
@endsection
<x-add-cart-modal />
@push('js')
    <script src="{{asset('/')}}assets/frontend/js/jquery-ui.js"></script>
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

            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 9000,
                values: [50, 6000],
                slide: function (event, ui) {
                    $("#amount").val("TK" + ui.values[0] + " - TK" + ui.values[1]);
                }
            });
            $("#amount").val("TK" + $("#slider-range").slider("values", 0) + " - TK" + $("#slider-range").slider("values", 1));
        });
        
    </script>
@endpush