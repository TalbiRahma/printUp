<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        Commandes Validée
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

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <!-- Side bar -->
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
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('users') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-sm opacity-10" style="color: #a307b1 !important;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Members</span>
                    </a>
                </li>
                <li class="nav-item" id="accordionRental">
                    <a class=" nav-link " data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                        aria-controls="collapseOne">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Categories</span>
                    </a>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionRental" style="">
                        <a class="nav-link " href="{{ route('category_product') }}">

                            <span class="nav-link-text ms-4 text-dark">Categories Produits</span>
                        </a>
                        <a class="nav-link " href="{{ route('category_design') }}">

                            <span class="nav-link-text ms-4 text-dark">Categories Designs</span>
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('products') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Produits</span>
                    </a>
                </li>
                <li class="nav-item" id="accordionRental">
                    <a class=" nav-link" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                        aria-controls="collapseFour">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-image text-sm opacity-10" style="color: #f137b9 !important;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Designs</span>
                    </a>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionRental" style="">
                        <a class="nav-link " href="{{ route('validee') }}">

                            <span class="nav-link-text ms-4 text-dark">Validée</span>
                        </a>
                        <a class="nav-link " href="{{ route('verif.designs') }}">

                            <span class="nav-link-text ms-4 text-dark">Non Validée</span>
                        </a>
                        <a class="nav-link" href="{{ route('mes.designs') }}">

                            <span class="nav-link-text ms-4 text-dark">PrintUp Designs</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item" id="accordionRental">
                    <a class=" nav-link active" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bag-17 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Commandes</span>
                    </a>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionRental" style="">
                        <a class="nav-link " href="{{ route('commandes') }}">

                            <span class="nav-link-text ms-4 text-dark">En Attente</span>
                        </a>
                        <a class="nav-link active" href="{{ route('commandes.validee') }}">

                            <span class="nav-link-text ms-4 text-dark">Validée</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item" id="accordionRental">
                    <a class=" nav-link" data-bs-toggle="collapse" data-bs-target="#collapseTow"
                        aria-expanded="false" aria-controls="collapseTow">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-money-coins text-warning text-sm opacity-10"
                                style="color: #f1c037 !important;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Paiement</span>
                    </a>
                    <div id="collapseTow" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionRental" style="">
                        <a class="nav-link " href="{{ route('paiement') }}">

                            <span class="nav-link-text ms-4 text-dark">Demandes</span>
                        </a>
                        <a class="nav-link" href="{{ route('historiques') }}">

                            <span class="nav-link-text ms-4 text-dark">Historiques</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer">
            <ul class="navbar-nav">
                <li class="nav-item mt-3">
                    <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages de compte</h6>
                </li>
                <li class="nav-item ps--3">
                    <a class="nav-link " href="{{ route('donnes.profil') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Compte</span>
                    </a>
                </li>
                <li class="nav-item ps--3">
                    <a class="nav-link" href="{{ route('ma.boutique') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-sm opacity-10" style="color: #f1a037 !important;"></i>
                        </div>
                        <span class="nav-link-text ms-1">PrintUp Boutique</span>
                    </a>
                </li>
                <li class="nav-item ps--3">
                <li class="nav-item ps-2">
                    <a class="nav-link" href="{{ route('login') }}"
                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-right text-warning" viewBox="0 0 16 16">
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
                </li>
            </ul>
        </div>
    </aside>
    <!-- End Side bar -->
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Accueil</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Commandes</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Commandes Validée</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        @include('inc.admin.globalsearch')
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <!--profile-->
                        <li class="nav-item d-flex align-items-center">
                            @include('inc.admin.profile')
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-2" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="card card-frame">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <h4>Liste de commandes Validée</h4>
                        </div>
                        <div class="col-3">
                            <form action="{{ route('filtrer.commandes') }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <button type="submit" class="input-group-text text-body"><i
                                            class="fas fa-search" aria-hidden="true"></i></button>
                                    <select class="form-control" id="exampleFormControlSelect1"
                                        name="payment_status">
                                        <option value="tous" selected>Tous</option>
                                        <option value="payee">Payé</option>
                                        <option value="à la livraison">à la livraison</option>
                                        <option value="virment">Virment</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 5%;">Id
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 20%;">
                                    Produits
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 "
                                    style="width: 20%;">Clients
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 10%;">Total
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    style="width: 15%;">Etat
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 "
                                    style="width: 15%;">Paiement
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 "
                                    style="width: 15%;">Plus
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $index => $commande)
                                <tr>
                                    <td class="align-middle">
                                        #{{ $index + 1 }}
                                    </td>
                                    <td>
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#products{{ $commande->id }}">

                                            @foreach ($commande->lignecommandes as $lc)
                                                <h6 class="mb-0 text-xs">{{ $lc->customproduct->name }}</h6>
                                            @endforeach

                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if ($commande->member->photo)
                                                    <img src="{{ asset('/uploads') }}/{{ $commande->member->photo }}"
                                                        class="avatar avatar-sm me-3">
                                                @else
                                                    <img src="{{ asset('uploads/userphoto/userphoto.jpg') }}"
                                                        class="avatar avatar-sm me-3">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{ $commande->member->first_name }}
                                                    {{ $commande->member->last_name }}</h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $commande->member->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-xs">{{ $commande->getTotal() + 8.0 }} DT</h6>
                                    </td>
                                    <td class="align-middle text-sm ">
                                        @if ($commande->etat == 'valide')
                                            <a><span class="badge badge-success">Validée</span></a>
                                        @endif
                                        <!--<a><span class="badge bg-gradient-info">En Cours</span></a>-->
                                    </td>
                                    <td class="align-middle text-sm ">
                                        @if ($commande->paiement == 'payee')
                                            <span class="badge bg-gradient-success"> Payé </span>
                                        @else
                                            <span class="badge bg-gradient-warning">{{ $commande->paiement }}</span>
                                        @endif
                                    <td style="text-align: center;">
                                        <button type="button" class="btn bg-gradient-primary btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#plus{{ $commande->id }}">Voir
                                            Plus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('inc.argon.flashmessage')
        @include('inc.admin.footer')

    </main>

    <!-- Modal Voir Plus -->
    @foreach ($commandes as $commande)
        @php
            $coordonnees = json_decode($commande->coordonnees, true);
        @endphp
        <div class="modal fade" id="plus{{ $commande->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Détails Commande</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    <tr>

                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f;">Produits:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                @foreach ($commande->lignecommandes as $lc)
                                                    <a href="{{ route('commandes.detail', ['id' => $lc->id]) }}">
                                                        <h5 style="color: #32325d; margin-left: 10px;">
                                                            {{ $lc->customproduct->name }}</h5>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Client:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $coordonnees['first_name'] }} {{ $coordonnees['last_name'] }}
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Adresse Email:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $coordonnees['email'] }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Numéro Téléphone:
                                                </h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $coordonnees['phone'] }}
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Ville:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $coordonnees['ville'] }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Région:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $coordonnees['ville'] }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Ville:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $coordonnees['region'] }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Adresse De
                                                    Livraison:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $coordonnees['adresse'] }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Prix Total:</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                    {{ $commande->getTotal() + 8.0 }} DT</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 style="color: #525f7f; display: inline-block;">Méthode Paiement:
                                                </h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                @if ($commande->paiement == 'payee')
                                                    <span class="badge bg-gradient-success"> Payé </span>
                                                @else
                                                    <span
                                                        class="badge bg-gradient-warning">{{ $commande->paiement }}</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('commande.payer', ['id' => $commande->id]) }}"
                            class="btn bg-gradient-success" type="button">
                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                            <span class="btn-inner--text">a été payée</span>
                        </a>
                        <button type="button" class="btn bg-gradient-secondary"
                            data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- All products-->
    @foreach ($commandes as $commande)
        <div class="modal fade" id="products{{ $commande->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tout Les Produit Commandé</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach ($commande->lignecommandes as $lc)
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                            <a href="{{ route('commandes.detail', ['id' => $lc->id]) }}"
                                                class="d-block">
                                                <img style="width: 100%; height: auto;"
                                                    src="/{{ $lc->customproduct->photo }}" alt="">
                                            </a>
                                        </div>

                                        <div class="card-body pt-2">
                                            <a href="{{ route('commandes.detail', ['id' => $lc->id]) }}"
                                                class="card-title h6 d-block text-darker">
                                                {{ $lc->customproduct->name }}
                                            </a>
                                            <h6 class="text-xs">Taille: {{ $lc->selected_size }}</h6>
                                            <h6 class="text-xs">Qte: {{ $lc->qte }} Pièce</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary"
                            data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
    <!--   Core JS Files   -->
    <script src="{{ asset('/dashassets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/dashassets/js/plugins/chartjs.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-close').click(function() {
                $(this).closest('.alert-container').remove();
            });
        });
    </script>
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
