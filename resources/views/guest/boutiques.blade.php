<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Boutiques</title>
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
                                <li class="separator">
                                </li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Boutiques</li>
                            </ul>
                            <h1 class="title">Boutiques</h1>
                        </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Blog Area  -->
        <div class="axil-blog-area axil-section-gap">
            <div class="container">
                <div class="row g-5">
                    @foreach ($boutiques as $boutique)
                        <div class="col-md-4">
                            <div class="content-blog blog-grid">
                                <div class="inner">
                                    <div class="thumbnail">
                                        @if ($boutique->photo)
                                            <a href="{{route('boutique', ['id' => $boutique->id])}}">
                                                <img src="{{ asset('uploads') }}/{{$boutique->photo }}"
                                                    alt="Blog Images">
                                            </a>
                                        @else 
                                            <a href="{{route('boutique', ['id' => $boutique->id])}}">
                                                <img src="{{ asset('/dashassets/img/bg-profile.jpg') }}"
                                                    alt="Blog Images">
                                            </a>
                                        @endif
                                        <div class="blog-category">
                                            <a href="{{ route('add.suivi', ['id' => $boutique->id]) }}">Suivre</a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{route('boutique', ['id' => $boutique->id])}}">{{ $boutique->name }}</a></h5>
                                        @if ($boutique->biographie)
                                            <span class="text-sm">{{ $boutique->biographie }}</span>
                                        @else
                                            <span class="text-sm">Je vais vous montrer la meilleure
                                                création que vous verrez dans votre vie</span>
                                        @endif
                                        <div class="read-more-btn mt-4">
                                            <a class="axil-btn right-icon" href="{{route('boutique', ['id' => $boutique->id])}}">Voir plus <i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="post-pagination">
                    {{ $boutiques->links('vendor.pagination.guest') }}
                </div>
                <!-- End post-pagination -->
            </div>
            <!-- End .container -->
        </div>
    </main>


    @include('inc.argon.flashmessage')
    @include('inc.client.service')
    <!-- Start Footer Area  -->
    @include('inc.client.footer')
    <!-- End Footer Area  -->


    <style>
        .rating-icon {
            display: inline-block;
            font-size: 12px;
            color: #ffa800;
            margin-bottom: 5px;
            margin-right: 10px;
        }

        .rating-number {
            margin-left: 5px;
            font-weight: 500;
            margin-left: 0;
            display: inline-block;
        }

        .rating-number span {
            font-weight: 700;
            color: var(--color-heading);
        }
    </style>

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

    <!--size selected-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-close').click(function() {
                $(this).closest('.alert-container').remove();
            });
        });
    </script>

</body>

</html>
