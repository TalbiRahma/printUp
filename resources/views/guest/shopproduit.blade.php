<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Produits</title>
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


<body class="sticky-header">
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    @include('inc.client.header')
    <!-- End Header -->

    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a
                                href="\">Accueil</a></li>
                                <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">Magasin</li>
                    </ul>
                    <h1 class="title">Explorer tous les produits</h1>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <form action="{{ route('products.filter') }}" method="POST">
                            @csrf
                            <div class="axil-shop-sidebar">
                                <div class="d-lg-none">
                                    <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="toggle-list product-categories active">
                                    <h6 class="title">CATÉGORIES</h6>
                                    <div class="shop-submenu">
                                        <ul>
                                            @foreach ($category_product as $cp)
                                                <li>
                                                    <input type="radio" id="category_{{ $cp->id }}"
                                                        name="category" value="{{ $cp->id }}"
                                                        {{ request()->input('category') == $cp->id ? 'checked' : '' }}>
                                                    <label
                                                        for="category_{{ $cp->id }}">{{ $cp->name }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="toggle-list product-size active">
                                    <h6 class="title">TAILLE</h6>
                                    <div class="shop-submenu">
                                        <ul class="range-variant">
                                            <li>
                                                <input type="radio" id="size_standard" name="size"
                                                    value="STANDARD">
                                                <label for="size_standard">Standard</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="size_xs" name="size" value="XS">
                                                <label for="size_xs">XS</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="size_s" name="size" value="S">
                                                <label for="size_s">S</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="size_m" name="size" value="M">
                                                <label for="size_m">M</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="size_l" name="size" value="L">
                                                <label for="size_l">L</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="size_xl" name="size" value="XL">
                                                <label for="size_xl">XL</label>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="toggle-list product-price-range active">
                                    <h6 class="title">PRIX</h6>
                                    <div class="shop-submenu">

                                        <div class="mt-5">
                                            <div id="slider-range"></div>
                                            <div class="flex-center mt--20">
                                                <span class="input-range">Prix: </span>
                                                <input type="number" class="amount-range">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="axil-btn">filtrer
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                                    </svg>
                                </button>
                                <div class="mt-4 ">
                                    <a href="{{ route('products.index') }}"
                                        class="axil-btn btn-bg-primary w-100 text-center">Réinitialiser</a>
                                </div>
                            </div>
                        </form>
                        <!-- End .axil-shop-sidebar -->
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="axil-shop-top mb--40">
                                    <div
                                        class="category-select align-items-center justify-content-lg-end justify-content-between">
                                        <!-- Start Single Select  -->
                                        
                                        <select class="single-select" id="mySelect">
                                            <option value="">Selectionné</option>
                                            <option value="products">Produits</option>
                                            <option value="designs">Designs</option>
                                        </select>
                                        <!-- End Single Select  -->
                                    </div>
                                    <div class="d-lg-none">
                                        <button class="product-filter-mobile filter-toggle"><i
                                                class="fas fa-filter"></i> FILTRE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .row -->

                        <div class="row row--15">
                            @if ($initial_products)
                                @foreach ($initial_products as $p)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="axil-product product-style-one mb--30">
                                            <div class="thumbnail">
                                                <a href="{{ route('products.details', ['id' => $p->id]) }}">
                                                    <img src="{{ asset('uploads') }}/{{ $p->photo }}"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist">

                                                            <a
                                                                href="{{ route('wishlist.add.product', ['id' => $p->id]) }}"><i
                                                                    class="far fa-heart"></i></a>

                                                        </li>
                                                        <li class="select-option"><a
                                                                href="{{ route('personnaliser.produit', ['id' => $p->id]) }}">Personnalisé</a>
                                                        </li>
                                                        <li class="quickview"><a
                                                                href="{{ route('products.details', ['id' => $p->id]) }}"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a
                                                            href="{{ route('products.details', ['id' => $p->id]) }}">{{ $p->name }}</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">{{ $p->price }}
                                                            TND</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach ($products as $p)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="axil-product product-style-one mb--30">
                                            <div class="thumbnail">
                                                <a href="{{ route('products.details', ['id' => $p->id]) }}">
                                                    <img src="{{ asset('uploads') }}/{{ $p->photo }}"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist">

                                                            <a
                                                                href="{{ route('wishlist.add.product', ['id' => $p->id]) }}"><i
                                                                    class="far fa-heart"></i></a>

                                                        </li>
                                                        <li class="select-option"><a
                                                                href="{{ route('personnaliser.produit', ['id' => $p->id]) }}">Personnalisé</a>
                                                        </li>
                                                        <li class="quickview"><a
                                                                href="{{ route('products.details', ['id' => $p->id]) }}"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a
                                                            href="{{ route('products.details', ['id' => $p->id]) }}">{{ $p->name }}</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">{{ $p->price }}
                                                           DT</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- End Single Product  -->
                            <div class=" pt--20">
                                
                                    {{ $initial_products->links('vendor.pagination.guest') }}
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .container -->
            </div>
            <!-- End Shop Area  -->
        </div>
        <!-- End Axil Newsletter Area  -->
    </main>



    @include('inc.client.service')
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
        document.getElementById('mySelect').addEventListener('change', function() {
            var optionValue = this.value;

            switch (optionValue) {
                case 'products':
                    window.location.href = "{{ route('products.index') }}";
                    break;
                case 'designs':
                    window.location.href = "{{ route('designs.index') }}";
                    break;
                default:
                    // Redirection par défaut si aucune option sélectionnée
                    window.location.href = "{{ route('products.index') }}";
                    break;
            }
        });
    </script>

    
</body>

</html>
