<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        Best Creation
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
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/" target="_blank">
                <img src="{{ asset('/dashassets/img/PrintUp-logo.png') }}" class="navbar-brand-img h-100"
                    alt="main_logo">
            </a>

        </div>
        <hr class="horizontal dark mt-0">
        @if (auth()->user())
            <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-shop text-sm opacity-10" style="color: #2b6cf7 !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('maboutique') }}" id="boutique">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-badge text-sm opacity-10" style="color: #f1a037 !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Ma Boutique</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('designs') }}" id="design">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-image text-sm opacity-10" style="color: #f137b9 !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Mes Designs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('produit.personnaliser') }}" id="pp">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-ruler-pencil text-sm opacity-10" style="color: #3772f1 !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Mes Produits Personnalisés</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('commande.historique') }}" id="hcommande">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-bag-17 text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Commandes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('porte-monnaie') }}" id="pmonnaie">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-money-coins text-sm opacity-10" style="color: #f1c037 !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Porte-monnaie</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidenav-footer  ">
                <ul class="navbar-nav">
                    <li class="nav-item mt-3">
                        <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages de compte</h6>
                    </li>
                    <li class="nav-item ps--3">
                        <a class="nav-link " href="{{ route('account') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Compte</span>
                        </a>
                    </li>
                    <li class="nav-item ps--3">
                        <a class="nav-link " href="{{ route('compte.update') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-settings text-sm opacity-10" style="color: #606d80 !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Modifier Compte</span>
                        </a>
                    </li>
                    <li class="nav-item ps-2">
                        <a class="nav-link" href="{{ route('login') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-box-arrow-right text-warning" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                            <span class="nav-link-text ms-1 ps-3">Se déconnecter</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-shop text-sm opacity-10" style="color: #2b6cf7 !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-sm opacity-10"
                                    style="color: #ff497c !important;"></i>
                            </div>
                            <span class="nav-link-text ms-1">S'inscrire</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Accueil</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Best Creation</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Best Creation</h6>
                </nav>

                @include('inc.client.navbar')

            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-3">
            <div class="mx-4 card ">
                <div class="card card-profile">
                    <img src="{{ asset('/dashassets/img/bg-profile.jpg') }}" alt="Image placeholder"
                        class="card-img-top">
                    <div class="row ">
                        <div class="col-3 col-lg-3 order-lg-1">
                            <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0" style="margin-left: 30px;">
                                <a href="javascript:;">
                                    <img src="{{ asset('/dashassets/img/team-2.jpg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                        <div class="col-5 col-lg-5 order-lg-1">
                            <div class="mt-3">
                                <div class="ps-3">
                                    <h4>Best Creation</h4>
                                    <span class="text-sm">Je vais vous montrer la meilleure
                                        création que vous verrez dans votre vie</span>
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
                        <button class="btn btn-sm btn-pink" type="button">Suivre</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-1">
            <div class="mx-4">
                <div class="row">
                    <div class="col-8">
                        <div class="card card-frame">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{ asset('/dashassets/img/Mickey.png') }}"
                                            class="rounded w-100 bg-gray-100">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-9">
                                                <h3>Nom Designs</h3>
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
                                        <h4 class="mt-3">15 TND</h4>
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
                                        <span class="text-sm">Je vais vous montrer la meilleure création que vous
                                            verrez dans votre vie</span>
                                    </div>
                                    <div class="accordion-item mt-4">
                                        <h5 class="accordion-header" id="headingOne">
                                            <div class="row">
                                                <div class="col-8">
                                                    <button
                                                        class="accordion-button ni ni-chat-round font-weight-bold collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne" aria-expanded="false"
                                                        aria-controls="collapseOne">
                                                        <span class="ps-3" style="font-size: 20px;">13 Avis</span>
                                                    </button>
                                                </div>
                                                <div class="col-4 d-flex">
                                                    <div class="mt-n2 ms-auto">
                                                        <button class="btn btn-icon btn-3 btn-block btn-default mb-3"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalMessage">
                                                            <span class="btn-inner--icon"><i
                                                                    class="ni ni-fat-add"></i></span>
                                                            <span class="btn-inner--text">Commentaire</span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
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
                                                                <div class="dropdown">
                                                                    <a href="#"data-bs-toggle="dropdown"
                                                                        id="navbarDropdownMenuLink2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-three-dots-vertical"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                                        </svg>
                                                                    </a>
                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="navbarDropdownMenuLink2">
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                  </svg>
                                                                                Supprimer
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                                  </svg>
                                                                                Modifier
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
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


    <!-- Button trigger modal -->
    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
        data-bs-target="#exampleModalMessage">
        Message Modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un commentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="recipient-name" class="col-form-label">Votre note:</label>
                                </div>
                                <div class="col-9">
                                    <span class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5
                                            stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4
                                            stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3
                                            stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2
                                            stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1
                                            star</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Commentaire:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn bg-gradient-primary">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
    </div>


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

        .btn-pink {
            background-color: #ff497c;
            /* Couleur de fond */
            color: #ffffff;
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
