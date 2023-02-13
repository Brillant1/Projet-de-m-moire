<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#demandes-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Demandes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="demandes-nav" class="nav-content " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{ route('demande-recente') }}">
              <i class="bi bi-circle"></i><span>Demandes récentes payées</span>
            </a>
          </li>
          
          <li>
            <a href="{{ route('demande-approuvee') }}">
              <i class="bi bi-circle"></i><span>Demandes approuvées</span>
            </a>
          </li>

          <li>
            <a href="{{ route('demande-non-payee') }}">
              <i class="bi bi-circle"></i><span>Demandes non payées</span>
            </a>
          </li>
        

          
          <li>
            <a href="{{ route('listeDemande') }}">
              <i class="bi bi-circle"></i><span>Toutes les demandes</span>
            </a>
          </li>

        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#attestations-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Attestations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="attestations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('attestation-all') }}">
              <i class="bi bi-circle"></i><span>Attestations générées</span>
            </a>
          </li>
        </ul>
      </li>

      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#candidats-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Candidats</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="candidats-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('candidats.index') }}">
              <i class="bi bi-circle"></i><span>Liste des candidats</span>
            </a>
          </li>
          <li>
            <a href="{{ route('candidats.create') }}">
              <i class="bi bi-circle"></i><span> Ajouter candidat</span>
            </a>
          </li>

        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#colleges-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Colleges</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="colleges-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('colleges.index') }}">
              <i class="bi bi-circle"></i><span>Liste des colleges</span>
            </a>
          </li>
          <li>
            <a href="{{ route('colleges.create') }}">
              <i class="bi bi-circle"></i><span> Ajouter college</span>
            </a>
          </li>

        </ul>
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#centres-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Centres</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="centres-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('centres.index') }}">
              <i class="bi bi-circle"></i><span>Liste des centres</span>
            </a>
          </li>
          <li>
            <a href="{{ route('centres.create') }}">
              <i class="bi bi-circle"></i><span> Ajouter centre</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Commune</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('communes.index') }}">
              <i class="bi bi-circle"></i><span>Liste des communes</span>
            </a>
          </li>
          <li>
            <a href="{{ route('communes.create') }}">
              <i class="bi bi-circle"></i><span>Ajouter commune</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#departement-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Département</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="departement-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('departements.index') }}">
              <i class="bi bi-circle"></i><span>Liste des département</span>
            </a>
          </li>
          <li>
            <a href="{{ route('departements.create') }}">
              <i class="bi bi-circle"></i><span>Ajouter un département</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Flash Infos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('flashInfos.index') }}">
              <i class="bi bi-circle"></i><span>Tous les flash infos</span>
            </a>
          </li>
          <li>
            <a href="{{ route('flashInfos.create') }}">
              <i class="bi bi-circle"></i><span>Ajouter un flash info</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Alertes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href=" {{ route('alertes.index') }} ">
              <i class="bi bi-circle"></i><span>Toutes les alertes</span>
            </a>
          </li>
          {{-- <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li> --}}
        </ul>
      </li><!-- End Tables Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Examens</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('examens.index') }}">
              <i class="bi bi-circle"></i><span>Tous les examens</span>
            </a>
          </li>
          <li>
            <a href="{{ route('examens.create') }}">
              <i class="bi bi-circle"></i><span>Ajouter un nouveau</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </aside>
