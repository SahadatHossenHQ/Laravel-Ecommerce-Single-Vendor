<div class="main-menu">
    <div class="container">
        <div class="back">
            <i class="fas fa-long-arrow-alt-left"></i> back
        </div>
        <div class="collpase-menu-open" style="display: none;">
            <a id="menu" class="active" href="#">MENU</a>
            <a id="cat" href="#">CATEGORIES</a>
        </div>
        
        <div class="nav-bar">
            <div class="header-category-wrap">
                <div class="header-category-nav">
                    <span><i class="icofont icofont-navigation-menu"></i></span>
                    Categories
                    <span class="arrow"></span>
                    <section class="hero-area" style="display: {{Request::is('/') ? 'block':''}}">
                        <div class="container">
                            <div class="row" id="superCat">
                            </div>
                        </div>
                    </section>
                </div>
                <div id="subCat"></div>
            </div>
            <div class="nav-menus">
                <ul>
                    <li><a href="{{route('home')}}" class="{{Request::is('/') ? 'active':''}}">Home</a></li>
                    <li><a href="{{route('product')}}" class="{{Request::is('product*') ? 'active':''}}">Shop</a></li>
                    <li><a href="{{route('contact')}}" class="{{Request::is('contact') ? 'active':''}}">About Us</a></li>
                    <li><a href="{{route('contact')}}" class="{{Request::is('contact') ? 'active':''}}">Contact Us</a></li>
                    <li><a href="tel:{{setting('SITE_INFO_PHONE')}}">Hotline: {{setting('SITE_INFO_PHONE')}}</a></li>
                    {{-- <li class="submenu" style="position:relative !important"><a href="{{route('blogs')}}">Updates</a></li> --}}
                    {{-- <li><a href="{{route('track')}}" class="{{Request::is('track*') ? 'active':''}}">Order Track</a></li> --}}
                    {{-- <li><a href="{{route('category')}}" class="{{Request::is('category*') ? 'active':''}}">All Category</a></li> --}}
                    {{-- <li><a href="{{route('sheba')}}" class="{{Request::is('sheba') ? 'active':''}}"><i class="icofont icofont-live-support"></i>Sheba</a></li> --}}
                    {{-- <li><a href="{{route('service')}}" class="{{Request::is('service') ? 'active':''}}"><i class="icofont icofont-live-support"></i>Sheba</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    header {
        border-bottom: none !important;
    }
</style>