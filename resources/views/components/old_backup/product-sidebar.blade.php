<div class="fab-container">
    <button type="button" class="fab-main btn btn-primary btn-lg rounded-circle" id="fabMain">
        <i class="fas fa-plus"></i>
    </button>
    <div class="fab-buttons d-none">
        <button type="button" class="btn btn-primary btn-lg fab-button" data-toggle="modal" data-target="#mainCategoryModal">
            <i class="fas fa-plus-circle pr-2"></i> Add Main Category
        </button>
        <button type="button" class="btn btn-primary btn-lg fab-button" data-toggle="modal" data-target="#subCategoryModal">
            <i class="fas fa-plus-circle pr-2"></i> Add Sub Category
        </button>
        <button type="button" class="btn btn-primary btn-lg fab-button" data-toggle="modal" data-target="#miniCategoryModal">
            <i class="fas fa-plus-circle pr-2"></i> Add Mini Category
        </button>
        <button type="button" class="btn btn-primary btn-lg fab-button" data-toggle="modal" data-target="#colorModal">
            <i class="fas fa-plus-circle pr-2"></i> Add Color
        </button>
        <button type="button" class="btn btn-primary btn-lg fab-button" data-toggle="modal" data-target="#tagModal">
            <i class="fas fa-plus-circle pr-2"></i> Add Tag
        </button>
    </div>
</div>

<style>
.fab-container {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    z-index: 999;
}

.fab-main {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
}

.fab-main.active {
    transform: rotate(45deg);
}

.fab-buttons {
    position: absolute;
    bottom: 70px;
    right: 0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    transition: opacity 0.3s ease;
}

.fab-button {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
    white-space: nowrap;
}

.fab-buttons.show .fab-button {
    opacity: 1;
    transform: translateY(0);
}

.fab-buttons.show .fab-button:nth-child(1) { transition-delay: 0s; }
.fab-buttons.show .fab-button:nth-child(2) { transition-delay: 0.1s; }
.fab-buttons.show .fab-button:nth-child(3) { transition-delay: 0.2s; }
.fab-buttons.show .fab-button:nth-child(4) { transition-delay: 0.3s; }
.fab-buttons.show .fab-button:nth-child(5) { transition-delay: 0.4s; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fabMain = document.getElementById('fabMain');
    const fabButtons = document.querySelector('.fab-buttons');

    fabMain.addEventListener('click', function() {
        fabMain.classList.toggle('active');
        fabButtons.classList.toggle('d-none');
        setTimeout(() => {
            fabButtons.classList.toggle('show');
        }, 10);
    });
});
</script>

<!-- Main Category Modal -->
<div class="modal fade" id="mainCategoryModal" tabindex="-1" role="dialog" aria-labelledby="mainCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mainCategoryModalLabel">Create Main Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="ncategoryButton" action="{{route('admin.ncat')}}">
                <div class="modal-body nc">
                    @csrf
                    <div id="cnm"></div>
                    <div class="form-group">
                        <label for="ncateg">Category name</label>
                        <input type="text" name="ncateg" id="ncateg" class="form-control" placeholder="Enter category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i> Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Sub Category Modal -->
<div class="modal fade" id="subCategoryModal" tabindex="-1" role="dialog" aria-labelledby="subCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subCategoryModalLabel">Create Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="ncategoryButton2" action="{{route('admin.nscat')}}">
                <div class="modal-body nc">
                    @csrf
                    <div id="cnm2"></div>
                    <div class="form-group">
                        <label for="main">Parent Category</label>
                        <select name="main" class="category form-control" required>
                            <option value="">Select Parent Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ncateg2">Sub Category name</label>
                        <input type="text" name="ncateg" id="ncateg2" class="form-control" placeholder="Enter sub category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i> Create Sub Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mini Category Modal -->
<div class="modal fade" id="miniCategoryModal" tabindex="-1" role="dialog" aria-labelledby="miniCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miniCategoryModalLabel">Create Mini Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="nMiniButton" action="{{route('admin.nmcat')}}">
                <div class="modal-body nc">
                    @csrf
                    <div id="cnm6"></div>
                    <div class="form-group">
                        <label for="mainCategory">Parent Category</label>
                        <select name="main" id="mainCategory" class="category form-control" required>
                            <option value="">Select Parent Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nsubc">Sub Category</label>
                        <select name="nsubc" id="nsubc" class="sub_category form-control" required>
                            <option value="">Select Sub Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="miniCat">Mini Category name</label>
                        <input type="text" name="miniCat" id="miniCat" class="form-control" placeholder="Enter mini category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i> Create Mini Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Color Modal -->
<div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="colorModalLabel">Create Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="ncolorButton" action="{{route('admin.ncolor')}}">
                <div class="modal-body nc">
                    @csrf
                    <div id="cnm3"></div>
                    <div class="form-group">
                        <label for="ncolor">Color name</label>
                        <input type="text" name="ncolor" id="ncolor" class="form-control" placeholder="Enter color name" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i> Create Color
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tag Modal -->
<div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tagModalLabel">Create Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="nTagButton" action="{{route('admin.ntag')}}">
                <div class="modal-body nc">
                    @csrf
                    <div id="cnm4"></div>
                    <div class="form-group">
                        <label for="ntag">Tag name</label>
                        <input type="text" name="ntag" id="ntag" class="form-control" placeholder="Enter tag name" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i> Create Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



