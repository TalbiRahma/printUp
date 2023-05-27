<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/" target="_blank">
            <img src="{{ asset('/dashassets/img/PrintUp-logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        </a>

    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="/" >
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
                <a class="nav-link" href="{{ route('account') }}" id="compte">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Compte</span>
                </a>
            </li>
            <li class="nav-item ps--3">
                <a class="nav-link " href="{{ route('compte.update') }} " id="modifier">
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



