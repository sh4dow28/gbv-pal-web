@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Ajout de Badge Visiteur
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>AJOUT DE BADGE VISITEUR</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Tableau de bord</a></li>
                    <li class="breadcrumb-item">Badges Visiteur</li>
                    <li class="breadcrumb-item active">Ajouter un badge visiteur</li>
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
                            <h5 class="card-title">Ajouter un nouveau badge visiteur</h5>

                            <!-- Horizontal Form -->
                            <form method="POST" action=" {{ route('vbadge.store') }} ">
                                @csrf
                                <div class="row mb-3">
                                    <label for="badgeType" class="col-sm-4 col-form-label">
                                        Type du badge
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="typeVBadge" id="badgeType" class="form-select">
                                            <option value="G">G</option>
                                            <option value="GP">GP</option>
                                            <option value="VIP">VIP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputBadge" class="col-sm-4 col-form-label">
                                        Numéro du badge
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="numVBadge" class="form-control" id="inputBadge">
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
