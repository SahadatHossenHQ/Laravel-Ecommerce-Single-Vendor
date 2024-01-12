@extends('layouts.frontend.app')


@section('title', 'Account')
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
        .note-editor.note-frame {
  border: 1px solid rgba(0,0,0,.2) !important;
}
   </style>
@endpush
@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
                  @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9" style="margin-top: 20px">
                <div class="custmer-right ">
                <form style="background: white;border-radius: 5px;" action="{{ isset($eblog) ? route('update_exit_blog') :route('create_blog') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @if(isset($eblog))
                    <input type="hidden" value="{{$eblog->id}}" name="power" id="">
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" name="title" id="title" placeholder="Write blog Title" class="form-control @error('name') is-invalid @enderror" value="{{ $eblog->title ?? old('name') }}" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail:</label>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control @error('thumbnail') is-invalid @enderror" data-default-file="@isset($eblog) {{asset('/')}}/uploads/blogs/{{$eblog->thumbnail}}@enderror">
                            @error('thumbnail')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category </label>
                            <select name="category" class="form-control">
                                <option>Select One</option>
                                @foreach($categories as $category)
                                    <option @if(isset($eblog)){{$eblog->category_id==$category->id ? 'selected':''}}@endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="descripiton">Description:</label>
                            <textarea name="descripiton" id="descripiton" rows="5" placeholder="Write product short description" class="form-control @error('descripiton') is-invalid @enderror" required>{{ $eblog->description ?? old('descripiton') }}</textarea>
                            @error('descripiton')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($eblog) {{ $eblog->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                @isset($eblog)
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
            </div>
        </div>
        <br>
        <div class="row"  style="background: white;border-radius: 5px;" >
            <div class="col-md-12 customar-menu">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->title}}</td>
                            <td>
                                @if($data->status==1)
                                <span class="btn-success" style="padding: 5px;border-radius: 5px;font-size: 14px;">Active</span>
                                @else
                                <span class="btn-danger" style="padding: 5px;border-radius: 5px;font-size: 14px;">Dective</span>
                                @endif
                            </td>
                           
                            <td>
                                @if ($data->status)
                                <a href="{{route('blog.status',['blog'=>$data->id])}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-thumbs-up"></i>
                                </a>
                                @else
                                <a href="{{route('blog.status',['blog'=>$data->id])}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                @endif
                                <a href="{{route('blog_edit',['blog'=>$data->id])}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a href="javascript:void(0)" data-id="{{$data->id}}" id="deleteData" class="btn btn-danger btn-sm"">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </a>
                                <form id="delete-data-form-{{$data->id}}" action="{{route('blog_delete',['blog'=>$data->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            $('#thumbnail').dropify();
            $('#descripiton').summernote();
        });
       
    </script>
@endpush
@push('js')
    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () { 
            $("#example1").DataTable();
        })
    </script>
      <script>
            $(document).on('click', '#deleteData', function(e) {
                let id = $(this).data('id');
                e.preventDefault();
                let conf = confirm('Are you sure delete this data!!');
                if (conf) {
                    
                    document.getElementById('delete-data-form-'+id).submit();
                }
                
            })
        </script>
@endpush