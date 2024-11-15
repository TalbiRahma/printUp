<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Se connecter</title>
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

    <body>
        <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

        <div class="comming-soon-area">

            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="comming-soon-banner bg_image bg_image--13"></div>
                </div>
                <div class="col-lg-5 offset-xl-1">
                    <div class="comming-soon-content">
                        <div class="brand-logo">
                            <img class="w-50" src="{{ asset('/dashassets/img/PrintUp-logo.png') }}" alt="Logo">
                        </div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </div>
                        @endif
                        <h2 class="title">{{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}</h2>
                        <p>{{ __('Si vous n\'avez pas reçu l\'e-mail') }},</p>
                        
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="axil-btn mb--15">{{ __('Cliquez ici pour en demander un autre') }}</button>.
                        </form>
                    
                        <!-- <form>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </form> -->
                    </div>
                </div>
            </div>
        </div>

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
