<style>
    .fixed-cart {
        width: 50px;
        text-align: center;
        background: #fdad04;
        color: white;
        display: block;
        height: 50px;
        border-radius: 5px;
        position: fixed;
        bottom: 100px;
        right: 30px;
        line-height: 17px;
        z-index: 999;
    }

    .footer-item .title,
    .footer-item .title span {
        background: transparent;
        color: black;
        margin: 0 !important;
        padding: 0 !important;
    }
</style>

@if (setting('FLOAT_LIVE_CHAT') != 1 || setting('FLOAT_LIVE_CHAT') == "")
    @if(!empty(setting('whatsapp')))
    <li class="fixed_what"><a href="https://wa.me/{{setting('whatsapp')}}"
            style="color:var(--primary_bg_color_text);background:var(--primary_color);border-radius: 50%;width: 45px;display: block;height: 45px;text-align: center;line-height: 45px;font-size: 25px;position: fixed;right: 10px;bottom: 80px;z-index: 999999;box-shadow: 0px 0px 10px gainsboro;"><i
                class="icofont icofont-social-whatsapp"></i></a></li>
    @endif
@else
<li class="fixed_what"><a href="{{ url('/connection/live-chat') }}"
    style="color:var(--primary_bg_color_text);background:var(--primary_color);border-radius: 50%;width: 45px;display: block;height: 45px;text-align: center;line-height: 45px;font-size: 25px;position: fixed;right: 10px;bottom: 80px;z-index: 999999;box-shadow: 0px 0px 10px gainsboro;"><i
        class="fal fa-headset"></i></a></li>
@endif


<li class="fixed-cart d-none"><a href="{{route('cart')}}"><span style="padding-top: 7px;display:block"><i
                class="fas fa-shopping-bag" aria-hidden="true"></i></span> x {{Cart::count()}} </a></li>
