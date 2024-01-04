<form method="POST" id="ncategoryButton" class="card-body nc" action="{{route('admin.ncat')}}">
    @csrf
    <div id="cnm"></div>
    <div class="form-group">
        <label for="ncateg">Category name:</label>
        <input type="text" name="ncateg" id="ncateg"  class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary mt-2">
        <i class="fas fa-arrow-circle-up"></i>    
        Create
    </button>
</form>
<form method="POST" id="ncategoryButton2" class="card-body nc" action="{{route('admin.nscat')}}">
    @csrf
    <h5><b>Sub Category</b></h5>
    <div id="cnm2"></div>

    <div class="form-group">
         <label for="">Category name:</label>
        <select name="main"  class="category form-control" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
     <div class="form-group">
        <label for="ncateg2">SUb Category name:</label>
        <input type="text" name="ncateg" id="ncateg2"  class="form-control" >
    </div>

    <button type="submit" class="btn btn-primary mt-2">
        <i class="fas fa-arrow-circle-up"></i>    
        Create
    </button>
</form>

<form method="POST" id="nMiniButton" class="card-body nc" action="{{route('admin.nmcat')}}">
    @csrf
    <h5><b>Mini Category</b></h5>
    <div id="cnm6"></div>

    <div class="form-group">
         <label for="">Category name:</label>
        <select name="main" id="mainCategory"  class="category form-control" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="nsubc">Select Sub Category:</label>
        <select name="nsubc" id="nsubc" class="sub_category form-control">
           
        </select>
    </div>

     <div class="form-group">
        <label for="miniCat">Mini Category name:</label>
        <input type="text" name="miniCat" id="miniCat"  class="form-control" >
    </div>

    <button type="submit" class="btn btn-primary mt-2">
        <i class="fas fa-arrow-circle-up"></i>    
        Create
    </button>
</form>

<form method="POST" id="ncolorButton" class="card-body nc" action="{{route('admin.ncolor')}}">
    @csrf
    <div id="cnm3"></div>
   
    <div class="form-group">
        <label for="ncolor">Choice Color:</label>
        <input type="text" name="ncolor" id="ncolor" class="form-control " placeholder="Choice color to color picker" required autocomplete="off">
                          
    </div>

    <button type="submit" class="btn btn-primary mt-2">
        <i class="fas fa-arrow-circle-up"></i>    
        Create
    </button>
</form>
<form method="POST" id="nTagButton" class="card-body nc" action="{{route('admin.ntag')}}">
    @csrf
    <div id="cnm4"></div>
   
    <div class="form-group">
        <label for="ntag">Tag</label>
        <input type="text" name="ntag" id="ntag" class="form-control " required autocomplete="off">
                          
    </div>

    <button type="submit" class="btn btn-primary mt-2">
        <i class="fas fa-arrow-circle-up"></i>    
        Create
    </button>
</form>



