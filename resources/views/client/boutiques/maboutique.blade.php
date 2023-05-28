<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        Ma Boutique
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/dashassets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dashassets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/dashassets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/dashassets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />


</head>

<body class="g-sidenav-show bg-gray-100">
    <div class=" bg-primary position-absolute w-100" style="height: 75px;"></div>

    @include('inc.client.sidebar')

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ma Boutique</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Ma Boutique</h6>
                </nav>

                @include('inc.client.navbar')

            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-3">
            <div class="mx-4 card ">
                <div class="card card-profile">
                    @if (auth()->user()->boutique->photo)
                        <img src="{{ asset('uploads') }}/{{ auth()->user()->photo }}" class="avatar avatar-sm me-3">
                    @else
                        <img src="{{ asset('/dashassets/img/bg-profile.jpg') }}" alt="Image placeholder"
                            class="card-img-top">
                    @endif
                    <img src="">
                    <div class="row ">
                        <div class="col-3 col-lg-3 order-lg-1">
                            <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0" style="margin-left: 30px;">
                                <a href="javascript:;">
                                    @if (auth()->user()->photo)
                                        <img src="{{ asset('uploads') }}/{{ auth()->user()->photo }}"
                                            class="avatar avatar-sm me-3">
                                    @else
                                        <img src="{{ asset('uploads/userphoto/userphoto.jpg') }}"
                                             class="rounded-circle img-fluid border border-2 border-white">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="col-5 col-lg-5 order-lg-1">
                            <div class="mt-3">
                                <div class="ps-3">
                                    <h4>{{ auth()->user()->boutique->name }}</h4>
                                    @if (auth()->user()->boutique->biographie)
                                        <span class="text-sm">{{ auth()->user()->boutique->biographie }}</span>
                                    @else
                                        <span class="text-sm">Je vais vous montrer la meilleure
                                            création que vous verrez dans votre vie</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-start mt-n2">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <span class="text-lg mt-2 opacity-8">(10)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-lg-4 order-lg-1">
                            <div class="mt-3" style="margin-right: 25px;">
                                <div class="d-flex justify-content-end ">
                                    <div class="d-grid text-center mx-2">
                                        <span class="text-lg font-weight-bolder">50</span>
                                        <span class="text-sm opacity-8">Designs</span>
                                    </div>
                                    <div class="d-grid text-center mx-2">
                                        <span class="text-lg font-weight-bolder">50</span>
                                        <span class="text-sm opacity-8">Followers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-n4" style="margin-right: 25px;">
                        <button class="btn btn-sm btn-dark " type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-1">
            <div class="mx-4">
                <div class="row">
                    <div class="col-8">
                        @foreach ($designs as $design)
                        <div class="card card-frame">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{ asset('uploads') }}/{{$design->photo}}"
                                            class="rounded w-100 bg-gray-100">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-9">
                                                <h3>{{$design->name}}</h3>
                                            </div>
                                            <div class="col-3">
                                                <div class="text-end">
                                                    <button class="fav-btn ps-2" type="button">
                                                        <i id="fav-icon" class="ni ni-favourite-28 end-0 mt-2"
                                                            style="font-size: 25px; display: inline-block;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="mt-3">{{$design->price}} DT</h4>
                                        <div class="d-flex justify-content-start mt-n2" style="margin-left: -10px;">
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate"
                                                    value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rate"
                                                    value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rate"
                                                    value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rate"
                                                    value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rate"
                                                    value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                            <span class="text-lg mt-2 opacity-8">(10)</span>
                                        </div>
                                        <hr class="horizontal dark mt-2">
                                        <h6>Description:</h6>
                                        <span class="text-sm">{{$design->description}}</span>
                                    </div>
                                    <div class="accordion-item mt-4">
                                        <h5 class="accordion-header" id="headingOne">
                                            <button
                                                class="accordion-button ni ni-chat-round font-weight-bold collapsed"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                <span class="ps-3" style="font-size: 20px;">13 Avis</span>
                                            </button>
                                        </h5>
                                        <div id="collapseOne" class="accordion-collapse collapse mt-4 "
                                            aria-labelledby="headingOne" data-bs-parent="#accordionRental"
                                            style="">
                                            <div class="axil-comment-area pro-desc-commnet-area">
                                                <h5 class="title">01 Avis pour ce design</h5>
                                                <ul class="comment-list" style="list-style-type: none;">

                                                    <!-- Start Single Comment  -->
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img src="{{ asset('/dashassets/img/Mickey.png') }}"
                                                                        alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <div class="row">
                                                                            <div class="col-5">
                                                                                <a class="hover-flip-item-wrapper"
                                                                                    href="#">
                                                                                    <span class="hover-flip-item">
                                                                                        <span
                                                                                            data-text="Rahabi Khan">Courtney
                                                                                            Henry</span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <span class="rate">
                                                                                    <input type="radio"
                                                                                        id="star5" name="rate"
                                                                                        value="5" />
                                                                                    <label for="star5"
                                                                                        title="text">5
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star4" name="rate"
                                                                                        value="4" />
                                                                                    <label for="star4"
                                                                                        title="text">4
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star3" name="rate"
                                                                                        value="3" />
                                                                                    <label for="star3"
                                                                                        title="text">3
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star2" name="rate"
                                                                                        value="2" />
                                                                                    <label for="star2"
                                                                                        title="text">2
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star1" name="rate"
                                                                                        value="1" />
                                                                                    <label for="star1"
                                                                                        title="text">1
                                                                                        star</label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </h6>
                                                                    <div class="comment-text">
                                                                        <p>“We’ve created a full-stack structure
                                                                            for our
                                                                            working workflow processes, were
                                                                            from the
                                                                            funny the century initial all the
                                                                            made, have
                                                                            spare to negatives. ”</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End Single Comment  -->

                                                    <!-- Start Single Comment  -->
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img src="{{ asset('/dashassets/img/Mickey.png') }}"
                                                                        alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <div class="row">
                                                                            <div class="col-5">
                                                                                <a class="hover-flip-item-wrapper"
                                                                                    href="#">
                                                                                    <span class="hover-flip-item">
                                                                                        <span
                                                                                            data-text="Rahabi Khan">Courtney
                                                                                            Henry</span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <span class="rate">
                                                                                    <input type="radio"
                                                                                        id="star5" name="rate"
                                                                                        value="5" />
                                                                                    <label for="star5"
                                                                                        title="text">5
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star4" name="rate"
                                                                                        value="4" />
                                                                                    <label for="star4"
                                                                                        title="text">4
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star3" name="rate"
                                                                                        value="3" />
                                                                                    <label for="star3"
                                                                                        title="text">3
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star2" name="rate"
                                                                                        value="2" />
                                                                                    <label for="star2"
                                                                                        title="text">2
                                                                                        stars</label>
                                                                                    <input type="radio"
                                                                                        id="star1" name="rate"
                                                                                        value="1" />
                                                                                    <label for="star1"
                                                                                        title="text">1
                                                                                        star</label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </h6>
                                                                    <div class="comment-text">
                                                                        <p>“We’ve created a full-stack structure
                                                                            for our
                                                                            working workflow processes, were
                                                                            from the
                                                                            funny the century initial all the
                                                                            made, have
                                                                            spare to negatives. ”</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End Single Comment  -->
                                                </ul>
                                            </div>
                                            <!-- End .axil-commnet-area -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-4">
                        <div class="card card-frame">
                            <div class="card-body">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#personnaliser">
                                    <h6>Personnalisé</h6>
                                </a>
                                <hr class="horizontal dark mt-3">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#designFav">
                                    <h6>Designs Favoris</h6>
                                </a>
                                <hr class="horizontal dark mt-3">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#followers">
                                    <h6>Followers</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        @include('inc.admin.footer')

    </main>


    <!-- Modal personaliser poduit favorie -->
    <div class="modal fade" id="personnaliser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sélectionnez un produit initial pour la
                        personnalisation:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="#" class="d-block">
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('/dashassets/img/Mickey.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <a href="#" class="card-title h6 d-block text-darker">
                                        name
                                    </a>
                                    <h6>Prix: 30 DT</h6>
                                    <h6>Taille: S,L</h6>
                                    <button type="button"
                                        class="btn bg-gradient-primary w-100 mt-2">Personnaliser</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="#" class="d-block">
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('/dashassets/img/Mickey.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <a href="#" class="card-title h6 d-block text-darker">
                                        name
                                    </a>
                                    <h6>Prix: 30 DT</h6>
                                    <h6>Taille: S,L</h6>
                                    <button type="button"
                                        class="btn bg-gradient-primary w-100 mt-2">Personnaliser</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="#" class="d-block">
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('/dashassets/img/Mickey.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <a href="#" class="card-title h6 d-block text-darker">
                                        name
                                    </a>
                                    <h6>Prix: 30 DT</h6>
                                    <h6>Taille: S,L</h6>
                                    <button type="button"
                                        class="btn bg-gradient-primary w-100 mt-2">Personnaliser</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn bg-gradient-primary">
                        <span class="btn-inner--text">Voir plus</span>
                        <span class="btn-inner--icon"><i class="ni ni-bold-right"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal design favorie -->
    <div class="modal fade" id="designFav" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-large" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Design Favorie:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="#" class="d-block">
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('/dashassets/img/Mickey.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <a href="#" class="card-title h6 d-block text-darker">
                                        name
                                    </a>
                                    <h6>Prix: 30 DT</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="#" class="d-block">
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('/dashassets/img/Mickey.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <a href="#" class="card-title h6 d-block text-darker">
                                        name
                                    </a>
                                    <h6>Prix: 30 DT</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="#" class="d-block">
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('/dashassets/img/Mickey.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <a href="#" class="card-title h6 d-block text-darker">
                                        name
                                    </a>
                                    <h6>Prix: 5 DT</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->

    <!-- Modal followe -->
    <div class="modal fade" id="followers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-secondary opacity-7 w-5"></th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-75">
                                            Boutiques</th>
                                        <th class="text-secondary opacity-7 w-20"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <button class="btn btn-link text-secondary mb-0">
                                                <i class="ni ni-fat-remove"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">Best Creation</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Voir
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal modif profil -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <img id="photoPreview" src="#" alt="Aperçu de la photo"
                                style="display: none; max-width: 100%; height: auto;">
                            <label for="example-text-input" class="form-control-label mt-3">Ajouter votre couverture
                                de boutique</label>
                            <input class="form-control" type="file" id="photoInput">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nom Boutique</label>
                            <input class="form-control" type="text" value="Best Creation"
                                id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Biographie</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn bg-gradient-primary">Enregistrer les modifications</button>
                </div>
            </div>
        </div>
    </div>





    <script>
        document.getElementById('photoInput').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('photoPreview').src = e.target.result;
                document.getElementById('photoPreview').style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>
    <style>
        .modal-dialog.modal-large {
            max-width: 50%;
        }

        .size-input {
            display: flex;
            align-items: center;
        }

        .size-input h6 {
            margin-right: 10px;
        }

        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }

        .fav-btn {
            display: inline-block;
            border: none;
            background-color: #ffffff;
            color: #9b9b9b;
            cursor: pointer;
            margin-top: 3px;
            margin-bottom: 0;
        }

        @media only screen and (max-width: 575px) {
            .pro-desc-commnet-area .comment-list .comment .commenter {
                display: block;
            }
        }

        .pro-desc-commnet-area .comment-list .comment .commenter .hover-flip-item-wrapper,
        .pro-desc-commnet-area .comment-list .comment .commenter .commenter-rating {
            margin-bottom: 5px;
        }

        .pro-desc-commnet-area .comment-list .comment .commenter .hover-flip-item-wrapper a,
        .pro-desc-commnet-area .comment-list .comment .commenter .commenter-rating a {
            font-size: 12px;
        }

        .pro-desc-commnet-area .comment-list .comment .commenter .hover-flip-item-wrapper a i,
        .pro-desc-commnet-area .comment-list .comment .commenter .commenter-rating a i {
            color: #cecece;
        }

        .pro-desc-commnet-area .comment-list .comment .commenter .hover-flip-item-wrapper a i:not(.empty-rating),
        .pro-desc-commnet-area .comment-list .comment .commenter .commenter-rating a i:not(.empty-rating) {
            color: #ffca0f;
        }

        .pro-desc-commnet-area .comment-list .comment .commenter .commenter-rating {
            margin-left: 15px;
        }

        @media only screen and (max-width: 479px) {
            .pro-desc-commnet-area .comment-list .comment .commenter .commenter-rating {
                display: block;
                margin-bottom: 5px;
                margin-left: 0;
            }
        }

        /* --------------------------
  Comments Styles
-----------------------------*/
        .comment-list ul.children {
            padding-left: 75px;
        }

        @media only screen and (max-width: 767px) {
            .comment-list ul.children {
                padding-left: 30px;
            }
        }

        .comment-list .comment {
            margin-top: 0;
            margin-bottom: 0;
        }

        .comment-list .comment .single-comment {
            padding: 15px 0;
            display: flex;
        }

        .comment-list .comment .single-comment .comment-img {
            margin-bottom: 15px;
            min-width: 60px;
            margin-right: 20px;
        }

        .comment-list .comment .single-comment .comment-img img {
            border-radius: 100%;
            width: 100%;
        }

        .comment-list .comment .commenter {
            line-height: 33px;
            margin-bottom: 6px;
        }

        .comment-list .comment .commenter a .hover-flip-item span::before {
            color: var(--color-heading);
        }

        .comment-list .comment .commenter a .hover-flip-item span::after {
            color: var(--color-argon);
        }

        .comment-list .comment .comment-meta {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .comment-list .comment .time-spent {
            color: var(--color-extra01);
            font-size: 16px;
            line-height: 24px;
        }

        .comment-list .comment .reply-edit a.comment-reply-link {
            font-size: 16px;
            line-height: 24px;
            display: flex;
            color: var(--color-argon);
            margin-left: 8px;
            padding-left: 8px;
            position: relative;
            font-weight: 500;
            overflow: visible;
        }

        .comment-list .comment .reply-edit a.comment-reply-link .hover-flip-item span::before {
            color: var(--color-heading);
        }

        .comment-list .comment .reply-edit a.comment-reply-link .hover-flip-item span::after {
            color: var(--color-argon);
        }

        .comment-list .comment .reply-edit a.comment-reply-link:hover {
            color: var(--color-argon);
        }

        .comment-list .comment .reply-edit a.comment-reply-link::before {
            position: absolute;
            content: "";
            top: 50%;
            transform: translateY(-50%);
            left: -2px;
            width: 4px;
            height: 4px;
            background: var(--color-extra01);
            border-radius: 100%;
        }
    </style>

    <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>


    <script>
        // Sélectionner l'icône
        const favIcon = document.querySelector("#fav-icon");

        // Initialiser le compteur de clics à 0
        let clickCount = 0;

        // Ajouter un écouteur d'événement pour le clic sur l'icône
        favIcon.addEventListener("click", function() {
            // Incrémenter le compteur de clics
            clickCount++;

            // Changer la couleur de l'icône en fonction du nombre de clics
            if (clickCount % 2 === 0) {
                favIcon.style.color = "#a7a7a7"; // Couleur initiale
            } else {
                favIcon.style.color = "#f51b52"; // Couleur rouge
            }
        });
    </script>

    <!--   Core JS Files   -->
    <script src="{{ asset('/dashassets/js/sidebar.js?v=2.0.4') }}"></script>
    <script src="{{ asset('/dashassets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/dashassets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>
