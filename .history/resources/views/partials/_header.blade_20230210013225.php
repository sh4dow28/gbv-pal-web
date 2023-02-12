<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="img/logo-pal.png" alt="">
            <span class="d-none d-lg-block">GBV-PAL</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Recherche" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->


            <li class="nav-item dropdown pe-3">
                @if (Auth::user())
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <span class="d-none d-md-block ps-2">Utilisateur : </span>
                        <span class="d-none d-md-block dropdown-toggle ps-2"> {{ Auth::user()->nomUtil }} </span>
                    </a><!-- End Profile Iamge Icon -->
                @endif

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Kevin Anderson</h6>
                        <span>Agent</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-person"></i>
                            <span>Mon Compte</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action=" {{ route('logout') }} ">
                            @csrf
                            <div class="d-flex">
                                <input class="dropdown-item d-flex align-items-center" type="submit"
                                    value="Deconnexion">
                            </div>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- Add V.Badge Modal -->
<div class="modal fade" id="newvisitorbadgemodal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Badge Visiteur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <!-- V.Badge add Form -->
                        <form action=" {{ route('vbadge.store') }} " method="POST">
                            @csrf
                            <div class="row mb-3 mt-4">
                                <label for="badgeType" class="col-sm-5 col-form-label">Type du badge</label>
                                <div class="col-sm-7">
                                    <select name="typeVBadge" id="badgeType">
                                        <option value="0">Choisissez le type ---</option>
                                        <option value="G">G</option>
                                        <option value="GP">GP</option>
                                        <option value="VIP">VIP</option>
                                    </select>
                                </div>
                                <div class="small text-gender py-1">
                                    @error('typeVBadge')
                                        Choisissez le type de badge !
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 mt-4">
                                <label for="inputBadge" class="col-sm-5 col-form-label">Numéro du badge</label>
                                <div class="col-sm-7">
                                    <input type="text" name="numVBadge" class="form-control" id="inputBadge">
                                </div>
                                <div class="small text-gender py-1">
                                    @error('typeVBadge')
                                        Entrez votre nom d'utilisateur svp !
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Terminer</button>
                            </div>
                        </form><!-- End return Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Add V.Badge Modal-->

<!-- V.Badge return Modal -->
<div class="modal fade" id="returnbadgemodal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Retour de Badge Visiteur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <!-- V.Badge return Form -->
                        <form>
                            <div class="row mb-3 mt-4">
                                <label for="inputBadge" class="col-sm-5 col-form-label">Numéro du badge</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputBadge">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Terminer</button>
                            </div>
                        </form><!-- End V.Badge return Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End V.Badge return Modal-->


<!-- V.Badge request Modal -->
<div class="modal fade" id="requestbadgemodal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Demande de Badge Visiteur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <!-- V.Badge request Form -->
                        <form method="POST" action=" {{ route('vbadge.request') }} ">
                            <div class="row mb-2 mt-4">
                                <label for="inputBadge" class="col-sm-5 col-form-label">Nom Complet du
                                    Visiteur</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputBadge" name="nomVis">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="idType" class="col-sm-5 col-form-label">Type de pièce d'identité</label>
                                <div class="col-sm-7">
                                    <select name="id_typeVis" id="idType" class="form-select">
                                        <option selected="" value="0">Choisir...</option>
                                        <option value="cni">Carte d'Identité</option>
                                        <option value="passport">Passeport</option>
                                        <option value="permi">Permis</option>
                                        <option value="ce">Carte d'Electeur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputBadge" class="col-sm-5 col-form-label">
                                    Numéro de la pièce d'identité
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="num_idVis" id="inputBadge">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputBadge" class="col-sm-5 col-form-label">
                                    Date d'expiration de la pièce
                                </label>
                                <div class="col-sm-7">
                                    <input type="date" name="exp_idVis" class="form-control" id="inputBadge">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputBadge" class="col-sm-5 col-form-label">Numéro de téléphone</label>
                                <div class="col-sm-7">
                                    <input type="text" name="telVis" class="form-control" id="inputBadge">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputBadge" class="col-sm-5 col-form-label">Numéro du badge remis</label>
                                <div class="col-sm-7">
                                    <input type="text" name="no_badge" class="form-control text-uppercase"
                                        id="inputBadge">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Terminer</button>
                            </div>
                        </form><!-- End V.Badge request Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End V.Badge request Modal-->
