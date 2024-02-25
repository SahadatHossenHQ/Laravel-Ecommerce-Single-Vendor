<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSRF Token -->
<meta property='og:image:width' content='1200' />
<meta property='og:image:height' content='627' />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{config('app.name')}}">
@if (Route::currentRouteName() == 'home')
<meta property="og:image" content="{{asset('uploads/setting/'.setting('auth_logo'))}}"/>
@endif
<!--meta start-->





<!--meta end-->

@stack('meta')