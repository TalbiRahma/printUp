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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/dashassets/img/logo.png') }}">

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
                                <li class="axil-breadcrumb-item"><a
                                        href="\">Accueil</a></li>
                                <li class="separator">
                                </li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Personnalisé</li>
                            </ul>
                            <h1 class="title">Personnalisé un produit</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">

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
                                <div class="modal fade form-telecharger" id="exampleModal" tabindex="-1"
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
                                                        action="{{ route('upload.design') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">
                                                        <input type="hidden" name="boutique_id"
                                                            value="{{ auth()->user()->boutique->id }}">
                                                        <input type="hidden" name="id"
                                                            value="{{ mt_rand(100000, 999999) }}">
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
                                                        <div class="form-group">
                                                            <label>Ajouter le nom de design</label>
                                                            <input name="name" type="text" class="form-control"
                                                                placeholder="Nom de Design" required autofocus>
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ajouter la decription</label>
                                                            <textarea name="description" type="text" class="form-control" placeholder="Description" required></textarea>

                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Choisir la categorie de votre design</label>
                                                            <select class="form-control" style="font-size: 16px;"
                                                                name="category_design" id="choices-button">
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
                                                        <div class="form-group">
                                                            <label>Ajouter le prix de votre design</label>
                                                            <input name="price" type="text" class="form-control"
                                                                placeholder="Prix de design" required>
                                                            @error('price')
                                                                <div class="class alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="axil-btn-custom">Ajouter
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
                                                                        <div class="axil-product-list">
                                                                            <form class="singin-form" method="POST"
                                                                                action="{{ route('modifier.design') }}"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $fd->id }}">
                                                                                <div class="row">
                                                                                    <div class="col mb-0">
                                                                                        <a
                                                                                            href="{{ route('wishlist.delete.design', ['id' => $fd->id]) }}"><i
                                                                                                class="far fa-times"></i></a>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <img src="{{ asset('uploads') }}/{{ $fd->photo }}"
                                                                                            width="125px"
                                                                                            alt="">
                                                                                    </div>
                                                                                    <h5 class="mb-1 mt-1">
                                                                                        {{ $fd->name }}</h5>
                                                                                    <h6 class="mb-1 mt-1">
                                                                                        {{ $fd->boutique->name }}</h6>
                                                                                    <p class="mb-1 mt-1">Prix:
                                                                                        {{ $fd->price }} TND</p>
                                                                                    <div
                                                                                        class="justify-content-center mb-4 mt-2">
                                                                                        <button type="submit"
                                                                                            class="axil-btn-custom">Personnalisé</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
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
                                                                        <div class="axil-product-list">
                                                                            <form class="singin-form" method="POST"
                                                                                action="{{ route('modifier.design') }}"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $md->id }}">
                                                                                <div class="row">
                                                                                    <div class="col mb-0">
                                                                                        <a
                                                                                            href="{{ route('delete.design', ['id' => $md->id]) }}"><i
                                                                                                class="far fa-times"></i></a>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <img src="{{ asset('/uploads') }}/{{ $md->photo }}"
                                                                                            width="100%"
                                                                                            alt="">
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
                                                                        <div class="axil-product-list">
                                                                            <form class="singin-form" method="get"
                                                                                action="{{ route('personnaliser.produit', ['id' => $fp->id]) }}"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="idproduit"
                                                                                    value="{{ $fp->id }}">
                                                                                <div class="row">
                                                                                    <div class="col mb-0">
                                                                                        <a
                                                                                            href="{{ route('product.wishlist.delete', ['id' => $fp->id]) }}"><i
                                                                                                class="far fa-times"></i></a>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <img src="{{ asset('uploads') }}/{{ $fp->photo }}"
                                                                                            width="auto"
                                                                                            alt="">
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
                                                                                            class="axil-btn-custom ">Personnalisé</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
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
        @include('inc.flashmessage')
        @php
            $product_data_json = session('product_data');
            $design_data_json = session('design_data');
            //$custom_product_data_json = session('custom_product_data');
            $product_data = json_decode($product_data_json, true);
            $design_data = json_decode($design_data_json, true);
            //$custom_product_data = json_decode($custom_product_data_json, true);
            //dd($product_data)
        @endphp
        @if ($product_data)
            <!-- Custom Product Slider Area -->
            <div class="axil-main-slider-area main-slider-style-2">
                <div class="container">
                    <div class="slider-offset-left">
                        <div class="row row-20">
                            <div class="row row-cols-xl row-cols-1 col-lg-6">
                                <div class="col">
                                    <div class="axil-product-list">

                                        <div class="product-content1">

                                            <div id="product-container" style="position: relative;">

                                                <img src="{{ asset('uploads/') }}/{{ $product_data['photo'] }}"
                                                    alt="Product" id="product-image" />
                                                <div id="div1"
                                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                </div>

                                            </div>
                                            <div>
                                                <canvas id="merged-image"></canvas>
                                            </div>
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
                                                                alt="Product" id="design-image" draggable="true"
                                                                ondragstart="drag(event)" width="75"
                                                                height="90">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div>
                                                <h4 class="mb-3">{{ $design_data['name'] }}</h4>
                                                <!--<h5 class="text-secondary mb-3 mt-3"></h5>-->

                                                <h3 class="mt-3">{{ $design_data['price'] }} DT</h3>
                                            </div>
                                            <form id="your-form-id" action="{{ route('save_custom_product') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="idproduit"
                                                    value="{{ $product_data['id'] }}">
                                                @if (session('design_data'))
                                                    @php
                                                        $design_data = json_decode(session('design_data'), true);
                                                        $design_id = $design_data['id'];
                                                    @endphp
                                                    <input type="hidden" name="iddesign"
                                                        value="{{ $design_id }}">
                                                @endif
                                                <button id="save-button" type="submit"
                                                    class="axil-btn axil-btn-custom2 btn-bg-primary">Sauvegarder</button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row row-cols-xl row-cols-1">
                                                <div class="col">
                                                    <div class="axil-product-list">
                                                        <div class="product-content2">
                                                            <img src="{{ asset('mainassets/images/product/design.png') }}"
                                                                alt="Product" id="design-image"draggable="true"
                                                                ondragstart="drag(event)" width="75"
                                                                height="75">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div>
                                                <h4 id="design-name" class="mb-3">Nom Design</h4>
                                                <h5 class="text-secondary mb-3 mt-3">Nom Boutique</h5>
                                                <h3 id="design-price" class="mt-3">00 TND</h3>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row col-12 ps-4">
                                    <div class="">
                                        @if ($design_data)
                                            <h3>{{ $product_data['name'] }} {{ $design_data['name'] }}</h3>
                                        @else
                                            <h3>{{ $product_data['name'] }}</h3>
                                        @endif
                                    </div>

                                    <h5 class="text-secondary" style="margin-top: -20px;">Prix
                                        {{ $product_data['name'] }}:
                                        {{ $product_data['price'] }} DT</h5>
                                    <div class="product-variations-wrapper">

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation product-size-variation">

                                            @if ($product_data['sizes'])
                                                @php $sizes = json_decode($product_data['sizes'], true); @endphp
                                                <div class="product-variation" style="display: flex;">
                                                    @if (!empty($sizes))
                                                        <h6 class="title " style="display: margin-right: 10px;">
                                                            Taille:</h6>
                                                    @endif
                                                    <ul class="range-variant"
                                                        style="display: flex; margin-left: 20px;">
                                                        @if ($sizes)
                                                            @foreach ($sizes as $size)
                                                                <li class="size-btn"
                                                                    onclick="selectSize('{{ $size }}')">
                                                                    {{ $size }}</li>
                                                            @endforeach
                                                            <input type="hidden" name="selected_size"
                                                                id="selected_size">
                                                        @endif
                                                    </ul>
                                                </div>

                                            @endif
                                        </div>

                                        <!-- End Product Variation  -->

                                    </div>
                                    @if ($design_data)
                                        @if (Auth::user()->id == $design_data['user_id'])
                                            <h5>Total: {{ $design_data['price'] + $product_data['price'] }} DT</h5>
                                        @else
                                            <h5>Total: {{ 0 + $product_data['price'] }} DT</h5>
                                        @endif
                                    @else
                                        <h5>Total: {{ $product_data['price'] }} DT</h5>
                                    @endif

                                    <div class="group-btn" style="margin-top: 15px;">
                                        <form action="{{ route('command.add') }}" method="POST">
                                            @csrf
                                            <div class="product-quantity" data-title="Qty">
                                                <div class="pro-qty" style="margin-top: -10px;">
                                                    <input name="qte" id="quantityInput" type="number"
                                                        class="quantity-input" value="1">
                                                </div>
                                            </div>
                                            @if (session('custom_product_data'))
                                                @php
                                                    $custom_product_data = json_decode(session('custom_product_data'), true);
                                                    $custom_product_id = $custom_product_data['id'];
                                                @endphp
                                                <input type="hidden" name="custom_product_id"
                                                    value="{{ $custom_product_id }}">
                                                <input type="hidden" name="selected_size" id="sizesInput"
                                                    value="">
                                                <!-- <input type="hidden" name="qte" id="qteInput" value="">-->
                                                <button type="submit"
                                                    class="axil-btn axil-btn-custom2 btn-bg-secondary">Ajouter au
                                                    panier</button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Custom Product Slider Area -->

        @endif



    </main>



    <!-- Start Footer Area  -->
    @include('inc.argon.flashmessage')
    @include('inc.client.footer')
    <!-- End Footer Area  -->






    <!-- JS
