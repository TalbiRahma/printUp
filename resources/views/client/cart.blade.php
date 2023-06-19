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
        <main class="main-wrapper">

            <!-- Start Cart Area  -->
            <div class="axil-product-cart-area axil-section-gap">
                <div class="container">

                    <div class="axil-product-cart-wrap">
                        <form action="{{ route('commande.update') }}" method="POST">
                            @csrf
                            @include('inc.flashmessage')
                            <div class="product-table-heading">
                                <h4 class="title">Votre panier</h4>
                                <a href="#" class="cart-clear"></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table axil-product-table axil-cart-table mb--40">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="product-remove"></th>
                                            <th scope="col" class="product-thumbnail">Produit</th>
                                            <th scope="col" class="product-title"></th>
                                            <th scope="col" class="product-title">Taille</th>
                                            <th scope="col" class="product-price">Prix</th>
                                            <th scope="col" class="product-quantity">Quantité</th>
                                            <th scope="col" class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commande->lignecommandes as $lc)
                                            <tr>
                                                <td class="product-remove"><a
                                                        href="{{ route('command.delete', ['idlc' => $lc->id]) }}"
                                                        class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                                <td class="product-thumbnail"><a href="single-product.html"><img
                                                            src="/{{ $lc->customproduct->photo }}"></a></td>
                                                <td class="product-title"><a
                                                        href="single-product.html">{{ $lc->customproduct->name }}</a>
                                                    @if ($lc->customproduct->etat == 'en attente')
                                                        <span class="badge badge-warning">en attente</span>
                                                    @else
                                                        <span class="badge badge-success">Valide</span>
                                                    @endif
                                                </td>
                                                <td class="product-selected_size" data-title="selected_size">
                                                    {{ $lc->selected_size }}
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    {{ $lc->customproduct->price }}<span
                                                        class="currency-symbol">TND</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="pro-qty">
                                                        <input name="qte[{{ $lc->id }}]" type="number"
                                                            class="quantity-input" value="{{ $lc->qte }}">
                                                    </div>

                                                </td>
                                                <td class="product-subtotal" data-title="Subtotal">
                                                    {{ $lc->customproduct->price * $lc->qte }}<span
                                                        class="currency-symbol">TND</span></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-update-btn-area">
                                <div class="input-group product-cupon">
                                    
                                </div>
                                <div class="update-btn">
                                    <button type="submit" class="axil-btn btn-outline">Mise à jour du
                                        panier</button>
                                </div>

                            </div>
                        </form>
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                                <div class="axil-order-summery mt--80">
                                    <h5 class="title mb--20">Récapitulatif de la commande</h5>
                                    <div class="summery-table-wrap">
                                        <table class="table summery-table mb--30">
                                            <tbody>
                                                <tr class="order-subtotal">
                                                    <td>Total</td> 
                                                    <td>{{ $commande->getTotal() }} TND</td>
                                                </tr>

                                                <tr class="order-tax">
                                                    <td>Tarifs de Livraison</td>
                                                    <td>8.00 TND</td>
                                                </tr>
                                                <tr class="order-total">
                                                    <td>Total</td>
                                                    <td class="order-total-amount">{{ $commande->getTotal() + 8.0 }}
                                                        TND</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="{{ route('checkout') }}"
                                        class="axil-btn btn-bg-primary checkout-btn">Processus de paiement</a>
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
    @include('inc.argon.flashmessage')
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-close').click(function() {
                $(this).closest('.alert-container').remove();
            });
        });
    </script>

    <!-- Main JS -->
    <script src="{{ asset('/mainassets/js/main.js') }}"></script>
    <style>
        .badge-success {
            color: #1aae6f;
            background-color: #b0eed3;

        }

        .badge {
            text-transform: uppercase;
        }

        .badge-warning {
            color: #ff3709;
            background-color: #fee6e0;
        }

        .badge {
            text-transform: uppercase;
        }
    </style>

</body>

</html>
