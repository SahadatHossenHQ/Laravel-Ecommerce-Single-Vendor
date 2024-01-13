<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.frontend.partials.meta')
    @if(Request::route()->getName()=='home')
    <title>{{config('app.name')}}</title>
    @else
    <title>@yield('title') || {{config('app.name')}} </title>
    @endif
    @include('layouts.frontend.partials.style')
    {{-- <meta name="keywords"content="Ecommerce System, Single Vendor Ecommerce, Multivendor Ecommerce, laravel ecommerce system, online shop, daraz online shopping, ecomemrce website, ecomemrce theme, ecomemrce php script, finvasoft, finva soft ltd, software company, ">
    <meta name="author" content="Lems- a product of Finva Soft Ltd."> --}}
</head>
<body class="">
    <div id="fb-root"></div>

    {{-- <!-- Your Chat Plugin code --> --}}
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    @if (env('FACEBOOK_SKD_ON') == 1)        
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "523283677850901");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    {{-- <!-- Your SDK code --> --}}
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v13.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <style>
        .fb_dialog_content iframe {
            bottom: 105px !important;
        }
    </style>
    @endif
    {{-- <!--================header  Area start=================--> --}}
    @include('layouts.frontend.partials.header')
    @yield('content')
    @include('layouts.frontend.partials.footer')
    @include('layouts.frontend.partials.script')
</body>

</html>