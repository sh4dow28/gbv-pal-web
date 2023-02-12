<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PaparaShop Admin Authentification</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/vendor/data-tables/datatables.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('admin/css/style.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('admin/js/jquery-3.5.1.js') }}"></script>
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="admin/img/paparashop-logo.jpg" alt="">
                                    <span class="d-none d-lg-block">PaparaShop</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-1">
                                        <h5 class="card-title text-center pb-0 fs-4">Authentification</h5>
                                        <p class="text-center small">Entrez vos informations pour vous connecter</p>
                                    </div>
                                    @if (Session::get('fail'))
                                        <div class="py-1">
                                            <p class="text-danger text-center small"> {{ Session::get('fail') }} </p>
                                        </div>
                                    @endif

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}"
                                        novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                                            <input type="email" name="pseudoUtil" class="form-control"
                                                id="yourUsername" required>
                                            <div class="invalid-feedback">Entrez votre nom d'utilisateur svp !</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Mot de passe</label>
                                            <input type="password" name="mdpUtil" class="form-control" id="yourPassword"
                                                required>
                                            <div class="invalid-feedback">Entrez votre mot de passe svp !</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Se souvenir de moi
                                                    ?</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Connexion</button>
                                        </div>
                                        <div class="col-12">
                                            @if (Route::has('password.request'))
                                                <p class="small mb-0">
                                                    <a href="{{ route('password.request') }}">
                                                        Mot de passe oublié
                                                    </a>
                                                </p>
                                            @endif
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <script src="{{ URL::asset('admin/js/script.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/data-tables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/php-email-form/validate.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ URL::asset('admin/js/main.js') }}"></script>

</body>

</html>
