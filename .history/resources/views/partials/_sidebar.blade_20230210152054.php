<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href=" {{ route('home') }} ">
                <i class="bi bi-grid"></i>
                <span>Tableau de Bord</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <!-- End Visitor Badge menu -->
        <li class="nav-heading">Badges Visiteur</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Liste</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.create') }} ">
                {{-- <i class="bi bi-circle"></i> --}}
                <span>Nouveau Badge Visiteur</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.request') }} ">
                <span>Liste des Demandes de badge</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.request.create') }} ">
                <span>Demande de badge visiteur</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#returnbadgemodal">
                <span>Retour de badge</span>
            </a>
        </li>
        <!-- End Visitor Badge option -->

        <!-- Production request menu -->
        <li class="nav-heading">Demande de Production</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Badge</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.create') }} ">
                {{-- <i class="bi bi-circle"></i> --}}
                <span>Vignette</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.request') }} ">
                <span>Liste des Demandes</span>
            </a>
        </li>
        <!-- End Production request option -->

        <!-- Advanced menu -->
        <li class="nav-heading">Autres</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Enregistrer une société</span>
            </a>
        </li>
        <!-- End Advanced option -->

        <!-- Administrator menu -->
        <li class="nav-heading">Administration</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Créer un utilisateur</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Liste des utilisateurs</span>
            </a>
        </li>
        <!-- End Administrator option -->

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
