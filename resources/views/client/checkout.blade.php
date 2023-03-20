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

            <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="axil-checkout-billing">
                                <h4 class="title mb--40">Détails de la facturation</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Prénom <span>*</span></label>
                                            <input type="text" id="first-name" placeholder="Adam">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nom <span>*</span></label>
                                            <input type="text" id="last-name" placeholder="John">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nom de l'entreprise</label>
                                    <input type="text" id="company-name">
                                </div>
                                <div class="form-group">
                                    <label>Région <span>*</span></label>
                                    <select id="Region">
                                        <option value="3">Monastir</option>
                                        <option value="4">Kairouan</option>
                                        <option value="6">Mahdia</option>
                                        <option value="5">Sousse</option>
                                        <option value="1">Tunise</option>
                                        <option value="2">Nabel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Adresse de la rue <span>*</span></label>
                                    <input type="text" id="address1" class="mb--15" placeholder="Numéro de maison et nom de la rue">
                                    <input type="text" id="address2" placeholder="Apartment, suite, unit, etc. (optonal)">
                                </div>
                                <div class="form-group">
                                    <label>Ville <span>*</span></label>
                                    <input type="text" id="town">
                                </div>
                                <div class="form-group">
                                    <label>Pays</label>
                                    <input type="text" id="country">
                                </div>
                                <div class="form-group">
                                    <label>Téléphone <span>*</span></label>
                                    <input type="tel" id="phone">
                                </div>
                                <div class="form-group">
                                    <label>Adresse e-mail <span>*</span></label>
                                    <input type="email" id="email">
                                </div>
                                <div class="form-group input-group">
                                    <input type="checkbox" id="checkbox1" name="account-create">
                                    <label for="checkbox1">Créer un compte</label>
                                </div>
                                
                                <div class="form-group">
                                    <label>Autres notes (optional)</label>
                                    <textarea id="notes" rows="2" placeholder="Remarques concernant votre commande, par ex. notes spéciales pour la livraison."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Votre commande</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Totale</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="order-product">
                                                <td>Commodo Blown Lamp <span class="quantity">x1</span></td>
                                                <td>117.00 TND</td>
                                            </tr>
                                            <tr class="order-product">
                                                <td>Commodo Blown Lamp <span class="quantity">x1</span></td>
                                                <td>198.00 TND</td>
                                            </tr>
                                            <tr class="order-subtotal">
                                                <td>Totale</td>
                                                <td>$117.00</td>
                                            </tr>
                                            <tr class="order-shipping">
                                                <td colspan="2">
                                                    <div class="shipping-amount">
                                                        <span class="title">Mode de livraison</span>
                                                        <span class="amount">$35.00</span>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio1" name="shipping" checked>
                                                        <label for="radio1">Livraison gratuite</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio2" name="shipping">
                                                        <label for="radio2">Local</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio3" name="shipping">
                                                        <label for="radio3">Forfait</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">$323.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="order-payment-method">
                                    <div class="single-payment">
                                        <div class="input-group">
                                            <input type="radio" id="radio4" name="payment">
                                            <label for="radio4">Virement bancaire direct</label>
                                        </div>
                                        <p>Effectuez votre paiement directement sur notre compte bancaire. Veuillez utiliser votre ID de commande comme référence de paiement. Votre commande ne sera pas expédiée tant que les fonds n'auront pas été crédités sur notre compte.</p>
                                    </div>
                                    <div class="single-payment">
                                        <div class="input-group">
                                            <input type="radio" id="radio5" name="payment">
                                            <label for="radio5">Paiement à la livraison</label>
                                        </div>
                                        <p>Payez en espèces à la livraison.</p>
                                    </div>
                                    <div class="single-payment">
                                        <div class="input-group justify-content-between align-items-center">
                                            <input type="radio" id="radio6" name="payment" checked>
                                            <label for="radio6">Paypal</label>
                                            <img src="{{asset('/mainssets/images/others/payment.png')}}" alt="Paypal payment">
                                        </div>
                                        <p>Payez via PayPal; vous pouvez payer avec votre carte de crédit si vous n'avez pas de compte PayPal.</p>
                                    </div>
                                </div>
                                <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Processus de paiement</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Checkout Area  -->
    
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