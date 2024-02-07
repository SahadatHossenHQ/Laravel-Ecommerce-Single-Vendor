<style>
    @font-face {
        font-family: muli;
        src: url('{{asset("/")}}assets/frontend/font/Muli/Muli-VariableFont_wght.ttf');
    }
    header .main-menu {
        z-index: 999999;
    }
    @media(max-width:750px) {
        .sear_wrapper,
        #search-view {
            width: 100% !important;
        }
    }
    .goog-te-gadget img {
        display: none;
    }
    .goog-te-banner-frame {
        display: none;
    }
    .VIpgJd-ZVi9od-ORHb-OEVmcd {
        display: none !important;
    }
</style>
@if(Request::is('/'))
@else
<style>
    .products .product .thumbnail {
        height: 190px !important;
    }
    #list-view .product .thumbnail img {
        width: 200px;
    }
    @media(max-width:767px) {
        #list-view .product .thumbnail img {
            width: inherit;
        }
        #list-view .product h4 {
            font-size: 17px;
            font-weight: 1;
            margin-top: 10px;
        }
        #list-view .product .details {
            margin-left: 15px;
        }
        #list-view .product .details .dis-label {
            display: none;
        }
    }
</style>
@endif


<header class="not-home" style="background:var(--primary_color);color:var(--primary_bg_color_text)">
    {{-- <div id="style_top_head_nav" class="container-fluid" style="background:var(--primary_color);"> --}}
        <div class="row">
            <div class="col-12">
                <nav class="top_style_3_nav navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @php
                                echo setting('STYLE_3_TOP_MENU');
                            @endphp
                            @if (!auth()->check() || (auth()->user()->role_id != 1 && auth()->user()->role_id != 2))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('vendorJoin') }}">Become a seller</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Seller Login</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Help & Support</a>
                            </li>
                            @if (!empty(setting('facebook')))                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ setting('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            @endif
                            @if (!empty(setting('instagram')))                            
                            <li class="nav-item">
                                <a class="nav-link" href="https://instagram.com/{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                            </li>
                            @endif
                            @if (!empty(setting('twitter')))                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ setting('twitter') }}"><i class="fab fa-twitter"></i></a>
                            </li>
                            @endif
                            @if (!empty(setting('linkedin')))                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ setting('linkedin') }}"><i class="fab fa-linkedin"></i></a>
                            </li>
                            @endif
                            @if (!empty(setting('youtube')))                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ setting('youtube') }}"><i class="fab fa-youtube"></i></a>
                            </li>
                            @endif
                            @if (!empty(setting('whatsapp')))                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ setting('whatsapp') }}"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            @endif
                            @if (!empty(setting('messanger')))                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ setting('messanger') }}"><i class="fab fa-facebook-messenger"></i></a>
                            </li>
                            @endif
                            @if (auth()->check() && auth()->user()->role_id != 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard')}}" class="{{Request::is('dashboard') ? 'active':''}}">My Account</a>
                            </li>
                            @endif
                            @auth
                            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                            <li class="nav-item"><a class="nav-link" href="{{routeHelper('dashboard')}}">Dashboard</a></li>
                            @endif
                            @endauth
                            @guest
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Sign up</a></li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    {{-- </div> --}}


    <div class="top-header header_area" style="background:var(--primary_color);color:var(--primary_bg_color_text)">
        <div class="container-fluid containe">
            
            {{-- Mobile menu --}}
            <div class="mobile-menu-openar">
                <div class="bars">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            {{-- / Mobile menu --}}

            <div class="logo-area">
                <a href="{{route('home')}}">
                    <img src="{{asset('uploads/setting/'.setting('logo'))}}" alt="Application Logo">
                </a>
            </div>
            <div class="APP_NAME" style="padding-left:1.2rem;padding-right:1.2rem;">
                <a id="LOGO_NAME" href="{{route('home')}}">{{ env('APP_NAME') }}</a>
            </div>
            <div class="mobi-comp top-menu" style="display: none;">
                <ul>
                    <li><a href="{{route('cart')}}"><i class="fal fa-shopping-cart"></i></a></li>
                    @guest
                    <li><a href="{{route('login')}}"><i class="fas fa-user"></i> </a></li>
                    @else
                    <li>
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                class="icofont icofont-logout"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest

                    ba
                </ul>
            </div>
            <div class="custom-header">
                <div class="header-category-wrap">
                    <div id="top_categories_wrapper" class="header-category-nav" style="position:relative;padding: 0 10px 0 0 !important">
                        <button id="top_categories_btn" style="outline:none;">
                            <i class="icofont icofont-navigation-menu"></i>&nbsp;Categories
                        </button>
                        <section id="top_categories" class="hero-area" {{-- style="display:none;" --}}>
                            <div class="container">
                                <div class="row" id="superCatStyle3">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <style>
                    #top_categories_btn{
                        outline: none;
                        display: flex;
                        align-items: center;
                        color: var(--secondary_color);
                    }
                    #top_categories{
                        display: none;
                        position:absolute;
                        top:40px;
                    }
                </style>
                @push('js')
                <script>
                    $(document).ready(function () {
                        $("#top_categories_btn").click(function () {
                            $("#top_categories").slideToggle();
                        });
                    });
                </script>
                @endpush


                <div id="search-box-open" class="search-bar">
                    {{-- <input type="text" class="search-input" placeholder="Search..."> --}}
                    <input readonly placeholder="Search entires store here...." class="sear search-input" type="search"
                            name="keyword" id="searchbox">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M23.64 22.176l-5.736-5.712c1.44-1.8 2.232-4.032 2.232-6.336 0-5.544-4.512-10.032-10.032-10.032s-10.008 4.488-10.008 10.008c-0.024 5.568 4.488 10.056 10.032 10.056 2.328 0 4.512-0.792 6.336-2.256l5.712 5.712c0.192 0.192 0.456 0.312 0.72 0.312 0.24 0 0.504-0.096 0.672-0.288 0.192-0.168 0.312-0.384 0.336-0.672v-0.048c0.024-0.288-0.096-0.552-0.264-0.744zM18.12 10.152c0 4.392-3.6 7.992-8.016 7.992-4.392 0-7.992-3.6-7.992-8.016 0-4.392 3.6-7.992 8.016-7.992 4.392 0 7.992 3.6 7.992 8.016z"></path></svg>
                </div>
            </div>
            <div class="wrap" style="width: 30px;"></div>
            <div class="top-menu">
                <ul>
                    <li><a href="{{route('track')}}" class="{{Request::is('track*') ? 'active':''}}">Order Track</a></li>
                    <li><a href="{{route('wishlist')}}" class="{{Request::is('track*') ? 'active':''}}">Wishlist</a></li>
                    <li><a href="{{route('cart')}}" class="{{Request::is('track*') ? 'active':''}}">Cart</a></li>

                    {{-- <li><a href="{{route('wishlist')}}"> <i style="position:relative;" class="fal fa-heart" aria-hidden="true"></i><span style="position:absolute;top:-3px;right:-10px;font-size:0.8rem;padding:0.2rem;border-radius:9999px;background:var(--optional_bg_color_text);color:var(--optional_color);" id="total-cart-amount">{{App\Models\wishlist::where('user_id',auth()->id())->count()}}</span></a></li> --}}
                    {{-- <li><a href="{{route('cart')}}"><i style="position:relative;" class="fal fa-shopping-basket"><span style="position:absolute;top:-3px;right:-10px;font-size:0.8rem;padding:0.2rem;border-radius:9999px;background:var(--optional_bg_color_text);color:var(--optional_color);" id="total-cart-amount">{{Cart::count()}}</span></i></a>Cart</li> --}}
                    <li><div id="google_translate_element" onclick="foo();"> </div></li>
                    <style>
                        #google_translate_element>div>div>span>a>span{color:var(--secondary_color);}
                    </style>
                    <li>{{ Cart::total() }} BDT</li>
                </ul>
                    
                
            </div>
        </div>
    </div>
    <div class="menu-overly"></div>


    {{-- Main Menu --}}
    @if (!empty(setting('MAIN_MENU_STYLE')))
    @include('layouts.frontend.partials.partial-part.header_main_menu_' . setting('MAIN_MENU_STYLE'))
    @else
    @include('layouts.frontend.partials.partial-part.header_main_menu_1')
    @endif