<div class="footer-menu">
    <div class="container">
        <ul>
            <li><a href="{{route('home')}}"><span><i class="fas fa-home" aria-hidden="true"></i></span> Home</a></li>
            <li><a href="{{route('cart')}}"><span><i class="fas fa-shopping-bag" aria-hidden="true"></i></span> Cart</a>
                <sup style="top: -50px;left: 15px;"> (<span id="total-cart-{{-- amount --}}">{{Cart::count()}}</span>)</sup></li>

            <!-- <li><a href="{{route('cart')}}"><img src="https://t4.ftcdn.net/jpg/01/36/29/27/240_F_136292799_kapdXE2Vhrk0ndKsZk8nyEvg3VwBuwwU.jpg" alt=""></a></li> -->
            <li class="mobile-menu-openar"><a href="#" class="bars"><span><i class="fas fa-bars"
                            aria-hidden="true"></i></span> Category</a></li>

            @guest
            <li><a href="{{route('login')}}"><span><i class="fas fa-user" aria-hidden="true"></i></span> Login</a></li>
            @else

            @if (auth()->check() && auth()->user()->role_id != 1)

            <li><a href="{{route('dashboard')}}"><span><i class="fas fa-user" aria-hidden="true"></i></span> My
                    Account</a></li>
            @endif

            @if (auth()->check() && auth()->user()->role_id == 1)
            <li><a href="{{route('admin.dashboard')}}"><span><i class="fas fa-user" aria-hidden="true"></i></span>
                    Dash</a></li>
            @endif



            @endguest



        </ul>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="footer-item  col-lg-3 col-md-3 col-sm-12">
                <li id="nav_menu-2" class="widget widget_nav_menu"> 
                    <div style="margin-bottom: 20px;" class="apps footer-logo">
                    <a href="{{route('home')}}">
                    <img src="{{asset('uploads/setting/'.setting('logo'))}}" alt="Application Logo" style="width: 150px">
                </a>
                </div>
                    <div class="item-content ic2">
                        <div class="menu-main-container">
                            <ul id="menu-main-18" class="menu">
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76">
                                    {{setting('footer_description')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </li>
            </div>
            <div class="footer-item  col-lg-3 col-md-3 col-sm-12">
                <li id="nav_menu-2" class="widget widget_nav_menu">
                    <div class="title t1">
                        <span>Info</span>
                        <span class="footer-sub-icon"><i class="icofont icofont-simple-right"></i></span>
                    </div>
                    <div class="item-content ic1">
                        <div class="menu-main-container">
                            <ul id="menu-main-18" class="menu">
                                @foreach($footerPages as $page)
                                <li><a href="{{route('page',['slug'=>$page->name])}}"> {{$page->name}}</a></li>
                                @endforeach
                                @foreach(App\Models\Page::where('position',2)->where('status',1)->get() as $page)
                                <li><a href="{{route('page',['slug'=>$page->name])}}"> {{$page->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </li>
            </div>
            <style>
                .fixed_what {
                    position: absolute;
                    list-style: none;
                }

                @media(max-width:767px) {
                    .item-content {
                        display: none;
                    }
                }
            </style>
            <div class="footer-item  col-lg-3 col-md-3 col-sm-12">
                <li id="nav_menu-2" class="widget widget_nav_menu">
                    <div class="title t3">
                        <span>Menu</span>
                        <span class="footer-sub-icon"><i class="icofont icofont-simple-right"></i></span>
                    </div>
                    <div class="item-content ic3">
                        <div class="menu-main-container">
                            <ul id="menu-main-18" class="menu">
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a
                                        href="{{route('cart')}}"> Cart</a></li>
                                @auth
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a
                                        href="{{route('account')}}"> Account</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a
                                        href="{{route('order')}}"> Order</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a
                                        href="{{route('checkout')}}"> Checkout</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76">
                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a
                                        href="{{route('login')}}"> Login</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a
                                        href="{{route('register')}}"> Registration</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a
                                        href="{{route('vendorJoin')}}"> Vendor Register</a></li>
                                @endauth

                            </ul>
                        </div>
                    </div>
                </li>
            </div>


            <div class="footer-item  col-lg-3 col-md-3 col-sm-12">
                <li id="nav_menu-2" class="widget widget_nav_menu">
                    <div class="title t2">
                        <span>Conatct US</span>
                        <span class="footer-sub-icon"><i class="icofont icofont-simple-right"></i></span>
                    </div>
                    <div class="item-content ic2">
                        <div class="menu-main-container">
                            <ul style="opacity: 0.8;" id="menu-main-18" class="menu">
                                <li style="line-height: 22px;">{{setting('SITE_INFO_ADDRESS')}}</li>
                                <li>Email: {{setting('SITE_INFO_SUPPORT_MAIL')}}</li>
                                <li>Contact No: {{setting('SITE_INFO_PHONE')}}</li>
                                <li><a style="font-weight: 700;border-radius: 5px;padding: 5px 15px;display: inline-block;background: var(--primary_color);color:var(--primary_bg_color_text);font-size: 16px;"
                                        href="{{route('connection.live.chat')}}"
                                        class="{{Request::is('connection') ? 'active':''}}"> Live Chat</a></li>
                            </ul>
                        </div>
                    </div>

                </li>
            {{-- </div>
            <div class="footer-item  col-lg-3 col-md-3 col-sm-12"> --}}
                <style>
                    #nav_menu-2 .aroow2 {
                        display: none;
                    }
                </style>
                <li id="nav_menu-2" class="widget widget_nav_menu pt-3">
                    <div class="title t4">
                        <span>Get In Touch</span>
                        <span class="footer-sub-icon"><i class="icofont icofont-simple-right"></i></span>
                    </div>

                    <ul style="margin-top: 0;" class="item-content  ic4">
                        @if(!empty(setting('facebook')))
                        <li class="s-l-i-3"><a href="{{setting('facebook')}}"><i style="background:#3b5997 ;"
                                    class="icofont icofont-social-facebook"></i></a></li>
                        @endif
                        @if(!empty(setting('instagram')))
                        <li class="s-l-i-3"><a href="{{setting('instagram')}}"><i style="background:#e24667 ;"
                                    class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(!empty(setting('messanger')))
                        <li class="s-l-i-3"><a href="{{setting('messanger')}}"><i style="background:#3b5997 ;"
                                    class="fab fa-facebook-messenger"></i></a></li>
                        @endif
                        @if(!empty(setting('youtube')))
                        <li class="s-l-i-3"><a href="{{setting('youtube')}}"><i style="background:#ff0000 ;"
                                    class="icofont icofont-youtube-play"></i></a></li>
                        @endif

                        @if(!empty(setting('whatsapp')))
                        <li class="s-l-i-3"><a href="https://wa.me/{{setting('whatsapp')}}"><i style="background:#439665 ;"
                                    class="icofont icofont-social-whatsapp"></i></a></li>
                        @endif
                        @if(!empty(setting('twitter')))
                        <li class="s-l-i-3"><a href="{{setting('twitter')}}"><i style="background:#21a1f0 ;"
                                    class="icofont icofont-social-twitter"></i></a></li>
                        @endif
                        @if(!empty(setting('linkedin')))
                        <li class="s-l-i-3"><a href="{{setting('linkedin')}}"><i style="background:#21a1f0 ;"
                                    class="icofont icofont-social-linkedin"></i></a></li>
                        @endif
                    </ul>
                    @if(setting('android_app'))
                    <div class="platform item-content  ic4" style="margin-top: 20px;">
                        <div class="title t1" style="margin-bottom: 8px !important">
                            <span>Download Now!</span>
                        </div>
                        <ul style="margin-top: 0;">
                            <li class="s-l-i-3"><a style="opacity: 1;"
                                    href="https://drive.google.com/file/d/16neRUFZf20QHgGXxtjFZdGAqU3kxr492/view?usp=drivesdk"><img
                                        style="width:165px;border-radius: 5px;border: 1px solid gainsboro;"
                                        src="{{asset('/')}}/assets/uploads/images/google-play-png-logo-3799.png"
                                        alt=""></a></li>
                        </ul>
                    </div>
                    @endif
                </li>
                @php
                    echo setting('FOOTER_COL_4_HTML');
                @endphp
            </div>
        </div>

    </div>
    <br>
    <div class="copy " style="background: var(--primary_color);padding: 10px;text-align: center;">
        <div class="container">
            <div class="copy-rihgt-1 row">
                <p class="col-md-12" style="margin: 0 0px;color: white;">{{setting('copy_right_text')}}</p>
            </div>
        </div>
    </div>
</footer>

<style>
    .body {
        background-color: green !important;
        background: green !important;
    }
</style>