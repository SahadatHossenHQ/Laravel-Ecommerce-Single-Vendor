@extends('layouts.admin.e-commerce.app')

@section('title', 'Ticket List')
@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
    <link type="text/css" rel="stylesheet" href="/assets/plugins/file-uploader/image-uploader.min.css">
  
@endpush


@section('content')

<!-- Main content -->
<section class="content">
    @isset($page)
    <form action="{{ route('admin.page.update')}}" method="POST">
        <input type="hidden" value="{{$page->id}}" name="id">
    @else
<form action="{{ route('admin.page.make')}}" method="POST">
    @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input value="{{ $page->name ?? old('name') }}" type="text" name="name"  class="form-control" value="" >
                        </div>
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input value="{{ $page->title ?? old('title') }}" type="text" name="title"  class="form-control" value="" >
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="body"id="full_description"  cols="5" placeholder="Write size description" class="form-control" >{{ $page->body ?? old('body') }}</textarea>
                        </div> 
                        <div class="form-group">
                            <label for="description">Position:</label>
                            <select class="form-control" name="position" id="">
                                <option  @isset($page) {{ $page->position==0 ? 'selected':''  }} @endisset value="0">Nav</option>
                                <option  @isset($page){{  $page->position==1 ? 'selected':''  }} @endisset value="1">bottom</option>
                                 <option  @isset($page){{  $page->position==2 ? 'selected':''  }} @endisset value="2">Both</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="description">Status:</label>
                            <select class="form-control" name="status" id="">
                                <option  @isset($page){{  $page->status==0 ? 'selected':''  }} @endisset value="1">Active</option>
                                <option  @isset($page) {{ $page->status==1 ? 'selected':'' }}  @endisset value="0">Deactive</option>
                            </select>
                        </div> 
                        
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Create
                            </button>
                        </div>
                    </div>
                </form>
    

</section>
<!-- /.content -->

@endsection

@push('js')
    <!-- Select2 -->
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    
    <script type="text/javascript" src="/assets/plugins/file-uploader/image-uploader.min.js"></script>

    
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.dropify').dropify();
            $('#full_description').summernote();
            // $('.input-images-1').imageUploader();

        });
    </script>
 
@endpush
