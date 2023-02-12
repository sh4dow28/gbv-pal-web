@extends('admin.layout.app')
@section('pagetitle')
    Ajout de Badge Visiteur
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>AJOUT DE BADGE VISITEUR</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('/') }} ">Tableau de bord</a></li>
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
                                    <label for="inputCategoryLabel" class="col-sm-4 col-form-label">
                                        Nom de la catégorie
                                    </label>
                                    <div class="col-sm-8">
                                        <select id="inputState" class="form-select">
                                            <option selected="">Choisissez le type ---</option>
                                            <option value="G">G</option>
                                            <option value="GP">GP</option>
                                            <option value="VIP">VIP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDescription" class="col-sm-4 col-form-label">
                                        Description(Facultatif)
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="description" id="inputDescription" style="height: 100px;"></textarea>
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
