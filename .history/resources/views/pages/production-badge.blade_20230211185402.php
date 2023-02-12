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
                                    <label for="description" class="form-label">Nom de l'employé</label>
                                    <input type="text" name="raison_social" class="form-control" id="raison_social">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Prénom de l'employé</label>
                                    <input type="text" name="raison_social" class="form-control" id="raison_social">
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Sexe</label>
                                    <div class="d-flex flex-col py-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios1" value="Masculin" checked="">
                                            <label class="form-check-label" for="gridRadios1">
                                                Masculin
                                            </label>
                                        </div>
                                        <div class="form-check px-5">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                id="gridRadios1" value="Féminin">
                                            <label class="form-check-label" for="gridRadios1">
                                                Féminin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="brand" class="form-label">Marque</label>
                                    <select id="brand" name="brand" class="form-select">
                                        <option selected="" value="0">Selectionnez</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="destination" class="form-label">Catégorie</label>
                                    <select id="destination" name="categor" class="form-select">
                                        <option selected="" value="0">Selectionnez</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="destination" class="form-label">Destination</label>
                                    <select id="destination" name="destination" class="form-select">
                                        <option selected="" value="0">Selectionnez</option>
                                        <option value="vente">Vente</option>
                                        <option value="location">Location</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="price" class="form-label">Prix</label>
                                    <input type="text" name="price" class="form-control" id="price">
                                </div>
                                <div class="col-md-4">
                                    <label for="discount_percentage" class="form-label">Réduction (%)</label>
                                    <input type="number" max="100" name="discount_percentage" class="form-control"
                                        id="discount_percentage">
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
