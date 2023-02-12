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
                <span>Les Demandes de Badge Visiteur</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.request.create') }} ">
                <span>Demande de badge visiteur</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" style="cursor: pointer" data-bs-toggle="modal"
                data-bs-target="#returnbadgemodal">
                <span>Retour de badge</span>
            </a>
        </li>
        <!-- End Visitor Badge option -->

        <!-- Production request menu -->
        <li class="nav-heading">Demande de Production</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('badge.create') }} ">
                <span>Badge</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vignette.create') }} ">
                <span>Vignette</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"
                aria-expanded="false">
                <span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse cursor-pointer" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i>
                        <span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html" class="">
                        <i class="bi bi-circle"></i>
                        <span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i>
                        <span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i>
                        <span>Form Validation</span>
                    </a>
                </li>
            </ul>
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
            <a class="nav-link collapsed" href=" {{ route('societe.create') }} ">
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

        <!-- report menu -->
        <li class="nav-heading">Rapports</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('societies') }} ">
                <span>Registre des sociétés</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Registre des employés</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Registre des visiteurs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Registre des Badges</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ route('vbadge.list') }} ">
                <span>Registre des Vignette</span>
            </a>
        </li>
        <!-- End report option -->
    </ul>

</aside><!-- End Sidebar-->
