<style>
    .nav-sidebar .nav-item>.nav-link {
        margin-bottom: 0;
        padding: 7px;
        font-size: 15px;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:var(--optional_color)">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="/uploads/setting/{{setting('logo')}}" alt="Logo" class="brand-image"
            style="opacity: .8;float:none;width:90;margin: auto;">
    </a>
    <style>
        .nav-treeview {
            background-color: #494e54 !important;
            border-radius: 5px !important;

        }
    </style>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
            <div class="image">
                <a href="{{routeHelper('dashboard')}}" class="d-block">
                    <img src="{{Auth::user()->avatar != 'default.png' ? '/uploads/admin/'.Auth::user()->avatar:'/default/user.jpg'}}"
                        class="img-circle elevation-2" alt="User Image" style="width:50px;height:50px">
                </a>
            </div>
            <div class="info">
                <a href="{{routeHelper('dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item {{Request::is('admin') ? 'menu-is-opening menu-open':''}}">
                    <a href="{{routeHelper('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                @if(auth()->user()->desig ==1)
                <li class="nav-item {{Request::is('admin/staff*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        <p>
                            Staff
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.staff.create')}}"
                                class="nav-link {{Request::is('admin/staff/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.staff.list')}}"
                                class="nav-link {{Request::is('admin/staff/list') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Request::is('admin/author*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        <p>
                            Author
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.author.create')}}"
                                class="nav-link {{Request::is('admin/staff/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.author.index')}}"
                                class="nav-link {{Request::is('admin/staff/list') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1 || auth()->user()->desig ==2)
                <li class="nav-item {{Request::is('admin/category*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{Request::is('admin/category*') ? 'menu-is-opening menu-open':''}}">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon fas fa-ethernet"></i>
                                <p>
                                    Mega Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{routeHelper('category/create')}}"
                                        class="nav-link {{Request::is('admin/category/create') ? 'active':''}}">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{routeHelper('category')}}"
                                        class="nav-link {{Request::is('admin/category') ? 'active':''}}">
                                        <i class="fas fa-bars nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{Request::is('admin/sub-category*') ? 'menu-is-opening menu-open':''}}">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon fas fa-ethernet"></i>
                                <p>
                                    Sub Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{routeHelper('sub-category/create')}}"
                                        class="nav-link {{Request::is('admin/sub-category/create') ? 'active':''}}">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{routeHelper('sub-category')}}"
                                        class="nav-link {{Request::is('admin/sub-category') ? 'active':''}}">
                                        <i class="fas fa-bars nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('admin/mini-categories*') ? 'menu-is-opening menu-open':''}}">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon fas fa-ethernet"></i>
                                <p>
                                    Mini Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.minicategory')}}" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.minicategory.list')}}" class="nav-link">
                                        <i class="fas fa-bars nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{Request::is('admin/extra-categories*') ? 'menu-is-opening menu-open':''}}">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon fas fa-ethernet"></i>
                                <p>
                                    Extra Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.extracategory')}}" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.extracategory.list')}}" class="nav-link">
                                        <i class="fas fa-bars nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{Request::is('admin/slider*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>
                            Collection
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('collection/create')}}"
                                class="nav-link {{Request::is('admin/collection/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('collection')}}"
                                class="nav-link {{Request::is('admin/collection') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1)
                <li class="nav-item {{Request::is('admin/slider*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Sliders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('slider/create')}}"
                                class="nav-link {{Request::is('admin/slider/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('slider')}}"
                                class="nav-link {{Request::is('admin/slider') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Request::is('admin/attribute*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Attributes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.attribute.form')}}"
                                class="nav-link {{Request::is('admin/attribute/form') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.attribute.index')}}"
                                class="nav-link {{Request::is('admin/attribute/list') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('admin/color*') ? 'menu-is-opening menu-open':''}}">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="nav-icon fas fa-palette"></i>
                                <p>
                                    Colors
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{routeHelper('color')}}"
                                        class="nav-link {{Request::is('admin/color/create') ? 'active':''}}">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{routeHelper('color')}}"
                                        class="nav-link {{Request::is('admin/color') ? 'active':''}}">
                                        <i class="fas fa-bars nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </li>

                <li class="nav-item {{Request::is('admin/coupon*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            Coupon
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('coupon/create')}}"
                                class="nav-link {{Request::is('admin/coupon/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('coupon')}}"
                                class="nav-link {{Request::is('admin/coupon') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1 || auth()->user()->desig ==2)
                <li class="nav-item {{Request::is('admin/brand*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-band-aid"></i>
                        <p>
                            Brands
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('brand/create')}}"
                                class="nav-link {{Request::is('admin/brand/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('brand')}}"
                                class="nav-link {{Request::is('admin/brand') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                @endif
                @if(auth()->user()->desig ==1)
                <li class="nav-item {{Request::is('admin/tag*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Tags
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('tag/create')}}"
                                class="nav-link {{Request::is('admin/tag/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('tag')}}"
                                class="nav-link {{Request::is('admin/tag') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Request::is('admin/campaing*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Campaign
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.campaing.create')}}"
                                class="nav-link {{Request::is('admin/campaing/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.campaing.index')}}"
                                class="nav-link {{Request::is('admin/campaing/list') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1 || auth()->user()->desig ==2)
                <li class="nav-item {{Request::is('admin/campaing*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-gifts"></i>
                        <p>
                            Classic Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.classic.form')}}"
                                class="nav-link {{Request::is('admin/classic/form') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.classic.index')}}"
                                class="nav-link {{Request::is('admin/classic/list') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1 || auth()->user()->desig ==2 ||auth()->user()->desig ==3)
                <li class="nav-item {{Request::is('admin/product*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.product.type')}}"
                                class="nav-link {{Request::is('admin/product/type') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('product')}}"
                                class="nav-link {{Request::is('admin/product') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product.inhouse.index')}}"
                                class="nav-link {{Request::is('admin/inhouse') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Inhouse Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.low.product')}}"
                                class="nav-link {{Request::is('admin/inhouse') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Low Product</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.product.active')}}"
                                class="nav-link {{Request::is('admin/product/active') ? 'active':''}}">
                                <i class="fas fa-thumbs-up nav-icon"></i>
                                <p>Active & Approved</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product.disable')}}"
                                class="nav-link {{Request::is('admin/product/disable') ? 'active':''}}">
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Disable</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product.unaproved')}}"
                                class="nav-link {{Request::is('admin/product/unaproved') ? 'active':''}}">
                                <i class="fas fa-thumbs-down nav-icon"></i>
                                <p>Unaproved</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product.reached')}}"
                                class="nav-link {{Request::is('admin/product/reached') ? 'active':''}}">
                                <i class="fas fa-chart-bar nav-icon"></i>
                                <p>Top Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product.imex')}}"
                                class="nav-link {{Request::is('admin/product/bulk') ? 'active':''}}">
                                <i class="fas fa-file-import nav-icon"></i>
                                <p>Import/Export</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1 || auth()->user()->desig ==2|| auth()->user()->desig ==4)
                <li class="nav-item {{Request::is('admin/order*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fab fa-jedi-order"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('order')}}"
                                class="nav-link {{Request::is('admin/order') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>All</p>
                            </a>
                            <a href="{{routeHelper('order/pending')}}"
                                class="nav-link {{Request::is('admin/order/pending') ? 'active':''}}">
                                <i class="fas fa-hourglass-start nav-icon"></i>
                                <p>New</p>
                            </a>
                            <a href="{{routeHelper('order/pre')}}"
                                class="nav-link {{Request::is('admin/order/pre') ? 'active':''}}">
                                <i class="fas fa-cart-arrow-down nav-icon"></i>
                                <p>pre order</p>
                            </a>
                            <a href="{{routeHelper('order/processing')}}"
                                class="nav-link {{Request::is('admin/order/processing') ? 'active':''}}">
                                <i class="fas fa-running nav-icon"></i>
                                <p>Order Success</p>
                            </a>
                            <a href="{{routeHelper('order/cancel')}}"
                                class="nav-link {{Request::is('admin/order/cancel') ? 'active':''}}">
                                <i class="fas fa-window-close nav-icon"></i>
                                <p>Cancel</p>
                            </a>
                            <a href="{{routeHelper('order/delivered')}}"
                                class="nav-link {{Request::is('admin/order/delivered') ? 'active':''}}">
                                <i class="fas fa-thumbs-up nav-icon"></i>
                                <p>Delivered</p>
                            </a>
                            <a href="{{routeHelper('order/partials')}}"
                                class="nav-link {{Request::is('admin/order/partials') ? 'active':''}}">
                                <i class="fas fa-thumbs-up nav-icon"></i>
                                <p>Partials</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1 || auth()->user()->desig ==2)
                <li class="nav-item {{Request::is('admin/customer*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('customer/create')}}"
                                class="nav-link {{Request::is('admin/customer/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('customer')}}"
                                class="nav-link {{Request::is('admin/customer') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('admin/subscribe') ? 'menu-is-opening menu-open':''}}">
                            <a href="{{routeHelper('subscribe')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Subscriber
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif


                <li class="nav-item {{Request::is('admin/vendor*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Vendor
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('vendor/create')}}"
                                class="nav-link {{Request::is('admin/vendor/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('vendor')}}"
                                class="nav-link {{Request::is('admin/vendor') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.vendor.withdraw')}}"
                                class="nav-link {{Request::is('admin/vendor/withdraw') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Withdraw Request</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(auth()->user()->desig ==1)
                <li class="nav-item {{Request::is('admin/connection*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Connection
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.connection.live.chat')}}"
                                class="nav-link {{Request::is('admin/connection/live-chat') ? 'active':''}}">
                                <i class="fas fa-headset nav-icon"></i>
                                <p>Live Chat</p>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('admin/mail') ? 'menu-is-opening menu-open':''}}">
                            <a href="{{routeHelper('mail')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Mail
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('admin/ticket') ? 'menu-is-opening menu-open':''}}">
                            <a href="{{routeHelper('ticket')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Support Ticket
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1 || auth()->user()->desig ==2)

                <li class="nav-item {{Request::is('admin/blog*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Blogs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.index')}}"
                                class="nav-link {{Request::is('admin/profile/show') ? 'active':''}}">
                                <p>Own Blogs List </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user_blog')}}"
                                class="nav-link {{Request::is('admin/profile/show') ? 'active':''}}">
                                <p>User Blogs List </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.new_blog')}}"
                                class="nav-link {{Request::is('admin/profile/change-password') ? 'active':''}}">
                                <p>Add New </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->desig ==1)
                <li class="nav-item {{Request::is('admin/setting*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{Request::is('admin/setting') ? 'menu-is-opening menu-open':''}}">
                            <a href="{{routeHelper('setting')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Basic
                                </p>
                            </a>
                        </li>

                        <ul class="nav nav-treeview">
                            <li
                                class="nav-item {{Request::is('admin/setting/color') ? 'menu-is-opening menu-open':''}}">
                                <a href="{{route('admin.setting.color')}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Color
                                    </p>
                                </a>
                            </li>

                            <li
                                class="nav-item {{Request::is('admin/setting/header') ? 'menu-is-opening menu-open':''}}">
                                <a href="{{route('admin.setting.header')}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Header - Backend
                                    </p>
                                </a>
                            </li>
                            <li
                                class="nav-item {{Request::is('admin/setting/getway') ? 'menu-is-opening menu-open':''}}">
                                <a href="{{route('admin.setting.getway')}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Payment Gateway
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('admin/setting/home') ? 'menu-is-opening menu-open':''}}">
                                <a href="{{route('admin.setting.home')}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('admin/setting/docs') ? 'menu-is-opening menu-open':''}}">
                                <a href="{{route('admin.setting.docs')}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Documents
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('admin/profile*') ? 'menu-is-opening menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-circle"></i>
                                    <p>
                                        Profile
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{routeHelper('profile')}}"
                                            class="nav-link {{Request::is('admin/profile/show') ? 'active':''}}">
                                            <i class="fas fa-user nav-icon"></i>
                                            <p>My Profile</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{routeHelper('profile/change-password')}}"
                                            class="nav-link {{Request::is('admin/profile/change-password') ? 'active':''}}">
                                            <i class="fas fa-key nav-icon"></i>
                                            <p>Change Password</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                </li>




                <li class="nav-item {{Request::is('admin/shop') ? 'menu-is-opening menu-open':''}}">
                    <a href="{{routeHelper('shop')}}" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>Shop</p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('admin/gallery') ? 'menu-is-opening menu-open':''}}">
                    <a href="{{route('admin.gallery')}}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Gallery</p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('admin/page*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pager"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.page.create')}}"
                                class="nav-link {{Request::is('admin/page/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.pages')}}"
                                class="nav-link {{Request::is('admin/pages') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Pages List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>