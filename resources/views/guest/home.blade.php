<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Home-01</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/mainassets/images/favicon.png') }}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('/mainassets/css/style.min.css') }}">

</head>


<body class="sticky-header newsletter-popup-modal">

    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <header class="header axil-header header-style-1">
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
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="{{ route('home') }}" class="logo logo-dark">
                            <img src="{{ asset('/mainassets/images/logo/logo.png') }}" alt="Site Logo">
                        </a>
                        <a href="{{ route('home') }}" class="logo logo-light">
                            <img src="{{ asset('/mainassets/images/logo/logo-light.png') }}" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="{{ asset('/mainassets/images/logo/logo.png') }}" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li class="menu-item-has-children">
                                    <a href="#">Magasin</a>
                                    <ul class="axil-submenu">
                                        <li><a href="{{ route('magasin.produit') }}">Produits</a></li>
                                        <li><a href="{{ route('magasin.design') }}">Designs</a></li>
                                        <li><a href="{{ route('magasin.personnaliser') }}">Personnaliser</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Categories</a>
                                    <ul class="axil-submenu">
                                        <h4>Produits</h4>
                                        <ul>
                                            @foreach ($category_product as $cp)
                                                <li><a href="shop-sidebar.html">{{ $cp->name }}</a></li>
                                            @endforeach


                                        </ul>
                                        <h4>Designs</h4>
                                        <ul>
                                            @foreach ($category_design as $cd)
                                                <li><a href="single-product-2.html">{{ $cd->name }}</a></li>
                                            @endforeach


                                        </ul>
                                    </ul>
                                </li>
                                <li><a href="#">Boutiques</a></li>
                                <li><a href="#">A propos</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <span class="cart-count">3</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title">QUICKLINKS</span>
                                    <ul>
                                        <li>
                                            @if(auth()->user())
                                            @if(Auth::user()->role == 'admin')
                                                <a href="{{ route('donnes.profil')}}">My Account</a>
                                            @else
                                                <a href="#">My Account</a>
                                            @endif
                                            @endif
                                        </li>
                                        <li>
                                            <a href="#">Initiate return</a>
                                        </li>
                                        <li>
                                            <a href="#">Support</a>
                                        </li>
                                        <li>
                                            <a href="#">Language</a>
                                        </li>
                                    </ul>
                                    <div class="login-btn">
                                        <a href="/login" class="axil-btn btn-bg-primary">Login</a>
                                    </div>
                                    <div class="reg-footer text-center">No account yet? <a href="/register"
                                            class="btn-link">REGISTER HERE.</a></div>
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
    </header>

    <main class="main-wrapper">
        <div class="axil-main-slider-area main-slider-style-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-sm-6">
                        <div class="main-slider-content">
                            <div class="slider-content-activation-one">
                                <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="400"
                                    data-sal-duration="800">
                                    <h1 class="title">Print Your Passion</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-6">
                        <div class="main-slider-large-thumb">
                            <div class="slider-thumb-activation-one axil-slick-dots">
                                <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600"
                                    data-sal-duration="1500">
                                    <img src="{{ asset('/mainassets/images/product/product-38.png') }}"
                                        alt="Product">
                                    <div class="product-price">
                                        <span class="text">From</span>
                                        <span class="price-amount">$49.00</span>
                                    </div>
                                </div>

                                <div class="single-slide slick-slide">
                                    <img src="{{ asset('/mainassets/images/product/product-39.png') }}"
                                        alt="Product">
                                    <div class="product-price">
                                        <span class="text">From</span>
                                        <span class="price-amount">$49.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1"><img src="{{ asset('/mainassets/images/others/shape-1.png') }}" alt="Shape">
                </li>
                <li class="shape-2"><img src="{{ asset('/mainassets/images/others/shape-2.png') }}" alt="Shape">
                </li>
            </ul>
        </div>

        <!-- Start Categorie Area  -->
        <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i>
                        Categories</span>
                    <h2 class="title">Parcourir Par Catégorie</h2>
                </div>
                <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200"
                            data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-4.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Phones</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="300"
                            data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-5.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Computers</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="400"
                            data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-11.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Accessories</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="500"
                            data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-6.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Laptops</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="600"
                            data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-2.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Monitors</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="700"
                            data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-7.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Networking</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="800"
                            data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-8.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">PC Gaming</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-1.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Smartwatches</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-9.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Headphones</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-10.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Camera & Photo</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-8.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Video Games</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/mainassets/images/product/categories/elec-1.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Sports</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Categorie Area  -->

        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>Nos
                        produits</span>
                    <h2 class="title">Découvrez Nos Produits</h2>
                </div>
                <div
                    class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <!--Single Product  -->
                            @foreach ($initial_products as $p)
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="single-product.html">
                                                <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800"
                                                    loading="lazy" class="main-img"
                                                    src="{{ asset('uploads') }}/{{ $p->photo }}"
                                                    alt="Product Images">
                                                <img class="hover-img"
                                                    src="{{ asset('uploads') }}/{{ $p->photo }}"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#quick-view-modal"><i
                                                                class="far fa-eye"></i></a></li>
                                                    <li class="select-option">
                                                        <a href="single-product.html">
                                                            Personnalisé
                                                        </a>
                                                    </li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="far fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <div class="product-rating">
                                                    <span class="icon">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                    <span class="rating-number">(64)</span>
                                                </div>
                                                <h5 class="title"><a
                                                        href="single-product.html">{{ $p->name }}</a></h5>
                                                <div class="product-price-variant">
                                                    <span class="price current-price">{{ $p->price }} TND</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Product  -->
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="{{ asset('/mainassets/images/product/electric/product-01.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li class="select-option"><a
                                                        href="single-product.html">Personnalisé</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">product name</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">40TND</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">Voir Tous Les Produits</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Expolre Product Area  -->


        <!-- Start New Arrivals Product Area  -->
        <div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"><i class="far fa-image"></i>Désigns</span>
                        <h2 class="title">Découvrez Les Désigns</h2>
                    </div>
                    <div
                        class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-two">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="zoom-out" data-sal-delay="300" data-sal-duration="500"
                                            src="{{ asset('/mainassets/images/product/electric/product-06.png') }}"
                                            alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">name design</a></h5>
                                        <h6 class=""><a href="single-product.html">boutique</a></h6>
                                        <div class="product-price-variant">
                                            <span class="price current-price">40TND</span>
                                        </div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                            </li>
                                            <li class="select-option"><a href="single-product.html">Personnalisé</a>
                                            </li>
                                            <li class="wishlist"><a href="wishlist.html"><i
                                                        class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center mt--20 mt_sm--0">
                            <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">Voir Tous Les
                                Désigns</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End New Arrivals Product Area  -->

        <!-- Start Most Sold Product Area  -->
        <div class="axil-most-sold-product axil-section-gap">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper section-title-center">
                        <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i>Produits
                            Personnalisés</span>
                        <h2 class="title">Découvrez Les Produits Personnalisés</h2>
                    </div>
                    <div class="row row-cols-xl-2 row-cols-1 row--15">
                        <div class="col">
                            <div class="axil-product-list">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500"
                                            src="{{ asset('/mainassets/images/product/electric/product-09.png') }}"
                                            alt="Yantiti Leather Bags">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        <span class="rating-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fal fa-star"></i>
                                        </span>
                                        <span class="rating-number"><span>100+</span> Reviews</span>
                                    </div>
                                    <h6 class="product-title"><a href="single-product.html">name personalises</a></h6>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                    </div>
                                    <div class="product-cart">
                                        <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                        <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Most Sold Product Area  -->

        <div class="axil-why-choose-area pb--50 pb_sm--30">
            <div class="container">

                <!-- Start Testimonila Area  -->
                <div class="axil-testimoial-area axil-section-gap bg-vista-white">
                    <div class="container">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-secondary"> <i
                                    class="fal fa-quote-left"></i>Testimonials</span>
                            <h2 class="title">Users Feedback</h2>
                        </div>
                        <!-- End .section-title -->
                        <div
                            class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="{{ asset('/mainassets/images/testimonial/image-1.png') }}"
                                            alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="{{ asset('/mainassets/images/testimonial/image-2.png') }}"
                                            alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="{{ asset('/mainassets/images/testimonial/image-3.png') }}"
                                            alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="{{ asset('/mainassets/images/testimonial/image-2.png') }}"
                                            alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->

                        </div>
                    </div>
                </div>
                <!-- End Testimonila Area  -->

            </div>
        </div>



        <!-- Start Why Choose Area  -->
        <div class="axil-why-choose-area pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-secondary"><i class="fal fa-thumbs-up"></i>Pourquoi
                        Nous</span>
                    <h2 class="title">Pourquoi Les Gens Nous Choisissent</h2>
                </div>
                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('/mainassets/images/icons/service6.png') }}" alt="Service">
                            </div>
                            <h6 class="title">Livraison Rapide &amp; Sécurisée</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('/mainassets/images/icons/service7.png') }}" alt="Service">
                            </div>
                            <h6 class="title">100% Garantie Sur Le Produit</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('/mainassets/images/icons/service8.png') }}" alt="Service">
                            </div>
                            <h6 class="title">Politique De Retour De 24H</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('/mainassets/images/icons/service9.png') }}" alt="Service">
                            </div>
                            <h6 class="title">Politique De Retour De 24H</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{ asset('/mainassets/images/icons/service10.png') }}" alt="Service">
                            </div>
                            <h6 class="title">Qualité Professionnelle</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Why Choose Area  -->


        <!-- Start Axil Product Poster Area  -->

        <!-- End Axil Product Poster Area  -->

        <!-- Start Axil Newsletter Area  -->
        @include('inc.client.newsletter')
        <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->

    </main>

    <!-- Start Footer Area  -->
    @include('inc.client.footer')
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div
                                            class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="{{ asset('/mainassets/images/product/product-big-01.png') }}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('/mainassets/images/product/product-big-01.png') }}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('/mainassets/images/product/product-big-02.png') }}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('/mainassets/images/product/product-big-02.png') }}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('/mainassets/images/product/product-big-03.png') }}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('/mainassets/images/product/product-big-03.png') }}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('/mainassets/images/product/product-thumb/thumb-08.png') }}"
                                                    alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('/mainassets/images/product/product-thumb/thumb-07.png') }}"
                                                    alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('/mainassets/images/product/product-thumb/thumb-09.png') }}"
                                                    alt="thumb image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="{{ asset('/mainassets/images/icons/rate.png') }}"
                                                    alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Table</h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi
                                            pretium. Integer ante est, elementum eget magna. Pellentesque sagittis
                                            dictum libero, eu dignissim tellus.</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Size:</h6>
                                                <ul class="range-variant">
                                                    <li>xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->

                                        </div>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a href="cart.html"
                                                        class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html"
                                                        class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                                </li>
                                            </ul>
                                            <!-- End Product Action  -->

                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    @include('inc.client.search')
    <!-- Header Search Modal End -->


    <!--cart dropdown-->
    @include('inc.client.dropcart')
    <!--end cart dropdown-->

    <!-- Offer Modal Start -->
    <div class="offer-popup-modal" id="offer-popup-modal">
        <div class="offer-popup-wrap">
            <div class="card-body">
                <button class="popup-close"><i class="fas fa-times"></i></button>
                <div class="content">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>
                            Don’t Miss!!</span>
                        <h3 class="title">Best Sales Offer<br> Grab Yours</h3>
                    </div>
                    <div class="poster-countdown countdown"></div>
                    <a href="shop.html" class="axil-btn btn-bg-primary">Shop Now <i
                            class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="closeMask"></div>
    <!-- Offer Modal End -->
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('/mainassets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('/mainassets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('/mainassets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('/mainassets/js/vendor/waypoints.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/mainassets/js/main.js') }}"></script>

    <!--size selected-->
    

</body>

</html>
