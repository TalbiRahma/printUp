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
                                                    <form class="singin-form" method="POST"
                                                        action="{{ route('add.design') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">
                                                        <input type="hidden" name="id"
                                                            value="{{ mt_rand(100000, 999999) }}">

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
                                <!-- Modal Ajout design End -->



                                <li>
                                    <a type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#catalogue">Designs Favoris</a>
                                </li>
                                <!-- Favorite Design Quick View Modal Start -->
                                <div class="modal fade quick-view-product" id="catalogue" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Design Favoris
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="far fa-times"></i></button>
                                            </div>
                                            <div class="modal-body">


                                                <div class="single-product-thumb">

                                                    <div class="container">
                                                        <div class="arrow-top-slide">
                                                            <div class="row">
                                                                @foreach ($favorite_designs as $fd)
                                                                    <div class="col-2">
                                                                        <form class="singin-form" method="POST"
                                                                            action="{{ route('modifier-design-favori') }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $fd->id }}">
                                                                            <div class="row">
                                                                                <div class="col mb-0">
                                                                                    <a href="#"><i
                                                                                            class="far fa-times"></i></a>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <img src="{{ asset('uploads') }}/{{ $fd->photo }}"
                                                                                        width="125px" alt="">
                                                                                </div>
                                                                                <h5 class="mb-1 mt-1">
                                                                                    {{ $fd->name }}</h5>
                                                                                <h6 class="mb-1 mt-1">name
                                                                                    boutique</h6>
                                                                                <p class="mb-1 mt-1">prix:
                                                                                    {{ $fd->price }} TND</p>
                                                                                <div
                                                                                    class="justify-content-center mb-4 mt-2">
                                                                                    <button type="submit"
                                                                                        class="axil-btn-custom">Personnalisé</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>






                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Favorite Design Quick View Modal End -->
                                <li>
                                    <a type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#userfaivoritedesign">Mes designs</a>
                                </li>
                                <!-- Mes Design Quick View Modal Start -->
                                <div class="modal fade quick-view-product" id="userfaivoritedesign" tabindex="-1"
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

                                                    <div class="container" id="favorite-designs">
                                                        <div class="arrow-top-slide">
                                                            <div class="row">
                                                                @foreach ($mes_design as $md)
                                                                    <div class="col-2">
                                                                        <form class="singin-form" method="POST"
                                                                            action="{{ route('modifier-design-favori') }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $md->id }}">
                                                                            <div class="row">
                                                                                <div class="col mb-0">
                                                                                    <a href="#"><i
                                                                                            class="far fa-times"></i></a>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <img src="{{ asset('/uploads') }}/{{ $md->photo }}"
                                                                                        width="125px" alt="">
                                                                                </div>
                                                                                <h5 class="mb-1 mt-1">
                                                                                    {{ $md->name }}</h5>
                                                                                <h6 class="mb-1 mt-1">
                                                                                    {{ $md->categorie_designs->name }}
                                                                                </h6>
                                                                                <p class="mb-1 mt-1">prix:
                                                                                    {{ $md->price }} TND</p>
                                                                                <div
                                                                                    class="justify-content-center mb-4 mt-2">
                                                                                    <button type="submit"
                                                                                        class="axil-btn-custom">Personnalisé</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mes Design View Modal End -->
                                <li>
                                    <a type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#produitinitial">Produits Favoris</a>
                                </li>


                                <!-- Faivorite Product Quick View Modal Start -->
                                <div class="modal fade quick-view-product" id="produitinitial" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Produits Favoris
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="far fa-times"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="single-product-thumb">

                                                    <div class="container">
                                                        <div class="arrow-top-slide">
                                                            <div class="row">
                                                                @foreach ($favorite_products as $fp)
                                                                    <div class="col-3">
                                                                        <form class="singin-form" method="post"
                                                                            action="{{ route('modifier_produit_initial', ['id' => $fp->id]) }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden"
                                                                                name="id_produit_favori"
                                                                                value="{{ $fp->id }}">
                                                                            <div class="row">
                                                                                <div class="col mb-0">
                                                                                    <a href="#"><i
                                                                                            class="far fa-times"></i></a>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <img src="{{ asset('uploads') }}/{{ $fp->photo }}"
                                                                                        width="150px" alt="">
                                                                                </div>
                                                                                <h5 class="mb-1 mt-1">
                                                                                    {{ $fp->name }}</h5>
                                                                                <h6 class="mb-1 mt-1">
                                                                                    {{ $fp->categorie_products->name }}
                                                                                </h6>
                                                                                <p class="mb-1 mt-1">prix:
                                                                                    {{ $fp->price }} TND</p>

                                                                                <div
                                                                                    class="justify-content-center mb-4 mt-2">
                                                                                    <button type="submit"
                                                                                        class="axil-btn-custom">Personnalisé</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Faivorite Product Quick View Modal End -->
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

        @php
            $product_data_json = session('product_data');
            $design_data_json = session('design_data');
            //$mon_design_data_json = session('mon_design_data');
            $product_data = json_decode($product_data_json, true);
            $design_data = json_decode($design_data_json, true);
            //$mon_design_data = json_decode($mon_design_data_json, true);
            //dd($design_data)
        @endphp
        @if ($product_data)
            <!-- Start Iniatial Product Slider Area -->
            <div class="axil-main-slider-area main-slider-style-2">
                <div class="container">
                    <div class="slider-offset-left">
                        <div class="row row-20">
                            <div class="row row-cols-xl row-cols-1 col-lg-6">
                                <div class="col">
                                    <div class="axil-product-list">
                                        <div class="product-content1">

                                            <img src="{{ asset('uploads') }}/{{ $product_data['photo'] }}"
                                                alt="Product">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                @if ($design_data)
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row row-cols-xl row-cols-1">
                                                <div class="col">

                                                    <div class="axil-product-list">
                                                        <div class="product-content2">

                                                            <img src="{{ asset('uploads') }}/{{ $design_data['photo'] }}"
                                                                alt="Product">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div>
                                                <h4 class="mb-3">{{ $design_data['name'] }}</h4>
                                                <h5 class="text-secondary mb-3 mt-3">nom boutique</h5>
                                                
                                                <h3 class="mt-3">{{ $design_data['price'] }} TND</h3>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row row-cols-xl row-cols-1">
                                                <div class="col">
                                                    <div class="axil-product-list">
                                                        <div id="design-image" class="product-content2">
                                                            <img src="{{ asset('mainassets/images/product/design.png') }}"
                                                                alt="Product">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div>
                                                <h4 id="design-name" class="mb-3">nom design</h4>
                                                <h5 class="text-secondary mb-3 mt-3">nom boutique</h5>
                                                
                                                <h3 id="design-price" class="mt-3">15 TND</h3>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row col-12 ps-4 mt-3">
                                    <h3>Nom produit personanlisée</h3>
                                    <h5 class="text-secondary mb-3">Prix {{ $product_data['name'] }}:
                                        {{ $product_data['price'] }} TND</h5>
                                    <div class="product-variations-wrapper">

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation product-size-variation">
                                            @if ($product_data['sizes'])
                                                @php $sizes = json_decode($product_data['sizes'], true); @endphp
                                                <div class="product-variation">
                                                    @if (!empty($sizes))
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
            <!-- End Iniatial Product Slider Area -->
        @else
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
                            @if ($design_data)
                                <div class="row">
                                    <div class="col-5">
                                        <div class="row row-cols-xl row-cols-1">
                                            <div class="col">

                                                <div class="axil-product-list">
                                                    <div class="product-content2">

                                                        <img src="{{ asset('uploads') }}/{{ $design_data['photo'] }}"
                                                            alt="Product">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div>
                                            <h4 class="mb-3">{{ $design_data['name'] }}</h4>
                                            <h5 class="text-secondary mb-3 mt-3">nom boutique</h5>
                                            
                                            <h3 class="mt-3">{{ $design_data['price'] }} TND</h3>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-5">
                                        <div class="row row-cols-xl row-cols-1">
                                            <div class="col">
                                                <div class="axil-product-list">
                                                    <div id="design-image" class="product-content2">
                                                        <img src="{{ asset('mainassets/images/product/design.png') }}"
                                                            alt="Product">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div>
                                            <h4 id="design-name" class="mb-3">nom design</h4>
                                            <h5 class="text-secondary mb-3 mt-3">nom boutique</h5>
                                            
                                            <h3 id="design-price" class="mt-3">15 TND</h3>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                                                @if (!empty($sizes))
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
        <!-- End Iniatial Product Slider Area -->
        @endif



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

    <script>
        $(document).ready(function() {
            // Envoyer une requête AJAX lorsqu'on clique sur le bouton "Personnalisé"
            $(".select-design").click(function() {
                var design_id = $(this).data('design-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('modifier-design-favori') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        design_id: design_id
                    },
                    success: function(response) {
                        // Mettre à jour les données du design affichées sans rafraîchissement de la page
                        $("#design-name").text(response.name);
                        $("#design-boutique").text(response.boutique_name);
                        $("#design-category").text(response.category_name);
                        $("#design-price").text(response.price + " TND");
                        $("#design-image").attr('src', "{{ asset('uploads') }}/" + response
                            .photo);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>


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

        .axil-btn-custom {
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
