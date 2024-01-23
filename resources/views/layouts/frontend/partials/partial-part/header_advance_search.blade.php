<section class="advance-search" id="advance-search">
    <div class="search-box">
        <div class="sear_wrapper" style="width: 60%;display: flex;align-items: baseline;margin: auto;">
            <span id="advance-search-hide"> <i class="fas fa-long-arrow-alt-left"></i> back</span>
            <form action="{{route('product.search')}}" method="GET">
                <div class="input-group">
                    <input placeholder="Search Products" class="sear" type="search" name="keyword" id="keyword"
                        required>
                    <button class="input-group-addon" type="submit" name="go"><i
                            class="icofont icofont-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div id="search-view" style="width:60%;margin:auto"> </div>
</section>