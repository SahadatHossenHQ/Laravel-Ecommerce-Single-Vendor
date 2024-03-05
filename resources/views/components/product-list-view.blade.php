<div class="product col-md-12 col-sm-4" style="height: initial;">
<?php 
       $typeid=$product->slug;
    ?>
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
                <a  href="{{route('product.details', $product->slug)}}">
                    <h4><strong>{{implode(' ', array_slice(explode(' ', $product->title), 0, 10))}}...</strong></h4>
                    <p style="margin-bottom: 10px">{!! $product->short_description !!}</p>
                </a> 
              
                <table>
                   <tbody>
                        <tr>
                        <th>MRP </th>

                        <td>
                             @if($product->discount_price>0 || $product->price)
             <h6><strong style="color: var(--primary_color)">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->price ?? $product->discount_price}}</strong> <del>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->regular_price}}</del></h6>
            @else
               <h6><strong style="color: var(--primary_color)">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->regular_price}}</strong></h6>
            @endif</td>
                    </tr>
                  
                   
                    <tr>
                        <th>Colour  </th>
                        <td><strong style="margin: 0px 10px">:</strong>@foreach ($product->colors as $color){{$color->name}} @endforeach</td>
                    </tr>
                    <tr>
                        <th>Point  </th>
                        <td><strong style="margin: 0px 10px">:</strong> @if(setting('is_point')==1){{$product->point}} @endif</td>
                    </tr>
                   </tbody>
                </table>
                 <div class="rating1">
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
                        @elseif ($average_rating >= 5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        @endif
                         <span style="color: #333;display: inline-block;">{{$average_rating}} rating</span>
                    </div>
                </div>
               
                 
               @if($product->discount_price>0)
                <span style="color: #ea6721;">
                  
                            @if($product->dis_type == '2')
                                @php($discount_price=round((($product->regular_price - $product->discount_price) / ($product->regular_price ))*100).'%')
                            @else
                                <?php 
                                    $discount_price={{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}. ($product->regular_price-$product->discount_price)
                                ?>
                            @endif
                    <h6 class="dis-label">{{$discount_price}} OFF</h6>
                    <h6></h6>
                </span>
                @endif
                    @if($product->quantity <= '0')
                    <div class="col-md-12 ">
                       <a  href="{{route('product.details', $product->slug)}}" class="redirect" style="margin-top: 10px;background: red;color: white;border-color: red;" >Pre Order </a>
                    </div>
                    @else
                <div class="list-card">
                     @if($product->sheba!=1)
                    <input style="margin-top: 10px;" data-url="{{route('product.info', $product->slug)}}" id="productInfo" type="submit" value="add to cart">
                    @endif
                    <form action="{{route('wishlist.add')}}" method="post" id="submit_payment_form{{$typeid}}">
                    @csrf
                        <input type="hidden" name="product_id" value="{{$product->slug}}"> 
                        <button style="margin-top: 5px;background:{{$color}}" class="redirect" type="submit"><i class="fal fa-heart" aria-hidden="true"></i> Wishlist</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        
    </div>
</div>
<style>
                .low-warning{
            padding: 8px 30px;
            border-radius: 5px;
            color: white;
            margin-top: 20px;
                }
            </style>
<style>
    .list-card{
        display: flex;
        align-items: baseline;
    }
    .list-card input,.list-card form{
        flex: 1;
        margin-left: 5px;
    }
    .list-card input{
        margin-left: 0;
        margin-right: 5px;
    }
</style>
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

                    }   else {
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