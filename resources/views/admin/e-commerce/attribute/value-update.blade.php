@extends('layouts.admin.e-commerce.app')

@section('title')

        Update attribute Value
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
             
                        Update attribute value
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                       
                           Update attribute value
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">
                           
                                    Update New attribute value
                            </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.attribute.value.update') }}" method="POST">
                    @csrf
                
                    <div class="card-body">
                        <input type="hidden" value="{{$value->id}}" name="att">
                        <div class="form-group">
                            <label for="name">Value Name:</label>
                            <input type="text" name="name" id="name" placeholder="Write attribute value name" class="form-control @error('name') is-invalid @enderror" value="{{ $value->name ?? old('name') }}" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                               
                                    <i class="fas fa-plus-circle"></i>
                                    Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    

</section>
<!-- /.content -->



@endsection

