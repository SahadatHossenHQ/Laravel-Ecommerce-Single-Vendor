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
            <div class="customar-menu col-md-3">
                @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9">
                <table style="margin-top: 20px;background: white;" class="timetable_sub">
                    <thead>
                        <tr>
                            <th>Order NO.</th>
                            <th>Product</th>
                            <th>Download Remaining</th>
                            <th>Expires</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            @if ($item->product->download_able)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        <img src="{{asset('uploads/product/'.$item->product->image)}}" alt="Product Image" width="70px">    
                                    </td>
                                    @php
                                        $total_download = DB::table('download_user_products')
                                                        ->where('user_id', auth()->id())
                                                        ->where('product_id', $item->product->id)
                                                        ->count();
                                        $download_remaining = ($item->product->downloads->count() * $item->product->download_limit) - $total_download;
                                    @endphp
                                    <td>{{$item->product->downloads->count() > 0 ? $download_remaining:0}}</td>
                                    <td>{{date('d/m/Y', strtotime($item->product->download_expire))}}</td>
                                    <td>
                                        @foreach ($item->product->downloads as $key => $download)
                                            <a href="{{route('download.product', ['pro_id' =>$item->product->id, 'id' => $download->id])}}">Link {{$key+1}}</a>
                                        @endforeach
                                    </td>
                                </tr>  
                            @endif
                        @endforeach
                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    $(document).ready(function () {
        $(document).on('click', '#download', function(e) {
            e.preventDefault();
            
            let url = $(this).attr('href');
            $.ajax({
                type: 'GET',
                url: url,
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                }
            });
        });
    });
</script>
    
@endpush