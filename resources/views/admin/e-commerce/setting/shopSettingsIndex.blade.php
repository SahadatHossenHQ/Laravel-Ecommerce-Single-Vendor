@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')




@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offse">
                <h1>Setting - <small>Shop</small></h1>
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
                            <h3 class="card-title">Setting - Shop</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="shopSettingsForm" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" name="type" value="10">
                                {{-- <div class="form-group col-md-12"> --}}
                                    <ul class="form-row">
                                        <li class="bg-light p-2 mb-1 col-12"><b>Checkout</b></li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="GUEST_CHECKOUT" class="text-capitalize">Gust Checkout</label>
                                            <select class="form-control" name="GUEST_CHECKOUT" id="GUEST_CHECKOUT">
                                                <option class="bg-info" value="{{ $GUEST_CHECKOUT->value }}">{{ ($GUEST_CHECKOUT->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                        </li>

                                        <li class="col-12 col-md-6 form-group">
                                            <label for="CHECKOUT_TYPE" class="text-capitalize">Checkout Type</label>
                                            <select class="form-control" name="CHECKOUT_TYPE" id="CHECKOUT_TYPE">
                                                <option class="bg-info" value="{{ setting('CHECKOUT_TYPE') ?? 0 }}">{{ (setting('CHECKOUT_TYPE')== 1 ? "Complex"  : "Minimal" ) }}</option>
                                                <option value="1">Complex</option>
                                                <option value="0">Minimal</option>
                                            </select>
                                        </li>
                                    </ul>
                                    <ul class="form-row">
                                        <li class="bg-light p-2 mb-1 col-12"><b>Withdrawn</b></li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="min_rec" class="text-capitalize">Minimum Recharge</label>
                                            <input class="form-control" name="min_rec" id="min_rec" class="border border-info p-1" type="text" value="{{ setting('min_rec') ?? 50 }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="min_with" class="text-capitalize">Minimum Withdraw</label>
                                            <input class="form-control" name="min_with" id="min_with" class="border border-info p-1" type="text" value="{{ setting('min_with') ?? 500 }}">
                                        </li>
                                    </ul>
                                    <ul class="form-row">
                                        <li class="bg-light p-2 mb-1 col-12"><b>Shipping</b></li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="COUNTRY_SERVE" class="text-capitalize">Country of Serve <span class="text-red">*</span></label>
                                            <input class="form-control" type="text" name="COUNTRY_SERVE" id="COUNTRY_SERVE" placeholder="Bangladesh" value="{{ setting('COUNTRY_SERVE') ?? 'Bangladesh' }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="shipping_range_inside" class="text-capitalize">Text - Shipping in Range <span class="text-red">*</span></label>
                                            <input class="form-control" name="shipping_range_inside" id="shipping_range_inside" class="border border-info p-1" type="text" value="{{ setting('shipping_range_inside') ?? "Dhaka" }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="CURRENCY_CODE" class="text-capitalize">Currency Code <span class="text-red">*</span></label>
                                            <input class="form-control" type="text" name="CURRENCY_CODE" id="CURRENCY_CODE" placeholder="Currency code" value="{{ setting('CURRENCY_CODE') ?? 'BDT' }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="CURRENCY_CODE_MIN" class="text-capitalize">Currency Code Small <span class="text-red">*</span></label>
                                            <input class="form-control" type="text" name="CURRENCY_CODE_MIN" id="CURRENCY_CODE_MIN" placeholder="Currency code" value="{{ setting('CURRENCY_CODE_MIN') ?? 'Tk' }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="CURRENCY_ICON" class="text-capitalize">Currency Icon <span class="text-red">*</span></label>
                                            <input class="form-control" type="text" name="CURRENCY_ICON" id="CURRENCY_ICON" placeholder="Currency icon" value="{{ setting('CURRENCY_ICON') ?? '৳' }}" required>
                                        </li>
                                    </ul>
                                    <ul class="form-row">
                                        <li class="bg-light p-2 mb-1 col-12"><b>Calculation</b></li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="shop_commission" class="text-capitalize">Vendor Commission <span class="text-red">*</span></label>
                                            <input class="form-control" type="number" name="shop_commission" id="shop_commission" placeholder="Bangladesh" value="{{ setting('shop_commission') ?? 0 }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="is_point" class="text-capitalize">Point System Status</label>
                                            <select class="form-control" name="is_point" id="is_point">
                                                <option class="bg-info" value="{{ setting('is_point') ?? 0 }}">{{ (setting('is_point')== 1 ? "Active"  : "Deactive" ) }}</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="Default_Point" class="text-capitalize">Default Point <span class="text-red">*</span></label>
                                            <input class="form-control" type="text" name="Default_Point" id="Default_Point" placeholder="Bangladesh" value="{{ setting('Default_Point') ?? 0 }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="Point_rate" class="text-capitalize">Point Rate <span class="text-red">*</span></label>
                                            <input class="form-control" type="text" name="Point_rate" id="Point_rate" placeholder="Bangladesh" value="{{ setting('Point_rate') ?? 0 }}" required>
                                        </li>
                                    </ul>
                                {{-- </div> --}}
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
