@extends('layouts.admin.e-commerce.app')




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
          
            <div class="col-md-12" style="margin-top: 20px">
                <div class="custmer-right ">
                <form style="background: white;border-radius: 5px;" action="{{ isset($product) ? route('admin.product.clasified.update') :route('admin.product.clasified.create') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @if(isset($product))
                    <input type="hidden" value="{{$product->id}}" name="power" id="id">
                    @endif
                    <div class="card-body row">
                        <div class="form-group col-md-12">
                            <label for="name">Title:</label>
                            <input type="text" name="title" id="title" placeholder="Write blog Title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title ?? old('title') }}" required autocomplete="off">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="form-group col-md-12">
                            <label for="location">Locaiton:</label>
                            <input type="text" name="location" id="location" placeholder="Write location" class="form-control @error('location') is-invalid @enderror" value="{{ $product->location ?? old('location') }}" required autocomplete="off">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact">Contact Number:</label>
                            <input type="tel" name="contact" id="contact" placeholder="Write contact Number" class="form-control @error('contact') is-invalid @enderror" value="{{ $product->contact ?? old('contact') }}" required autocomplete="off">
                            @error('contact')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" placeholder="Write  price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price ?? old('price') }}" required autocomplete="off">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="form-group col-md-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" rows="5" placeholder="Write product short description" class="form-control @error('description') is-invalid @enderror" required>{{ $product->description ?? old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="image">Thumbnail:</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" data-default-file="@isset($product) {{asset('/')}}/uploads/product/{{$product->thumbnail}}@enderror">
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group col-md-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($product) {{ $product->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Published</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <button class="mt-1 btn btn-primary">
                                @isset($product)
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

    </div>
</div>

@endsection
@push('js')
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            $('#image').dropify();
            $('#description').summernote();
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
          $(document).on('click', '#add', function (e) { 
                let htmlData = '<div class="input-group mt-2">';
                htmlData += '<input type="file" class="form-control" accept="image/*" name="images[]" required>';

                htmlData += '<div class="input-group-append" id="remove" style="cursor:context-menu">';
                htmlData += '<span class="input-group-text">Remove</span>';
                htmlData += '</div>';
                htmlData += '</div>';
                $('#increment').append(htmlData);
            });
 // increment
  $(document).on('click', '#remove', function(e) {
                $(this).parent().remove();
            });

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