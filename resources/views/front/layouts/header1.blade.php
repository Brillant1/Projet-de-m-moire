
<style>
    .dropdown-item:hover{
        color: white !important;
        background-color: #032497;
    }
     
</style>
<header class="shadow py-2" style="background-color: #fff;">
    <nav class="navbar1 d-flex " id="navbar1">
        <a href="index.html" class="logo" >
            <img src="{{ asset('admin/img/logoDec.png') }}" alt="" >
        </a>
        <div class="divNav container-fluid d-flex  justify-content-around " style="width: 85%; margin-left: 100px; ">
            <ul class="d-flex justify-content-between align-items-center h-100 list-unstyled" id="ul1" style="white:70%; margin-left: 100px;">
                    <li class="nav-link scrollto favorite-color"><a class="" href="{{ route('accueil') }}">ACCUEIL</a></li>
                    <li class="nav-item dropdown" style="l">
                        <a class="nav-link dropdown-toggle favorite-color dropdown-link-main d-flex justify-content-center align-items-center favorite-color" href="#" >
                          ATTESTATION
                        </a>
                        <div class="dropdown-menu dropdown-menu1 ms-2 py-2 bg-white" id="">
                          <a class="dropdown-item py-2  text-dark" href="{{ route('demandes.create') }}">Demander mon attestation</a>
                          <a class="dropdown-item py-2  text-dark" href="{{ route('demandeUser') }}">Suivre mes demandes</a>
                        </div>
                      </li>
                      <li class="nav-item dropdown" style="l">
                        <a class="nav-link dropdown-toggle favorite-color dropdown-link-dec d-flex justify-content-center align-items-center" href="#" >
                          DEC
                        </a>
                        <div class="dropdown-menu dropdown-menu-dec ms-2 py-2 bg-white" id="">
                          <a class="dropdown-item py-2 text-dark" href="#">Mot d'accueil du DEC</a>
                          <a class="dropdown-item py-2 text-dark" href="#">Services du DEC</a>
                        </div>
                      </li>
                    <li class="nav-link scrollto favorite-color"><a href="#">COMMUNIQUES</a></li>
                    <li class="nav-link favorite-color"><a href="#">F.A.Q</a></li>
            </ul>
            <ul class="d-flex justify-content-between align-items-center authButton mt-3" id="ul2">
                @guest 
                    <li class="nav-link loginButton fw-bold rounded-pill d-flex justify-content-between align-items-center"><a href="{{ route('login') }}" style="color: #1117AB" class="mt-1 ms-1 w-100 h-100 d-flex justify-content-between align-items-center text-white">CONNEXION</a></li>
                    <li class="nav-link rounded-pill registerButton d-flex justify-content-between align-items-center"><a href="{{ route('register') }}" class="pt-1">INSCRIPTION</a></li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger " href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->name }} 
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill ms-4" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </a>
                    

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="" class="dropdown-item">Profil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Se d??connecter') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>

    </nav>

    <div class="nav-mobile" id="nav-mobile" >
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Demande</a></li>
                <li><a href="">Mes demande</a></li>
                <li><a href="">Actualit??s</a></li>
                <li><a href="">Aide</a></li>
                <li><a href="">CONNEXION</a></li>
                <li><a href="">INSCRIPTION</a></li>

            </ul>
    </div>
    <i class="mobile-nav-toggle" id="toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </i>

</header>

<script>
    $(document).ready(function(){

        $('.dropdown-link-main').click(function(){
            $('.dropdown-menu1').toggle('500');
        });
        $('.dropdown-link-dec').click(function(){
            $('.dropdown-menu-dec').toggle('500');
        })
    });
</script>

