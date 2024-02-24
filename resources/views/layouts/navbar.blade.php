        <!-- Navbar Start -->
        <div class="container-fluid mb-5">
            <div class="row border-top px-xl-5">
                <livewire:category-component />
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="/" class="text-decoration-none d-block d-lg-none">
                            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="/" class="nav-item nav-link active">Home</a>
                                <a href="{{ route('products.index') }}" class="nav-item nav-link">Shop</a>
                                <a href="/" class="nav-item nav-link">About</a>
                                <a href="contact.html" class="nav-item nav-link">Contact</a>
                                <a href="/" class="nav-item nav-link">Blog</a>
                                <a href="/" class="nav-item nav-link">FAQs</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                @guest
                                @if (Route::has('login'))
                                <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                                @endif
                                @if(Route::has('register'))
                                <a href="{{route('register')}}" class="nav-item nav-link">Register</a>
                                @endif
                    @endguest

                    @auth
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user"></i> {{ Auth::user()->name }}</span></a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="/home" class="dropdown-item">My Craft</a>
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                      @endauth

                            </div>
                        </div>
                    </nav>
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="height: 410px;">
                                <img class="img-fluid" src="{{ asset('front/img/carousel-1.jpg') }}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" style="height: 410px;">
                                <img class="img-fluid" src="{{ asset('front/img/carousel-2.jpg') }}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-prev-icon mb-n2"></span>
                            </div>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-next-icon mb-n2"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->