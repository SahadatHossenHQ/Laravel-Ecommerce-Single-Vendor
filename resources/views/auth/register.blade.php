@extends('layouts.frontend.app')
@section('title', 'Shopping Now')

@section('content')
    @if (setting('regVerify') == "sms")
        @include('auth.partial.regsms')
    @else
        @include('auth.partial.regemail')
    @endif
@endsection

@push('css')
<style>
    form .form2 {
        box-shadow: 0px 0px 5px gainsboro;
        padding: 20px;
        border-radius: 5px;
    }

    ul.cc li {
        display: inline-block;
        text-align: center;
        background: var(--primary_color);
        padding: 7px;
    }

    ul.cc li a {
        color: white;
        display: block;
    }

    ul.cc {
        padding: 0;
        margin: 0;
    }

    span.select2.select2-container {
        width: 100% !important
    }

    .login-box,
    .register-box {
        width: 450px !important;
    }

    @media (max-width: 576px) {

        .login-box,
        .register-box {
            margin-top: .5rem;
            width: 90% !important;
        }
    }
</style>
@endpush