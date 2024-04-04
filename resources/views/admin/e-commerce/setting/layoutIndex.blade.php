@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offse">
                <h1>Setting - <small>Layout</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application Layout</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-10 offset-md-1">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Layout Change</h3>
                        </div>
                        <form id="layoutForm" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="9">
                            <div class="card-body">
                                <ul class="form-row">
                                    <li class="col-12 col-md-12 bg-light"><b>Global Layout</b></li>
                                        <li class="col-12 col-md-12 form-group">
                                            <label for="TOP_HEADER_STYLE" class="text-capitalize">Top Header Style: </label>
                                            <select class="form-control w-25" name="TOP_HEADER_STYLE" id="TOP_HEADER_STYLE">
                                                <option class="text-white bg-success" value="{{ $TOP_HEADER_STYLE->value }}">Style {{ $TOP_HEADER_STYLE->value }}</option>
                                                <option value="1">Style 1</option>
                                                <option value="2">Style 2</option>
                                                <option value="3">Style 3</option>
                                            </select>
                                        </li>
                                        <div class="col-10 offset-md-1 px-3 bg-light border border-info {{ $TOP_HEADER_STYLE->value == 3 ? 'visible' : 'd-none' }}">
                                            <li class="col-12 col-md-12 form-group">
                                                <label for="STYLE_3_TOP_MENU" class="text-capitalize">Style 3 top menu add: </label>
                                                <br>
                                                <textarea class="form-control w-75" style="border:1.5px dotted rgb(9, 102, 41);padding:5px;order-radius:2%;outline:none;" name="STYLE_3_TOP_MENU" id="STYLE_3_TOP_MENU" cols="30" rows="3">{{ $STYLE_3_TOP_MENU->value }}</textarea>
                                                <br>
                                                <div class="w-75">
                                                    <small>Copy the menu code and paste in above box and customized as per your rquiements (Multi-menu add multi li and a tag):</small>
                                                    <script src="https://gist.github.com/finvasoft/c380eaf18b41491d650c28f152ce79a4.js"></script>
                                                </div>
                                            </li>
                                            <li class="col-12 col-md-6 form-group">
                                                <label class="text-capitalize d-block" for="STYLE_3_TOP_MENU_BG_COLOR">Style 3 Top Menu Background Color: </label>
                                                <input class="form-control w-25 d-inline-block" type="color" id="STYLE_3_TOP_MENU_BG_COLOR_CHOOSER" value="{{ $STYLE_3_TOP_MENU_BG_COLOR->value }}">
                                                <input class="form-control w-50 d-inline-block" type="text" id="STYLE_3_TOP_MENU_BG_COLOR" name="STYLE_3_TOP_MENU_BG_COLOR" value="{{ $STYLE_3_TOP_MENU_BG_COLOR->value }}">
                                            </li>
                                            <li class="col-12 col-md-6 form-group">
                                                <label class="text-capitalize d-block" for="STYLE_3_TOP_MENU_LINK_COLOR">Style 3 Top Menu Link Color: </label>
                                                <input class="form-control w-25 d-inline-block" type="color" id="STYLE_3_TOP_MENU_LINK_COLOR_CHOOSER" value="{{ $STYLE_3_TOP_MENU_LINK_COLOR->value }}">
                                                <input class="form-control w-50 d-inline-block" type="text" id="STYLE_3_TOP_MENU_LINK_COLOR" name="STYLE_3_TOP_MENU_LINK_COLOR" value="{{ $STYLE_3_TOP_MENU_LINK_COLOR->value }}">
                                            </li>
                                            <li class="col-12 col-md-6 form-group">
                                                <label class="text-capitalize d-block" for="STYLE_3_TOP_MENU_LINK_HOVER_COLOR">Style 3 Top Menu Link Hover Color: </label>
                                                <input class="form-control w-25 d-inline-block" type="color" id="STYLE_3_TOP_MENU_LINK_HOVER_COLOR_CHOOSER" value="{{ $STYLE_3_TOP_MENU_LINK_HOVER_COLOR->value }}">
                                                <input class="form-control w-50 d-inline-block" type="text" id="STYLE_3_TOP_MENU_LINK_HOVER_COLOR" name="STYLE_3_TOP_MENU_LINK_HOVER_COLOR" value="{{ $STYLE_3_TOP_MENU_LINK_HOVER_COLOR->value }}">
                                            </li>
                                            <li class="col-12 col-md-6 form-group">
                                                <label class="text-capitalize d-block" for="STYLE_3_HEADER_SEARCH_INPUT_BAR_WIDHT">Style 3 Search Input Width: </label>
                                                <input class="form-control w-50 d-inline-block" type="text" class="border" id="STYLE_3_HEADER_SEARCH_INPUT_BAR_WIDHT" name="STYLE_3_HEADER_SEARCH_INPUT_BAR_WIDHT" value="{{ setting('STYLE_3_HEADER_SEARCH_INPUT_BAR_WIDHT') ?? '' }}">
                                            </li>
                                            @push('js')
                                            <script>
                                                $(document).ready(function () {
                                                    $("#STYLE_3_TOP_MENU_BG_COLOR_CHOOSER").on("input", function () {
                                                        $("#STYLE_3_TOP_MENU_BG_COLOR").val($(this).val());
                                                    });
                                                    $("#STYLE_3_TOP_MENU_BG_COLOR").on("keyup", function () {
                                                        $("#STYLE_3_TOP_MENU_BG_COLOR_CHOOSER").val($(this).val());
                                                    });
                                                    $("#STYLE_3_TOP_MENU_LINK_COLOR_CHOOSER").on("input", function () {
                                                        $("#STYLE_3_TOP_MENU_LINK_COLOR").val($(this).val());
                                                    });
                                                    $("#STYLE_3_TOP_MENU_LINK_COLOR").on("keyup", function () {
                                                        $("#STYLE_3_TOP_MENU_LINK_COLOR_CHOOSER").val($(this).val());
                                                    });
                                                    $("#STYLE_3_TOP_MENU_LINK_HOVER_COLOR_CHOOSER").on("input", function () {
                                                        $("#STYLE_3_TOP_MENU_LINK_HOVER_COLOR").val($(this).val());
                                                    });
                                                    $("#STYLE_3_TOP_MENU_LINK_HOVER_COLOR").on("keyup", function () {
                                                        $("#STYLE_3_TOP_MENU_LINK_HOVER_COLOR_CHOOSER").val($(this).val());
                                                    });
                                                });
                                            </script>
                                            @endpush
                                        </div>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="MAIN_MENU_STYLE" class="text-capitalize">Main Menu Style: </label>
                                        <select class="form-control w-25" name="MAIN_MENU_STYLE" id="MAIN_MENU_STYLE">
                                            <option class="text-white bg-success" value="{{ $MAIN_MENU_STYLE->value }}">Style {{ $MAIN_MENU_STYLE->value }}</option>
                                            <option value="1">Style 1</option>
                                            <option value="2">Style 2</option>
                                            <option value="3">Style 3</option>
                                        </select>
                                    </li>

                                    <li class="col-12 col-md-6 form-group">
                                        <label for="placeholder_one" class="text-capitalize">Place Holder One</label>
                                        <input class="form-control" type="text" name="placeholder_one" id="placeholder_one" value="{{ setting('placeholder_one') ?? 'Search by product name' }}">
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="placeholder_two" class="text-capitalize">Place Holder Two</label>
                                        <input class="form-control" type="text" name="placeholder_two" id="placeholder_two" value="{{ setting('placeholder_two') ?? 'Search by Vendor' }}">
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="placeholder_three" class="text-capitalize">Place Holder Three</label>
                                        <input class="form-control" type="text" name="placeholder_three" id="placeholder_three" value="{{ setting('placeholder_three') ?? 'Search by category' }}">
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="placeholder_four" class="text-capitalize">Place Holder Four</label>
                                        <input class="form-control" type="text" name="placeholder_four" id="placeholder_four" value="{{ setting('placeholder_four') ?? 'Search by product' }}">
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="FLOAT_LIVE_CHAT" class="text-capitalize">Float Live Chat: </label>
                                        <select  class="form-control w-50" name="FLOAT_LIVE_CHAT" id="FLOAT_LIVE_CHAT">
                                            <option class="text-white bg-success" value="{{ $FLOAT_LIVE_CHAT->value }}">{{ ($FLOAT_LIVE_CHAT->value == 1 ? "Live Chat"  : "WhatsApp" ) }}</option>
                                            <option value="1">Live Chat</option>
                                            <option value="0">WhatsApp</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="form-row">
                                    <li class="col-12 col-md-12 bg-light"><b>Home Components Layout</b></li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="SLIDER_LAYOUT_STATUS" class="text-capitalize">Feature Products Status</label>
                                        <select class="form-control w-50" name="SLIDER_LAYOUT_STATUS" id="SLIDER_LAYOUT_STATUS">
                                            <option class="text-white bg-success" value="{{ $SLIDER_LAYOUT_STATUS->value }}">{{ ($SLIDER_LAYOUT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="SLIDER_LAYOUT" class="text-capitalize">Slider Layout: </label>
                                        <select  class="form-control w-75" name="SLIDER_LAYOUT" id="SLIDER_LAYOUT">
                                            <option class="text-white bg-success" value="{{ $SLIDER_LAYOUT->value }}">Style {{ $SLIDER_LAYOUT->value }}</option>
                                            <option value="1">Style 1 - Container</option>
                                            <option value="2">Style 2 - Full Width</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label class="text-capitalize d-inline" for="HERO_SLIDER_1">Hero Slider 1: </label>
                                        <select  class="form-control w-25 d-inline" name="HERO_SLIDER_1" id="HERO_SLIDER_1">
                                            <option class="text-white bg-success" value="{{ $HERO_SLIDER_1->value }}">{{ ($HERO_SLIDER_1->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                        <br><br>
                                        <label class="text-capitalize d-inline" for="HERO_SLIDER_2">Hero Slider 2: </label>
                                        <select  class="form-control w-25 d-inline" name="HERO_SLIDER_2" id="HERO_SLIDER_2">
                                            <option class="text-white bg-success" value="{{ $HERO_SLIDER_2->value }}">{{ ($HERO_SLIDER_2->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="HERO_SLIDER_1_TEXT" class="text-capitalize">Hero Slider 1 Title</label>
                                        <input  class="form-control w-75" type="text" name="HERO_SLIDER_1_TEXT" value="{{ setting('HERO_SLIDER_1_TEXT') ?? '' }}">
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        
                                    </li>
                                </ul>
                                <ul class="form-row">
                                    <li class="col-12 col-md-12 bg-light"><b>Home Layout</b></li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="TOP_CAT_STATUS" class="text-capitalize">Top Category Status</label>
                                        <select class="form-control w-25" name="TOP_CAT_STATUS" id="TOP_CAT_STATUS">
                                            <option class="text-white bg-success" value="{{ $TOP_CAT_STATUS->value }}">{{ ($TOP_CAT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                        <br>
                                        <label for="TOP_CAT" class="text-capitalize">Top Category Title</label>
                                        <input class="form-control w-75" class="border" type="text" name="TOP_CAT" value="{{ setting('TOP_CAT') ?? '' }}">
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="SELLER_STATUS" class="text-capitalize">Seller Status</label>
                                        <select class="form-control w-25" name="SELLER_STATUS" id="SELLER_STATUS">
                                            <option class="text-white bg-success" value="{{ $SELLER_STATUS->value }}">{{ ($SELLER_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="LATEST_PRODUCT_STATUS" class="text-capitalize">Latest Products Status</label>
                                        <select class="form-control w-25" name="LATEST_PRODUCT_STATUS" id="LATEST_PRODUCT_STATUS">
                                            <option class="text-white bg-success" value="{{ $LATEST_PRODUCT_STATUS->value }}">{{ ($LATEST_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="FEATURE_PRODUCT_STATUS" class="text-capitalize">Feature Products Status</label>
                                        <select class="form-control w-25" name="FEATURE_PRODUCT_STATUS" id="FEATURE_PRODUCT_STATUS">
                                            <option class="text-white bg-success" value="{{ $FEATURE_PRODUCT_STATUS->value }}">{{ ($FEATURE_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="CLASSIFIED_SELL_STATUS" class="text-capitalize">Classified Sell Status</label>
                                        <select class="form-control w-25" name="CLASSIFIED_SELL_STATUS" id="CLASSIFIED_SELL_STATUS">
                                            <option class="text-white bg-success" value="{{ $CLASSIFIED_SELL_STATUS->value }}">{{ ($CLASSIFIED_SELL_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="MEGA_CAT_PRODUCT_STATUS" class="text-capitalize">MEGA Cateogory Status</label>
                                        <select class="form-control w-25" name="MEGA_CAT_PRODUCT_STATUS" id="MEGA_CAT_PRODUCT_STATUS">
                                            <option class="text-white bg-success" value="{{ $MEGA_CAT_PRODUCT_STATUS->value }}">{{ ($MEGA_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="SUB_CAT_PRODUCT_STATUS" class="text-capitalize">Sub Cateogory Status</label>
                                        <select class="form-control w-25" name="SUB_CAT_PRODUCT_STATUS" id="SUB_CAT_PRODUCT_STATUS">
                                            <option class="text-white bg-success" value="{{ $SUB_CAT_PRODUCT_STATUS->value }}">{{ ($SUB_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="MINI_CAT_PRODUCT_STATUS" class="text-capitalize">Mini Category Status</label>
                                        <select class="form-control w-25" name="MINI_CAT_PRODUCT_STATUS" id="MINI_CAT_PRODUCT_STATUS">
                                            <option class="text-white bg-success" value="{{ $MINI_CAT_PRODUCT_STATUS->value }}">{{ ($MINI_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="EXTRA_CAT_PRODUCT_STATUS" class="text-capitalize">Extra Category Status</label>
                                        <select class="form-control w-25" name="EXTRA_CAT_PRODUCT_STATUS" id="EXTRA_CAT_PRODUCT_STATUS">
                                            <option class="text-white bg-success" value="{{ $EXTRA_CAT_PRODUCT_STATUS->value }}">{{ ($EXTRA_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="BRAND_STATUS" class="text-capitalize">Brand Status</label>
                                        <select class="form-control w-25" name="BRAND_STATUS" id="BRAND_STATUS">
                                            <option class="text-white bg-success" value="{{ $BRAND_STATUS->value }}">{{ ($BRAND_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="CATEGORY_SMALL_SUMMERY" class="text-capitalize">Cateogry Small Summery Status</label>
                                        <select class="form-control w-25" name="CATEGORY_SMALL_SUMMERY" id="CATEGORY_SMALL_SUMMERY">
                                            <option class="text-white bg-success" value="{{ $CATEGORY_SMALL_SUMMERY->value }}">{{ ($CATEGORY_SMALL_SUMMERY->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                    <li class="col-12 col-md-6 form-group">
                                        <label for="NEWS_LETTER_STATUS" class="text-capitalize">News Letter Status</label>
                                        <select class="form-control w-25" name="NEWS_LETTER_STATUS" id="NEWS_LETTER_STATUS">
                                            <option class="text-white bg-success" value="{{ $NEWS_LETTER_STATUS->value }}">{{ ($NEWS_LETTER_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>
<!-- /.content -->
@endsection

@push('css')
<style>
    form#layoutForm ul li.heading{
        background: #096629;
        color: #c2c7d0;
        padding: 0.5rem;
        font-size: 18px;
        text-transform: uppercase;
        margin-top: 2rem;
        margin-bottom: 0.7rem;
    }

    form#layoutForm ul li{
        list-style-type: none;
        padding: .5rem .3rem;
    }
    form#layoutForm input[type="color"],
    form#layoutForm select{
        cursor: pointer;
    }
</style>    
@endpush

