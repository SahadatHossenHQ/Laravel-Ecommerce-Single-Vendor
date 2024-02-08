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

                <div class="col-sm-8 offset-md-2">
                    <!-- Default box -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Layout Change</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="layoutForm" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" name="type" value="9">
                                <div class="form-group col-md-12">
                                    <ul>
                                        <li class="heading"><b>Global Layout</b></li>
                                        <div class="{{ $TOP_HEADER_STYLE->value == 3 ? 'border border-info' : '' }}">
                                            <li>
                                                <label for="TOP_HEADER_STYLE" class="text-capitalize">Top Header Style: </label>
                                                <select name="TOP_HEADER_STYLE" id="TOP_HEADER_STYLE">
                                                    <option class="text-white bg-success" value="{{ $TOP_HEADER_STYLE->value }}">Style {{ $TOP_HEADER_STYLE->value }}</option>
                                                    <option value="1">Style 1</option>
                                                    {{-- <option value="2">Style 2</option> --}}
                                                    <option value="3">Style 3</option>
                                                </select><small style="text-danger"><b>Selected</b>&nbsp;{{ $TOP_HEADER_STYLE->value }}</small>
                                            </li>
                                            
                                            <div class="px-3 bg-light" style="display:{{ $TOP_HEADER_STYLE->value == 3 ? 'block' : 'none' }};">
                                                <li>
                                                    <label for="STYLE_3_TOP_MENU" class="text-capitalize">Style 3 top menu add: </label>
                                                    <br>
                                                    <textarea style="border:1.5px dotted rgb(9, 102, 41);padding:5px;order-radius:2%;outline:none;" name="STYLE_3_TOP_MENU" id="STYLE_3_TOP_MENU" cols="30" rows="3">{{ $STYLE_3_TOP_MENU->value }}</textarea>
                                                    <br>
                                                    <small>
                                                        <b><i>Copy the menu code and paste in above box and customized as per your rquiements (Multi-menu add multi li and a tag):</i></b>
                                                        <script src="https://gist.github.com/finvasoft/c380eaf18b41491d650c28f152ce79a4.js"></script>
                                                    </small>
                                                </li>
                                                <li>
                                                    <label for="STYLE_3_TOP_MENU_BG_COLOR" class="text-capitalize">Style 3 Top Menu Background Color: </label>
                                                    <input type="color" id="STYLE_3_TOP_MENU_BG_COLOR_CHOOSER" value="{{ $STYLE_3_TOP_MENU_BG_COLOR->value }}">
                                                    <input type="text" id="STYLE_3_TOP_MENU_BG_COLOR" name="STYLE_3_TOP_MENU_BG_COLOR" value="{{ $STYLE_3_TOP_MENU_BG_COLOR->value }}">
                                                </li>
                                                <li>
                                                    <label for="STYLE_3_TOP_MENU_LINK_COLOR" class="text-capitalize">Style 3 Top Menu Link Color: </label>
                                                    <input type="color" id="STYLE_3_TOP_MENU_LINK_COLOR_CHOOSER" value="{{ $STYLE_3_TOP_MENU_LINK_COLOR->value }}">
                                                    <input type="text" id="STYLE_3_TOP_MENU_LINK_COLOR" name="STYLE_3_TOP_MENU_LINK_COLOR" value="{{ $STYLE_3_TOP_MENU_LINK_COLOR->value }}">
                                                </li>
                                                <li>
                                                    <label for="STYLE_3_TOP_MENU_LINK_HOVER_COLOR" class="text-capitalize">Style 3 Top Menu Link Hover Color: </label>
                                                    <input type="color" id="STYLE_3_TOP_MENU_LINK_HOVER_COLOR_CHOOSER" value="{{ $STYLE_3_TOP_MENU_LINK_HOVER_COLOR->value }}">
                                                    <input type="text" id="STYLE_3_TOP_MENU_LINK_HOVER_COLOR" name="STYLE_3_TOP_MENU_LINK_HOVER_COLOR" value="{{ $STYLE_3_TOP_MENU_LINK_HOVER_COLOR->value }}">
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
                                        </div>
                                        <li>
                                            <label for="MAIN_MENU_STYLE" class="text-capitalize">Main Menu Style: </label>
                                            <select name="MAIN_MENU_STYLE" id="MAIN_MENU_STYLE">
                                                <option class="text-white bg-success" value="{{ $MAIN_MENU_STYLE->value }}">Style {{ $MAIN_MENU_STYLE->value }}</option>
                                                <option value="1">Style 1</option>
                                                <option value="2">Style 2</option>
                                                <option value="3">Style 3</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ $MAIN_MENU_STYLE->value }}</small>
                                        </li>

                                        <li class="heading"><b>Components Layout</b></li>
                                        <li>
                                            <label for="SLIDER_LAYOUT_STATUS" class="text-capitalize">Feature Products Status</label>
                                            <select name="SLIDER_LAYOUT_STATUS" id="SLIDER_LAYOUT_STATUS">
                                                <option class="text-white bg-success" value="{{ $SLIDER_LAYOUT_STATUS->value }}">{{ ($SLIDER_LAYOUT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($SLIDER_LAYOUT_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="SLIDER_LAYOUT" class="text-capitalize">Slider Layout: </label>
                                            <select name="SLIDER_LAYOUT" id="SLIDER_LAYOUT">
                                                <option class="text-white bg-success" value="{{ $SLIDER_LAYOUT->value }}">Style {{ $SLIDER_LAYOUT->value }}</option>
                                                <option value="1">Style 1 - Container</option>
                                                <option value="2">Style 2 - Full Width</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ $SLIDER_LAYOUT->value }}</small>
                                        </li>
                                        <li>
                                            <label for="HERO_SLIDER_1" class="text-capitalize">Hero Slider 1: </label>
                                            <select name="HERO_SLIDER_1" id="HERO_SLIDER_1">
                                                <option class="text-white bg-success" value="{{ $HERO_SLIDER_1->value }}">{{ ($HERO_SLIDER_1->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                            <br>
                                            <label for="HERO_SLIDER_1_TEXT" class="text-capitalize">Hero Slider Title</label>
                                            <input class="border" type="text" name="HERO_SLIDER_1_TEXT" value="{{ setting('HERO_SLIDER_1_TEXT') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="HERO_SLIDER_2" class="text-capitalize">Hero Slider 1: </label>
                                            <select name="HERO_SLIDER_2" id="HERO_SLIDER_2">
                                                <option class="text-white bg-success" value="{{ $HERO_SLIDER_2->value }}">{{ ($HERO_SLIDER_2->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($HERO_SLIDER_2->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="FLOAT_LIVE_CHAT" class="text-capitalize">Float Live Chat: </label>
                                            <select name="FLOAT_LIVE_CHAT" id="FLOAT_LIVE_CHAT">
                                                <option class="text-white bg-success" value="{{ $FLOAT_LIVE_CHAT->value }}">{{ ($FLOAT_LIVE_CHAT->value == 1 ? "Live Chat"  : "WhatsApp" ) }}</option>
                                                <option value="1">Live Chat</option>
                                                <option value="0">WhatsApp</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($FLOAT_LIVE_CHAT->value == 1 ? "Live Chat"  : "WhatsApp" ) }}</small>
                                        </li>

                                        <li class="heading"><b>Home Layout</b></li>
                                        <li>
                                            <label for="TOP_CAT_STATUS" class="text-capitalize">Top Category Status</label>
                                            <select name="TOP_CAT_STATUS" id="TOP_CAT_STATUS">
                                                <option class="text-white bg-success" value="{{ $TOP_CAT_STATUS->value }}">{{ ($TOP_CAT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                            <br>
                                            <label for="TOP_CAT" class="text-capitalize">Top Category Title</label>
                                            <input class="border" type="text" name="TOP_CAT" value="{{ setting('TOP_CAT') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="SELLER_STATUS" class="text-capitalize">Seller Status</label>
                                            <select name="SELLER_STATUS" id="SELLER_STATUS">
                                                <option class="text-white bg-success" value="{{ $SELLER_STATUS->value }}">{{ ($SELLER_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($SELLER_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="LATEST_PRODUCT_STATUS" class="text-capitalize">Latest Products Status</label>
                                            <select name="LATEST_PRODUCT_STATUS" id="LATEST_PRODUCT_STATUS">
                                                <option class="text-white bg-success" value="{{ $LATEST_PRODUCT_STATUS->value }}">{{ ($LATEST_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($LATEST_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="FEATURE_PRODUCT_STATUS" class="text-capitalize">Feature Products Status</label>
                                            <select name="FEATURE_PRODUCT_STATUS" id="FEATURE_PRODUCT_STATUS">
                                                <option class="text-white bg-success" value="{{ $FEATURE_PRODUCT_STATUS->value }}">{{ ($FEATURE_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($FEATURE_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="CLASSIFIED_SELL_STATUS" class="text-capitalize">Classified Sell Status</label>
                                            <select name="CLASSIFIED_SELL_STATUS" id="CLASSIFIED_SELL_STATUS">
                                                <option class="text-white bg-success" value="{{ $CLASSIFIED_SELL_STATUS->value }}">{{ ($CLASSIFIED_SELL_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($CLASSIFIED_SELL_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="MEGA_CAT_PRODUCT_STATUS" class="text-capitalize">MEGA Cateogory Status</label>
                                            <select name="MEGA_CAT_PRODUCT_STATUS" id="MEGA_CAT_PRODUCT_STATUS">
                                                <option class="text-white bg-success" value="{{ $MEGA_CAT_PRODUCT_STATUS->value }}">{{ ($MEGA_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($MEGA_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="SUB_CAT_PRODUCT_STATUS" class="text-capitalize">Sub Cateogory Status</label>
                                            <select name="SUB_CAT_PRODUCT_STATUS" id="SUB_CAT_PRODUCT_STATUS">
                                                <option class="text-white bg-success" value="{{ $SUB_CAT_PRODUCT_STATUS->value }}">{{ ($SUB_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($SUB_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="MINI_CAT_PRODUCT_STATUS" class="text-capitalize">Mini Category Status</label>
                                            <select name="MINI_CAT_PRODUCT_STATUS" id="MINI_CAT_PRODUCT_STATUS">
                                                <option class="text-white bg-success" value="{{ $MINI_CAT_PRODUCT_STATUS->value }}">{{ ($MINI_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($MINI_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="EXTRA_CAT_PRODUCT_STATUS" class="text-capitalize">Extra Category Status</label>
                                            <select name="EXTRA_CAT_PRODUCT_STATUS" id="EXTRA_CAT_PRODUCT_STATUS">
                                                <option class="text-white bg-success" value="{{ $EXTRA_CAT_PRODUCT_STATUS->value }}">{{ ($EXTRA_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($EXTRA_CAT_PRODUCT_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="BRAND_STATUS" class="text-capitalize">Brand Status</label>
                                            <select name="BRAND_STATUS" id="BRAND_STATUS">
                                                <option class="text-white bg-success" value="{{ $BRAND_STATUS->value }}">{{ ($BRAND_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($BRAND_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="CATEGORY_SMALL_SUMMERY" class="text-capitalize">Cateogry Small Summery Status</label>
                                            <select name="CATEGORY_SMALL_SUMMERY" id="CATEGORY_SMALL_SUMMERY">
                                                <option class="text-white bg-success" value="{{ $CATEGORY_SMALL_SUMMERY->value }}">{{ ($CATEGORY_SMALL_SUMMERY->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($CATEGORY_SMALL_SUMMERY->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                        <li>
                                            <label for="NEWS_LETTER_STATUS" class="text-capitalize">News Letter Status</label>
                                            <select name="NEWS_LETTER_STATUS" id="NEWS_LETTER_STATUS">
                                                <option class="text-white bg-success" value="{{ $NEWS_LETTER_STATUS->value }}">{{ ($NEWS_LETTER_STATUS->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select><small style="text-danger"><b>Selected</b>&nbsp;{{ ($NEWS_LETTER_STATUS->value == 1 ? "On"  : "Off" ) }}</small>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
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

