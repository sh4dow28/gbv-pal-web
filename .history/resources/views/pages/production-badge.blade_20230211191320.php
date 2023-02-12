@extends('layout.app')

@section('pagetitle')
    GBV-PAL | Demande de Production de Badge
@endsection

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Demande de Production de Badge</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
                    <li class="breadcrumb-item">Demande de Production</li>
                    <li class="breadcrumb-item active">Badge</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section d-flex flex-column align-items-center justify-content-center py-2">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card mb-3">
                        @if ($errors->any())
                            <div class="card-header text-center">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('message'))
                            <div class="card-header text-center">
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Créer un demande de production de badge</h5>
                            <form class="row g-3" method="POST" action=" {{ route('badge.store') }} ">
                                @csrf
                                <input type="text" name="typeProd" value="badge" hidden>
                                <div class="col-md-12 py-2">
                                    <label for="typeBadgeProd" class="form-label">Type de badge</label>
                                    <select id="typeBadgeProd" name="typeBadgeProd" class="form-select">
                                        <option value="Permanents">Permanents</option>
                                        <option value="Chauffeurs et Apprentis">Chauffeurs et Apprentis</option>
                                        <option value="Client">Client</option>
                                        <option value="Docker">Docker</option>
                                        <option value="Stagiaire">Stagiaire</option>
                                        <option value="Administration - Partenaires">Administration - Partenaires</option>
                                        <option value="Laissez-passer">Laissez-passer</option>
                                    </select>
                                </div>
                                <div class="row px-3">
                                    <label for="brand" class="form-label">Installation portuaire à accéder</label>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="checkbox" name="zoneAcc[]" value="Mole 1"> Mole 1
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="checkbox" name="zoneAcc[]" value="Quai pétrolier">
                                            Quai pétrolier
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="checkbox" name="zoneAcc[]" value="TOGO TERMINAL">
                                            TOGO TERMINAL
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="checkbox" name="zoneAcc[]" value="Quai minéralier">
                                            Quai minéralier
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="checkbox" name="zoneAcc[]" value="LCT"> LCT
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="checkbox" name="zoneAcc[]" value="SNPT"> SNPT
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="nomEmp" class="form-label">Nom de l'employé</label>
                                    <input type="text" name="nomEmp" class="form-control" id="nomEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="prenomEmp" class="form-label">Prénom de l'employé</label>
                                    <input type="text" name="prenomEmp" class="form-control" id="prenomEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="sexe" class="form-label">Sexe</label>
                                    <div class="d-flex flex-col py-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexeEmp" id="sexe2"
                                                value="Masculin" checked="">
                                            <label class="form-check-label" for="sexe2">
                                                Masculin
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input" type="radio" name="sexeEmp" id="sexe1"
                                                value="Féminin">
                                            <label class="form-check-label" for="sexe1">
                                                Féminin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="pereEmp" class="form-label">Nom du père</label>
                                    <input type="text" name="pereEmp" class="form-control" id="pereEmp">
                                </div>
                                <div class="col-md-6">
                                    <label for="mereEmp" class="form-label">Nom de la mère</label>
                                    <input type="text" name="mereEmp" class="form-control" id="mereEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="posteEmp" class="form-label">Poste de l'employé</label>
                                    <input type="text" name="posteEmp" class="form-control" id="posteEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="dobEmp" class="form-label">Date de naissance de l'employé</label>
                                    <input type="date" name="dobEmp" class="form-control" id="dobEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="pobEmp" class="form-label">Lieu de naissance de l'employé</label>
                                    <input type="text" name="pobEmp" class="form-control" id="pobEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="nationEmp" class="form-label">Nationnalité de l'employé</label>
                                    <input type="text" name="nationEmp" class="form-control" id="nationEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="adrEmp" class="form-label">Adresse de l'employé</label>
                                    <input type="text" name="adrEmp" class="form-control" id="adrEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="telEmp" class="form-label">Téléphone de l'employé</label>
                                    <input type="text" name="telEmp" class="form-control" id="telEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="typeIDEmp" class="form-label">Pièce d'identité</label>
                                    <select id="typeIDEmp" name="typeIDEmp" class="form-select">
                                        <option value="Carte d'Identité">Carte d'Identité</option>
                                        <option value="Passeport">Passeport</option>
                                        <option value="Permis">Permis</option>
                                        <option value="Carte d'Electeur">Carte d'Electeur</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="numIDEmp" class="form-label">N° de la pièce</label>
                                    <input type="text" name="numIDEmp" class="form-control" id="numIDEmp">
                                </div>
                                <div class="col-md-4">
                                    <label for="expIDEmp" class="form-label">Date d'expiration de la pièce</label>
                                    <input type="date" name="expIDEmp" class="form-control" id="expIDEmp">
                                </div>
                                <div class="col-md-12">
                                    <label for="numFisc" class="form-label">Numéro d'identification de la société où
                                        travail le concerné</label>
                                    <input type="text" name="numFisc" class="form-control" id="numFisc">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-50">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
