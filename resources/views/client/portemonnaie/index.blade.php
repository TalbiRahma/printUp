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
                    <a class="nav-link " href="{{ route('account.update') }}">
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
                        <i class="ni ni-ui-04 text-warning text-sm opacity-10"></i>
                        <span class="nav-link-text ms-1">Se déconnecter</span></a>
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
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-1 text-uppercase font-weight-bold">Montant Existe</p>
                                        <h5 class="font-weight-bolder">
                                            135 DT
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <p class="mb-0">
                                    Solde après vente de votre design.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-1 text-uppercase font-weight-bold">Total des transferts
                                        </p>
                                        <h5 class="font-weight-bolder">
                                            100 DT
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <p class="mb-0">
                                    Votre solde total transféré.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-3 text-uppercase font-weight-bold">Votre coordonné:</p>
                                        <div>
                                            <h5 style=" display: inline-block;">Nom et Prénom:</h5>
                                            <h6 style=" display: inline-block; margin-left: 10px;">Foulen Fouleni</h6>
                                        </div>
                                        <div>
                                            <h5 style=" display: inline-block;">Email:</h5>
                                            <h6 style=" display: inline-block; margin-left: 10px;">flan@gmail.com</h6>
                                        </div>
                                        <div>
                                            <h5 style=" display: inline-block;">Numéro Tél:</h5>
                                            <h6 style=" display: inline-block; margin-left: 10px;">+216 99 999 999</h6>
                                        </div>
                                        <div>
                                            <h5 style=" display: inline-block;">Proced:</h5>
                                            <h6 style=" display: inline-block; margin-left: 10px;">D17</h6>
                                        </div>
                                        <div>
                                            <h5 style=" display: inline-block;">Numéro de Cart:</h5>
                                            <h6 style=" display: inline-block; margin-left: 10px;">1111 1111 1111 1111
                                            </h6>
                                        </div>
                                        <div class="mt-4">
                                            <button type="button" class="btn bg-gradient-success"
                                                data-bs-toggle="modal" data-bs-target="#modal-form-demend">Demande
                                                d'argent</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modal-form-modif">Modifier mes coordonné</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Historique de transfert de l'argent:</h6>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal dark mt-0">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                style="width: 40%;">Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="width: 60%;">Montant transféré</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                27-09-2023
                                            </td>
                                            <td class="align-middle text-sm ">
                                                <h6 class="text-s font-weight-bold mb-0">50 TND</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="card ">
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
                                        <tr>
                                            <td class="align-middle">
                                                27-09-2023
                                            </td>
                                            <td class="align-middle text-sm ">
                                                <img src="{{ asset('/uploads/6431ec57b2855.png') }}"
                                                    class="img-fluid border-radius-lg"
                                                    style="width: 150px; height: auto;">
                                            </td>
                                            <td class="align-middle text-sm ">
                                                <h6 class="text-s font-weight-bold mb-0">3 Pièce</h6>
                                            </td>
                                            <td class="align-middle text-sm ">
                                                <h6 class="text-s font-weight-bold mb-0">50 TND</h6>
                                            </td>
                                            <td class="align-middle text-sm ">
                                                <h6 class="text-s font-weight-bold mb-0">50 TND</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
                                    <form role="form text-left">
                                        <label>Procedure:</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control"
                                                placeholder="Procedure de paiement" aria-label="Email"
                                                aria-describedby="email-addon">
                                        </div>
                                        <label>Numéro de Cart:</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control"
                                                placeholder="0000 0000 0000 0000" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                        <div class="text-center">
                                            <button type="button"
                                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Confirmer</button>
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

        <!--Modale Demende Paiement-->
        <div class="col-md-4">
            <div class="modal fade" id="modal-form-demend" tabindex="-1" role="dialog"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Demande d'argent
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left">
                                        <label>Saisir le montant:</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="000 DT"
                                                aria-label="Email" aria-describedby="email-addon">
                                        </div>
                                        <div class="text-center">
                                            <button type="button"
                                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Confirmer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modale Demende Paiement-->

        <!--footer-->
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
