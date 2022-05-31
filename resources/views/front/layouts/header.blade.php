<header class="shadow " style="background-color: #1117AB;">
    <nav class="navbar1 d-flex " id="navbar1">
        <a href="index.html" class="logo" >
            <img src="{{ asset('admin/img/logoDec.png') }}" alt="" >
        </a>
        <div class="divNav container-fluid d-flex  justify-content-around " style="width: 85%; margin-left: 100px; ">
            <ul class="d-flex justify-content-between align-items-center h-100 list-unstyled" id="ul1" style="white:70%; margin-left: 100px;">
                    <li class="nav-link scrollto"><a class="" href="#">ACCUEIL</a></li>
                    <li class="nav-item dropdown" style="l">
                        <a class="nav-link dropdown-toggle text-white dropdown-link-main d-flex justify-content-center align-items-center" href="#" >
                          ATTESTATION
                        </a>
                        <div class="dropdown-menu dropdown-menu1 ms-2 py-2" id="">
                          <a class="dropdown-item py-2" href="#">Demander mon attestation</a>
                          <a class="dropdown-item py-2" href="#">Suivre mes demandes</a>
                        </div>
                      </li>
                      <li class="nav-item dropdown" style="l">
                        <a class="nav-link dropdown-toggle text-white dropdown-link-dec d-flex justify-content-center align-items-center" href="#" >
                          DEC
                        </a>
                        <div class="dropdown-menu dropdown-menu-dec ms-2 py-2" id="">
                          <a class="dropdown-item py-2" href="#">Mot d'accueil du DEC</a>
                          <a class="dropdown-item py-2" href="#">Services du DEC</a>
                        </div>
                      </li>
                    <li class="nav-link scrollto"><a href="#">COMMUNIQUES</a></li>
                    <li class="nav-link"><a href="#">F.A.Q</a></li>
            </ul>
            <ul class="d-flex justify-content-between align-items-center authButton" id="ul2">
                <li class="nav-link loginButton fw-bold rounded-pill d-flex justify-content-between align-items-center"><a href="#" style="color: #1117AB" class="mt-1 ms-1 w-100 h-100 d-flex justify-content-between align-items-center">CONNEXION</a></li>
                <li class="nav-link rounded-pill border border-2 border-white"><a href="#">INSCRIPTION</a></li>
            </ul>
        </div>

    </nav>

    <div class="nav-mobile" id="nav-mobile" >
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Demande</a></li>
                <li><a href="">Mes demande</a></li>
                <li><a href="">Actualités</a></li>
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

