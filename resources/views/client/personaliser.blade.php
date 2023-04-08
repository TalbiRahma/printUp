<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pérsonnaliser</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/mainassets/images/bootstrap.min.css') }}">

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
                                    <a type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Télechargé
                                    </a>
                                </li>
                                <!-- Button trigger modal -->

                                <!--Modal Ajout design-->
                                <div class="modal fade quick-view-product" id="exampleModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter votre design
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="far fa-times"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="single-product-thumb">
                                                    <form class="singin-form" method="POST" action=""
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="col-6">
                                                            <label class="ps-5">Ajouter votre design</label>
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">

                                                                    <input type="file" class="form-control"
                                                                        name="photo" accept="image/*"
                                                                        aria-describedby="button-addon2"
                                                                        placeholder="Ajouter votre design">
                                                                    @error('photo')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Ajouter le nom de design</label>
                                                                <input name="name" type="text"
                                                                    class="form-control" placeholder="Nom de Design"
                                                                    required autofocus>
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-5">
                                                            <label>Ajouter la decription</label>
                                                            <textarea name="description" type="text" class="form-control" placeholder="Description" required></textarea>

                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label>Choisir la categorie de votre design</label>
                                                            <select class="form-control" name="category_product"
                                                                id="choices-button" placeholder="Departure">

                                                            </select>

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label>Ajouter le prix de votre design</label>
                                                            <input name="price" type="text" class="form-control"
                                                                placeholder="Prix de design" required>
                                                            @error('price')
                                                                <div class="class alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <button type="submit"
                                                                class="axil-btn btn-bg-primary submit-btn">Ajouter
                                                                Design</button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal Ajout Design-->
                                <li>
                                    <a type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#catalogue">Designs Favorie</a>
                                </li>
                                <!-- Product Quick View Modal Start -->
                                <div class="modal fade quick-view-product" id="catalogue" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Design Favorie
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="far fa-times"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="single-product-thumb">
                                                    <form class="singin-form" method="POST" action=""
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="container">
                                                            <div class="arrow-top-slide">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <div class="row">
                                                                            <div class="col mb-0">
                                                                                <a href="#"><i
                                                                                        class="far fa-times"></i></a>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <img src="{{ asset('/uploads/642b202be9c98.jpg') }}"
                                                                                    width="125px" alt="">
                                                                            </div>
                                                                            <h5 class="mb-1 mt-1">name design</h5>
                                                                            <h6 class="mb-1 mt-1">name boutique</h6>
                                                                            <p class="mb-1 mt-1">prix: 05 TND</p>
                                                                            <div class="justify-content-center mb-4 mt-2">
                                                                                <button type="button"
                                                                                    class="axil-btn-custom">Personnalisé</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Quick View Modal End -->
                                <li>
                                    <a type="button" class="" data-bs-toggle="modal"
                                    data-bs-target="#userdesign">Mes designs</a>
                                </li>
                                <!-- Product Quick View Modal Start -->
                                <div class="modal fade quick-view-product" id="userdesign" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mes design
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="far fa-times"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="single-product-thumb">
                                                    <form class="singin-form" method="POST" action=""
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="container">
                                                            <div class="arrow-top-slide">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <div class="row">
                                                                            <div class="col mb-0">
                                                                                <a href="#"><i
                                                                                        class="far fa-times"></i></a>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <img src="{{ asset('/uploads/642b202be9c98.jpg') }}"
                                                                                    width="125px" alt="">
                                                                            </div>
                                                                            <h5 class="mb-1 mt-1">name design</h5>
                                                                            <h6 class="mb-1 mt-1">Categorie</h6>
                                                                            <p class="mb-1 mt-1">prix: 05 TND</p>
                                                                            <div class="justify-content-center mb-4 mt-2">
                                                                                <button type="button"
                                                                                    class="axil-btn-custom">Personnalisé</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Quick View Modal End -->
                                <li>
                                    <a type="button" class="" data-bs-toggle="modal"
                                    data-bs-target="#produitinitial">Produits Favorie</a>
                                </li>
                                <!-- Product Quick View Modal Start -->
                                <div class="modal fade quick-view-product" id="produitinitial" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mes design
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="far fa-times"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="single-product-thumb">
                                                    <form class="singin-form" method="POST" action=""
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="container">
                                                            <div class="arrow-top-slide">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <div class="row">
                                                                            <div class="col mb-0">
                                                                                <a href="#"><i
                                                                                        class="far fa-times"></i></a>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <img src="{{ asset('/uploads/T-shirt.jpg') }}"
                                                                                    width="150px" alt="">
                                                                            </div>
                                                                            <h5 class="mb-1 mt-1">name produit</h5>
                                                                            <h6 class="mb-1 mt-1">Categorie</h6>
                                                                            <p class="mb-1 mt-1">prix: 30 TND</p>
                                                                            <p class="mb-1 mt-1">size: S , L</p>
                                                                            <div class="justify-content-center mb-4 mt-2">
                                                                                <button type="button"
                                                                                    class="axil-btn-custom">Personnalisé</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Quick View Modal End -->
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
                <div class="buttondrop show">
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

        .axil-btn-custom{
            background-color: #5e72e4 !important;
            color: #FFFFFF !important;
            font-size: 15px !important;
            border-radius: 5px !important;
            border: none !important;
            width: 130px;
            height: 30px;
            justify-content: center;
        }
    </style>


</body>

</html>
