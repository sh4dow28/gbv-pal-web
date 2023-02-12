@extends('layout.app')

@section('pagetitle')
    GBV-PAL | Demande de Production de Vignette
@endsection

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Demande de Production de Vignette</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
                    <li class="breadcrumb-item">Demande de Production</li>
                    <li class="breadcrumb-item active">Vignette</li>
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
                            <h5 class="card-title">Créer un demande de production de vignette</h5>
                            <p class="text-center">
                                <small class="italic">
                                    Pour faire une demande de vignette, il faut avoir déjà un badge
                                </small>
                            </p>
                            <form class="row g-3" method="POST" action=" {{ route('badge.store') }} ">
                                @csrf
                                <input type="text" name="typeProd" value="vignette" hidden>
                                <div class="row px-3 py-2">
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
                                <div class="col-md-12">
                                    <label for="noBadge" class="form-label">Numéro de badge du concerner</label>
                                    <input type="text" name="noBadge" class="form-control" id="noBadge">
                                </div>
                                <div class="col-md-4">
                                    <label for="typeVeh" class="form-label">Type de véhicule</label>
                                    <select id="typeVeh" name="typeVeh" class="form-select">
                                        <option value="Moto">Moto</option>
                                        <option value="Voiture">Voiture</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="coulVeh" class="form-label">Couleur du véhicule</label>
                                    <input type="text" name="coulVeh" class="form-control" id="coulVeh">
                                </div>
                                <div class="col-md-4">
                                    <label for="immaVeh" class="form-label">Immatriculation du véhicule</label>
                                    <input type="text" name="immaVeh" class="form-control" id="immaVeh">
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
