@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Créer un utilisateur
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>CREATION D'UTILISATEUR</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
                    <li class="breadcrumb-item">Administrateur</li>
                    <li class="breadcrumb-item active">Créer un utilisateur</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Créer un utilisateur</h5>
                                <p class="text-center small">Entrez les informations suivantes pour créer un compte</p>
                            </div>
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-12">
                                    <label for="yourFullname" class="form-label">Nom complet</label>
                                    <input type="text" name="name" class="form-control" id="yourFullname" required>
                                    <div class="invalid-feedback">Veuillez entrer le nom complet s'il vous plaît !</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Entrez un email valide s'il vous plaît !</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPost" class="form-label">Droit d'accès</label>
                                    <select name="droitUtil" id="yourPost">
                                        <option value="admin">Administrateur (Tout les droit)</option>
                                        <option value="section-access">Agent Session d'accès (Demande de production de
                                            badge)</option>
                                        <option value="session-visiteur">Badge visiteur</option>
                                    </select>
                                    <div class="invalid-feedback">Veuillez selectionner le droit de l'utilisateur s'il vous
                                        plaît
                                        !
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" name="pseudoUtil" class="form-control" id="yourUsername" required>
                                    <div class="invalid-feedback">Veuillez entrer le nom d'utilisateur s'il vous plaît !
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Mot de passe</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Entrez un mot de passe s'il vous plaît !</div>
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-50" type="submit">
                                        Créer l'utilisateur
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
