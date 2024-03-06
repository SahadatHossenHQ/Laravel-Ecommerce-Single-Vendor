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
                                <div class="form-group col-md-12">
                                    <ul>
                                        <li class="heading"><b>Checkout</b></li>
                                        <li>
                                            <label for="GUEST_CHECKOUT" class="text-capitalize">Gust Checkout</label>
                                            <select name="GUEST_CHECKOUT" id="GUEST_CHECKOUT">
                                                <option class="bg-info" value="{{ $GUEST_CHECKOUT->value }}">{{ ($GUEST_CHECKOUT->value == 1 ? "On"  : "Off" ) }}</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                        </li>

                                        <li>
                                            <label for="CHECKOUT_TYPE" class="text-capitalize">Checkout Type</label>
                                            <select name="CHECKOUT_TYPE" id="CHECKOUT_TYPE">
                                                <option class="bg-info" value="{{ setting('CHECKOUT_TYPE') ?? 0 }}">{{ (setting('CHECKOUT_TYPE')== 1 ? "Complex"  : "Minimal" ) }}</option>
                                                <option value="1">Complex</option>
                                                <option value="0">Minimal</option>
                                            </select>
                                        </li>

                                        <hr>
                                        <li>
                                            <label for="shipping_free_above" class="text-capitalize">Shipping Charge Free Above Amount</label>
                                            <input name="shipping_free_above" id="shipping_free_above" class="border border-info p-1" type="text" value="{{ setting('shipping_free_above') ?? 10000 }}">
                                        </li>
                                        <li>
                                            <label for="shipping_range_inside" class="text-capitalize">Text - Shipping in Range</label>
                                            <input name="shipping_range_inside" id="shipping_range_inside" class="border border-info p-1" type="text" value="{{ setting('shipping_range_inside') ?? "Dhaka" }}">
                                        </li>
                                        <li>
                                            <label for="shipping_charge" class="text-capitalize">Shipping Charge Inside Range</label>
                                            <input name="shipping_charge" id="shipping_charge" class="border border-info p-1" type="text" value="{{ setting('shipping_charge') ?? 80 }}">
                                        </li>
                                        <li>
                                            <label for="shipping_charge_out_of_range" class="text-capitalize">Shipping Charge Out Of Range</label>
                                            <input name="shipping_charge_out_of_range" id="shipping_charge_out_of_range" class="border border-info p-1" type="text" value="{{ setting('shipping_charge_out_of_range') ?? 130 }}">
                                        </li>

                                        <hr>
                                        <li>
                                            <label for="min_rec" class="text-capitalize">Minimum Recharge</label>
                                            <input name="min_rec" id="min_rec" class="border border-info p-1" type="text" value="{{ setting('min_rec') ?? 50 }}">
                                        </li>
                                        <li>
                                            <label for="min_with" class="text-capitalize">Minimum Withdraw</label>
                                            <input name="min_with" id="min_with" class="border border-info p-1" type="text" value="{{ setting('min_with') ?? 500 }}">
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
    form#shopSettingsForm ul li.heading{
        background: var(--MAIN_MENU_BG);
        color: var(--primary_bg_color_text);
        padding: 0.5rem;
        font-size: 18px;
        text-transform: uppercase;
        margin-top: 2rem;
        margin-bottom: 0.7rem;
    }

    form#shopSettingsForm ul li{
        list-style-type: none;
        padding: .5rem .3rem;
    }
    form#shopSettingsForm input[type="color"],
    form#shopSettingsForm select{
        cursor: pointer;
    }
</style>    
@endpush

