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
        @if (Session::get('loginID')->droitUtil == 'admin' || Session::get('loginID')->droitUtil == 'session-visiteur')
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
        @endif
        <!-- End Visitor Badge option -->

        <!-- Production request menu -->
        @if (Session::get('loginID')->droitUtil == 'admin' || Session::get('loginID')->droitUtil == 'session-access')
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
                <a class="nav-link collapsed cursor-pointer" data-bs-target="#forms-nav" data-bs-toggle="collapse"
                    href="#" aria-expanded="false">
                    <span>Listes des demandes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href=" {{ route('productions.badges') }} ">
                            <i class="bi bi-circle"></i>
                            <span>Badges</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('productions.vignettes') }} " class="">
                            <i class="bi bi-circle"></i>
                            <span>Vignettes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Production request option -->

            <!-- Advanced menu -->
            <li class="nav-heading">Autres</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('societe.create') }} ">
                    <span>Enregistrer une société</span>
                </a>
            </li>
        @endif
        <!-- End Advanced option -->

        <!-- Administrator menu -->

        @if (Session::get('loginID')->droitUtil == 'admin')
            <li class="nav-heading">Administration</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('register') }} ">
                    <span>Créer un utilisateur</span>
                </a>
            </li>
        @endif
        <!-- End Administrator option -->

        <!-- report menu -->
        @if (Session::get('loginID')->droitUtil == 'admin' || Session::get('loginID')->droitUtil == 'session-access')
            <li class="nav-heading">Rapports</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('societies') }} ">
                    <span>Registre des sociétés</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('employees') }} ">
                    <span>Registre des employés</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('registre.badges') }} ">
                    <span>Registre des Badges</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('registre.vignettes') }} ">
                    <span>Registre des Vignette</span>
                </a>
            </li>
        @endif
        <!-- End report option -->
    </ul>

</aside><!-- End Sidebar-->
