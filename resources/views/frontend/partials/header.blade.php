<header class="header-area p-relative">

    <!-- Start Top Header -->
    <div class="top-header bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6">
                    <ul class="header-left-content">
                        <li>
                            <i class="bx bx-phone-call"></i>
                            <a href="tel:+1 (845) 244-1680">+1 (845) 244-1680</a>
                        </li>
                        <li>
                            <i class="bx bx-phone-call"></i>
                            <a href="tel:+88 01710-179900">+88 01710-179900</a>
                        </li>
                        <li>
                            <i class="bx bxs-envelope"></i>
                            <a href="mailto:support@cortexsof.com">support@cortexsof.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <ul class="header-right-content">
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Top Header -->

    <!-- Start Navbar Area -->
    @foreach ($logos as $logo)
        <div class="navbar-area navbar-area-two">
            <div class="mobile-nav">
                <div class="container">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ url('uploads/logo/' . $logo->image) }}" alt="Logo"
                            style="border-radius: 100%;height: 85px;">
                    </a>
                </div>
            </div>

            <div class="main-nav">
                <div class="container">

                    <nav class="navbar navbar-expand-md">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ url('uploads/logo/' . $logo->image) }}" alt="Logo"
                                style="border-radius: 50%">
                        </a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav m-auto">
                                <br><br>
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link active">
                                        HOME
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#aboutus" class="nav-link">
                                        ABOUT US
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('glance') }}" class="nav-link"><i
                                                    class="fa-solid fa-angles-right"></i>&nbsp &nbsp AT A GLANCE</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('mission.vision') }}" class="nav-link"><i
                                                    class="fa-solid fa-angles-right"></i>&nbsp &nbsp MISSION &
                                                VISION</a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="{{ route('message.ceo') }}" class="nav-link"><i
                                                    class="fa-solid fa-angles-right"></i>&nbsp &nbsp MESSAGE FROM
                                                C.E.O</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#product" class="nav-link">PRODUCTS</a>

                                    <ul class="dropdown-menu">
                                        @foreach ($product as $p)
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">{{ $p->product_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </li>

                                <li class="nav-item">
                                    <a href="#service" class="nav-link">SERVICES</a>

                                    <ul class="dropdown-menu">
                                        @foreach ($service as $s)
                                            <li class="nav-item">
                                                <a href="{{ route('single-service', $s->slug) }}"
                                                    class="nav-link">{{ $s->service_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>



                                <li class="nav-item">
                                    <a href="#package" class="nav-link">PACKAGES</a>

                                    <ul class="dropdown-menu">
                                        @foreach ($packages as $package)
                                            <li class="nav-item">
                                                <a href="{{ route('single-package', $package->slug) }}"
                                                    class="nav-link"><i class="fa-solid fa-angles-right"></i>&nbsp
                                                    &nbsp {{ $package->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>


                                <li class="nav-item">
                                    <a href="#blog" class="nav-link">BLOG</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('team') }}" class="nav-link">TEAM</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('contact.us') }}" class="nav-link">CONTACT US</a>
                                </li>

                                @if (auth()->user())
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">{{ auth()->user()->name }}</a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('user.profile', auth()->user()->id) }}" class="nav-item nav-link"><i class="fas fa-user"></i>&nbsp &nbsp My Profile</a>
                                            <a href="{{ route('user.orders', auth()->user()->id) }}" class="nav-item nav-link"><i class="fas fa-shopping-bag"></i>&nbsp &nbsp My Orders </a>
                                            <a href="{{ route('logout') }}" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i> &nbsp &nbsp Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link active">LOGIN</a>
                                </li>
                            @endif
                            @if (auth()->user())
                            <div class="nav-item">
                                <li class="cart-icon">
                                    <a href="{{route('user.cart', auth()->user()->id)}}" class=" nav-link"><span class="bx bx-cart"></span>
                                        {{ session()->has('cart') ? count(session()->get('cart')) : 0 }}
                                    </a>
                                </li>
                            </div>
                            @endif
                                {{-- @if (auth()->user())
                                <li class="nav-item">
                                    <a href="{{ route('user.profile', auth()->user()->id) }}" class="nav-item nav-link"
                                        style="padding-left: 3.5rem;">
                                        <i class="fa fa-user"></i>
                                        <span>{{ auth()->user()->name }} </span>
                                        <span class="badge badge-danger">{{ session()->has('cart') ? count(session()->get('cart')) : 0 }}</span>
                                    </a>
                                    @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link active">LOGIN</a>
                                    </li>
                                </li>
                                @endif --}}
                            </ul>


                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive"></div>

        </div>
    @endforeach
    <!-- End Navbar Area -->
</header>
