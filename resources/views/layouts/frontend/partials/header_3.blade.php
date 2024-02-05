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


<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Drop Shipping</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Become a seller</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Seller Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help & Support</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>


<header class="not-home">
    <div class="top-header header_area" style="background:#f3f3f3">
        <div class="container containe">
            
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
            <div class="wrap" style="width: 30px;"></div>

            {{-- Header Cat --}}
            <div class="header-category-wrap">
                <div id="top_categories_wrapper" class="header-category-nav" style="position:relative;padding: 0 10px 0 0 !important">
                    <button id="top_categories_btn" style="outline:none;">
                        <span><i class="icofont icofont-navigation-menu"></i></span>
                        Categories
                    </button>
                    <section id="top_categories" class="hero-area" {{-- style="display:none;" --}}>
                        <div class="container">
                            <div class="row" id="superCat">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <style>
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
            {{-- / Header Cat --}}

            <div class="search-box" id="search-box-open">
                <form action="{{route('product.search')}}" method="GET">
                    <div class="input-group">
                        <input readonly placeholder="Search entires store here...." class="sear" type="search"
                            name="keyword" id="searchbox">
                        <button class="input-group-addon" disabled name="go"><i
                                class="icofont icofont-search"></i></button>
                    </div>

                </form>
                <i style="display:none" class="other-search icofont icofont-search"></i>
            </div>

            <div class="wrap" style="width: 30px;"></div>
            <div class="top-menu">
                <ul>
                    <li><a href="{{route('wishlist')}}"> <i class="fal fa-heart" aria-hidden="true"></i> <sup> <span
                                    id="total-cart-amount">{{App\Models\wishlist::where('user_id',auth()->id())->count()}}</span></sup></a>
                    </li>
                    <li><a href="{{route('cart')}}"><i class="fal fa-shopping-basket"></i> <sup> <span
                                    id="total-cart-amount">{{Cart::count()}}</span></sup> </a></li>
                    @guest
                    {{-- <li><a href="{{route('login')}}">login</a></li>
                        <li><a href="{{route('register')}}">register</a></li>
                    <li><a href="{{route('login')}}">Sign in</a></li> --}}
                    @else
                    <li>
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
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
</script>
@endpush