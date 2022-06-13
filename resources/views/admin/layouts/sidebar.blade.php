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
        <ul id="demandes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('demandes.index') }}">
              <i class="bi bi-circle"></i><span>Toutes les demandes</span>
            </a>
          </li>
          <li>
            <a href="{{ route('demandes.create') }}">
              <i class="bi bi-circle"></i><span> Ajouter candidat</span>
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
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </aside>
