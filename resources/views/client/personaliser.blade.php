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
                                    <a type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Télechargé
                                    </a>
                                </li>
                                <!-- Button trigger modal -->

                                <!-- Product Quick View Modal Start -->
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
                                                    <form class="singin-form" method="POST" action="{{ route('add.design') }}"
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
                                                            <select class="form-control" name="category_design"
                                                                id="choices-button" placeholder="Departure">
                                                                @foreach ($category_design as $cd)
                                                                    <option value="{{ $cd->id }}">
                                                                        {{ $cd->name }}
                                                                    </option>
                                                                @endforeach
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
                                <!-- Product Quick View Modal End -->



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
                                        <img src="{{ asset('uploads') }}/{{ $initial_product->photo }}"
                                            alt="Product">
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
                                <h5 class="text-secondary mb-3">Prix {{ $initial_product->name }}:
                                    {{ $initial_product->price }} TND</h5>
                                <div class="product-variations-wrapper">

                                    <!-- Start Product Variation  -->
                                    <div class="product-variation product-size-variation">
                                        @if ($initial_product->sizes)
                                            @php $sizes = json_decode($initial_product->sizes, true); @endphp
                                            <div class="product-variation">
                                                @if (count($sizes) > 0)
                                                    <h6 class="title">Size:</h6>
                                                @endif
                                                <ul class="range-variant">

                                                    @foreach ($sizes as $size)
                                                        <li>{{ $size }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        @endif
                                    </div>
                                    <!-- End Product Variation  -->

                                </div>


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
