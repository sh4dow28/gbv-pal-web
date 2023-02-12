<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Tableau de Bord</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <!-- End Visitor Badge menu -->
        <li class="nav-heading">Badges Visiteur</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <i class="bi bi-circle"></i>
                <span>Liste</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.create') }} ">
                <i class="bi bi-circle"></i><span>Nouveau Badge Visiteur</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('visitor-badge-request') }} ">
                <i class="bi bi-circle"></i><span>Liste des Demandes de badge</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#requestbadgemodal">
                <i class="bi bi-circle"></i><span>Nouvelle demande</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#returnbadgemodal">
                <i class="bi bi-circle"></i><span>Retour de badge</span>
            </a>
        </li>
        <!-- End Visitor Badge option -->

        <!-- End Visitor Badge menu -->
        <li class="nav-heading">Production</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#prod-request" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Demande de production</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="prod-request" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Badge</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>Vignette d'accès</span>
                    </a>
                </li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Liste</span>
                    </a>
                </li>
            </ul>
        </li><!-- End production request -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Rapport</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href=" {{ route('societies-list') }} ">
                        <i class="bi bi-circle"></i><span>Liste des sociétés</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Liste des employés</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Régistre des visiteurs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Liste des demandes de production</span>
                    </a>
                </li>
            </ul>
        </li><!-- End report -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Administrateur</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href=" # ">
                        <i class="bi bi-circle"></i><span>Créer un Utilisateur</span>
                    </a>
                </li>
                <li>
                    <a href=" {{ route('users-list') }} ">
                        <i class="bi bi-circle"></i><span>Liste des utilisateurs</span>
                    </a>
                </li>
            </ul>
        </li><!-- End admin tools -->

        <li class="nav-heading">Autres</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
