                <div class="product col-lg-2 col-md-3 col-sm-4 col-4">
                    <div class="product-wrapper"  style="height:210px">
                        <div class="pin">
                            <div class="thumbnail">
                             <a href="{{route('clasified.show',['slug'=>$product->slug])}}">
                                <img src="{{asset('uploads/product/'.$product->thumbnail)}}" alt="Product Image">
                                </a>
                            </div>
                            <div class="details">
                                  <a href="{{route('clasified.show',['slug'=>$product->slug])}}">
                                    <h5>{{$product->title}}</h5>
                                </a>
                                <h6><strong style="color: var(--primary_color)">Tk.{{$product->price}}</strong></h6>
                            </div>
                       </div>
                    </div>
                </div>
