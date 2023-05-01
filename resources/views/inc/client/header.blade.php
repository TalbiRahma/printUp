<header class="header axil-header header-style-5">
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm">
                    <div class="header-top-link">
 
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                <ul class="quick-link">
                                    @auth
                                        <li><a href="{{ url('/home') }}"
                                                class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}"
                                                class="text-sm text-gray-700 dark:text-gray-500 underline">Connexion</a>
                                        </li>

                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}"
                                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Inscrire</a>
                                            </li>
                                        @endif
                                    @endauth
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    
                    <a href="{{ route('home') }}" class="logo logo-dark">
                        <img src="{{ asset('/dashassets/img/PrintUp-logo.png') }}" class="print-logo" alt="Site Logo">
                    </a>
                    <a href="{{ route('home') }}" class="logo logo-light">
                        <img src="{{ asset('/dashassets/img/PrintUp-logo.png') }}" class="print-logo" alt="Site Logo">
                    </a>
                </div>

                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.html" class="logo">
                                <img src="{{asset('/mainassets/images/logo/logo.png')}}" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="menu-item-has-children">
                                <a href="#">Magasin</a>
                                <ul class="axil-submenu">
                                    <li><a href="{{ route('products.index') }}">Produits</a></li>
                                    <li><a href="{{ route('designs.index') }}">Designs</a></li>
                                    <li><a href="{{ route('Costumize.products.index') }}">Personnaliser</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Categories</a>
                                <ul class="axil-submenu">
                                    <h4>Produits</h4>
                                    <ul>
                                        @foreach ($category_product as $cp)
                                        <li><a href="shop-sidebar.html">{{$cp->name}}</a></li>
                                        @endforeach
                                        
                                        
                                    </ul>
                                    <h4>Designs</h4>
                                    <ul>
                                        @foreach ($category_design as $cd )
                                        <li><a href="single-product-2.html">{{$cd->name}}</a></li>
                                        @endforeach
                                        
                                        
                                    </ul>
                                </ul>
                            </li> 
                            <li><a href="#">Boutiques</a></li>
                                <li><a href="#">A propos</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-xl-block d-none">
                            <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="Qu'est-ce que tu cherches?" autocomplete="off">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="flaticon-magnifying-glass"></i>
                            </button>
                        </li>
                        <li class="axil-search d-xl-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-heart"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <span class="title">Listes Des Favories</span>
                                <ul>
                                    <li>
                                        @if (auth()->user())
                                            <a href="{{route('product.wishlist')}}">Mes produits favoris</a>
                                        @else
                                            <a href="{{ route('register') }}">Mes produits favoris</a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (auth()->user())
                                            <a href="{{route('design.wishlist')}}">Mes designs favoris</a>
                                        @else
                                            <a href="{{ route('register') }}">Mes designs favoris</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="shopping-cart">
                            @if(auth()->user())
                            <a href="#" class="cart-dropdown-btn">
                                @if ($commande)
                                    <span class="cart-count">{{ $commande->lignecommandes->count() }}</span>
                                    @else 
                                    <span class="cart-count">0</span>
                                    @endif
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                            @else
                            <div href="#" class="cart-dropdown-btn">
                                <span class="cart-count">3</span>
                                <i class="flaticon-shopping-cart"></i>
                            </div>
                            @endif
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <span class="title">MON COMPTE</span>
                                <ul>
                                    <li>
                                        @if(auth()->user())
                                        @if(Auth::user()->role == 'admin')
                                        <a href="{{ route('donnes.profil')}}">Profile</a>
                                        @else
                                        <a href="{{route('account')}}">Profile</a>
                                        @endif
                                        @else
                                        <a href="{{route('register')}}">Profile</a>
                                        @endif
                                    </li>
                                    <li>
                                        @if(auth()->user())
                                        <a href="#">Mon Boutique</a>
                                        @else
                                        <a href="{{route('register')}}">Mon Boutique</a>
                                        @endif
                                    </li>
                                    <li>
                                        @if(auth()->user())
                                            @if(Auth::user()->role == 'admin')
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                            @else
                                            <a href="">Modifier Profile</a>
                                            @endif
                                        @endif
                                    </li>
                                </ul>
                                @if(auth()->user())
                                <a href="{{ route('login') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="axil-btn btn-bg-primary">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">Connexion</a>
                                <div class="reg-footer text-center">Pas encore de compte? <a href="{{ route('register') }}" class="btn-link">Inscrire.</a></div>
                                @endif
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
    <div class="header-top-campaign">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<style>
    .print-logo{
        height: 45px;
        width: auto;
        
    }
</style>

<!--cart dropdown-->
@include('inc.client.dropcart')
<!--end cart dropdown-->


<!-- Header Search Modal End -->
@include('inc.client.search')
<!-- Header Search Modal End -->