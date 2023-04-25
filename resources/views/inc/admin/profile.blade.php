<div class="btn-group dropdown">
    <a href="#" class="nav-link text-white font-weight-bold px-0" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user me-sm-1"></i>
        <span class="d-sm-inline d-none">Compte</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li class="text-center">

            <div class="d-flex px-2">
                <div>
                    @if(auth()->user()->photo == null)
                        <img src="/uploads/userphoto.jpg"class="avatar avatar-md rounded-circle me-2">
                    @else
                        <img src="{{ asset('uploads') }}/{{ auth()->user()->photo }}"class="avatar avatar-md rounded-circle me-2">
                    @endif
                </div>
                <div class="my-auto">
                    <a href="{{ route('donnes.profil') }}" class="dropdown-item btn-inner--text" type="button">
                        <h5 class="mb-0 text-center">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                    </a>
                </div>
            </div>
        </li>
        <hr class="horizontal dark mt-0">
        <li><a href="{{ route('modifier.profil') }}" class="dropdown-item">
                <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
                <span class="btn-inner--text text-center ps-2">Modifier profil</span></a></li>
        <li><a onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                class="dropdown-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>
                </span>
                <span class="btn-inner--text text-center ps-2">Se déconnecter</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form> 
        </li>
        <hr class="horizontal dark mt-0">
        <li class="text-center">
            <a href="/" class="btn btn-icon btn-3 btn-primary" >
                <span class="btn-inner--icon"><i class="ni ni-shop"></i></span>
                <span class="btn-inner--text">Magasin</span>
            </a>
        </li>
    </ul>
</div>
