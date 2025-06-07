
                        <div class="product col-lg-3 col-md-3 col-sm-4 col-4">
    <?php 
       $typeid=$product->slug;
    ?>

    <div class="product-wrapper"   @if(setting('is_point')==1) style="height: 280px;" @endif>
        <div class="pin">
            <div class="thumbnail">
            <a href="{{route('product.cam.details', $product->pid)}}">
                <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                </a>
            </div>
            <div class="details">
                 <a href="{{route('product.cam.details', $product->pid)}}">
                    <h5>{{$product->title}}</h5>
                </a>
               
                 <span style="color: #ea6721;">
                    @php
                        $percent = round((($product->regular_price - $product->discount_price) / $product->regular_price) * 100, 2);
                    @endphp
                    <h6 class="dis-label">{{$percent}}% OFF</h6>
                    <h6></h6>
                </span>
                
            </div>
            <div class="quick-view">  <a href="{{route('product.cam.details', $product->pid)}}"><i class="icofont icofont-search"></i> Quick View</a></div>
        @if(setting('is_point')==1)
            <p class="point">Point:{{$product->point}}</p></div>
        @endif
        <div class="home-add2">
             <h6><strong style="color: var(--primary_color)">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->cprice ?? $product->discount_price}}</strong> <del>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->regular_price}}</del></h6>
          
           <div class="cbtn">
                <button type="submit" class="redirect" style="margin-top: 10px;" data-url="{{route('camp.product.info',$product->pid)}}" id="productInfo1" type="submit" title="Add To Cart"><i class="fal fa-shopping-cart" aria-hidden="true"></i> </button>
                
                <form action="{{route('wishlist.add')}}" method="post" id="submit_payment_form{{$typeid}}">
                @csrf
                    <input type="hidden" name="product_id" value="{{$product->slug}}"> 
                    <button style="margin-top: 5px;" class="redirect" type="submit" title="Wishlist"><i class="fal fa-heart" aria-hidden="true"></i> </button>
                </form>
           </div>
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

                    } else {
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