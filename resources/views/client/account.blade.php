<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Shop Sidebar</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/mainassets/images/favicon.png')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('/mainassets/css/style.min.css')}}">

</head>


<body class="sticky-header">
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    @include('inc.client.header')
    <!-- End Header -->

    <main class="main-wrapper">
        <main class="main-wrapper">

            <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <div class="thumbnail">
                                @if (auth()->user()->photo == null)
                                    <img src="/uploads/userphoto.jpg"class="w-100 border-radius-lg shadow-sm" alt="bienvenue client">
                                @else
                                    <img src="{{ asset('uploads') }}/{{ auth()->user()->photo }}"
                                        alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                @endif
                                
                            </div>
                            <div class="media-body">
                                <h4 class="title mb-0">Bienvenue {{auth()->user()->first_name}} {{auth()->user()->last_name}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large">
                                            </i>Compte</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false"><i class="fas fa-file-download">
                                            </i>Mon Boutique</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket">
                                            </i>Ordres</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user">
                                            </i>Modifier Compte</a>
                                        <a class="nav-item nav-link" href="{{ route('login') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fal fa-sign-out">
                                            </i>Se déconnecter</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    </div>
                                </nav>
                            </aside>
                        </div>

                        
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <!--Compte-->
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-secondary py-2">Email:
                                                        <p>{{auth()->user()->email}}</p>
                                                    </h6>
                                                    <h6 class="text-secondary py-2">Numéro téléphone:
                                                        <p>{{auth()->user()->phone}}</p></h6>
                                                    <h6 class="text-secondary py-2">cin: 
                                                        <p>{{auth()->user()->cin}}</p></h6>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <!--End compte-->

                                <!--Boutique-->
                                <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        Boutique
                                    </div>
                                </div>
                                <!--End Boutique-->

                                <!--Commande-->
                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Commande</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Totale</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>On Hold</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--End Commande-->

                                <!--Modifier Compte-->
                                <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data" class="account-details-form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Prénom</label>
                                                            <input name="last_name" type="text" class="form-control" value="{{auth()->user()->last_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Nom</label>
                                                            <input name="first_name" type="text" class="form-control" value="{{auth()->user()->first_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>CIN</label>
                                                            <input name="cin" type="text" class="form-control" value="{{auth()->user()->cin}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input name="email" type="email" class="form-control" value="{{auth()->user()->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Téléphone</label>
                                                            <input name="phone" type="text" class="form-control" value="{{auth()->user()->phone}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Photo de profile</label>
                                                            <input name="photo" type="file" class="form-control" accept="image/*">
                                                        </div>
                                                    </div>
                                                    <p class="b3 mt--10">Ce sera ainsi que votre nom sera affiché dans la section compte et dans les avis</p>
                                                    <div class="col-12">
                                                        <h5 class="title">Changement de mot de passe</h5>
                                                        <div class="form-group">
                                                            <label>Mot de passe</label>
                                                            <input name="password" type="password" class="form-control" value="123456789101112131415">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nouveau mot de passe</label>
                                                            <input name="password" type="password" class="form-control" placeholder="Entrez un nouveau mot de passe...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirmer le nouveau mot de passe</label>
                                                            <input name="confpassword" type="password" class="form-control" placeholder="Confirmer votre mot de passe...">
                                                        </div>
                                                        <div class="form-group mb--0">
                                                            <input type="submit" class="axil-btn" value="Sauvegarder">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Modifier Compte-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End My Account Area  -->
        
    
        </main>
    </main>


    
    @include('inc.client.service')
    <!-- Start Footer Area  -->
    @include('inc.client.footer')
    <!-- End Footer Area  -->
    
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('/mainassets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('/mainassets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('/mainassets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/js.cookie.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('/mainassets/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('/mainassets/js/main.js')}}"></script>

</body>

</html>