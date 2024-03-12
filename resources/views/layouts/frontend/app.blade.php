<!DOCTYPE html><html lang="en"><head>@include('layouts.frontend.partials.meta')@include('layouts.global')@include('layouts.frontend.partials.style')@php echo setting('fb_pixel');@endphp{{-- <!-- Custom Head Code --> --}}@php echo setting('header_code');@endphp
</head>
<body{{--  class="" --}}>@php echo setting('body_code');@endphp
{{-- Facebook SDK --}}
@if (env('FACEBOOK_SKD_ON') == 1)
    <div id="fb-root"></div>
    <div id="fb-customer-chat" class="fb-customerchat"></div>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "523283677850901");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>
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
{{-- Top Header Style --}}
@if (!empty(setting('TOP_HEADER_STYLE')))
@include('layouts.frontend.partials.header_' . setting('TOP_HEADER_STYLE'))
@else
@include('layouts.frontend.partials.header_1')
@endif

@yield('content')
@include('layouts.frontend.partials.footer')
<!-- OVERRIDE CSS _@stack('override_css') --><style>@stack('override_css'){{ setting('override_css') }}</style>
@include('layouts.frontend.partials.script')
</body></html>