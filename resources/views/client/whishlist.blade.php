<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Shop Sidebar</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/mainassets/images/favicon.png')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/style.min.css')}}">

</head>


<body class="sticky-header">
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    @include('inc.client.header')
    <!-- End Header -->

    <main class="main-wrapper">
        <main class="main-wrapper">

            <!-- Start Wishlist Area  -->
        <div class="axil-wishlist-area axil-section-gap">
            <div class="container">
                <div class="product-table-heading">
                    <h4 class="title">Liste des favoris</h4>
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-wishlist-table">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">image</th>
                                <th scope="col" class="product-title">Produit</th>
                                <th scope="col" class="product-price">Prix</th>
                                
                                <th scope="col" class="product-add-cart"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-remove"><a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail"><a href="single-product.html"><img src="{{asset('/mainassets/images/product/electric/product-01.png')}}" alt="Digital Product"></a></td>
                                <td class="product-title"><a href="single-product.html">Wireless PS Handler</a></td>
                                <td class="product-price" data-title="Price">124.00<span class="currency-symbol"> TND</span></td>
                                
                                <td class="product-add-cart"><a href="cart.html" class="axil-btn btn-outline">Ajouter au panier</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Wishlist Area  -->
        
    
        </main>

    </main>


    
    @include('inc.client.service')
    <!-- Start Footer Area  -->
    @include('inc.client.footer')
    <!-- End Footer Area  -->
    
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('/mainassets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('/mainassets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('/mainassets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/js.cookie.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('/mainassets/js/main.js')}}"></script>

</body>

</html>