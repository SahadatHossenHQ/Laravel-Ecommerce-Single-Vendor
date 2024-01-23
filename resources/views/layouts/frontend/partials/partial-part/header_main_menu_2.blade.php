<div class="main-menu">
    <div class="container">

        <div class="back">
            <i class="fas fa-long-arrow-alt-left"></i> back
        </div>
        <div class="collpase-menu-open" style="display: none;">
            <a id="menu" class="active" href="#">MENU</a>
            {{-- <a id="cat" href="#">CATEGORIES</a> --}}
        </div>

        {{-- <div class="nav-bar"> --}}
            <div class="{{-- nav-menus --}} menu_style_2">
                <ul>
                    {{-- <li><a href="{{route('home')}}" class="{{Request::is('/') ? 'active':''}}">Home</a></li>
                    <li><a href="{{route('product')}}" class="{{Request::is('product*') ? 'active':''}}">All Products</a></li> --}}
                    @if(Request::route()->getName()=='home')
                        @php($t='11')
                    @else
                        @php($t='18')
                    @endif
                    @foreach (\App\Models\Category::where('status',true)->orderBy('pos','asc')->get()->take($t) as $category)
                        <li>
                            <a href="{{route('category.product',$category->slug)}}">{{$category->name}}</a>
                            @if ($category->sub_categories->count() > 0)
                            <ul class="sub-cat">
                                @foreach (\App\Models\SubCategory::where('status',true)->where('category_id',$category->id)->get(['id','name', 'slug']) as $sub_category)
                                    <li>
                                        <a href="{{route('subCategory.product', $sub_category->slug)}}">{{$sub_category->name}}</a>
                                        @if ($sub_category->miniCategory->count() > 0)
                                            <ul class="sub-cat">
                                                    @foreach (\App\Models\miniCategory::where('status',true)->where('category_id',$sub_category->id)->get(['id','name', 'slug']) as $miniCategory)
                                                    <li>
                                                        <a href="{{route('miniCategory.product', $miniCategory->slug)}}">{{$miniCategory->name}}</a>
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
        {{-- </div> --}}

    </div>
</div>

<style>
    .menu_style_2 ul{
        display: flex;
        -ms-flex-direction: column;
        justify-content: center;
        flex-direction: row;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
        width: 100%;
        position: relative;
        left: -10px;
        flex-wrap: wrap;
    }

    .menu_style_2 ul li{
        position: relative;
        padding: .7rem 0;
    }

    .menu_style_2 ul li a{
        color: var(--MAIN_MENU_ul_li_color) !important;
        font-weight: 600;
        padding: 0 18px 0 8px;
    }
    .menu_style_2 ul li a:hover{
        color: var(--optional_color) !important;
        background: transparent;
    }


    /* .menu_style_2 ul li ul li:hover{
        background: var(--optional_color) !important;
    } */
    .menu_style_2 ul li ul li:hover a{
        background: var(--optional_color) !important;
        color: var(--optional_bg_color_text) !important;
    }


    .menu_style_2 ul li ul{
        width: max-content;
        display: none;
        position: absolute;
        top: 2.8rem;
        left: 10px;
        z-index: 99;
        padding: 5px 0;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1), 0 10px 15px rgba(0, 0, 0, 0.1), 0 -3px 0 0 #ef4a23;
    }


</style>
