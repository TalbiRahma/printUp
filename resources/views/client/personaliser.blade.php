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
                                                                                        <a href="#"><i
                                                                                                class="far fa-times"></i></a>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <img src="{{ asset('uploads') }}/{{ $fd->photo }}"
                                                                                            width="125px"
                                                                                            alt="">
                                                                                    </div>
                                                                                    <h5 class="mb-1 mt-1">
                                                                                        {{ $fd->name }}</h5>
                                                                                    <h6 class="mb-1 mt-1">Non
                                                                                        Boutique</h6>
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
                                                                                        <a href="#"><i
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
                                                                                        <a href="#"><i
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

                                            <div style="position: relative;">

                                                <img src="{{ asset('uploads/') }}/{{ $product_data['photo'] }}"
                                                    alt="Product" id="drop-image" />
                                                <div id="div1" ondrop="drop(event)"
                                                    ondragover="allowDrop(event)"
                                                    style="position: absolute; top: 175px; left: 160px;"></div>
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
                                                                alt="Product" id="drag1" draggable="true"
                                                                ondragstart="drag(event)" width="336"
                                                                height="69" id="resizable-image">
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
                                            <form action="{{ route('save_custom_product') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="idproduit"
                                                    value="{{ $product_data['id'] }}">
                                                <input type="hidden" id="image-clone-position"
                                                    name="image_clone_position">
                                                @if (session('design_data'))
                                                    @php
                                                        $design_data = json_decode(session('design_data'), true);
                                                        $design_id = $design_data['id'];
                                                    @endphp
                                                    <input type="hidden" name="iddesign"
                                                        value="{{ $design_id }}">
                                                @endif
                                                <button type="submit"
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
                                                        <div id="design-image" class="product-content2">
                                                            <img src="{{ asset('mainassets/images/product/design.png') }}"
                                                                alt="Product" id="drag1"draggable="true"
                                                                ondragstart="drag(event)" width="336"
                                                                height="69">
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
                                        {{ $product_data['price'] }} TND</h5>
                                    <div class="product-variations-wrapper">

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation product-size-variation">

                                            @if ($product_data['sizes'])
                                                @php $sizes = json_decode($product_data['sizes'], true); @endphp
                                                <div class="product-variation" style="display: inline-block;">
                                                    @if (!empty($sizes))
                                                        <h6 class="title "
                                                            style="display: inline-block; margin-right: 10px;">
                                                            Taille:</h6>
                                                    @endif
                                                    <ul class="range-variant" style="display: inline-block;">

                                                        @foreach ($sizes as $size)
                                                            <li class="size-btn"
                                                                onclick="selectSize('{{ $size }}')">
                                                                {{ $size }}</li>
                                                        @endforeach
                                                        <input type="hidden" name="selected_size"
                                                            id="selected_size">
                                                    </ul>
                                                </div>

                                            @endif
                                        </div>

                                        <!-- End Product Variation  -->

                                    </div>
                                    @if ($design_data)
                                        @if (Auth::user()->id == $design_data['user_id'])
                                            <h5>Total: {{ 0 + $product_data['price'] }} TND</h5>
                                        @else
                                            <h5>Total: {{ $design_data['price'] + $product_data['price'] }} TND</h5>
                                        @endif
                                    @else
                                        <h5>Total: {{ $product_data['price'] }} TND</h5>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var clone = document.getElementById(data).cloneNode(true);
            clone.removeAttribute("id");
            ev.target.appendChild(clone);

            // Récupérer les coordonnées du clone d'image
            var imageClonePosition = {
                x: ev.clientX,
                y: ev.clientY
            };

            // Mettre à jour la valeur du champ caché
            document.getElementById("image-clone-position").value = JSON.stringify(imageClonePosition);
        }
        /*var isResizing = false;
        var initialMouseX, initialMouseY;
        var initialWidth, initialHeight;
        var resizableImage;

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function startResize(event) {
            isResizing = true;
            resizableImage = event.target.parentNode.parentNode;
            initialMouseX = event.clientX;
            initialMouseY = event.clientY;
            initialWidth = resizableImage.offsetWidth;
            initialHeight = resizableImage.offsetHeight;
            document.addEventListener("mousemove", resizeImage);
            document.addEventListener("mouseup", stopResize);
        }

        function resizeImage(event) {
            if (!isResizing) return;

            var offsetX = event.clientX - initialMouseX;
            var offsetY = event.clientY - initialMouseY;
            var newWidth = initialWidth + offsetX;
            var newHeight = initialHeight + offsetY;

            resizableImage.style.width = newWidth + "px";
            resizableImage.style.height = newHeight + "px";
        }

        function stopResize() {
            isResizing = false;
            document.removeEventListener("mousemove", resizeImage);
            document.removeEventListener("mouseup", stopResize);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var clone = document.getElementById(data).cloneNode(true);
            clone.removeAttribute("id");

            // Créer un cadre pour l'image clonée
            var frame = document.createElement("div");
            frame.className = "frame";

            // Ajouter les boutons de redimensionnement
            var resizeButtons = document.createElement("div");
            resizeButtons.className = "resize-buttons";

            var resizeButtonTop = document.createElement("button");
            resizeButtonTop.className = "resize-button top";
            resizeButtonTop.addEventListener("mousedown", startResize);
            resizeButtons.appendChild(resizeButtonTop);

            var resizeButtonBottom = document.createElement("button");
            resizeButtonBottom.className = "resize-button bottom";
            resizeButtonBottom.addEventListener("mousedown", startResize);
            resizeButtons.appendChild(resizeButtonBottom);

            var resizeButtonLeft = document.createElement("button");
            resizeButtonLeft.className = "resize-button left";
            resizeButtonLeft.addEventListener("mousedown", startResize);
            resizeButtons.appendChild(resizeButtonLeft);

            var resizeButtonRight = document.createElement("button");
            resizeButtonRight.className = "resize-button right";
            resizeButtonRight.addEventListener("mousedown", startResize);
            resizeButtons.appendChild(resizeButtonRight);

            var resizeButtonTopLeft = document.createElement("button");
            resizeButtonTopLeft.className = "resize-button top-left";
            resizeButtonTopLeft.addEventListener("mousedown", startResize);
            resizeButtons.appendChild(resizeButtonTopLeft);

            var resizeButtonBottomRight = document.createElement("button");
            resizeButtonBottomRight.className = "resize-button bottom-right";
            resizeButtonBottomRight.addEventListener("mousedown", startResize);
            resizeButtons.appendChild(resizeButtonBottomRight);

            frame.appendChild(resizeButtons);
            frame.appendChild(clone);
            ev.target.appendChild(frame);
        }*/
        /*function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var clone = document.getElementById(data).cloneNode(true);
            clone.removeAttribute("id");
            ev.target.appendChild(clone);

            // Récupérer les coordonnées du clone d'image
            var imageClonePosition = {
                x: ev.clientX,
                y: ev.clientY
            };

            // Mettre à jour la valeur du champ caché
            document.getElementById("image-clone-position").value = JSON.stringify(imageClonePosition);

            // Redimensionner l'image clone lors du clic sur le bouton "+"
            document.getElementById("increaseButton").addEventListener("click", function() {
                var currentWidth = parseInt(clone.style.width) || clone.offsetWidth;
                var currentHeight = parseInt(clone.style.height) || clone.offsetHeight;
                var newWidth = currentWidth + 10;
                var newHeight = currentHeight + 10;
                clone.style.width = newWidth + "px";
                clone.style.height = newHeight + "px";
            });

            // Redimensionner l'image clone lors du clic sur le bouton "-"
            document.getElementById("decreaseButton").addEventListener("click", function() {
                var currentWidth = parseInt(clone.style.width) || clone.offsetWidth;
                var currentHeight = parseInt(clone.style.height) || clone.offsetHeight;
                var newWidth = currentWidth - 10;
                var newHeight = currentHeight - 10;
                clone.style.width = newWidth + "px";
                clone.style.height = newHeight + "px";
            });
        }*/
    </script>

    <script>
        /*function incrementQuantity() {
                                    var currentValue = parseInt(quantityInput.value);
                                    if (isNaN(currentValue)) {
                                        quantityInput.value = 1;
                                    } else {
                                        quantityInput.value = currentValue + 1;
                                    }
                                    document.getElementById('qteInput').value = quantityInput.value;
                                }

                                function decrementQuantity() {
                                    var currentValue = parseInt(quantityInput.value);
                                    if (isNaN(currentValue) || currentValue <= 1) {
                                        quantityInput.value = 1;
                                    } else {
                                        quantityInput.value = currentValue - 1;
                                    }
                                    document.getElementById('qteInput').value = quantityInput.value;
                                }

                                var incButton = document.querySelector('.inc');
                                var decButton = document.querySelector('.dec');
                                var quantityInput = document.getElementById('quantityInput');
                                incButton.addEventListener('click', incrementQuantity);
                                decButton.addEventListener('click', decrementQuantity);*/
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

        /* function selectSize(size) {
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
             const sizesInput = document.querySelector('input[name="sizes"]');
             sizesInput.value = size;
         }*/
    </script>









    <script>
        /*function selectSize(size) {
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
                                                }

                                                // Empêcher les liens des tailles de retourner en haut de la page lorsqu'ils sont cliqués
                                                const sizeLinks = document.querySelectorAll('.size-btn');
                                                sizeLinks.forEach((link) => {
                                                    link.addEventListener('click', (event) => {
                                                        event.preventDefault();
                                                    });
                                                });*/
    </script>

    <script>
        /*$(document).ready(function() {
                                                    $('form#product_form').submit(function(event) {
                                                        //event.preventDefault(); // empêche la soumission du formulaire

                                                        // vérifie si le tableau custom_product existe dans la session et le vide s'il existe
                                                        /*if (typeof sessionStorage.custom_product !== 'undefined') {
                                                            sessionStorage.removeItem('custom_product');
                                                        }*/

        // récupère les données du formulaire
        /*var form_data = new FormData(this);

                    // soumet le formulaire via AJAX vers la première route
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: form_data,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // soumet le formulaire via AJAX vers la deuxième route
                            $.ajax({
                                url: '/client/personnaliser/create_custom_product',
                                type: 'post',
                                success: function(response) {
                                    // redirige l'utilisateur vers la page de personnalisation de produit
                                    window.location.href =
                                        '/client/personnaliser/create_custom_product';
                                },
                                error: function(xhr, status, error) {
                                    // gère les erreurs
                                    console.log(error);
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            // gère les erreurs
                            console.log(error);
                        }
                    });
                });
            });*/
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
            width: 300px;
            height: 300px;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }
    </style>

</body>

</html>
