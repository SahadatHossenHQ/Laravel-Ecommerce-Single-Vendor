@auth
    @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 2)
        @include('frontend.partial.checkout.c_guest')
    @else
        @php
            header("refresh:0;url=" . route('login'));
            exit;
        @endphp
    @endif

@else
    @if (setting('GUEST_CHECKOUT') == 0)
        @php
            header("refresh:0;url=" . route('login'));
            exit;
        @endphp
    @else
        @include('frontend.partial.checkout.c_guest')
    @endif
@endauth