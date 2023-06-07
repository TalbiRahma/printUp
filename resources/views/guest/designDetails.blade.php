<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Détails de design</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/mainassets/images/logo.png') }}">

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


<body class="sticky-header overflow-md-visible">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    @include('inc.client.header')
    <!-- End Header -->

    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area bg-color-white">
            <div class="single-product-thumb axil-section-gap pb--30 pb_sm--20">
                <div class="container">
                    <div class="row row--50">
                        <div class="col-lg-5 mb--40">
                            <div class="h-100">
                                <div class="position-sticky sticky-top">
                                    <div class="single-product-thumbnail axil-product">
                                        <div class="thumbnail">
                                            <img src="{{ asset('uploads') }}/{{ $design->photo }}"
                                                alt="Design Images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mb--40">
                            <div class="h-100">
                                <div class="position-sticky sticky-top">
                                    <div class="single-product-content nft-single-product-content">
                                        <div class="inner">
                                            <h2 class="product-title">{{ $design->name }}</h2>
                                            
                                            <a href=""><span class="price current-price">{{$design->boutique->name}}</span></a>
                                            
                                            <div class="price-amount price-offer-amount">
                                                <span class="price current-price">{{ $design->price }} TND</span>
                                            </div>
                                            <div class="product-rating">
                                                <div class="star-rating">
                                                    
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                    
                                                            <i class="fas fa-star"></i>
                                                       
                                                </div>
                                                <div class="review-link">
                                                    <a href="#">(<span></span> Avis des
                                                        clients)</a>
                                                </div>
                                            </div>
                                            <div class="nft-short-meta">
                                                <div class="nft-category">
                                                    <label>Category :</label>
                                                    <div class="category-list">
                                                        <span>{{ $category->name }}</span>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px" class="">
                                                    <button class="w-50 verify-btn axil-btn btn-bg-secondary">Voir
                                                        Boutique</button>
                                                    <a href="wishlist.html" class="axil-btn wishlist-btn"
                                                        style="margin-left: 12px"><i class="far fa-heart"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white nft-info-tabs">
                                                <div class="container">
                                                    <ul class="nav tabs" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <a class="active" id="description-tab" data-bs-toggle="tab"
                                                                href="#description" role="tab"
                                                                aria-controls="description"
                                                                aria-selected="true">Description</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews"
                                                                role="tab" aria-controls="reviews"
                                                                aria-selected="false">Commentaires</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="description"
                                                            role="tabpanel" aria-labelledby="description-tab">
                                                            <div class="product-additional-info">
                                                                <p class="mb--15"><strong>À propos de ce
                                                                        produit</strong></p>
                                                                <p>{{ $design->description }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="reviews" role="tabpanel"
                                                            aria-labelledby="reviews-tab">
                                                            <div class="product-additional-info">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- woocommerce-tabs -->


                                            <!-- End Product Action Wrapper  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->
        </div>
        <!-- End Shop Area  -->

        <!-- Start Recently Viewed Product Area  -->
        <div class="axil-product-area bg-color-white pt--10 pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                        Similaire</span>
                    <h2 class="title">Produit Similaire</h2>
                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    @foreach ($designs as $ds)
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-six">
                                <div class="thumbnail">
                                    <a href="{{ route('designs.details', ['id' => $ds->id]) }}">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="{{ asset('uploads') }}/{{ $ds->photo }}" alt="Design Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-price-variant">
                                            <span class="price current-price">{{ $ds->price }} TND</span>
                                        </div>
                                        <h5 class="title"><a href="single-product-7.html">{{$ds->boutique->name}} <span
                                                    class="verified-icon"><i
                                                        class="fas fa-badge-check"></i></span></a></h5>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="single-product-7.html">ajouter aux
                                                        Favoris</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
        <!-- End Recently Viewed Product Area  -->
    </main>


    @include('inc.client.service')
    <!-- Start Footer Area  -->
    @include('inc.client.footer')
    <!-- End Footer Area  -->
    @include('inc.client.dropcart')

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

</body>

</html>
