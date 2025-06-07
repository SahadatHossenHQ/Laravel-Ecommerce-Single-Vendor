<?php if(!isset($classes)){$classes='col-lg-4 col-md-6 col-sm-6 col-6';}?>

<div class="product {{$classes}} pxc">
    <?php 
       $typeid=$product->slug;
    ?>

    <div class="product-wrapper"  style="height: auto;" >
    <style>
        .product-wrapper{
            overflow: hidden;
        }
        .pxc.product:hover .details{
            transition: all 0.4s;
            padding-top: 0 !important;
        }
    </style>
        <div class="pin">
            <div class="thumbnail">
            <a href="{{route('product.details', $product->slug)}}">
                <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                </a>
            </div>
            <div class="details">
                <div class="rating1" style="font-size:12px;text-align: left;">
                    @php
                    $hw=App\Models\wishlist::where('product_id', $product->id)->where('user_id',auth()->id())->first();
                    if($hw){
                        $color='#54c8ec';
                    }else{
                        $color='#a2acb5';
                    }
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
                         <i class="fas fa-star-half-alt"></i>
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
                        @elseif ($average_rating >= 5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        @endif
                         <!-- <span style="color: #333;display: inline-block;">({{$average_rating}})</span> -->
                    </div>
                </div>
                @if($product->discount_price>0 || $product->price)
             <h6><strong style="color: var(--primary_color)">{{ setting('CURRENCY_ICON') ?? '৳' }}{{$product->price ?? $product->discount_price}}</strong> <del>{{ setting('CURRENCY_ICON') ?? '৳' }}{{$product->regular_price}}</del></h6>
            @else
               <h6><strong style="color: var(--primary_color)">{{ setting('CURRENCY_ICON') ?? '৳' }}{{$product->regular_price}}</strong></h6>
            @endif
                <a href="{{route('product.details', $product->slug)}}">
                    <h5>{{implode(' ', array_slice(explode(' ', $product->title), 0, 10))}}...</h5>
                </a>
                
                
                
                                <div class="home-add2">
                                    
            
           <div class="cbtn">
               <form action="{{ route('buy.product') }}" method="GET">
                    <?php if(isset($campaigns_product)){?>
                    <input type="hidden" name="camp" id="camp"
                        value="{{ $campaigns_product->id }}">
                    <?php }?>
                    <fieldset>
                        <?php if (isset($campaigns_product)) {
                            $product->discount_price = $campaigns_product->price;
                        } ?>
                        @if (!empty($product->discount_price))
                            <input type="hidden" name="just" id="just"
                                value="{{ $product->discount_price }}">
                            <input type="hidden" name="dynamic_price" class="dynamic_price"
                                value="{{ $product->discount_price }}">
                        @else
                            <input type="hidden" name="just" id="just"
                                value="{{ $product->regular_price }}">
                            <input type="hidden" name="dynamic_price" class="dynamic_price"
                                value="{{ $product->regular_price }}">
                        @endif
                        <input type="hidden" name="id" id="id"
                            value="{{ $product->id }}">
                        <input type="hidden" name="qty" id="qty" value="1">
                        <input type="hidden" name="color" id="color" value="blank">
                        @foreach ($attributes as $attribute)
                            <?php
                            $attribute_prouct = DB::table('attribute_product')
                                ->select('*')
                                ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                                ->addselect('attribute_values.name as vName')
                                ->addselect('attribute_values.id as vid')
                                ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                                ->where('attribute_product.product_id', $product->id)
                                ->where('attributes.id', $attribute->id)
                                ->get();
                            ?>
                            @if ($attribute_prouct->count() > 0)
                                @foreach ($attribute_prouct as $attr)
                                    <?php $vid = $attr->vid; ?>
                                @endforeach

                                <input type="hidden" name="{{ $attribute->slug }}"
                                    id="{{ $attribute->slug }}"
                                    value="{{ $attribute_prouct->count() == 1 ? $vid : 'blank' }}">
                            @endif
                        @endforeach
                        @if ($product->quantity <= '0')
                            <input type="hidden" name="pr" value="1">
                            <!--<input style="width:140px;margin-top: 10px;background: var(--primary_color);color: white;border-color: var(--primary_color);" type="submit" value="Pre Order" class="button">-->
                            <p
                                style="width:auto;margin-top: 10px;background: #ec1d1d;color: white;border-color: var(--primary_color);text-align: center;padding: 6px;border-radius: 5px;">
                                Out Of Stock</p>
                        @else
                            <input
                                style="width:auto; padding-left: 30px; padding-right: 30px; margin-top: 10px;background: var(--primary_color);color: white;border-color: var(--primary_color);"
                                type="submit" value="Buy Now" class="button">
                        @endif
                    </fieldset>
                    
                </form>

            @if($product->quantity <= '0')
             <a  href="{{route('product.details', $product->slug)}}" class="redirect d-inline" style="margin-top: 10px;margin-right:5px;background: red;color: white;border-color: red;" >Pre  </a>
            @else
             @if($product->sheba!=1)
                <button type="submit" class="redirect" style="margin-top: 10px;" data-url="{{route('product.info', $product->slug)}}" id="productInfo" type="submit" title="Add To Cart"><i class="fal fa-shopping-cart" aria-hidden="true"></i> </button>
                @endif
                @endif
                <form action="{{route('wishlist.add')}}" method="post" id="submit_payment_form{{$typeid}}">
                @csrf
                    <input type="hidden" name="product_id" value="{{$product->slug}}"> 
                    <button style="margin-top: 5px;background:{{$color}}" class="redirect" type="submit" title="Wishlist"><i class="fal fa-heart" aria-hidden="true"></i> </button>
                </form>
           </div>
        </div>
            
            @if($product->discount_price>0)
                <span style="color: #ea6721;">
        
                    @if($product->dis_type == '2')
                        @php($discount_price=round((($product->regular_price - $product->discount_price) / ($product->regular_price ))*100).'%')
                    @else
                        <?php 
                            $currency_icon = (setting('CURRENCY_ICON')) ? setting('CURRENCY_ICON') : '৳';
                            $discount_price=  $currency_icon . ($product->regular_price-$product->discount_price)
                        ?>
                    @endif
                    <h6 class="dis-label d-block">{{$discount_price}} OFF</h6>
                    <h6></h6>
                </span>
                @endif
            </div>
            <h6 class="px-3 py-1" style="line-height:.9rem;font-size:1.2rem;">@if ($product->prdct_extra_msg)<small><marquee>{{ $product->prdct_extra_msg }}</marquee></small>@endif</h6>
            <div class="quick-view"> <a href="{{route('product.details', $product->slug)}}"><i class="icofont icofont-search"></i> Quick View</a></div>
       </div>

        
    </div>
</div>

@push('js')
<script>
    // form submit 
    $(document).on('submit', '#submit_payment_form{{$typeid}}', function(e) {
            e.preventDefault();
            
            let action   = $(this).attr('action');
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: action,
                data: formData,
                dataType: "JSON",
                beforeSend: function() {
                    loader(true);
                },
                success: function (response) {
                    responseMessage(response.alert, response.message, response.alert.toLowerCase())
                },
                complete: function() {
                    loader(false);
                },
                error: function (xhr) {
                    if (xhr.status == 422) {
                        if (typeof(xhr.responseJSON.errors) !== 'undefined') {
                            
                            $.each(xhr.responseJSON.errors, function (key, error) { 
                                $('small.'+key+'').text(error);
                                $('#'+key+'').addClass('is-invalid');
                            });
                            responseMessage('Error', xhr.responseJSON.message, 'error')
                        }

                    }else  if (xhr.status == 401) {
                         alert('please login');
                         window.location = '/login';

                    }  else {
                        responseMessage(xhr.status, xhr.statusText, 'error')
                    }
                }
            });
        });

        // response message hande
        function responseMessage(heading, message, icon) {
            $.toast({
                heading: heading,
                text: message,
                icon: icon,
                position: 'top-right',
                stack: false
            });
        }

        // loader handle this function
        function loader(status) {
            if (status == true) {
                $('#loading-image').removeClass('d-none').addClass('d-block');

            } else {
                $('#loading-image').addClass('d-none').removeClass('d-block');
            }
        }

</script>
@endpush