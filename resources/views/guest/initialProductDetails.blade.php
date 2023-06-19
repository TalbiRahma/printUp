<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Détails du produit</title>
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
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">

            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mb--40">
                            <div class="row">
                                <div class="col-lg-10 order-lg-2">
                                    <div class="single-product-thumbnail-wrap zoom-gallery">
                                        <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                            <div class="thumbnail">
                                                <a href="{{ asset('uploads') }}/{{ $product->photo }}"
                                                    class="popup-zoom">
                                                    <img src="{{ asset('uploads') }}/{{ $product->photo }}"
                                                        alt="Product Images">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="product-quick-view position-view">
                                            <a href="{{ asset('uploads') }}/{{ $product->photo }}" class="popup-zoom">
                                                <i class="far fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{ $product->name }}</h2>
                                    <span class="price-amount">{{ $product->price }} TND</span>
                                    <div class="product-rating">
                                        <div class="star-rating">
                                            @if ($product->moyReviews() == 0)
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                                <i class="fal fa-star"></i>
                                            @else
                                                @for ($i = 0; $i < $product->moyReviews(); $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            @endif
                                        </div>
                                        <div class="review-link">
                                            <a href="#">(<span>{{ count($product->Reviews) }}</span> Avis des
                                                clients)</a>
                                        </div>
                                    </div>
                                    <ul class="product-meta">
                                        <li><i class="fal fa-check"></i>En stock</li>
                                    </ul>
                                    <div class="product-desc-wrapper">
                                        <h6>Description:</h6>
                                        <p class="description">{{ $product->description }}</p>
                                    </div>
                                    <div class="product-variations-wrapper">
                                        <div class=" product-variation product-size-variation">
                                            @if ($product->sizes)
                                                @php $sizes = json_decode($product->sizes, true); @endphp
                                                <div class="product-variation">
                                                    @if (count($sizes) > 0)
                                                        <h6 class="title">Size:</h6>
                                                    @endif
                                                    <ul class="range-variant">

                                                        @foreach ($sizes as $size)
                                                            <li>{{ $size }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div> 
                                    </div>
                                    <div class="product-action-wrapper d-flex-center">
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart"><a
                                                    href="{{ route('personnaliser.produit', ['id' => $product->id]) }}"
                                                    class="axil-btn btn-bg-primary">Personnaliser</a></li>
                                            <li class="wishlist"><a href="{{ route('wishlist.add.product', ['id' => $product->id]) }}" 
                                                    class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true">Les avis</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="false">Ajouter un commentaire</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="row">
                                <div class="col-8">
                                    <div class="axil-comment-area pro-desc-commnet-area">
                                        <h5 class="title">{{ count($product->Reviews) }} Avi(s) sur ce produit
                                        </h5>
                                        @foreach ($product->reviews as $review)
                                            <ul class="comment-list">
                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="row"> 
                                                                <div class="col-2">
                                                                    <div class="comment-img">
                                                                        @if ($review->user->photo == null)
                                                                            <img src="/uploads/userphoto.jpg"
                                                                                alt="bienvenue client"  class="w-75 border-radius-lg shadow-sm">
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
                                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                                <span class="hover-flip-item">
                                                                                    <span
                                                                                        data-text="Cameron Williamson">{{ $review->user->first_name }}
                                                                                        {{ $review->user->last_name }}</span>
                                                                                </span>
                                                                            </a>
                                                                            <span class="commenter-rating ratiing-four-star">
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
                                                                            <p>{{ $review->content }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews-wrapper">
                                <!-- Start Comment Respond  -->
                                <div class="comment-respond pro-des-commend-respond mt--0">
                                    <h5 class="title mb--30">Ajouter un commentaire</h5>
                                    <form action="{{ route('add.review') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="initial_product_id">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Notation <span class="require">*</span></label>
                                                    <input type="number" max="5" min="1"
                                                        name="rate" />
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
                                                    class="axil-btn btn-bg-primary w-auto">Envoyer un
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

        <!-- Start Recently Viewed Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Votre
                        récemment</span>
                    <h2 class="title">Produits similaire</h2>
                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">


                    @foreach ($products as $pr)
                        <div class="slick-single-layout">

                            <div class="axil-product">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('uploads') }}/{{ $pr->photo }}" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a
                                                    href="{{ route('products.details', ['id' => $pr->id]) }}"><i
                                                        class="far fa-eye"></i></a></li>
                                            <li class="select-option">
                                                <a href="{{ route('personnaliser.produit', ['id' => $pr->id]) }}">
                                                    Personnalisé
                                                </a>
                                                </form>
                                            </li>
                                            <li class="wishlist">
                                                
                                                    <a href="{{ route('wishlist.add.product', ['id' => $pr->id]) }}"><i
                                                                class="far fa-heart"></i></a>
                                               
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title">{{ $pr->name }}<a href="single-product.html"></a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">{{ $pr->price }} TND</span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endforeach



                </div>
            </div>
        </div>

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