============================================ -->

    <script src="https://unpkg.com/konva@9.0.2/konva.min.js"></script>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/merge-images"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-close').click(function() {
                $(this).closest('.alert-container').remove();
            });
        });
    </script>

    <script>
        var width = window.innerWidth;
        var height = window.innerHeight;
        var stage = new Konva.Stage({
            container: 'div1',
            width: 135,
            height: 160,
        });
        const layer = new Konva.Layer();
        stage.add(layer);
        // Récupérez l'élément image à partir de son ID
        var imageElement = document.getElementById('design-image');
        // Créez une instance de Konva.Image en utilisant l'élément image
        const image = new Konva.Image({
            x: 90,
            y: 90,
            image: imageElement,
            width: imageElement.width,
            height: imageElement.height,
            draggable: true,
        });
        layer.add(image);
        const tr = new Konva.Transformer({
            nodes: [image],
            anchorDragBoundFunc: function(oldPos, newPos, event) {
                // oldPos - is old absolute position of the anchor
                // newPos - is a new (possible) absolute position of the anchor based on pointer position
                // it is possible that anchor will have a different absolute position after this function
                // because every anchor has its own limits on position, based on resizing logic
                // do not snap rotating point
                if (tr.getActiveAnchor() === 'rotater') {
                    return newPos;
                }
                const dist = Math.sqrt(
                    Math.pow(newPos.x - oldPos.x, 2) + Math.pow(newPos.y - oldPos.y, 2)
                );
                // do not do any snapping with new absolute position (pointer position)
                // is too far away from old position
                if (dist > 10) {
                    return newPos;
                }
                const closestX = Math.round(newPos.x / cellWidth) * cellWidth;
                const diffX = Math.abs(newPos.x - closestX);
                const closestY = Math.round(newPos.y / cellHeight) * cellHeight;
                const diffY = Math.abs(newPos.y - closestY);
                const snappedX = diffX < 10;
                const snappedY = diffY < 10;
                // a bit different snap strategies based on snap direction
                // we need to reuse old position for better UX
                if (snappedX && !snappedY) {
                    return {
                        x: closestX,
                        y: oldPos.y,
                    };
                } else if (snappedY && !snappedX) {
                    return {
                        x: oldPos.x,
                        y: closestY,
                    };
                } else if (snappedX && snappedY) {
                    return {
                        x: closestX,
                        y: closestY,
                    };
                }
                return newPos;
            },
        });
        layer.add(tr);
        //image.on('dragmove', updateImageClonePosition);
        //image.on('transform', updateImageClonePosition);

        // Sélectionner les éléments img par leur ID
        /*var productImage = document.querySelector('#product-image');
        var designImage = document.querySelector('#design-image');

        // Obtenir les URL des images
        var productImageUrl = productImage.getAttribute('src');
        var designImageUrl = designImage.getAttribute('src');

        mergeImages([productImage, designImage])
            .then(b64 => document.querySelector('img').src = b64);

            mergeImages([
            { src: 'productImageUrl', x: 0, y: 0 },
            { src: 'designImageUrl', x: 32, y: 0 },
            
            ])
            .then(b64 => ...);*/


        /*var productImage = document.getElementById('merged-image');
         var designImage = document.getElementById('design-image');

         // Obtenir les URL des images
         var productImageUrl = productImage.getAttribute('src');
         var designImageUrl = designImage.getAttribute('src');

         mergeImages([productImage, designImage])
             .then(b64 => document.querySelector('img').src = b64);

         mergeImages([{
                     src: productImageUrl,
                     x: 0,
                     y: 0
                 },
                 {
                     src: designImageUrl,
                     x: 32,
                     y: 0
                 },
             ])
             .then(b64 => {
                 // Faire quelque chose avec l'image fusionnée
                 // Par exemple, mettre à jour la source d'une balise img avec l'image fusionnée
                 var mergedImage = document.getElementById('merged-image').src = b64;
             });*/













        // Fusionner les images
        /* mergeImages([productImageUrl, designImageUrl])
             .then(function(mergedImage) {
                 // Dessiner l'image fusionnée sur le canvas
                 var canvas = document.querySelector('#merged-image');
                 var context = canvas.getContext('2d');
                 var image = new Image();

                 image.onload = function() {
                     context.clearRect(0, 0, canvas.width, canvas.height);
                     canvas.width = image.width;
                     canvas.height = image.height;
                     context.drawImage(image, 30, 90);
                 };

                 image.src = mergedImage;

                 var mergedmage = document.getElementById('image-test')
             });*/



        // Ajoutez cette fonction de fusion d'images
        /*function mergeImages() {
            // Obtenez les références des deux images à fusionner
            var productImage = document.getElementById('merged-image');
            var designImage = document.getElementById('design-image');
            // Récupérez les coordonnées de positionnement de l'image de design par rapport à la scène Konva
            var position = image.position();
            // Créez un nouveau canevas pour fusionner les images
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            // Définissez la taille du canevas en fonction de la taille de l'image du produit
            canvas.width = productImage.width;
            canvas.height = productImage.height;
            // Dessinez l'image du produit sur le canevas
            //context.drawImage(productImage, 0, 0);
            // Dessinez l'image du design sur le canevas aux coordonnées spécifiées
            context.drawImage(designImage, position.x, position.y);
            // Convertissez le canevas en une URL de données
            var mergedImageURL = canvas.toDataURL('image/jpeg');
            // Récupérez les coordonnées de positionnement de l'image de design
            var designPosition = {
                x: position.x,
                y: position.y
            };
            // Mettez à jour l'élément d'entrée caché avec les coordonnées de positionnement
            var imageClonePositionInput = document.getElementById('image-clone-position');
            imageClonePositionInput.value = JSON.stringify(designPosition);
            // Utilisez l'URL de l'image fusionnée comme source pour l'élément d'image
            var mergedImage = document.getElementById('image-test');
            mergedImage.src = mergedImageURL;
        }*/

        /*function updateImageClonePosition() {
            var imageClone = stage.findOne('Image');
            var position = imageClone.position();
            // Obtenez les coordonnées du conteneur de l'image
            var container = document.getElementById('div1');
            var containerRect = container.getBoundingClientRect();
            var containerX = containerRect.left;
            var containerY = containerRect.top;
            // Ajoutez les coordonnées du conteneur à la position de l'image
            var offsetX = containerX + position.x;
            var offsetY = containerY + position.y;
            var imageClonePositionInput = document.getElementById('image-clone-position');
            imageClonePositionInput.value = JSON.stringify({
                x: offsetX,
                y: offsetY
            });
        }*/
        // Appelez la fonction de fusion d'images lorsque le formulaire est soumis
        /*document.getElementById('save-button').addEventListener('click', function(e) {
            //e.preventDefault(); // Empêche le comportement par défaut du formulaire (rechargement de la page)
           
            // Met à jour les coordonnées de positionnement avant de soumettre le formulaire
            // document.getElementById('your-form-id').submit(); // Soumettez le formulair
        })*/
    </script>













    <script>
        /* var width = window.innerWidth;
                                                var height = window.innerHeight;

                                                var stage = new Konva.Stage({
                                                    container: 'div1',
                                                    width: 135,
                                                    height: 160,
                                                });
                                                const layer = new Konva.Layer();
                                                stage.add(layer);



                                                // Récupérez l'élément image à partir de son ID
                                                var imageElement = document.getElementById('design-image');

                                                // Créez une instance de Konva.Image en utilisant l'élément image
                                                const image = new Konva.Image({
                                                    x: 90,
                                                    y: 90,
                                                    image: imageElement,
                                                    width: imageElement.width,
                                                    height: imageElement.height,
                                                    draggable: true,
                                                });
                                                layer.add(image);

                                                const tr = new Konva.Transformer({
                                                    nodes: [image],
                                                    anchorDragBoundFunc: function(oldPos, newPos, event) {
                                                        // oldPos - is old absolute position of the anchor
                                                        // newPos - is a new (possible) absolute position of the anchor based on pointer position
                                                        // it is possible that anchor will have a different absolute position after this function
                                                        // because every anchor has its own limits on position, based on resizing logic

                                                        // do not snap rotating point
                                                        if (tr.getActiveAnchor() === 'rotater') {
                                                            return newPos;
                                                        }

                                                        const dist = Math.sqrt(
                                                            Math.pow(newPos.x - oldPos.x, 2) + Math.pow(newPos.y - oldPos.y, 2)
                                                        );

                                                        // do not do any snapping with new absolute position (pointer position)
                                                        // is too far away from old position
                                                        if (dist > 10) {
                                                            return newPos;
                                                        }

                                                        const closestX = Math.round(newPos.x / cellWidth) * cellWidth;
                                                        const diffX = Math.abs(newPos.x - closestX);

                                                        const closestY = Math.round(newPos.y / cellHeight) * cellHeight;
                                                        const diffY = Math.abs(newPos.y - closestY);

                                                        const snappedX = diffX < 10;
                                                        const snappedY = diffY < 10;

                                                        // a bit different snap strategies based on snap direction
                                                        // we need to reuse old position for better UX
                                                        if (snappedX && !snappedY) {
                                                            return {
                                                                x: closestX,
                                                                y: oldPos.y,
                                                            };
                                                        } else if (snappedY && !snappedX) {
                                                            return {
                                                                x: oldPos.x,
                                                                y: closestY,
                                                            };
                                                        } else if (snappedX && snappedY) {
                                                            return {
                                                                x: closestX,
                                                                y: closestY,
                                                            };
                                                        }
                                                        return newPos;
                                                    },
                                                });
                                                layer.add(tr);

                                                image.on('dragmove', updateImageClonePosition);
                                                image.on('transform', updateImageClonePosition);

                                                // Ajoutez cette fonction de fusion d'images
                                                function mergeImages() {
                                                    // Obtenez les références des deux images à fusionner
                                                    var productImage = document.getElementById('product-image');
                                                    var designImage = document.getElementById('design-image');

                                                    // Récupérez les coordonnées de positionnement de l'image de design par rapport à la scène Konva
                                                    var position = image.position();

                                                    // Créez un nouveau canevas pour fusionner les images
                                                    var canvas = document.createElement('canvas');
                                                    var context = canvas.getContext('2d');

                                                    // Définissez la taille du canevas en fonction de la taille de l'image du produit
                                                    canvas.width = productImage.width;
                                                    canvas.height = productImage.height;

                                                    // Dessinez l'image du produit sur le canevas
                                                    context.drawImage(productImage, 0, 0);

                                                    // Dessinez l'image du design sur le canevas aux coordonnées spécifiées
                                                    context.drawImage(designImage, position.x, position.y);

                                                    // Convertissez le canevas en une URL de données
                                                    var mergedImageURL = canvas.toDataURL('image/jpeg');

                                                    // Récupérez les coordonnées de positionnement de l'image de design
                                                    var designPosition = {
                                                        x: position.x,
                                                        y: position.y
                                                    };

                                                    // Mettez à jour l'élément d'entrée caché avec les coordonnées de positionnement
                                                    var imageClonePositionInput = document.getElementById('image-clone-position');
                                                    imageClonePositionInput.value = JSON.stringify(designPosition);

                                                    // Utilisez l'URL de l'image fusionnée comme source pour l'élément d'image
                                                    var mergedImage = document.getElementById('merged-image');
                                                    mergedImage.src = mergedImageURL;
                                                }



                                                function updateImageClonePosition() {
                                                    var imageClone = stage.findOne('Image');
                                                    var position = imageClone.position();

                                                    // Obtenez les coordonnées du conteneur de l'image
                                                    var container = document.getElementById('div1');
                                                    var containerRect = container.getBoundingClientRect();
                                                    var containerX = containerRect.left;
                                                    var containerY = containerRect.top;

                                                    // Ajoutez les coordonnées du conteneur à la position de l'image
                                                    var offsetX = containerX + position.x;
                                                    var offsetY = containerY + position.y;

                                                    var imageClonePositionInput = document.getElementById('image-clone-position');
                                                    imageClonePositionInput.value = JSON.stringify({
                                                        x: offsetX,
                                                        y: offsetY
                                                    });
                                                }


                                                // Appelez la fonction de fusion d'images lorsque le formulaire est soumis
                                                document.getElementById('save-button').addEventListener('click', function(e) {
                                                    e.preventDefault(); // Empêche le comportement par défaut du formulaire (rechargement de la page)
                                                    updateImageClonePosition
                                                        (); // Met à jour les coordonnées de positionnement avant de soumettre le formulaire
                                                    document.getElementById('your-form-id').submit(); // Soumettez le formulaire
                                                });*/
    </script>




    <script>
        /*var width = window.innerWidth;
                                                        var height = window.innerHeight;

                                                        var stage = new Konva.Stage({
                                                            container: 'div1',
                                                            width: 135,
                                                            height: 160,
                                                        });
                                                        const layer = new Konva.Layer();
                                                        stage.add(layer);

                                                        // Récupérez l'élément image à partir de son ID
                                                        var imageElement = document.getElementById('design-image');

                                                        // Créez une instance de Konva.Image en utilisant l'élément image
                                                        const image = new Konva.Image({
                                                            x: 90,
                                                            y: 90,
                                                            image: imageElement,
                                                            width: imageElement.width,
                                                            height: imageElement.height,
                                                            draggable: true,
                                                        });
                                                        layer.add(image);

                                                        const tr = new Konva.Transformer({
                                                            nodes: [image],
                                                            anchorDragBoundFunc: function(oldPos, newPos, event) {
                                                                // oldPos - is old absolute position of the anchor
                                                                // newPos - is a new (possible) absolute position of the anchor based on pointer position
                                                                // it is possible that anchor will have a different absolute position after this function
                                                                // because every anchor has its own limits on position, based on resizing logic

                                                                // do not snap rotating point
                                                                if (tr.getActiveAnchor() === 'rotater') {
                                                                    return newPos;
                                                                }

                                                                const dist = Math.sqrt(
                                                                    Math.pow(newPos.x - oldPos.x, 2) + Math.pow(newPos.y - oldPos.y, 2)
                                                                );

                                                                // do not do any snapping with new absolute position (pointer position)
                                                                // is too far away from old position
                                                                if (dist > 10) {
                                                                    return newPos;
                                                                }

                                                                const closestX = Math.round(newPos.x / cellWidth) * cellWidth;
                                                                const diffX = Math.abs(newPos.x - closestX);

                                                                const closestY = Math.round(newPos.y / cellHeight) * cellHeight;
                                                                const diffY = Math.abs(newPos.y - closestY);

                                                                const snappedX = diffX < 10;
                                                                const snappedY = diffY < 10;

                                                                // a bit different snap strategies based on snap direction
                                                                // we need to reuse old position for better UX
                                                                if (snappedX && !snappedY) {
                                                                    return {
                                                                        x: closestX,
                                                                        y: oldPos.y,
                                                                    };
                                                                } else if (snappedY && !snappedX) {
                                                                    return {
                                                                        x: oldPos.x,
                                                                        y: closestY,
                                                                    };
                                                                } else if (snappedX && snappedY) {
                                                                    return {
                                                                        x: closestX,
                                                                        y: closestY,
                                                                    };
                                                                }
                                                                return newPos;
                                                            },
                                                        });
                                                        layer.add(tr);

                                                        // Après avoir manipulé l'image du design avec Konva

                                                        var productImage = document.getElementById('merged-image');

                                                        // Récupérer la position de l'image du produit par rapport à la fenêtre du navigateur
                                                        var productImageRect = productImage.getBoundingClientRect();
                                                        var productImageX = productImageRect.left;
                                                        var productImageY = productImageRect.top;

                                                        // Récupérer la position de l'image du design par rapport à l'image du produit
                                                        var designImageKonva = layer.findOne('#design-image');
                                                        var x = designImageKonva.x() + productImageX;
                                                        var y = designImageKonva.y() + productImageY;
                                                        // Mettre à jour les valeurs dans les champs de formulaire cachés
                                                        document.getElementById('image-clone-x').value = x;
                                                        document.getElementById('image-clone-y').value = y;
                                                        // Soumettre le formulaire lorsque le bouton Sauvegarder est cliqué
                                                        document.getElementById('save-button').addEventListener('click', function() {
                                                            document.getElementById('your-form-id').submit();
                                                        });*/
    </script>




    <script>
        /*var width = window.innerWidth;
                                        var height = window.innerHeight;

                                        var stage = new Konva.Stage({
                                            container: 'div1',
                                            width: 135,
                                            height: 160,
                                        });

                                        const layer = new Konva.Layer();
                                        stage.add(layer);

                                        // Récupérez l'élément image à partir de son ID
                                        var imageElement = document.getElementById('design-image');








                                        // var product = document.getElementById('merged-image');


                                        // // Create an instance of Konva.Image for initialImage
                                        // const backgroundImage = new Konva.Image({
                                        //     image: product,
                                        //     draggable: true,
                                        // });


                                        // const image = new Konva.Image({
                                        //     image: imageElement,
                                        //     draggable: true,
                                        // });
                                        // const group = new Konva.Group();

                                        // // Add the images to the group in the desired order
                                        // group.add(backgroundImage);
                                        // group.add(image);

                                        // // Add the group to the layer
                                        // layer.add(group);

                                        // // Redraw the layer to display the images
                                        // layer.draw();


                                        function sendImage(image) {
                                            // Create a new FormData object
                                            const formData = new FormData();
                                            
                                            // Add the image to the FormData object
                                            formData.append('image', image);
                                            
                                            // Make a POST request to the Laravel backend
                                            fetch('/client/test', {
                                                method: 'POST',
                                                body: formData,
                                            });
                                        }
                                        
                                        // const image = document.getElementById('design-image');


                                        sendImage(imageElement);







                                        // // Appelez la fonction de fusion d'images lorsque le formulaire est soumis
                                        // document.getElementById('save-button').addEventListener('click', function(e) {
                                        //     // Récupérez l'élément de l'image
                                        //     var imageElement = document.getElementById('design-image');

                                        //     // Récupérez le fichier de l'image
                                        //     var imageFile = imageElement.files[0];

                                        //     // Créez un objet FormData pour envoyer l'image au backend
                                        //     var formData = new FormData();
                                        //     formData.append('design-image', imageFile);
                                        //     document.getElementById('your-form-id').submit(); // Soumettez le formulaire
                                        // });






                                        // // Create a new paragraph element
                                        // var paragraph = document.createElement("p");
                                        // paragraph.textContent = "Hello, world!";

                                        // // Get a reference to the parent element
                                        // var parentElement = document.getElementById("test");

                                        // // Append the new paragraph element as the last child of the parent element
                                        // parentElement.appendChild(paragraph);








                                        // Créez une instance de Konva.Image en utilisant l'élément image
                                        const image = new Konva.Image({
                                            image: imageElement,
                                            draggable: true,
                                        });

                                        // Chargement de l'image avant de l'ajouter à la scène
                                        imageElement.onload = function() {
                                            // Calcul des coordonnées pour centrer l'image
                                            var imageX = (stage.width() - 110) / 2;
                                            var imageY = (stage.height() - 110) / 2;

                                            // Positionnement de l'image centrée
                                            image.position({
                                                x: imageX,
                                                y: imageY
                                            });



                                            // Redimensionnement de l'image selon ses dimensions
                                            image.size({
                                                width: 110,
                                                height: 110,
                                            });

                                            // Ajout de l'image à la couche
                                            layer.add(image);

                                            // Redraw de la couche pour afficher l'image
                                            layer.draw();
                                        };

                                        const tr = new Konva.Transformer({
                                            nodes: [image],
                                            anchorDragBoundFunc: function(oldPos, newPos, event) {
                                                // oldPos - is old absolute position of the anchor
                                                // newPos - is a new (possible) absolute position of the anchor based on pointer position
                                                // it is possible that anchor will have a different absolute position after this function
                                                // because every anchor has its own limits on position, based on resizing logic

                                                // do not snap rotating point
                                                if (tr.getActiveAnchor() === 'rotater') {
                                                    return newPos;
                                                }

                                                const dist = Math.sqrt(
                                                    Math.pow(newPos.x - oldPos.x, 2) + Math.pow(newPos.y - oldPos.y, 2)
                                                );

                                                // do not do any snapping with new absolute position (pointer position)
                                                // is too far away from old position
                                                if (dist > 10) {
                                                    return newPos;
                                                }

                                                const closestX = Math.round(newPos.x / cellWidth) * cellWidth;
                                                const diffX = Math.abs(newPos.x - closestX);

                                                const closestY = Math.round(newPos.y / cellHeight) * cellHeight;
                                                const diffY = Math.abs(newPos.y - closestY);

                                                const snappedX = diffX < 10;
                                                const snappedY = diffY < 10;

                                                // a bit different snap strategies based on snap direction
                                                // we need to reuse old position for better UX
                                                if (snappedX && !snappedY) {
                                                    return {
                                                        x: closestX,
                                                        y: oldPos.y,
                                                    };
                                                } else if (snappedY && !snappedX) {
                                                    return {
                                                        x: oldPos.x,
                                                        y: closestY,
                                                    };
                                                } else if (snappedX && snappedY) {
                                                    return {
                                                        x: closestX,
                                                        y: closestY,
                                                    };
                                                }
                                                return newPos;
                                            },
                                        });
                                        layer.add(tr);

                                        image.on('dragmove', updateImageClonePosition);
                                        image.on('transform', updateImageClonePosition);

                                        // Ajoutez cette fonction de fusion d'images
                                        function mergeImages() {
                                            // Obtenez les références des deux images à fusionner
                                            var productImage = document.getElementById('product-image');
                                            var designImage = document.getElementById('design-image');

                                            // Récupérez les coordonnées de positionnement de l'image de design par rapport à la scène Konva
                                            var position = image.position();

                                            // Créez un nouveau canevas pour fusionner les images
                                            var canvas = document.createElement('canvas');
                                            var context = canvas.getContext('2d');

                                            // Définissez la taille du canevas en fonction de la taille de l'image du produit
                                            canvas.width = productImage.width;
                                            canvas.height = productImage.height;

                                            // Dessinez l'image du produit sur le canevas
                                            context.drawImage(productImage, 0, 0);

                                            // Dessinez l'image du design sur le canevas aux coordonnées spécifiées
                                            context.drawImage(designImage, position.x, position.y);

                                            // Convertissez le canevas en une URL de données
                                            var mergedImageURL = canvas.toDataURL('image/jpeg');

                                            // Récupérez les coordonnées de positionnement de l'image de design
                                            var designPosition = {
                                                x: position.x,
                                                y: position.y
                                            };

                                            // Mettez à jour l'élément d'entrée caché avec les coordonnées de positionnement
                                            var imageClonePositionInput = document.getElementById('image-clone-position');
                                            imageClonePositionInput.value = JSON.stringify(designPosition);

                                            // Utilisez l'URL de l'image fusionnée comme source pour l'élément d'image
                                            var mergedImage = document.getElementById('merged-image');
                                            mergedImage.src = mergedImageURL;
                                        }



                                        function updateImageClonePosition() {
                                            var imageClone = stage.findOne('Image');
                                            var position = imageClone.position();

                                            // Obtenez les coordonnées du conteneur de l'image
                                            var container = document.getElementById('div1');
                                            var containerRect = container.getBoundingClientRect();
                                            var containerX = containerRect.left;
                                            var containerY = containerRect.top;

                                            // Ajoutez les coordonnées du conteneur à la position de l'image
                                            var offsetX = containerX + position.x;
                                            var offsetY = containerY + position.y;

                                            var imageClonePositionInput = document.getElementById('image-clone-position');
                                            imageClonePositionInput.value = JSON.stringify({
                                                x: offsetX,
                                                y: offsetY
                                            });
                                        }


                                        // // Appelez la fonction de fusion d'images lorsque le formulaire est soumis
                                        // document.getElementById('save-button').addEventListener('click', function(e) {
                                        //     //e.preventDefault(); // Empêche le comportement par défaut du formulaire (rechargement de la page)
                                        //     updateImageClonePosition
                                        //         (); // Met à jour les coordonnées de positionnement avant de soumettre le formulaire
                                        //     document.getElementById('your-form-id').submit(); // Soumettez le formulaire
                                        // });*/
    </script>

    <script>
        function selectSize(size) {
            // Récupérer tous les boutons de taille
            const sizeButtons = document.querySelectorAll('.size-btn');

            // Parcourir tous les boutons de taille et ajouter/supprimer la classe "selected"
            sizeButtons.forEach((button) => {
                if (button.textContent.trim() === size) {
                    button.classList.add('selected');
                } else {
                    button.classList.remove('selected');
                }
            });

            // Mettre à jour la valeur de l'input caché "selected_size"
            document.querySelector('#selected_size').value = size;

            // Mettre à jour la valeur de l'input caché "sizes"
            const sizesInput = document.querySelector('#sizesInput');
            sizesInput.value = size;
        }
    </script>

    <style>
        .pro-resize {
            margin-top: -10px;
        }

        .pro-resize {
            width: 130px;
            border-radius: 50px;
        }

        .pro-resize .qtybtn {
            width: 32px;
            display: block;
            float: left;
            line-height: 26px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            font-weight: 300;
            color: #000;
            height: 32px;
            background: #f6f7fb;
            border-radius: 50%;
            transition: .3s;
            border: 2px solid rgba(0, 0, 0, 0);
        }

        .pro-resize input {
            width: 28px;
            float: left;
            border: none;
            height: 32px;
            line-height: 30px;
            padding: 0;
            text-align: center;
            background-color: rgba(0, 0, 0, 0);
            font-size: 20px;
            font-weight: 500;
            margin: 0 12px;
            color: #27272e;
        }

        * {
            box-sizing: border-box;
        }

        div {
            display: block;
        }
    </style>

    <style>
        .size-btn.selected {
            border-color: var(--color-primary);
            background-color: var(--color-primary);
            color: var(--color-white);
        }

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
            width: 100%;
            height: 40px;
            justify-content: center;
        }

        .axil-btn-custom1 {
            background-color: #5e72e4 !important;
            color: #FFFFFF !important;
            font-size: 15px !important;
            border-radius: 5px !important;
            border: none !important;
            width: 235px;
            height: 60px;
            justify-content: center;
            margin-right: 10px;
        }

        .axil-btn-custom2 {
            color: #FFFFFF !important;
            font-size: 15px !important;
            border-radius: 5px !important;
            border: none !important;
            width: 235px;
            height: 60px;
            justify-content: center;
        }


        .form-telecharger .modal-dialog {
            max-width: 720px;
        }

        .form-telecharger .modal-content {
            border: none;
        }

        .form-telecharger .modal-header {
            padding: 30px 15px;
            justify-content: flex-end;
        }

        .form-telecharger .modal-header .btn-close {
            width: auto;
            background-image: none;
            font-size: 14px;
            padding: 0 10px;
            transition: var(--transition);
            position: relative;
            right: 10px;
            z-index: 1;
        }

        .form-telecharger .modal-header .btn-close:after {
            content: "";
            height: 35px;
            width: 35px;
            background: var(--color-argon);
            border-radius: 50%;
            position: absolute;
            top: -9px;
            left: -3px;
            transform: scale(0);
            z-index: -1;
            transition: var(--transition);
        }

        .form-telecharger .modal-header .btn-close:hover {
            color: var(--color-white);
        }

        .form-telecharger .modal-header .btn-close:hover:after {
            transform: scale(1);
        }

        .form-telechargerF .modal-body {
            padding: 30px;
        }
    </style>

    <style>
        #div1 {
            width: 135px;
            height: 160px;
            border: 1px solid #aaaaaa;
        }
    </style>

</body>

</html>
