<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#28a745">
    
    <!-- Brand Logo -->
    <a href="{{routeHelper('dashboard')}}" class="brand-link">
        <img src="/uploads/setting/{{setting('logo')}}" alt="AdminLTE Logo" class="" style="opacity: .8;float:none;min-height:40px;">
        {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->avatar != 'default.png' ? '/uploads/member/'.Auth::user()->avatar:'/default/user.jpg'}}" class="img-circle elevation-2" alt="User Image" style="width:50px;height:50px">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
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
                <li class="nav-item  ">
                    <a href="{{route('dashboard')}}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Goto Customer Panel</p>
                    </a>
                </li>

                <li class="nav-item {{Request::is('vendor/product*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-procedures"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('product/create')}}" class="nav-link {{Request::is('vendor/product/create') ? 'active':''}}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('product')}}" class="nav-link {{Request::is('vendor/product') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{route('vendor.low.product')}}" class="nav-link {{Request::is('vendor/product') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Low qnty</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('product/active')}}" class="nav-link {{Request::is('vendor/product/active') ? 'active':''}}">
                                <i class="fas fa-thumbs-up nav-icon"></i>
                                <p>Active</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{routeHelper('product/disable')}}" class="nav-link {{Request::is('vendor/product/disable') ? 'active':''}}">
                                <i class="fas fa-thumbs-down nav-icon"></i>
                                <p>Disable</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{Request::is('vendor/order*') ? 'menu-is-opening menu-open':''}}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fab fa-jedi-order"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{routeHelper('order')}}" class="nav-link {{Request::is('vendor/order') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>All</p>
                            </a>
                            <a href="{{routeHelper('order/pending')}}" class="nav-link {{Request::is('vendor/order/pending') ? 'active':''}}">
                                <i class="fas fa-hourglass-start nav-icon"></i>
                                <p>New</p>
                            </a>
                            <a href="{{routeHelper('order/processing')}}" class="nav-link {{Request::is('vendor/order/processing') ? 'active':''}}">
                                <i class="fas fa-running nav-icon"></i>
                                <p>Processing</p>
                            </a>
                            <a href="{{routeHelper('order/cancel')}}" class="nav-link {{Request::is('vendor/order/cancel') ? 'active':''}}">
                                <i class="fas fa-window-close nav-icon"></i>
                                <p>Cancel</p>
                            </a>
                            <a href="{{routeHelper('order/delivered')}}" class="nav-link {{Request::is('vendor/order/delivered') ? 'active':''}}">
                                <i class="fas fa-thumbs-up nav-icon"></i>
                                <p>Delivered</p>
                            </a>
                        </li>
                    </ul>
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
                            <a href="{{routeHelper('profile')}}" class="nav-link {{Request::is('admin/profile/show') ? 'active':''}}">
                                <i class="fas fa-user nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{routeHelper('profile/change-password')}}" class="nav-link {{Request::is('admin/profile/change-password') ? 'active':''}}">
                                <i class="fas fa-key nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('vendor.withdraw')}}" class="nav-link {{Request::is('withdraw*') ? 'active':''}}">
                        <i class="fas fa-money-bill nav-icon"></i>
                        <p>Withdraw</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();
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