</header>

<style>
    /* Top header in top menu style 3 */
    .top_style_3_nav li .nav-link,
    #LOGO_NAME{
        color: var(--primary_bg_color_text);
    }
    .top_style_3_nav li:hover .nav-link,
    .top_style_3_nav li:hover .nav-link i,
    #LOGO_NAME:hover{
        color: var(--secondary_color);
    }

    /* Custom Styles */
    .custom-header {
        background-color: white;
        padding: 2px;
        border-radius: 9999px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-basis: 45%;
        padding-left: 1%;
        padding-right: 1%;
    }
    .search-bar {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
    }
    .category-button {
        background-color: #ffffff;
        /* White background */
        border: none;
        border-radius: 10px 0 0 10px;
        /* Round only the left side */
        padding: 8px;
        cursor: pointer;
    }
    .search-input {
        border: none;
        border-radius: 0 10px 10px 0;
        padding: 8px;
        width: 100%;
        outline: none;
    }
    .search-icon {
        background-color: #ffffff;
        /* White background */
        border: none;
        border-radius: 10px;
        /* Round corners */
        margin-left: 10px;
        padding: 8px;
        cursor: pointer;
    }
    /* menu */
    .top-menu ul li a,
    .top-menu ul li a i {
        color: var(--primary_bg_color_text) !important;
    }
    .top-menu ul li:hover a,
    .top-menu ul li:hover a i {
        color: var(--secondary_color) !important;
    }


    /* Media Query */
    @media (max-width: 767px){
        .header-category-wrap,
        #search-box-open input,
        #LOGO_NAME {
            display: none;
        }

        .custom-header{
            flex-basis: unset;
        }
    }
    
</style>




{{-- Header Advance Search - When Click Search icon then automatic this section in top with fixed search bar --}}
@include('layouts.frontend.partials.partial-part.header_advance_search')

@push('js')
<script>
    $(window).on('load', function () {
        $('#myModal').modal('show');

    });
    var site_url = "{{ url('/') }}";
    $.ajax({
        url: site_url + "/render/superCat",
        type: "get",
        datatype: "html",
        beforeSend: function () {
            $('.ajax-loading').show();
        },
        success: function (response) {
            var result = $.parseJSON(response);
            $('.ajax-loading').hide();
            $("#superCat").append(result);
            subCat();
        },

    })
    function subCat() {
        var site_url = "{{ url('/') }}";
        $.ajax({
            url: site_url + "/render/subCat",
            type: "get",
            datatype: "html",
            beforeSend: function () {
                $('.ajax-loading').show();
            },
            success: function (response) {
                var result = $.parseJSON(response);
                $('.ajax-loading').hide();
                $("#subCat").append(result);

            },

        })
    }




    $.ajax({
        url: site_url + "/render/superCat",
        type: "get",
        datatype: "html",
        beforeSend: function () {
            $('.ajax-loading').show();
        },
        success: function (response) {
            var result = $.parseJSON(response);
            $('.ajax-loading').hide();
            $("#superCatStyle3").append(result);
            subCat();
        },

    })
</script>
@endpush