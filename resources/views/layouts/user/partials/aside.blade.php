<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="/uploads/setting/{{setting('logo')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;float:none;min-height:40px;">
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
            
                <li class="nav-item {{Request::is('/') ? 'menu-is-opening menu-open':''}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{Request::is('level*') ? 'menu-is-opening menu-open':''}}">
                    <a href="{{route('level')}}" class="nav-link">
                      <i class="nav-icon fas fa-layer-group"></i>
                      <p>Level</p>
                    </a>
                </li>

                <li class="nav-item {{Request::is('daily-work') ? 'menu-is-opening menu-open':''}}">
                    <a href="{{route('daily.work')}}" class="nav-link">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Daily Work
                        </p>
                    </a>
                </li>

                <li class="nav-item {{Request::is('withdraw*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Transaction
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('withdraw.create')}}" class="nav-link {{Request::is('withdraw/create') ? 'active':''}}">
                                <i class="fas fa-funnel-dollar nav-icon"></i>
                                <p>Withdraw</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('withdraw.index')}}" class="nav-link {{Request::is('withdraw') ? 'active':''}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Withdraw History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('income.history')}}" class="nav-link {{Request::is('withdraw/income/history') ? 'active':''}}">
                                <i class="fas fa-history nav-icon"></i>
                                <p>Income History </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('money.exchange')}}" class="nav-link {{Request::is('withdraw/money/exchange') ? 'active':''}}">
                                <i class="fas fa-exchange-alt"></i>
                                <p>Money Exchange</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('money.exchange.list')}}" class="nav-link {{Request::is('withdraw/money/exchange/list') ? 'active':''}}">
                                <i class="fas fa-bars"></i>
                                <p>Money Exchange History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('shop.balance.create')}}" class="nav-link {{Request::is('withdraw/shop/balance/create') ? 'active':''}}">
                                <i class="fas fa-money-check-alt nav-icon"></i>
                                <p>Send Shop Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('shop.balance')}}" class="nav-link {{Request::is('withdraw/shop/balance') ? 'active':''}}">
                                <i class="fas fa-history nav-icon"></i>
                                <p>Shop Balance History</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{Request::is('team*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            My Team
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('team.tree.view')}}" class="nav-link {{Request::is('team/tree-view*') ? 'active':''}}">
                                <i class="fas fa-project-diagram nav-icon"></i>
                                <p>Tree View</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('team.list.view')}}" class="nav-link {{Request::is('team/list-view') ? 'active':''}}">
                                <i class="fas fa-list-ol nav-icon"></i>
                                <p>List View</p>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('add_referrer*') ? 'active':''}}">
                            <a href="{{route('show.referrer.form')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Add Referrer</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{Request::is('connection*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Connection
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('connection.live.chat')}}" class="nav-link {{Request::is('team/tree-view*') ? 'active':''}}">
                                <i class="fas fa-headset nav-icon"></i>
                                <p>Live Chat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('connection.contact')}}" class="nav-link {{Request::is('team/list-view') ? 'active':''}}">
                                <i class="fas fa-address-book nav-icon"></i>
                                <p>Contact</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{Request::is('profile*') ? 'menu-is-opening menu-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profile
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile.index')}}" class="nav-link {{Request::is('profile/show') ? 'active':''}}">
                                <i class="fas fa-user nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('profile.change.password')}}" class="nav-link {{Request::is('profile/change-password') ? 'active':''}}">
                                <i class="fas fa-key nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
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