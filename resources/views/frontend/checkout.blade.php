@auth
    @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
        @if (setting('CHECKOUT_TYPE') == 1)
            @if (isset($request))
                @include('frontend.partial.checkout.bc')
            @else
                @include('frontend.partial.checkout.c')
            @endif
        @else
            @if (isset($request))
                @include('frontend.partial.checkout.bc_minimal')
            @else
                @include('frontend.partial.checkout.c_minimal')
            @endif
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
            @if (isset($request))
                @include('frontend.partial.checkout.bc_guest')
            @else
                @include('frontend.partial.checkout.c_guest')
            @endif
        @else
            @if (isset($request))
                @include('frontend.partial.checkout.bc_minimal')
            @else
                @include('frontend.partial.checkout.c_minimal')
            @endif
        @endif
    @endif
@endauth