@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Sociétés
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Liste Des Sociétés</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
                    <li class="breadcrumb-item">Rapports</li>
                    <li class="breadcrumb-item active">Liste des sociétés</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Liste de toute les sociétés référencées</h5>
                            <hr />
                            <!-- Default Table -->
                            <table id="societiest-list-table" class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N° Fiscal</th>
                                        <th scope="col">Raison Social</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Représentant</th>
                                        <th scope="col"> # </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($societies as $societie)
                                        <tr>
                                            <th scope="row"> {{ $societie->numFisc }} </th>
                                            <td>{{ $societie->raison_social }}</td>
                                            <td>{{ $societie->adrSoc }}</td>
                                            <td>{{ $societie->emailSoc }}</td>
                                            <td>{{ $societie->representant->nomRep }}</td>
                                            <td> <button>S</button> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script>
        $(document).ready(function() {
            $('#societiest-list-table').DataTable({
                dom: 'Blfrtip',
                "language": {
                    "search": "Recherche :",
                    "lengthMenu": "Afficher _MENU_ lignes",
                    "info": "Affichage de _START_ à _END_ des _TOTAL_ lignes",
                    "zeroRecords": "Aucune ligne trouvées.",
                    "paginate": {
                        "first": "Début",
                        "last": "Fin",
                        "next": "Suivant",
                        "previous": "Précédent"
                    },
                },
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                buttons: [{
                        extend: 'excel',
                        text: 'Exporter en Excel',
                        title: 'Liste des sociétés',
                    },
                    {
                        extend: 'print',
                        text: 'Imprimer',
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend(
                                    '<img src="{{ URL::asset('img/logo-pal.png') }}" style="position:absolute; top:25%; left:38%; opacity:0.5;" />'
                                );

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });
    </script>
@endsection
