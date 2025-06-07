@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($blog)
        Edit blog 
    @else 
        Add blog
    @endisset
@endsection

@push('css')
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            display:none !important
        }
   </style>
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($blog)
                        Edit blog 
                    @else 
                        Add blog
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($blog)
                            Edit blog 
                        @else 
                            Add blog
                        @endisset
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="card" style="background:transparent;">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">
                                @isset($blog)
                                    Edit blog Details
                                @else 
                                    Add New Campaign
                                @endisset
                            </h3>
                        </div>
                       
                    </div>
                </div>
                <form action="{{ isset($blog) ? route('admin.update_exit_blog') :route('admin.create_blog') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @if(isset($blog))
                    <input type="hidden" value="{{$blog->id}}" name="power" id="">
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" name="title" id="title" placeholder="Write blog Title" class="form-control @error('name') is-invalid @enderror" value="{{ $blog->title ?? old('name') }}" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail:</label>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control @error('thumbnail') is-invalid @enderror" data-default-file="@isset($blog) {{asset('/')}}/uploads/blogs/{{$blog->thumbnail}}@enderror">
                            @error('thumbnail')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category </label>
                            <select name="category" class="form-control">
                                <option>Select One</option>
                                @foreach($categories as $category)
                                    <option @if(isset($blog)){{$blog->category_id==$category->id ? 'selected':''}}@endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="descripiton">Description:</label>
                            <textarea name="descripiton" id="descripiton" rows="5" placeholder="Write product short description" class="form-control @error('descripiton') is-invalid @enderror" required>{{ $blog->description ?? old('descripiton') }}</textarea>
                            @error('descripiton')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($blog) {{ $blog->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                @isset($blog)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                @else
                                    <i class="fas fa-plus-circle"></i>
                                    Submit
                                @endisset
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

@push('js')
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            $('#thumbnail').dropify();
            $('#descripiton').summernote();
        });
       
    </script>
@endpush