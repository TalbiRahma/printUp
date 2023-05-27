<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/dashassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/dashassets/img/logo.png') }}">
    <title>
        Mes Designs
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

<body class="g-sidenav-show  bg-gray-100">
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mes Designs</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Mes Designs</h6>
                </nav>
                @include('inc.client.navbar')
            </div>
        </nav>
        <!-- End Navbar -->

        <!--Table designs-->
        <div class="container-fluid py-4">
            <div class="card card-frame">
                <div class="card-body">
                    <h4>Mes Designs</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-9">
                            <h5>Ajouter un Design:</h5>
                            <button class="btn btn-icon btn-3 bg-gradient-success" type="button"
                                data-bs-toggle="modal" data-bs-target="#produitAjout">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Ajouter</span>
                            </button>
                        </div>
                        <div class="col-3">
                            <form action="{{ route('search.design') }}" method="POST">
                                @csrf
                                <div class="input-group">

                                    <button type="submit" class="input-group-text text-body"><i
                                            class="fas fa-search" aria-hidden="true"></i></button>
                                    <input name="design_name" type="text" class="form-control"
                                        placeholder="Tapez ici...">

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Modal Ajout produit-->

                    <div class="modal fade" id="produitAjout" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <form action="{{ route('ajouter.design') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="id" value="{{ mt_rand(100000, 999999) }}">
                                    <div class="modal-body p-0">
                                        <div class="card card-plain">
                                            <div class="card-header pb-0 text-left">
                                                <h3 class="font-weight-bolder text-primary text-gradient">
                                                    Ajouter Design</h3>
                                                <p class="mb-0">Ajouter un nouveau design</p>
                                            </div>
                                            <div class="card-body pb-3">

                                                <label>Nom design</label>
                                                <div class="input-group mb-3">
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="Nom de Design" aria-label="Name"
                                                        aria-describedby="name-addon">
                                                    @error('name')
                                                        <div class="class alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <label>Description</label>
                                                <div class="input-group mb-3">
                                                    <textarea name="description" class="form-control" type="text" placeholder="Description"></textarea>
                                                    @error('description')
                                                        <div class="class alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <label>Prix</label>
                                                <div class="input-group mb-3">
                                                    <input name="price" type="text" class="form-control"
                                                        placeholder="Prix de design" aria-label="Name"
                                                        aria-describedby="name-addon">
                                                    @error('price')
                                                        <div class="class alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <label>Categorie</label>
                                                <div class="input-group mb-3">
                                                    <select class="form-control" name="category_design"
                                                        id="choices-button" placeholder="categorie design">
                                                        @foreach ($category_design as $cd)
                                                            <option value="{{ $cd->id }}">{{ $cd->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label>Photo</label>
                                                <div class="input-group mb-3">
                                                    <input name="photo" type="file" class="form-control"
                                                        accept="image/*">
                                                    @error('photo')
                                                        <div class="class alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="text-center" style="display:flex; flex-direction: row;">
                                                    <button type="submit"
                                                        class="btn bg-gradient-primary btn-lg btn-rounded w-50 mt-4 mb-0">
                                                        Ajouter</button>
                                                    <button type="button"
                                                        class="btn bg-gradient-secondary btn-lg btn-rounded w-50 mt-4  mb-0"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--End modal ajout produit-->
                </div>
                <hr class="horizontal dark mt-0">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 5%;">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 25%;">Image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 15%;">Design</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 20%;">Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3"
                                    style="width: 10%;">Prix</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 10%;">Categorie</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 10%;">Etat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($design as $index => $d)
                                <tr>
                                    <td class="align-middle text-sm">
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <div>
                                            <img src="{{ asset('uploads') }}/{{ $d->photo }}"
                                                class="avatar me-3 " style="width: 75%; height: auto;">
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h5 class="mb-0 text-sm">{{ $d->name }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0 force-line-break">
                                            {{ $d->description }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h5 class="mb-0 text-sm">{{ $d->price }} TND</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h5 class="mb-0 text-sm">{{ $d->categorie_designs->name }}</h5>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                @if ($d->etat == 'en attente')
                                                    <span class="badge badge-warning">en attente</span>
                                                @else
                                                    <span class="badge badge-success">Valide</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle ">

                                        <a onclick="return confirm('Voulez-vous vraiment supprimer ce design?')"
                                            href="{{ route('delete.design', ['id' => $d->id]) }}"
                                            class="btn bg-gradient-danger btn-sm">Supprimer</a>

                                            <td class="align-middle ">
                                                <a onclick="return confirm('Voulez-vous vraiment supprimer ce design?')"
                                                    href="{{ route('delete.design', ['id' => $d->id]) }}"
                                                    class="btn bg-gradient-danger btn-sm">Ajouter au boutique</a>
                                            </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!--end Table designs-->


        <!--footer-->
        @include('inc.argon.flashmessage')
        @include('inc.admin.footer')

    </main>


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
</body>

</html>
