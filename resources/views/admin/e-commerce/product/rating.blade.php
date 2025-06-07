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
                <form action="{{ route('admin.rating.update')  }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    <input type="hidden" value="{{$rating->id}}" name="id">
                    <div class="card-body">
                        <style>
                            .rating label{
                                margin-right:15px;
                            }
                        </style>
                       <h4>Give Rating</h4>
                                <div class="rating"> 
                                    <input @if($rating->rating==5)checked @endif type="radio" name="rating" value="5" id="5">
                                    <label for="5">5☆</label> 
                                    <input @if($rating->rating==4)checked @endif type="radio" name="rating" value="4" id="4">
                                    <label for="4">4☆</label> 
                                    <input @if($rating->rating==3)checked @endif type="radio" name="rating" value="3" id="3">
                                    <label for="3">3☆</label> 
                                    <input @if($rating->rating==2)checked @endif type="radio" name="rating" value="2" id="2">
                                    <label for="2">2☆</label> 
                                    <input @if($rating->rating==1)checked @endif type="radio" name="rating" value="1" id="1">
                                    <label for="1">1☆</label> 
                                </div>

                                <div class="comment-area"> 
                                    <textarea required class="form-control" name="review" placeholder="what is your view?">{{$rating->body}}</textarea> 
                                    @error('review')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                
                                 <h6 style="border: 1px solid gainsboro;padding: 5px;border-radius: 5px;"> <button style="width: 100%;text-align:left;" type="button" data-toggle="collapse" data-target="#BookOpen" aria-expanded="false" aria-controls="BookOpen">Upload More Img:<i style="float: right;top: 8px;position: relative;" class="fas fa-arrow-down"></i> </button></h6>
                                 <style type="text/css">
                                     #BookOpen .form-group {
                                        width: 100%;
border: 1px solid gainsboro;
padding: 10px;
border-radius: 5px;
                                     }
                                 </style>
                                 <div class="form-row col-md-12 spec collapse" id="BookOpen" style="background: #dcdcdc3d;border-radius: 5px;padding: 10p;">
                                     <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report">
                                    <a target="_blank" href="{{asset('/')}}uploads/review/{{$rating->file}}">
                                                <img style="width:80px;height:auto;border:2px solid black" src="{{asset('/')}}uploads/review/{{$rating->file}}">
                                            </a>
                                </div>
                                <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report2">
                                      <a target="_blank" href="{{asset('/')}}uploads/review/{{$rating->file2}}">
                                                <img style="width:80px;height:auto;border:2px solid black" src="{{asset('/')}}uploads/review/{{$rating->file2}}">
                                            </a>
                                </div>
                                <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report3">
                                      <a target="_blank" href="{{asset('/')}}uploads/review/{{$rating->file3}}">
                                                <img style="width:80px;height:auto;border:2px solid black" src="{{asset('/')}}uploads/review/{{$rating->file3}}">
                                            </a>
                                </div>
                                 <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report4">
                                      <a target="_blank" href="{{asset('/')}}uploads/review/{{$rating->file4}}">
                                                <img style="width:80px;height:auto;border:2px solid black" src="{{asset('/')}}uploads/review/{{$rating->file4}}">
                                            </a>
                                </div>
                                <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report5">
                                      <a target="_blank" href="{{asset('/')}}uploads/review/{{$rating->file5}}">
                                                <img style="width:80px;height:auto;border:2px solid black" src="{{asset('/')}}uploads/review/{{$rating->file5}}">
                                            </a>
                                </div>
                                </div>
                       
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                
                                    <i class="fas fa-arrow-circle-up"></i>
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