@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="Download Product File"/>
<meta name='keywords' content="E-commerce, Best e-commerce website" />
@endpush

@section('title', 'Order List')

@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-12 py-3">
                <h1>Order Success</h1>
            </div>
            <div class="col-md-12">
                <h4 class="py-2">
                    Your order number is <span class="bg-info text-white p-1">{{ $data['invoice'] }}</span>
                </h4>
                <span class="py-2 px-2 bg-warning">Note: the order number or take a screenshot for next query</span>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

    
@endpush