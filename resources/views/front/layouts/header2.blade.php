
<header class="container-fluid shadow" >
    <div class="fw-bold text-white row bg-dark" id="flash">
        <div class="bg-favorite-color col-1 py-2 d-flex justify-content-center align-items-center text-uppercase fs-5">
            Flash Info</div>
        <div class="bg-dark col-11 py-2  fs-6 d-flex justify-content-center align-items-center text-uppercase">
            <marquee behavior="" direction="">
                @php
                    $flash = flash_info();
                @endphp
                {{ $flash }}
            </marquee>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg container-fluid " id="navbar">
        <a class="navbar-brand my-0" href="#" id="logo">
            <img class=" logo" src="{{ asset('admin/img/logoDec.png') }}" alt="">
        </a>

      

        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

        <button class="border-0 mx-0 mx-md-3 mobile-toggle mobile-toggle-square"type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ff8000"
                    class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                    <path
                        d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z" />
                </svg>
            </i>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel"> </h5>
                <button type="button" class=" border-none border-0 btn-x text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close">

                    <i class="btn-x ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#ff8000"
                            class="bi bi-x" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </i>
                
                </button>
            </div>
            <div class="offcanvas-body ms-0">
                <ul class="ps-0 ms-0">
                    <li><a href="{{ route('accueil') }}">Accueil</a></li>

                   
                    <li class="">
                        <a href="#">Attestation</a>
                        
                        <ul class="d-flex flex-column ms-2 my-3">
                            <a href="{{ route('before-demande') }}" class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff8000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Faire une demande</a>
                            <a href="{{ route('demandeUser') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff8000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Suivre ma demande</a>
                        </ul>
                        
                    
                    </li>

                    {{-- <li>
                        <a href="#">DEC

                        <div class="d-flex flex-column ms-2 my-3">
                            <a href="{{ route('mot-dec') }}" class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff8000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Mot du DEC</a>
                            <a href="{{ route('service-dec') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff8000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Service de la DEC</a>
                        </div>
                         </a>
                       
                    </li> --}}
                    <li><a href="{{ route('aide') }}">Aide</a></li>
                    <li><a href="{{ route('contact-create') }}">Contact</a></li>
                    @guest               
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                    @endguest
                    @auth
                    <li class="text-danger"><a href="{{ route('logout') }}">Déconnexion</a></li>
                    @endauth
                </ul>
            </div>
        </div>



        <div class="collapse navbar-expand-lg navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav nav-ul1 me-auto mb-2 mb-lg-0 d-flex justify-content-between align-items-center">
                <li class="nav-item">
                <li class="nav-item favorite-color ">
                    <a class="nav-link text-uppercase  {{ Route::is('accueil') ? 'active' : ' ' }} " aria-current="page"
                        href="{{ route('accueil') }}">Accueil</a>
                </li>

                {{-- attestation link --}}
                <li class="nav-item dropdown dropdown-etablissement li-web-only">
                    <a class="nav-link dropdown-toggle  py-4 {{ Route::is(['before-demande', 'demandeUser']) ? 'active' : ' ' }}"
                        href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="true">
                        ATTESTATION
                    </a>
                    <ul class="dropdown-menu p-0  dropdown-link-etablissement mt-2" style="box-shadow: 0px 3.87546px 18.4084px rgba(0, 0, 0, 0.08); border-radius:2px;"
                        aria-labelledby="navbarScrollingDropdown">
                        <li class="nav-li-rose"><a class="dropdown-item p-3"
                                href="{{ route('before-demande') }} {{ Route::is('before-demande') ? 'active' : ' ' }}">Demander
                                mon attestation</a></li>
                        <li class="nav-li-rose"><a class="dropdown-item p-3"
                                href="{{ route('demandeUser') }}  {{ Route::is('demandeUser') ? 'active' : ' ' }} ">Suivre
                                mes demandes</a></li>
                    </ul>
                </li>
                {{--end attestation link --}}

                
                {{-- DEC link --}}
                {{-- <li class="nav-item dropdown dropdown-etablissement li-web-only">
                    <a class="nav-link dropdown-toggle  py-4 {{ Route::is(['mot-dec', 'service-dec']) ? 'active' : ' ' }}"
                        href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="true">
                        DEC
                    </a>
                    <ul class="dropdown-menu p-0 dropdown-link-etablissement mt-2" style="box-shadow: 0px 3.87546px 18.4084px rgba(0, 0, 0, 0.08); border-radius:2px;"
                        aria-labelledby="navbarScrollingDropdown">
                        <li class="nav-li-rose"><a class="dropdown-item p-3"
                                href="{{ route('mot-dec') }} {{ Route::is('mot-dec') ? 'active' : ' ' }}">Mot
                                d'accueil du DEC</a></li>
                        <li class="nav-li-rose"><a class="dropdown-item p-3"
                                href="{{ route('service-dec') }}  {{ Route::is('service-dec') ? 'active' : ' ' }} ">Services
                                de la DEC</a></li>
                    </ul>
                </li> --}}
                {{--end DEC link --}}

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('aide') ? 'active' : ' ' }}" href="{{ route('aide') }}">AIDE</a>
                </li>

                <li class="nav-item favorite-color">
                    <a class="nav-link {{ Route::is('contact-create') ? 'active' : ' ' }}"
                        href="{{ route('contact-create') }}">CONTACT</a>
                </li>
            </ul>
            {{-- auth link --}}

            <ul class=" authButton mt-3" id="ul2">
                @guest
                    <li class="nav-link loginButton fw-bold rounded-pill d-flex justify-content-center align-items-center" id="loginButton">
                        <a href="{{ route('login') }}" style="color: #1117AB"
                            class="mt-1 w-100 h-100 text-white d-flex justify-content-center align-items-center">CONNEXION</a>
                    </li>
                    <li class="nav-link rounded-pill registerButton" id="registerButton"><a href="{{ route('register') }}"
                            class="pt-1">INSCRIPTION</a></li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger " href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person-fill ms-4" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </a>


                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="" class="dropdown-item">Profil</a>

                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Se déconnecter') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>

            {{-- end auth link --}}

        </div>
    </nav>

    <script>
        window.addEventListener('scroll', myFunction);
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {

            if (window.pageYOffset >= sticky) {
                navbar.classList.add("fixed-top")
                navbar.classList.add("shadow")
                navbar.classList.add("bg-white")
            } else {
                navbar.classList.remove("fixed-top");
                navbar.classList.remove("shadow");
            }
        }
    </script>
</header>
