@extends('layouts.frontend.app')


@section('title', 'Password Change')

@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
                  @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9">
                <div class="card" style="background:transparent;" style="padding: 20px;margin-top: 20px;">
                   <section class="content">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card" style="background:transparent;">
              <span class="btn-success p-2 text-center"> Point Rate is {{setting('Point_rate')}} {{ setting('CURRENCY_CODE') }}</span>
               <span class="btn-primary p-2 text-center">You have {{auth()->user()->point}} point</span>
                <form action="{{route('redem.convert')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary " style="width:100%">
                                <i class="fas fa-arrow-circle-up"></i>
                                Convert Now
                            </button>
                        </div>
                    </div>
                   
                </form>
                
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Default box -->

</section>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush