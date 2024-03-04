@auth
    @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
        @if (setting('CHECKOUT_TYPE') == 1)
            @include('frontend.partial.checkout.c')
        @else
            @include('frontend.partial.checkout.c_minimal')
        @endif
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
        @if (setting('CHECKOUT_TYPE') == 1)
            @include('frontend.partial.checkout.c_guest')
        @else
            @include('frontend.partial.checkout.c_minimal')
        @endif
    @endif
@endauth

