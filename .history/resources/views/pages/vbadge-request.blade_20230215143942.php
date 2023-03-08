@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Demande de Badge Visiteur
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DEMANDE DE BADGE VISITEUR</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Tableau de bord</a></li>
                    <li class="breadcrumb-item">Badges Visiteur</li>
                    <li class="breadcrumb-item active">Demande de badge visiteur</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
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
                            <h5 class="card-title">Nouvelle demande de badge visiteur</h5>

                            <!-- Horizontal Form -->
                            <form method="POST" action=" {{ route('vbadge.request.store') }} ">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputVisitor" class="col-sm-4 col-form-label">
                                        Nom Complet du Visiteur
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nomVis" class="form-control" id="inputVisitor">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="idType" class="col-sm-4 col-form-label">
                                        Type de pièce d'identité
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="id_typeVis" id="idType" class="form-select">
                                            <option value="Carte d'Identité">Carte d'Identité</option>
                                            <option value="Passeport">Passeport</option>
                                            <option value="Permis">Permis</option>
                                            <option value="Carte d'Electeur">Carte d'Electeur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputIDNo" class="col-sm-4 col-form-label">
                                        Numéro de la pièce d'identité
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="num_idVis" id="inputIDNo">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputIDExp" class="col-sm-4 col-form-label">
                                        Date d'expiration de la pièce
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="date" name="exp_idVis" class="form-control" id="inputIDExp">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputVisitorPhone" class="col-sm-4 col-form-label">
                                        Numéro de téléphone
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="number" name="telVis" class="form-control" id="inputVisitorPhone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputBadgeNo" class="col-sm-4 col-form-label">
                                        Numéro du badge remis
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="numVBadge" class="form-control text-uppercase"
                                            id="inputBadgeNo">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
