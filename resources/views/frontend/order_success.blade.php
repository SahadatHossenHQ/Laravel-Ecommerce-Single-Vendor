@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="Download Product File"/>
<meta name='keywords' content="E-commerce, Best e-commerce website" />
@endpush

@section('title', 'Order List')

@section('content')

<div class="customar-dashboard">
    <div class="container py-5">
        <div class="customar-access row py-5">
            <div class="customar-menu col-md-12 py-3">
                <h1>Order Success</h1>
                <p>আপনার অর্ডারটি সফলভাবে সাবমিট করা হয়েছে। কিছুক্ষণের মধ্যে আমাদের প্রতিনিধি আপনার সাথে যোগাযোগ করবেন, ধন্যবাদ।</p>
            </div>
            <div class="col-md-12">
                <h5 class="py-2" style="line-height: 1.5">
                    Your Order ID is <span class="bg-info text-white px-1 rounded">{{ $data['order_id'] }}</span> and Invoice Number is <span class="bg-info text-white px-1 rounded">{{ $data['invoice'] }}.</span>
                </h5>
                <p><span class="py-1 px-2 bg-warning rounded">Note:</span> Please Note the order number or take a screenshot for next query</p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

    
@endpush