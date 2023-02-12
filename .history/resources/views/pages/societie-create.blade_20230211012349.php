@extends('layout.app')

@section('pagetitle')
    GBV-PAL | Ajout de Société
@endsection

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Création de Nouveaux Matériels</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
                    <li class="breadcrumb-item active">Ajout d'article</li>
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
                            <h5 class="card-title">Ajouter une société</h5>
                            <form class="row g-3" method="POST" action=" {{ route('societe.store') }} ">
                                @csrf
                                <div class="col-md-12">
                                    <label for="raison_social" class="form-label">Raison sociale</label>
                                    <input type="text" name="raison_social" class="form-control" id="raison_social">
                                </div>
                                <div class="col-md-12">
                                    <label for="domaineActivite" class="form-label">Domaine d'activité</label>
                                    <textarea class="form-control" name="domaineActivite" id="domaineActivite" style="height: 111px;"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="telSoc" class="form-label">Téléphone de la société</label>
                                    <input type="text" name="telSoc" class="form-control" id="telSoc">
                                </div>
                                <div class="col-md-4">
                                    <label for="mobileSoc" class="form-label">Mobile de la société</label>
                                    <input type="text" name="mobileSoc" class="form-control" id="mobileSoc">
                                </div>
                                <div class="col-md-4">
                                    <label for="emailSoc" class="form-label">Email de la société</label>
                                    <input type="text" name="emailSoc" class="form-control" id="emailSoc">
                                </div>
                                <div class="col-md-4">
                                    <label for="webSoc" class="form-label">Site web de la société</label>
                                    <input type="text" name="webSoc" class="form-control" id="webSoc">
                                </div>
                                <div class="col-md-4">
                                    <label for="adrSoc" class="form-label">Adresse de la société</label>
                                    <input type="text" name="adrSoc" class="form-control" id="adrSoc">
                                </div>
                                <div class="col-md-4">
                                    <label for="qrtSoc" class="form-label">Quartier de la société</label>
                                    <input type="text" name="qrtSoc" class="form-control" id="qrtSoc">
                                </div>
                                <div class="col-md-4">
                                    <label for="villSoc" class="form-label">Ville de la société</label>
                                    <input type="text" name="villSoc" class="form-control" id="villSoc">
                                </div>
                                <div class="col-md-4">
                                    <label for="paysSoc" class="form-label">Pays de la société</label>
                                    <input type="text" name="paysSoc" class="form-control" id="paysSoc">
                                </div>
                                <div class="col-md-12">
                                    <label for="numFisc" class="form-label">
                                        Numéro d'identification fiscale de la
                                        société
                                    </label>
                                    <input type="text" name="numFisc" class="form-control" id="numFisc">
                                </div>
                                <div class="col-md-4">
                                    <label for="nomRep" class="form-label">Nom du représentant</label>
                                    <input type="text" name="nomRep" class="form-control" id="nomRep">
                                </div>
                                <div class="col-md-4">
                                    <label for="dobRep" class="form-label">Date de naissance</label>
                                    <input type="date" name="dobRep" class="form-control" id="dobRep">
                                </div>
                                <div class="col-md-4">
                                    <label for="pobRep" class="form-label">Lieu de naissance</label>
                                    <input type="text" name="pobRep" class="form-control" id="pobRep">
                                </div>
                                <div class="col-md-4">
                                    <label for="postRep" class="form-label">Poste du représentant</label>
                                    <input type="text" name="postRep" class="form-control" id="postRep">
                                </div>
                                <div class="col-md-4">
                                    <label for="telRep" class="form-label">Téléphone</label>
                                    <input type="text" name="telRep" class="form-control" id="telRep">
                                </div>
                                <div class="col-md-4">
                                    <label for="emailRep" class="form-label">Email</label>
                                    <input type="email" name="emailRep" class="form-control" id="emailRep">
                                </div>
                                <div class="col-md-6">
                                    <label for="typeIDRep" class="form-label">Type de Pièce d'identité</label>
                                    <select id="typeIDRep" name="typeIDRep" class="form-select">
                                        <option selected="" value="0">Selectionnez</option>
                                        <option value="Carte d'Identité">Carte d'Identité</option>
                                        <option value="Passeport">Passeport</option>
                                        <option value="Permis">Permis</option>
                                        <option value="Carte d'Electeur">Carte d'Electeur</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="numIDRep" class="form-label">Numéro de la pièce d'identité</label>
                                    <input type="text" name="numIDRep" class="form-control" id="numIDRep">
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
