<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panier</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/mainassets/images/logo.png')}}">

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

            <!-- Start Cart Area  -->
            <div class="axil-product-cart-area axil-section-gap">
                <div class="container">
                    <div class="axil-product-cart-wrap">
                        <div class="product-table-heading">
                            <h4 class="title">Votre panier</h4>
                            <a href="#" class="cart-clear">Effacer le panier</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table axil-product-table axil-cart-table mb--40">
                                <thead>
                                    <tr>
                                        <th scope="col" class="product-remove"></th>
                                        <th scope="col" class="product-thumbnail">Produit</th>
                                        <th scope="col" class="product-title"></th>
                                        <th scope="col" class="product-price">Prix</th>
                                        <th scope="col" class="product-quantity">Quantité</th>
                                        <th scope="col" class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-remove"><a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail"><a href="single-product.html"><img src="./assets/images/product/electric/product-01.png" alt="Digital Product"></a></td>
                                        <td class="product-title"><a href="single-product.html">Wireless PS Handler</a></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>124.00</td>
                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <input type="number" class="quantity-input" value="1">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>275.00</td>
                                    </tr>
                                    <tr>
                                        <td class="product-remove"><a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail"><a href="single-product-2.html"><img src="./assets/images/product/electric/product-02.png" alt="Digital Product"></a></td>
                                        <td class="product-title"><a href="single-product-2.html">Gradient Light Keyboard</a></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>124.00</td>
                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <input type="number" class="quantity-input" value="1">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>275.00</td>
                                    </tr>
                                    <tr>
                                        <td class="product-remove"><a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail"><a href="single-product-3.html"><img src="./assets/images/product/electric/product-03.png" alt="Digital Product"></a></td>
                                        <td class="product-title"><a href="single-product-3.html">HD CC Camera</a></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>124.00</td>
                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <input type="number" class="quantity-input" value="1">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>275.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-update-btn-area">
                            <div class="input-group product-cupon">
                                <input placeholder="Entrer le code de réduction" type="text">
                                <div class="product-cupon-btn">
                                    <button type="submit" class="axil-btn btn-outline">Appliquer</button>
                                </div>
                            </div>
                            <div class="update-btn">
                                <a href="#" class="axil-btn btn-outline">mise à jour panier</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                                <div class="axil-order-summery mt--80">
                                    <h5 class="title mb--20">Récapitulatif de la commande</h5>
                                    <div class="summery-table-wrap">
                                        <table class="table summery-table mb--30">
                                            <tbody>
                                                <tr class="order-subtotal">
                                                    <td>Total</td>
                                                    <td>$117.00</td>
                                                </tr>
                                                <tr class="order-shipping">
                                                    <td>Expédition</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="radio" id="radio1" name="shipping" checked>
                                                            <label for="radio1">Livraison gratuite</label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="radio" id="radio2" name="shipping">
                                                            <label for="radio2">Local: $35.00</label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="radio" id="radio3" name="shipping">
                                                            <label for="radio3">Forfait: $12.00</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="order-tax">
                                                    <td>Impôt d'État</td>
                                                    <td>$8.00</td>
                                                </tr>
                                                <tr class="order-total">
                                                    <td>Total</td>
                                                    <td class="order-total-amount">$125.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="{{route('checkout')}}" class="axil-btn btn-bg-primary checkout-btn">Processus de paiement</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cart Area  -->
    
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