<div class="row" style="border-bottom: 1px solid gainsboro;padding-bottom: 10px;">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="{{route('product.details', $product->slug)}}">
                                    <img style="width: 100%;height: 85px;object-fit: cover;" src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8" style="padding:0">
                            <a  href="{{route('product.details', $product->slug)}}">

                                <p style="color: #333;font-size: 14px;">
                                    {{$product->title}}
                                </p>
                            </a> 
                            <p style="color: #333;font-size: 14px;">
                                Price:@if($product->discount_price>0 || $product->price)
             <span><strong style="color: var(--primary_color)">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->price ?? $product->discount_price}}</strong> <del>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->regular_price}}</del></span>
            @else
               <span><strong style="color: var(--primary_color)">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->regular_price}}</strong></span>
            @endif</p>
                             <div class="rating1" style="font-size: 11px;margin: 0;text-align: left !important;">
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
               
                        </div>
                    </div>