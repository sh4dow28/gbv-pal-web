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
                                <div class="col-md-12">
                                    <div class="row">
                                        <label><strong>Category :</strong></label><br>
                                        <label><input type="checkbox" name="category[]" value="Red"> Red</label>
                                        <label><input type="checkbox" name="category[]" value="Blue"> Blue</label>
                                        <label><input type="checkbox" name="category[]" value="Green"> Green</label>
                                        <label><input type="checkbox" name="category[]" value="Yellow"> Yellow</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description (Facultatif)</label>
                                    <textarea class="form-control" name="description" id="description" style="height: 111px;"></textarea>
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
