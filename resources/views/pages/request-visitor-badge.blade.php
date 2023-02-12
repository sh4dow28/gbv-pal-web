@extends('layout.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Liste Des Badges Visiteurs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
                    <li class="breadcrumb-item">Badge Visiteur</li>
                    <li class="breadcrumb-item active">Liste</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Liste de tout les badges visiteur</h5>
                            <hr />
                            <div>
                                <button class="btn btn-primary" onclick="print">Imprimer</button>

                                <button class="btn btn-info text-white" data-bs-toggle="modal"
                                    data-bs-target="#requestbadgemodal">
                                    </i><span>Demande de badge</span>
                                </button>
                            </div>
                            <hr />
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Nom du visiteur</th>
                                        <th scope="col">Pièce d'identité</th>
                                        <th scope="col">Numéro de la pièce</th>
                                        <th scope="col">Téléphone</th>
                                        <th scope="col">Badge</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Brandon Jacob</td>
                                        <td>Designer</td>
                                        <td>28</td>
                                        <td>2016-05-25</td>
                                        <td>2016-05-25</td>
                                        <td>28</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Bridie Kessler</td>
                                        <td>Developer</td>
                                        <td>35</td>
                                        <td>2014-12-05</td>
                                        <td>2016-05-25</td>
                                        <td>28</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Ashleigh Langosh</td>
                                        <td>Finance</td>
                                        <td>45</td>
                                        <td>2011-08-12</td>
                                        <td>2016-05-25</td>
                                        <td>28</td>
                                        <td><span class="badge bg-warning">Warning</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Angus Grady</td>
                                        <td>HR</td>
                                        <td>34</td>
                                        <td>2012-06-11</td>
                                        <td>2016-05-25</td>
                                        <td>28</td>
                                        <td><span class="badge bg-danger">Danger</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Raheem Lehner</td>
                                        <td>Dynamic Division Officer</td>
                                        <td>47</td>
                                        <td>2011-04-19</td>
                                        <td>2016-05-25</td>
                                        <td>28</td>
                                        <td><span class="badge bg-success">Success</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
