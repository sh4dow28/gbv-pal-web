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
                                    <label for="name" class="form-label">Raison sociale</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Domaine d'activité</label>
                                    <textarea class="form-control" name="description" id="description" style="height: 111px;"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Téléphone de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Mobile de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Email de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Site web de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Adresse de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Quartier de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Ville de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Pays de la société</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Numéro d'identification fiscale</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Nom du représentant</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Date de naissance</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Lieu de naissance</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Poste du représentant</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Téléphone</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Email</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="brand" class="form-label">Type de Pièce d'identité</label>
                                    <select id="brand" name="brand" class="form-select">
                                        <option selected="" value="0">Selectionnez</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Numéro de la pièce d'identité</label>
                                    <input type="text" name="name" class="form-control" id="name">
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
