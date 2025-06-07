@extends('layouts.vendor.app')

@section('title', 'Withdraw')

@push('css')
    
@endpush

@section('content')



<!-- Main content -->
<section class="content">
<br>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card" style="background:transparent;">
                <div class="card-header row">
                	<div class="col-sm-6">
                    		<h3 class="card-title">Withdraw</h3>
                    </div>
        			


                   
                <div class="col-sm-6 text-right">
                    <a href="{{route('vendor.withdraw.list')}}" class="btn btn-primary">History</a>
                </div>
                </div>
                
                <form action="{{ route('vendor.withdraw.create') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="amount" class="">Withdraw Amount:</label>
                            <input type="number" name="amount" id="amount" placeholder=" amount" class="form-control @error('amount') is-invalid @enderror">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        				<div class="form-group col-md-6">
                            <label for="method">Select Type:</label>
                            <select name="method"  class="form-control @error('method') is-invalid @enderror" required>
                                <option value="1">Bkash</option>
                                <option value="2">Nagad</option>
                                <option value="3">Rocket</option>
                                <option value="4">Bank</option>
                            </select>
                            @error('method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </form>
                
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Default box -->

</section>
<!-- /.content -->

@endsection

@push('js')
    
@endpush