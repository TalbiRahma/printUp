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

                                            <a href="{{route('boutique', ['id' => $design->boutique->id])}}"><span
                                                    class="price current-price">{{ $design->boutique->name }}</span></a>

                                            <div class="price-amount price-offer-amount">
                                                <span class="price current-price">{{ $design->price }} DT</span>
                                            </div>
                                            <div class="product-rating">
                                                <div class="star-rating">
                                                    @if ($design->moyReviews() == 0)
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                        <i class="fal fa-star"></i>
                                                    @else
                                                        @for ($i = 0; $i < $design->moyReviews(); $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                    @endif
                                                </div>
                                                <div class="review-link">
                                                    <a href="#">(<span>{{ count($design->Reviews) }}</span> Avis
                                                        des
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
                                                <div class="nft-category">
                                                    <label>Description:</label>
                                                    <div class="category-list">
                                                        <p>{{ $design->description }}</p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px" class="">
                                                    <a href="{{route('boutique', ['id' => $design->boutique->id])}}" ><button class="w-50 verify-btn axil-btn btn-bg-secondary">Voir
                                                        Boutique </button></a>
                                                    <a href="{{ route('wishlist.add.design', ['id' => $design->id]) }}" class="axil-btn wishlist-btn"
                                                        style="margin-left: 12px"><i class="far fa-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white nft-info-tabs">
                                <div class="container">
                                    <ul class="nav tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="active" id="description-tab" data-bs-toggle="tab"
                                                href="#description" role="tab" aria-controls="description"
                                                aria-selected="true">Les avis</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                                                aria-controls="reviews" aria-selected="false">Commentaire</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                                            aria-labelledby="description-tab">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="axil-comment-area pro-desc-commnet-area">
                                                        <h5 class="title">{{ count($design->Reviews) }} Avis sur ce
                                                            produit
                                                        </h5>
                                                        <ul class="comment-list">
                                                            @foreach ($design->reviews as $review)
                                                                <!-- Start Single Comment  -->
                                                                <li class="comment">
                                                                    <div class="comment-body">
                                                                        <div class="single-comment">
                                                                            <div class="row">
                                                                                <div class="col-2">
                                                                                    <div class="comment-img">
                                                                                        @if ($review->user->photo == null)
                                                                                            <img src="/uploads/userphoto.jpg"
                                                                                            alt="profile_image"
                                                                                            class="w-75 border-radius-lg shadow-sm">
                                                                                        @else
                                                                                            <img src="{{ asset('uploads') }}/{{ $review->user->photo }}"
                                                                                                alt="profile_image"
                                                                                                class="w-75 border-radius-lg shadow-sm">
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <div class="comment-inner ">
                                                                                        <h6 class="commenter">
                                                                                            <a class="hover-flip-item-wrapper"
                                                                                                href="#">
                                                                                                <span
                                                                                                    class="hover-flip-item">
                                                                                                    <span
                                                                                                        data-text="Cameron Williamson">{{ $review->user->first_name }}
                                                                                                        {{ $review->user->last_name }}</span>
                                                                                                </span>
                                                                                            </a>
                                                                                            <span
                                                                                                class="commenter-rating ratiing-four-star">

                                                                                                @for ($i = 0; $i < $review->rate; $i++)
                                                                                                    <a href="#"><i
                                                                                                            class="fas fa-star"></i></a>
                                                                                                @endfor

                                                                                            </span>
                                                                                            <br>
                                                                                            <p><small>-<i>{{ $review->created_at }}</i></small>
                                                                                            </p>

                                                                                        </h6>
                                                                                        <div class="comment-text">
                                                                                            <p>{{ $review->content }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- End Single Comment  -->
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="reviews" role="tabpanel"
                                            aria-labelledby="reviews-tab">
                                            <div class="product-additional-info">
                                                <div class="reviews-wrapper">
                                                    <!-- Start Comment Respond  -->
                                                    <div class="comment-respond pro-des-commend-respond mt--0">
                                                        <h5 class="title mb--30">Ajouter un commentaire</h5>
                                                        <form action="{{ route('add.review.design') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $design->id }}"
                                                                name="design_id">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Notation <span
                                                                                class="require">*</span></label>
                                                                        <input type="number" max="5"
                                                                            min="1" name="rate" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Commentaire (optionnel)</label>
                                                                        <textarea name="content" placeholder="Votre Commentaire"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-submit">
                                                                    <button type="submit" id="submit"
                                                                        class="axil-btn btn-bg-primary w-auto">Envoyer
                                                                        un
                                                                        commentaire</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- End .col -->
                                                </div>
                                            </div>
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
                                        <h5 class="title"><a href="{{route('boutique', ['id' => $ds->boutique->id])}}">{{ $ds->boutique->name }}
                                                <span class="verified-icon"><i
                                                        class="fas fa-badge-check"></i></span></a></h5>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="{{ route('wishlist.add.design', ['id' => $ds->id]) }}">ajouter aux
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

    @include('inc.argon.flashmessage')
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
