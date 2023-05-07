<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        Porte-monnaie
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
        <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="/">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-shop text-sm opacity-10" style="color: #2b6cf7 !important;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Accueil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('maboutique') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-sm opacity-10" style="color: #f1a037 !important;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Ma Boutique</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('designs') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-image text-sm opacity-10" style="color: #f137b9 !important;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mes Designs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('commande.historique') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bag-17 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Commandes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('porte-monnaie') }}">
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
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Porte-monnaie</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Porte-monnaie</h6>
                </nav>

                @include('inc.client.navbar')
            </div>
        </nav>
        <!-- End Navbar -->

        <!--tabl list paiement-->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-xl-6 mb-xl-0 mb-4">
                            <div class="card bg-transparent shadow-xl">
                                <div class="overflow-hidden position-relative border-radius-xl"
                                    style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="card-body position-relative z-index-1 p-3">
                                        <i class="fas fa-wifi text-white p-2"></i>
                                        <h5 class="text-white mt-4 mb-5 pb-2">
                                            @if (auth()->user()->portmonnaie)
                                                @foreach (str_split(auth()->user()->portmonnaie->Num_cart, 4) as $chunk)
                                                    {{ $chunk }}&nbsp;&nbsp;&nbsp;
                                                @endforeach
                                            @endif
                                        </h5>
                                        <div class="d-flex">
                                            <div class="d-flex">
                                                <div class="me-4">
                                                    <p class="text-white text-sm opacity-8 mb-0">Propriétaire</p>
                                                    <h6 class="text-white mb-0">{{ auth()->user()->first_name }}
                                                        {{ auth()->user()->last_name }}</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                                @if (auth()->user()->portmonnaie)
                                                    @if (auth()->user()->portmonnaie->Procedure == 'd17')
                                                        <img class="w-100 mt-2"
                                                            src="{{ asset('/dashassets/img/logod17bnk.png') }}"
                                                            alt="logo">
                                                    @elseif (auth()->user()->portmonnaie->Procedure == 'bna')
                                                        <img class="w-100 mt-2"
                                                            src="{{ asset('/dashassets/img/logo-bna.png') }}"
                                                            alt="logo">
                                                    @elseif (auth()->user()->portmonnaie->Procedure == 'biat')
                                                        <img class="w-100 mt-2"
                                                            src="{{ asset('/dashassets/img/logobiat.png') }}"
                                                            alt="logo">
                                                    @else
                                                        <img class="w-100 mt-2"
                                                            src="{{ asset('/dashassets/img/logod17bnk.png') }}"
                                                            alt="logo">
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                <i class="ni ni-money-coins opacity-10"></i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Sold</h6>
                                            <span class="text-xs">Vorte Sold</span>
                                            <hr class="horizontal dark my-3">
                                            @if (auth()->user()->portmonnaie)
                                                <h5 class="mb-0">{{ auth()->user()->portmonnaie->solde }} DT</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-4">
                                    <div class="card">
                                        <div class="card-header p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                <i class="ni ni-chart-bar-32 opacity-10"></i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Transfert</h6>
                                            <span class="text-xs">Total Transfert</span>
                                            <hr class="horizontal dark my-3">
                                            @if (auth()->user()->portmonnaie)
                                                <h5 class="mb-0">{{ auth()->user()->getTotaltransactions() }} DT
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Mode de paiement</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                        data-bs-target="#modal-form-demend"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor"
                                            class="bi bi-cash-stack" viewBox="0 0 16 16">
                                            <path
                                                d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                            <path
                                                d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                                        </svg>&nbsp;&nbsp;Demande d'argent</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-7 mb-md-0 mb-4">
                                    <div
                                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                        @if (auth()->user()->portmonnaie)
                                            @if (auth()->user()->portmonnaie->Procedure == 'd17')
                                                <img class="w-15 me-3 mb-0"
                                                    src="{{ asset('/dashassets/img/logod17bnk.png') }}"
                                                    alt="logo">
                                            @elseif (auth()->user()->portmonnaie->Procedure == 'bna')
                                                <img class="w-15 me-3 mb-0"
                                                    src="{{ asset('/dashassets/img/logo-bna.png') }}" alt="logo">
                                            @elseif (auth()->user()->portmonnaie->Procedure == 'biat')
                                                <img class="w-15 me-3 mb-0"
                                                    src="{{ asset('/dashassets/img/logobiat.png') }}" alt="logo">
                                            @else
                                                <img class="w-15 me-3 mb-0"
                                                    src="{{ asset('/dashassets/img/logod17bnk.png') }}"
                                                    alt="logo">
                                            @endif
                                            @if (auth()->user()->portmonnaie->Num_cart)
                                                <h6 class="mb-0">
                                                    @foreach (str_split(auth()->user()->portmonnaie->Num_cart, 4) as $chunk)
                                                        {{ $chunk }}&nbsp;&nbsp;&nbsp;
                                                    @endforeach
                                                </h6>
                                                <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer"
                                                    data-bs-placement="top" data-bs-toggle="modal"
                                                    data-bs-target="#modal-form-modif" title="Modifier la carte"></i>
                                            @endif
                                        @endif
                                        @if (!auth()->user()->portmonnaie || auth()->user()->portmonnaie->Num_cart == null)
                                            <h6 class="mb-0">
                                                ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852
                                            </h6>
                                            <i class="ni ni-fat-add ms-auto text-dark cursor-pointer"
                                                data-bs-placement="top" data-bs-toggle="modal"
                                                data-bs-target="#modal-form-ajout" title="Ajouter une carte"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Historique de Ventes:<h6>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal dark mt-0">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="width: 20%;">Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                style="width: 30%;">Designs</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="width: 15%;">Quantité</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="width: 15%;">Prix</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="width: 20%;">Totale</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commandes as $commande)
                                            @foreach ($commande->lignecommandes as $lc)
                                                <tr>
                                                    <td class="align-middle">
                                                        {{ $lc->created_at }}
                                                    </td>
                                                    <td class="align-middle text-sm ">
                                                        <img src="{{ asset('/uploads') }}/{{ $lc->customproduct->design->photo }}"
                                                            class="img-fluid border-radius-lg"
                                                            style="width: 150px; height: auto;">
                                                    </td>
                                                    <td class="align-middle text-sm ">
                                                        <h6 class="text-s font-weight-bold mb-0">
                                                            {{ $lc->qte }}
                                                            Pièce(s)</h6>
                                                    </td>
                                                    <td class="align-middle text-sm ">
                                                        <h6 class="text-s font-weight-bold mb-0">
                                                            {{ $lc->customproduct->design->price }} DT</h6>
                                                    </td>
                                                    <td class="align-middle text-sm ">
                                                        <h6 class="text-s font-weight-bold mb-0">
                                                            {{ $lc->customproduct->design->price * $lc->qte }} DT
                                                        </h6>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Vos transactions</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <small>{{ Carbon\Carbon::now()->isoFormat('DD') }} -
                                        {{ Carbon\Carbon::now()->endOfMonth()->isoFormat('DD MMMM YYYY') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Vos demandes</h6>
                            <ul class="list-group">
                                @foreach ($tarnsactions as $tr)
                                    <li
                                        class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                                <i class="fas fa-exclamation"></i>
                                            </button>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm">Demande</h6>
                                                <span class="text-xs">{{ $tr->created_at }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                                            {{ $tr->montant_demander }} TD
                                        </div>
                                    </li>
                                    @if ($tr->montant_transferts != 0)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="fas fa-arrow-down"></i></button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Transfert</h6>
                                                    <span class="text-xs">{{ $tr->updated_at }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                                - {{ $tr->montant_transferts }} TD
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">vos revenus</h6>
                                @foreach ($commandes as $commande)
                                    @foreach ($commande->lignecommandes as $lc)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-arrow-up"></i>
                                                </button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Revenu</h6>
                                                    <span
                                                        class="text-xs">{{ auth()->user()->portmonnaie->updated_at }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                + {{ $lc->customproduct->design->price * $lc->qte }} TD
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!--end tabl list paiement-->
        </div>

        <!--Modale modifier coordonnée-->
        <div class="col-md-4">
            <div class="modal fade" id="modal-form-modif" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Modifier Coordonnée
                                    </h3>
                                    <p class="mb-0">Modifier votre coordonnée de paiement</p>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left" action="{{ route('porte-monnaie.modif') }}"
                                        method="POST">
                                        @csrf
                                        <label>Procedure:</label>
                                        <div class="input-group mb-3">
                                            <select name="procedure" class="form-control"
                                                id="exampleFormControlSelect1">
                                                <option value="d17">D17</option>
                                                <option value="bna">BNA</option>
                                                <option value="biat">BIAT</option>
                                            </select>
                                        </div>
                                        <label>Numéro de Cart:</label>
                                        <div class="input-group mb-3">
                                            <input name="Num_cart" type="text" class="form-control"
                                                placeholder="0000 0000 0000 0000" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-round bg-gradient-danger btn-lg w-50 mt-4 mb-0">Supprimer</button>
                                            <button type="submit"
                                                class="btn btn-round bg-gradient-info btn-lg w-50 mt-4 mb-0">Confirmer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modale modifier coordonnée-->

        <!--Modale ajouter coordonnée-->
        <div class="col-md-4">
            <div class="modal fade" id="modal-form-ajout" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Modifier Coordonnée
                                    </h3>
                                    <p class="mb-0">Modifier votre coordonnée de paiement</p>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left" action="{{ route('porte-monnaie.ajout') }}"
                                        method="POST">
                                        @csrf
                                        <label>Procedure:</label>
                                        <div class="input-group mb-3">
                                            <select name="procedure" class="form-control"
                                                id="exampleFormControlSelect1">
                                                <option value="d17">D17</option>
                                                <option value="bna">BNA</option>
                                                <option value="biat">BIAT</option>
                                            </select>
                                        </div>
                                        <label>Numéro de Cart:</label>
                                        <div class="input-group mb-3">
                                            <input name="Num_cart" type="text" class="form-control"
                                                placeholder="0000 0000 0000 0000" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-round bg-gradient-info btn-lg w-50 mt-4 mb-0">Confirmer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modale ajouter coordonnée-->


        <!--Modale Demende Paiement-->
        <div class="col-md-4">
            <div class="modal fade" id="modal-form-demend" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <form action="{{ route('porte-monnaie.demande') }}" method="POST">
                                @csrf
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-left">
                                        <h3 class="font-weight-bolder text-info text-gradient">Demande d'argent
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form role="form text-left">
                                            <label>Saisir le montant:</label>
                                            <div class="input-group mb-3">
                                                <input name="montant_demander" type="text" class="form-control"
                                                    placeholder="000 DT">
                                            </div>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Confirmer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modale Demende Paiement-->

        </div>
        <!--footer-->
        @include('inc.argon.flashmessage')
        @include('inc.admin.footer')

    </main>


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
