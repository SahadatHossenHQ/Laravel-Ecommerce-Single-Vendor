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
               
                <form action="{{route('password.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="current_password" class="">Current Password:</label>
                            <input type="password" name="current_password" id="current_password" placeholder="Current Password" class="form-control @error('current_password') is-invalid @enderror">
                            @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password" class="">New Password:</label>
                            <input type="password" name="password" id="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password_confirmation" class="">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>
                                Change Password
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