<div class="ak-container">
    <div class="site-branding">
        <a href="{{ route('home') }}" class="custom-logo-link" rel="home" itemprop="url">
            <img src="https://storage.cloud.google.com/trip-journal-218803.appspot.com/WebConLogo.PNG" style="width:150px;" alt="LOGO">
        </a>
    </div>
    <!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation" role="navigation">
        <div id="toggle" class="">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
        <div class="primary-menu">
            {{-- <ul id="menu-primary-menu" class="menu">
                <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178"><a href="https://demo.accesspressthemes.com/construction/">Home</a></li>
                <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                    <a href="{{url('register')}}">Sign Up</a>
                </li>
                <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                    <a href="{{url('login')}}">Log In</a>
                </li>
                <li id="menu-item-220" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-220"><a href="https://demo.accesspressthemes.com/construction/contact-us/">Contact Us</a></li>
                
            </ul> --}}
            <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                        <a href="#">Contact Us</a>
                    </li> 
                </ul>
        </div>
        {{--
        <div class="search-toggle">
            <a href="javascript:void(0)" class="search-icon"><i class="fa fa-search"></i></a>
            <div class="ak-search">
                <form role="search" method="get" class="search-form" action="https://demo.accesspressthemes.com/construction/">
                    <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                        </label>
                    <input type="submit" class="search-submit" value="Search" />
                </form>
            </div>
        </div>
        <div class="header-cart-search">
            <div class="cart-list-wrap">
                <a href="https://demo.accesspressthemes.com/construction/cart/" class="cart-fa-icon">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="cart-count">0</span>
                    </a>
            </div>
        </div> --}}
    </nav>
    <!-- #site-navigation -->
</div>