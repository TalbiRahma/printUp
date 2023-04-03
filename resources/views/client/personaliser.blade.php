<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Home-03</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

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


<body>

    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    @include('inc.client.header')
    <!-- End Header -->

    <!-- Start Header -->
    <header class="header axil-header header-style-2">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Personnalisé</li>
                            </ul>
                            <h1 class="title">Personnalisé un produit</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img src="{{ asset('/mainassets/images/product/product-45.png') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->


        <!-- Start Mainmenu Area  -->
        <div class="axil-mainmenu aside-category-menu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li>
                                    <a href="#">Télechargé</a>
                                </li>
                                <li>
                                    <a href="#">Catalogue design</a>
                                </li>
                                <li>
                                    <a href="#">Mes design</a>
                                </li>
                                <li>
                                    <a href="#">Produit initial</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area  -->
    </header>

    <main class="main-wrapper">

        <!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-2">
            <div class="container">
                <div class="slider-offset-left">
                    <div class="row row-20">
                        <div class="row row-cols-xl row-cols-1 col-lg-6">
                            <div class="col">
                                <div class="axil-product-list">
                                    <div class="product-content1">
                                        <img src="{{ asset('uploads/T-shirt.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <div class="row row-cols-xl row-cols-1">
                                        <div class="col">
                                            <div class="axil-product-list">
                                                <div class="product-content2">
                                                    <img src="{{ asset('mainassets/images/product/design.png') }}"
                                                        alt="Product">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div>
                                        <h4 class="mb-3">nom design</h4>
                                        <h5 class="text-secondary mb-3 mt-3">nom boutique</h5>
                                        <h6 class="text-secondary mb-3 mt-3">Category</h6>
                                        <h3 class="mt-3">15 TND</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12 ps-4 mt-3">
                                <h3>Nom produit personanlisée</h3>
                                <h5 class="text-secondary mb-3">Prix Produit Initial: 30 TND</h5>
                                <h6 class="text-secondary">size: xs , s</h6>

                                <h5>Total: 45 TND</h5>

                                <div class="group-btn">
                                    <a href="" class="axil-btn btn-bg-primary">Ajouter au boutique</a>
                                    <a href="" class="axil-btn btn-bg-secondary">Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->




    </main>



    <!-- Start Footer Area  -->
    @include('inc.client.footer')
    <!-- End Footer Area  -->






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

    <style>
        .product-content1 img {
            width: 100% !important;
            height: auto !important;

        }

        .product-content2 img {
            width: 100% !important;
            height: auto !important;

        }

        .axil-product-list {
  display: flex;
  justify-content: center;
  align-items: center;
}

    </style>

</body>

</html>
