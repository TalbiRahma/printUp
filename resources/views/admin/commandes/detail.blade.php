<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        Détails Commande
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
                    <a class=" nav-link " data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="false" aria-controls="collapseOne">
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
                    <a class=" nav-link" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour">
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
                        <a class="nav-link " href="{{ route('commandes.validee') }}">

                            <span class="nav-link-text ms-4 text-dark">Validée</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item" id="accordionRental">
                    <a class=" nav-link" data-bs-toggle="collapse" data-bs-target="#collapseTow"
                        aria-expanded="false" aria-controls="collapseTow">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-money-coins text-warning text-sm opacity-10" style="color: #f1c037 !important;"></i>
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
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Commandes</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Commandes</h6>
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

                        <!--notificaton-->
                        @include('inc.admin.notification')
                        <!--end notificaton-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="card card-frame">
                <div class="card-body">
                    <h4>Détails Commande</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card card-frame">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-4">
                            <img style="width: 250px; height: auto;"
                                src="/{{ $lc->customproduct->photo }}"
                                alt="">
                        </div>
                        <div class="col-8">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <h3 style="color: #525f7f; margin-bottom: 20px;">{{ $lc->customproduct->name }}</h3>
                                <button type="button" class="btn btn-info"
                                    style="margin-left: auto;">Télécharger</button>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Produit Initial:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $lc->customproduct->initialProduct->name }}</h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Design:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $lc->customproduct->design->name }}</h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Quantité:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">{{ $lc->qte }} Piece(s)
                                </h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Taille:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">{{ $lc->selected_size }}
                                </h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Prix Total:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">{{ $lc->customproduct->price }} DT</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-7 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1"
                                style="margin-bottom: 20px;">
                                <h4 style="color: #525f7f;">Détails Produit Initial:</h4>
                            </div>
                            <div class="card-body pt-2">
                                <div class="row">
                                    <div class="col-7">
                                        <img src="{{ asset('/uploads') }}/{{ $lc->customproduct->initialProduct->photo }}"
                                            class="img-fluid border-radius-lg">
                                    </div>
                                    <div class="col-5">
                                        <h4 style="color: #525f7f; margin-bottom: 10px;">{{ $lc->customproduct->initialProduct->name}}:</h4>
                                        <div>
                                            <h5 style="color: #525f7f; display: inline-block;">Categorie:</h5>
                                            <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                                {{ $lc->customproduct->initialProduct->categorie_products->name }}</h6>
                                        </div>
                                        <div>
                                            <h5 style="color: #525f7f; display: inline-block;">Prix:</h5>
                                            <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">{{ $lc->customproduct->initialProduct->price }} DT</h6>
                                        </div>
                                        <div>
                                            <h5 style="color: #525f7f; display: inline-block;">Taille:</h5>
                                            <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">{{ $lc->selected_size }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 style="color: #525f7f;">Description:</h5>
                                        <p>{{ $lc->customproduct->initialProduct->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1"
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                <h4 style="color: #525f7f;">Détails Design:</h4>
                                <button type="button" class="btn btn-info"
                                    style="margin-left: auto;">Télécharger</button>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset('/uploads') }}/{{ $lc->customproduct->design->photo }}"
                                        class="img-fluid border-radius-lg" style="margin-bottom: 15px;">
                                </div>
                                <div class="col-6">
                                    <h4 style="color: #525f7f; margin-bottom: 10px;">{{ $lc->customproduct->design->name }}:</h4>
                                    <div>
                                        <h5 style="color: #525f7f; display: inline-block;">Categorie:</h5>
                                        <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                            {{ $lc->customproduct->design->categorie_designs->name }}</h6>
                                    </div>
                                    <div>
                                        <h5 style="color: #525f7f; display: inline-block;">Prix:</h5>
                                        <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">{{ $lc->customproduct->design->price }} DT
                                        </h6>
                                    </div>
                                </div>

                                <div>
                                    <h5 style="color: #525f7f; display: inline-block;">Désigner:</h5>
                                    <h6 style="color: #47516c; display: inline-block; margin-left: 10px;">Foulan El
                                        Foulani
                                    </h6> 
                                </div>
                                <div>
                                    <h5 style="color: #525f7f; display: inline-block;">Boutique:</h5>
                                    <h6 style="color: #47516c; display: inline-block; margin-left: 10px;">Best Creation
                                    </h6>

                                </div>
                                <div>
                                    <h5 style="color: #525f7f;">Description:</h5>
                                    <p>{{ $lc->customproduct->design->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
