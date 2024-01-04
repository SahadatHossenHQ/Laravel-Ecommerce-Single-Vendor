
<div class="customer-wrapper" style="box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1) !important;">
<h5 style="margin-top: 20px;"><b><i>Hello {{auth()->user()->name}}</i></b></h5>
                <ul class="mt-2">
                   
                   
                   
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    
                    <li><a href="{{route('account')}}">My Account</a></li>
                    <li><a href="{{route('order')}}">Orders</a></li>
                    <li><a href="{{route('download')}}">Download</a></li>
                    <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                    <li><a href="{{route('ticket')}}">Support Ticket</a></li>
                    <li><a href="{{route('ads.index')}}">Sell Old Product</a></li>
                    <li><a href="{{route('ads.list')}}">My Old Product</a></li>
                    <li><a href="{{route('user_blog')}}">My Blogs</a></li>
                     <li><a href="{{route('myrefer')}}">My Refer</a></li>
                    <li><a href="{{route('redem.index')}}">Point to Wallate</a></li>
                     <!-- <li><a href="{{route('redem.cashout')}}">Recharge or Withdraw</a></li> -->

                    

                    <li><a href="{{route('email.verify')}}">Verify or Change Email </a></li>
                     <li><a href="{{route('pass-change')}}">Password Change</a></li>
                      <li>
                            <a href="{{route('logout')}}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @auth
                        @if(auth()->user()->role_id == 3)
                            <li><a class="vendor-button" href="{{route('setup.vendor.form')}}">Become a Vendor</a></li>
                        @endif
                    @endauth
                    
                    @auth
                        @if(auth()->user()->role_id == 2)
                            <li><a class="vendor-button" href="{{routeHelper('dashboard')}}">Go TO Vendor Dashboard</a></li>
                        @endif
                    @endauth
                    
                </ul>
            </div>