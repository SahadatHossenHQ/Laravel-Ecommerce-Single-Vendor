@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($campaing)
        Edit campaing 
    @else 
        Add campaing
    @endisset
@endsection

@push('css')
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                    @isset($campaing)
                        Edit campaing 
                    @else 
                        Add campaing
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($campaing)
                            Edit campaing 
                        @else 
                            Add campaing
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
                                @isset($campaing)
                                    Edit campaing Details
                                @else 
                                    Add New Campaign
                                @endisset
                            </h3>
                        </div>
                       
                    </div>
                </div>
                <form action="{{ isset($campaing) ? route('admin.campaing.update') :route('admin.campaing.store') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Write campaing name" class="form-control @error('name') is-invalid @enderror" value="{{ $campaing->name ?? old('name') }}" required autocomplete="off">
                            <input type="hidden" name="camid" value="{{ $campaing->id ?? '' }}"" id="camid">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="cover_photo">Cover Photo:</label>
                            <input type="file" name="cover_photo" id="cover_photo" accept="image/*" class="form-control @error('cover_photo') is-invalid @enderror" data-default-file="@isset($campaing) {{asset('/')}}/uploads/campaign/{{$campaing->cover_photo}}@enderror">
                            @error('cover_photo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($campaing) {{ $campaing->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="flash" id="flash" @isset ($campaing) {{ $campaing->is_flash ? 'checked':'' }}   @endisset>
                                <label class="custom-control-label" for="flash">flash Sell</label>
                            </div>
                            @error('flash')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="flas_end">
                             <?php if(isset($campaing)){?>
                            @if($campaing->is_flash==1)
                            <label for="flash_end">Flash end:</label><input type="datetime-local" name="flash_end" id="flash_end"  class="form-control " value="{{$campaing->end}}" >'
                            @endif
                        <?php }?>
                            @error('end')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <?php if(isset($campaing)){?>
                        <div class="form-group">
                            <label for="product">Select Product:</label>
                            <select name="products[]" id="product" multiple data-placeholder="Select Product" class="form-control select2 @error('products') is-invalid @enderror" {{isset($campaing) ? '':'required' }} data-selected-text-format="count">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option  
                                        <?php if(isset($campaing)){?>
                                        @foreach($campaing->campaing_products as $cproduct) 
                                            @if($cproduct->cam_products->id==$product->id) selected disabled @endif
                                        @endforeach 
                                        <?php }?>
                                    value="{{$product->id}}"> {{$product->title}} </option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <style>
                            .cprice{
                                border: 1px solid gainsboro;padding: 8px;border-radius: 10px;
                            }
                        </style>
                        <div class="form-group" >
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Cover Photo</th>
                                        <th>Name</th>
                                        <th>Regular Price</th>
                                        <th>Campaing Price</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="discount_table">
                                    <a href=""></a>
                                    @isset($campaing)
                                <?php 
                                    foreach($campaing->campaing_products as $product){
                                        echo ' <tr>
                                             <input type="hidden" name="adds[]" value="'.$product->cam_products->id.'">
                                                <td> <img src="'. asset('uploads/product/'.$product->cam_products->image) .'" alt="Product Image" style="height: 100px;width: 100px;">  </td>
                                                <td>'.$product->cam_products->title.'</td>
                                                <td>'.$product->cam_products->regular_price.'</td>
                                                <td> <input class="cprice" value="'.$product->price.'" type="number" name="prices[]" id="">  <a href="'.route('admin.campaing.remove',['id'=>$product->id]).'">Remove</a></td>
                                            </tr>'; 
                                    } ?>
                                    @endisset
                                </tbody>
                                
                            </table>
                        </div>
                      <?php }?>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                @isset($campaing)
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
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script>
        $(function () {
            $('#cover_photo').dropify();
            $('.select2').select2();
        });
       
    </script>
       <script type="text/javascript">
        $(document).ready(function(){
            $('#product').on('change', function(){
                var product_ids = $('#product').val();
                var campaign_id = $('#camid').val();
                if(product_ids.length > 0){
                    $.post('{{ route('admin.campaing.getData') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids,campaign_id:campaign_id}, function(response){
                                $('#discount_table').append(response);
                    });
                } else{
                    $('#discount_table').append(null);
                }
            });
        });
        $('#flash').on('click',function(){
            var flas = document.getElementById('flash');
        var flas_end = document.getElementById('flas_end');
         if (flas.checked == true){
            flas_end.innerHTML  = '<label for="flash_end">Flash end:</label><input type="datetime-local" name="flash_end" id="flash_end"  class="form-control "  >';
          } else {
             flas_end.innerHTML  = "";
          }
        })
        
    </script>
@endpush