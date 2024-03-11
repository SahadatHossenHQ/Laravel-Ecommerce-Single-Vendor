<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
@if(!empty(trim($__env->yieldContent('title'))))<title>@yield('title') || {{ config('app.name') }}</title>@else<title>{{ config('app.name') }}</title>@endif
<meta property='og:image:width' content='1200' />
<meta property='og:image:height' content='627' />
<meta name="author" content="{{config('app.name')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@if (Route::currentRouteName() == 'home')
<meta property="og:image" content="{{asset('uploads/setting/'.setting('auth_logo'))}}"/>
@endif
@stack('meta')