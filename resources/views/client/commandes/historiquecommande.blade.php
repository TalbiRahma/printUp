<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        Historique Commandes
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Commandes</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Commandes</h6>
                </nav>
                @include('inc.client.navbar')
            </div>
        </nav>
        <!-- End Navbar -->

        <!--tabl list historique commande client-->

        <div class="container-fluid py-4">
            <div class="card card-frame">
                <div class="card-body">
                    <h4>Liste de commandes</h4>
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
                                    style="width: 20%;">Date
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 20%;">
                                    Produits
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 15%;">Total
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
                            @foreach ($commandes as $commande)
                                <tr> 
                                    <td class="align-middle">
                                        {{ $commande->created_at }}
                                    </td>
                                    <td>
                                        <a href="" data-bs-target="#products{{ $commande->id }}"
                                            data-bs-toggle="modal">
                                            @foreach ($commande->lignecommandes as $lc)
                                                <h6 class="mb-0 text-xs">{{ $lc->customproduct->name }}</h6>
                                            @endforeach


                                        </a>
                                    </td>
                                    <td>
                                        <h6 class="text-xs">{{ $commande->getTotal() + 8.0 }} DT</h6>
                                    </td>
                                    <td class="align-middle text-sm ">
                                        @if ($commande->etat == 'en attente')
                                            <span class="badge bg-gradient-secondary" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="Nous sommes en train de vérifier votre commande."
                                                data-container="body" data-animation="true"> en attente </span>
                                        @else
                                            <span class="badge bg-gradient-success" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="Tu as déjà reçu cette commande.">Validée</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-sm ">
                                        @if ($commande->paiement == 'payee')
                                            <span class="badge bg-gradient-success" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="Cette commande a été payée.">Payé</span>
                                        @else
                                            <span class="badge bg-gradient-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="Votre commande n'a pas encore été payée.">Non Payé</span>
                                        @endif
                                    </td>
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

        <!--end tabl list historique commande client-->


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
                            <div>
                                <h5 style="color: #525f7f;">Produits:</h5>
                                @foreach ($commande->lignecommandes as $lc)
                                    <a href="{{ route('commande.historique.details', ['id' => $lc->id]) }}">
                                        <h5 style="color: #32325d; margin-left: 10px;">{{ $lc->customproduct->name }}
                                        </h5>
                                    </a>
                                @endforeach
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Nom et Prénom:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $coordonnees['first_name'] }} {{ $coordonnees['last_name'] }}
                                </h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Adresse Email:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $coordonnees['email'] }}</h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Numéro Téléphone:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $coordonnees['phone'] }}
                                </h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Ville:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $coordonnees['ville'] }}</h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Région:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $coordonnees['region'] }}
                                </h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Adresse De Livraison:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $coordonnees['adresse'] }}
                                </h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Prix Total:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $commande->getTotal() + 8.0 }} DT</h6>
                            </div>
                            <div>
                                <h5 style="color: #525f7f; display: inline-block;">Méthode Paiement:</h5>
                                <h6 style="color: #8898aa; display: inline-block; margin-left: 10px;">
                                    {{ $commande->paiement }}
                                </h6>
                                <span style="margin-left: 10px;" class="badge bg-gradient-warning">Non Payé</span>
                                <!--<span style="margin-left: 10px;" class="badge bg-gradient-success">Payé</span>-->
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
                                                <a href="{{ route('commande.historique.details', ['id' => $lc->id]) }}"
                                                    class="d-block">
                                                    <img style="width: 100%; height: auto;"
                                                        src="/{{ $lc->customproduct->photo }}" alt="">
                                                </a>
                                            </div>

                                            <div class="card-body pt-2">
                                                <a href="{{ route('commande.historique.details', ['id' => $lc->id]) }}"
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
        <!--footer-->
        @include('inc.argon.flashmessage')
        @include('inc.admin.footer')

    </main>


    <!--   Core JS Files   -->
    <script src="{{ asset('/dashassets/js/sidebar.js?v=2.0.4') }}"></script>
    <script src="{{ asset('/dashassets/js/sidebar.js?v=2.0.4') }}"></script>
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
