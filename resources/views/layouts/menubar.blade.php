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
                            {{-- <a href="{{route("home")}}">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a> --}}
                            <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                            <a href="{{url('search')}}">Search</a>
                        </li> 
                        <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-22 current_page_item menu-item-178">
                            <a href="#">Contact Us</a>
                        </li> 
                </ul>
        </div>
    </nav>
</div>