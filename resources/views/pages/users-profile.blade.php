@extends('layout.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
                    <li class="breadcrumb-item">Utilisateur</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="img/logo-pal.png" alt="Profile" class="rounded-circle">
                            <h2>Kevin Anderson</h2>
                            <h3>Agent</h3>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Général</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                        Mettre à Jour
                                    </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Modifier le Mot de Passe</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Détails du Compte</h5>

                                    <div class="row">
                                        <div class="col-md-6 col-lg-5 label ">Nom Complet</div>
                                        <div class="col-md-6 col-lg-7">Kevin Anderson</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-lg-5 label">Poste Occupé</div>
                                        <div class="col-md-6 col-lg-7">Web Designer</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-lg-5 label">Date de création du compte</div>
                                        <div class="col-md-6 col-lg-7">USA</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-lg-5 label">Email</div>
                                        <div class="col-md-6 col-lg-7">k.anderson@example.com</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-6 col-lg-5 col-form-label">
                                                Nom Complet
                                            </label>
                                            <div class="col-md-6 col-lg-7">
                                                <input name="fullName" type="text" class="form-control" id="fullName"
                                                    value="Kevin Anderson">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-6 col-lg-5 col-form-label">
                                                Poste Occupé
                                            </label>
                                            <div class="col-md-6 col-lg-7">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="A108 Adam Street, New York, NY 535022">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-6 col-lg-5 col-form-label">
                                                Email
                                            </label>
                                            <div class="col-md-6 col-lg-7">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="k.anderson@example.com">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Enregistrer les modifications
                                            </button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-6 col-lg-5 col-form-label">
                                                Mot de passe actuel
                                            </label>
                                            <div class="col-md-6 col-lg-7">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-6 col-lg-5 col-form-label">
                                                Nouveau mot de passe
                                            </label>
                                            <div class="col-md-6 col-lg-7">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-6 col-lg-5 col-form-label">
                                                Retapez le nouveau mot de passe
                                            </label>
                                            <div class="col-md-6 col-lg-7">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Changer le mot de passe
                                            </button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
