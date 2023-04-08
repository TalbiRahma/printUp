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

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <!-- Side bar -->
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
                target="_blank">
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
                            <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Clients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="{{ route('category_product') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Categories Produits</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category_design') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Categories Designs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('products') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Produits</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/admin/commandes">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bag-17 text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Commandes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/admin/paiement">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-money-coins text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Paiement</span>
                    </a>
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Clients</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Clients</h6>
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
                    <h4>Liste de produits</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="container-fluid py-4">
                    <div class="row">
                    <div class="col-9">
                    <h5>Ajouter un Produit:</h5>
                    <button class="btn btn-icon btn-3 bg-gradient-success" type="button" data-bs-toggle="modal"
                        data-bs-target="#produitAjout">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">Ajouter</span>
                    </button>
                    </div>
                    <div class="col-3">
                        <form action="{{route('search.product')}}" method="POST">
                            @csrf
                            <div class="input-group">
                             
                              <button type="submit" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></button>
                              <input name="product_name" type="text" class="form-control" placeholder="Tapez ici...">
                              
                            </div>
                        </form>
                    </div>
                    </div>
                    <!--Modal Ajout produit-->

                    <div class="modal fade" id="produitAjout" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body p-0">
                                        <div class="card card-plain">
                                            <div class="card-header pb-0 text-left">
                                                <h3 class="font-weight-bolder text-primary text-gradient">
                                                    Ajouter Produit</h3>
                                                <p class="mb-0">Ajouter un nouveau produit</p>
                                            </div>
                                            <div class="card-body pb-3">

                                                <label>Nom Produit</label>
                                                <div class="input-group mb-3">
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="Nom de Produit" aria-label="Name"
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
                                                        placeholder="Prix de produit" aria-label="Name"
                                                        aria-describedby="name-addon">
                                                    @error('price')
                                                        <div class="class alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <label>Taille</label>
                                                <div class="input-group mb-3">
                                                    <input type="checkbox" id="size1" name="XS"
                                                        value="XS">
                                                    <label class="col-sm-1 p-2" for="size1">XS</label>

                                                    <input class="col-1 p-4" type="checkbox" id="size2"
                                                        name="S" value="S">
                                                    <label class="col-sm-1 p-2" for="size2">S</label>

                                                    <input class="col-1 p-4" type="checkbox" id="size3"
                                                        name="M" value="M">
                                                    <label class="col-sm-1 p-2" for="size3">M</label>

                                                    <input class="col-1 p-4" type="checkbox" id="size4"
                                                        name="L" value="L">
                                                    <label class="col-sm-1 p-2" for="size4"> L</label>

                                                    @error('sizes')
                                                        <div class="class alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <label>Categorie</label>
                                                <div class="input-group mb-3"> 
                                                    <select class="form-control" name="category_product"
                                                        id="choices-button" placeholder="Departure">
                                                        @foreach ($category_product as $cp)
                                                            <option value="{{ $cp->id }}">{{ $cp->name }}
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


                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 5%;">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 25%;">Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3"
                                        style="width: 15%;">Produit</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 20%;">Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3"
                                        style="width: 10%;">Prix</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3"
                                        style="width: 10%;">Taille</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3"
                                        style="width: 10%;">Categorie</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $index => $p)
                                    <tr>
                                        <td class="align-middle text-sm">
                                            {{ $index + 1 }}
                                        </td>
                                        <td>
                                            <div style="max-width: 200px; min-width: 100px; ">
                                                <img src="{{ asset('uploads') }}/{{ $p->photo }}"
                                                    class="avatar me-3 " style="width: 100%; height: auto;">
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h5 class="mb-0 text-sm">{{ $p->name }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-xs text-secondary mb-0 force-line-break">
                                                {{ $p->description }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h5 class="mb-0 text-sm">{{ $p->price }} TND</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h5 class="mb-0 text-sm">
                                                        @if ($p->sizes)
                                                            @php $sizes = json_decode($p->sizes, true); @endphp
                                                            @foreach ($sizes as $size)
                                                                <span
                                                                    class="badge badge-secondary">{{ $size }}</span>
                                                            @endforeach
                                                            {{ implode(',', $sizes) }}
                                                        @endif
                                                    </h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="text-default font-weight-bold text-sm p-2"
                                                data-toggle="tooltip"
                                                data-original-title="afficher liste de categories">
                                                {{ $p->categorie_products->name }}
                                            </a>
                                        </td>

                                        <td class="align-middle ">
                                            <button type="button" class="btn bg-gradient-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#produitModif{{ $p->id }}">Modifier</button>

                                            <!--Modal modif produit-->
                                            <div class="modal fade" id="produitModif{{ $p->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card card-plain">
                                                                <div class="card-header pb-0 text-left">
                                                                    <h3
                                                                        class="font-weight-bolder text-primary text-gradient">
                                                                        Modifier Produit : </h3>
                                                                    <h4 class="mb-0">{{ $p->name }}</h4>
                                                                </div>
                                                                <form action="{{ route('edit.product') }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="card-body pb-3">
                                                                        <input type="hidden" name="id_product"
                                                                            value="{{ $p->id }}">

                                                                        <div
                                                                            style="max-width: 200px; min-width: 100px;">
                                                                            <img src="{{ asset('uploads') }}/{{ $p->photo }}"
                                                                                class="avatar me-3"
                                                                                style="width: 100%; height: auto;">
                                                                        </div>

                                                                        <label>Nom Produit</label>
                                                                        <div class="input-group mb-3">
                                                                            <input name="name" type="text"
                                                                                class="form-control"
                                                                                placeholder="Nom de Produit"
                                                                                aria-label="Name"
                                                                                aria-describedby="name-addon"
                                                                                value="{{ $p->name }}">
                                                                        </div>
                                                                        <label>Description</label>
                                                                        <div class="input-group mb-3">
                                                                            <textarea name="description" class="form-control" type="text" placeholder="Description">{{ $p->description }}</textarea>
                                                                        </div>
                                                                        <label>Prix</label>
                                                                        <div class="input-group mb-3">
                                                                            <input name="price" type="text"
                                                                                class="form-control"
                                                                                placeholder="Prix de produit"
                                                                                aria-label="Name"
                                                                                aria-describedby="name-addon"value="{{ $p->price }}">
                                                                        </div>
                                                                        <label>Taille</label>
                                                                        <div class="input-group mb-3">

                                                                            <input type="checkbox" id="size1"
                                                                                name="XS" value="XS">
                                                                            <label for="size1"> XS</label><br>
                                                                            <input type="checkbox" id="size2"
                                                                                name="S" value="S">
                                                                            <label for="size2"> S</label><br>
                                                                            <input type="checkbox" id="size3"
                                                                                name="M" value="M">
                                                                            <label for="size3"> M</label>
                                                                            <input type="checkbox" id="size4"
                                                                                name="L" value="L">
                                                                            <label for="size4"> L</label>
                                                                        </div>
                                                                        <label>Categorie</label>
                                                                        <div class="input-group mb-3">
                                                                            <select name="category_product"
                                                                                class="form-select">
                                                                                @foreach ($category_product as $category)
                                                                                    <option
                                                                                        value="{{ $category->id }}"
                                                                                        {{ $category->id == $p->category_product_id ? 'selected' : '' }}>
                                                                                        {{ $category->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <label>Photo</label>
                                                                        <div class="input-group mb-3">
                                                                            <input name="photo" type="file"
                                                                                class="form-control" accept="image/*">
                                                                        </div>
                                                                        <div class="text-center"
                                                                            style="display:flex; flex-direction: row;">
                                                                            <button type="submit"
                                                                                class="btn bg-gradient-primary btn-lg btn-rounded w-50 mt-4 mb-0">
                                                                                Modifier</button>
                                                                            <button type="button"
                                                                                class="btn bg-gradient-secondary btn-lg btn-rounded w-50 mt-4  mb-0"
                                                                                data-bs-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End modal ajout produit-->
                                            <a onclick="return confirm('Voulez-vous vraiment supprimer ce produit?')"
                                                href="{{ route('delete.product', ['id' => $p->id ]) }}"
                                                class="btn bg-gradient-danger btn-sm">Supprimer</a>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination justify-content-center" >
                            {{ $product->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('inc.admin.footer')
        </div>
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
