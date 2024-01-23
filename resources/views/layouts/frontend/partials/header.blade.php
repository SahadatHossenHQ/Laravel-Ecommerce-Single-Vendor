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
    .products .product .thumbnail{
        height:190px !important;
    }
    #list-view   .product .thumbnail img{
        width:200px;
    }
    @media(max-width:767px){
        #list-view   .product .thumbnail img{
            width:inherit;
        }
        #list-view   .product h4{
            font-size: 17px;
            font-weight: 1;
            margin-top: 10px;
        }
         #list-view   .product .details {
           margin-left:15px;
        }
          #list-view   .product .details .dis-label {
           display:none;
        }
    }
</style>
@endif


<!-- <header class="{{Request::is('/') ? 'home':'not-home'}}"> -->
<header class="not-home">
    <div class="upper-header" style="">
        <div class="container">
            <div style="display: flex;">
                <div class="dvts" style="flex: 1;">
                    <ul>
                        <li><i class="fal fa-phone-alt" aria-hidden="true"></i> Have a question? Call us<a href="tel:{{setting('SITE_INFO_PHONE')}}"> {{setting('SITE_INFO_PHONE')}}</a></li>
                        {{-- <li style="margin-left: 10px;"><a href=""><i class="fal fa-envelope" aria-hidden="true"></i> {{setting('email')}}</a></li> --}}
                    </ul>
                </div>
                <div class="dvts">
                    <ul>
                        @if (auth()->check() && auth()->user()->role_id != 1)
                        <li><a href="{{route('dashboard')}}" class="{{Request::is('dashboard') ? 'active':''}}">My
                                Account</a></li>
                        @endif
                        @auth
                        @if(auth()->user()->role_id == 2)
                        <span
                            style="margin:-2px 5px;height: 15px;display: inline-block;width: 1px;background: black;"></span>
                        <li><a class="vendor-button" href="{{routeHelper('dashboard')}}"> Dashboard</a></li>
                        @endif
                        @endauth
                        @if(auth()->user())
                        @else
                        <li><a href="{{route('login')}}">Sign In</a></li>
                        <span
                            style="margin:-2px 5px;height: 15px;display: inline-block;width: 1px;background: black;"></span>
                        <li><a href="{{route('register')}}">Sign Up</a></li>
                        <li><a style="border: 1px solid black;padding: 3px 10px;border-radius: 10px;"
                                href="{{route('vendorJoin')}}">Seller</a></li>
                        @endif
                        <li>
                            <div id="google_translate_element" onclick="foo();"> </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="top-header header_area" style="background:#f3f3f3">
        <div class="container containe">
            <div class="mobile-menu-openar">
                <div class="bars">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
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
    @include('layouts.frontend.partials.partial-part.header_main_menu_2')

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