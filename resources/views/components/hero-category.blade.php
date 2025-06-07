 <div class="category-side col-lg-2.5">
                    <div class="hero-categories">
                        <ul class="big-cat">
                            <li class="components-bg-wo"> <i class="fas fa-bars" style="margin-right:10px;"></i>Categories</li>
                            @if(Request::route()->getName()=='home')
                             @php($t='11')
                            @else
                            @php($t='18')
                            @endif
                             @foreach (\App\Models\Category::where('status',true)->orderBy('pos','asc')->get()->take($t) as $category)
                                <li>
                                    <a href="{{route('category.product',$category->slug)}}"><img src="{{asset('uploads/category/'.$category->cover_photo)}}" alt="">{{$category->name}}</a>
                                    @if ($category->sub_categories->count() > 0)
                                        <ul class="sub-cat">
                                             @foreach (\App\Models\SubCategory::where('status',true)->where('category_id',$category->id)->get(['id','name', 'slug']) as $sub_category)
                                                <li><a href="{{route('subCategory.product', $sub_category->slug)}}">{{$sub_category->name}}</a>
                                                    @if ($sub_category->miniCategory->count() > 0)
                                                        <ul class="sub-cat">
                                                             @foreach (\App\Models\miniCategory::where('status',true)->where('category_id',$sub_category->id)->get(['id','name', 'slug']) as $miniCategory)
                                                                <li><a href="{{route('miniCategory.product', $miniCategory->slug)}}">{{$miniCategory->name}}</a>
                                                                    @if ($miniCategory->extraCategory->count() > 0)
                                                                        <ul class="sub-cat">
                                                                             @foreach (\App\Models\ExtraMiniCategory::where('status',true)->where('mini_category_id',$miniCategory->id)->get(['id','name', 'slug'])  as $extraCategory)
                                                                               <li><a href="{{route('extraCategory.product', $extraCategory->slug)}}">{{$extraCategory->name}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>