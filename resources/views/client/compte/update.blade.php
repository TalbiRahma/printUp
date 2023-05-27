<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        PrintUp
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
    <div class="position-absolute w-100 min-height-300 top-0"
        style="background-image: url('/dashassets/img/couvert.png'); background-size: cover;">
        <span class="mask bg-primary opacity-2"></span>
    </div>

    <!-- Side bar -->
    @include('inc.client.sidebar')
    <!-- End Side bar -->

    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Modifier profil</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Modifier compte</h6>
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

                        <!--afficher le sidebar-->
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-2" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <!--parametre-->

                        <!--notificaton-->
                        @include('inc.admin.notification')
                        <!--end notificaton-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!---->
        <div class="card shadow-lg mx-8 card-profile-bottom">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                @if (auth()->user()->photo == null)
                                    <img src="/uploads/userphoto.jpg"class="avatar avatar-md rounded-circle me-2">
                                @else
                                    <img src="{{ asset('uploads') }}/{{ auth()->user()->photo }}"
                                        alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                @endif
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <a href="{{ route('account') }}" class="btn btn-primary btn-sm">Voire profile</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="mx-8 card-profile-bottom py-4">
            <div class="row">
                <div class="card">
                    <form action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Modifier le profile:</h6>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Enregistrer</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Informations de l'utilisateur</p>
                            <div class="row">

                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nom</label>
                                    <input name="first_name"class="form-control" type="text"
                                        value="{{ auth()->user()->first_name }}" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Prénom</label>
                                    <input name="last_name" class="form-control" type="text"
                                        value="{{ auth()->user()->last_name }}" id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input" class="form-control-label">E-mail</label>
                                    <input name="email" class="form-control" type="email"
                                        value="{{ auth()->user()->email }}" id="example-email-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="form-control-label">Mot de
                                        passe</label>
                                    <input name="password" id=" password" class="form-control" type="password"
                                        placeholder="Entrez un nouveau mot de passe...">
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="form-control-label">Confirmer Mot de
                                        passe</label>
                                    <input name="confpassword" id="confpassword" class="form-control"
                                        type="password" placeholder="Confirmer votre mot de passe...">
                                    @error('confpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Photo de
                                        profile</label>
                                    <input name="photo" type="file" class="form-control" accept="image/*">
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Coordonnées</p>
                                <div class="form-group">
                                    <label for="example-tel-input" class="form-control-label">Téléphone</label>
                                    <input name="phone" class="form-control" type="tel"
                                        value="{{ auth()->user()->phone }}" id="example-tel-input">
                                </div>


                            </div>
                    </form>
                </div>
            </div>
        </div>
        @include('inc.admin.footer')
    </div>

    

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
    <script src="{{ asset('/dashassets/js/sidebar.js?v=2.0.4') }}"></script>
</body>

</html>
