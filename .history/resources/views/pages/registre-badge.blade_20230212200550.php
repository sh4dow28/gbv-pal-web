@inject('carbon', 'Carbon\Carbon')
@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Registre des badges
@endsection
<style>
    .dt-buttons button.dt-button {}
</style>
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>LISTE DES PRODUCTIONS DE BADGE</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
                    <li class="breadcrumb-item">Rapports</li>
                    <li class="breadcrumb-item active">Registre des Badges</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Registres des badges</h5>
                            <hr />
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
                                <hr>
                            @endif
                            @if (session()->has('message'))
                                <div class="card-header text-center">
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                                <hr>
                            @endif
                            <!-- Default Table -->
                            <table id="vbadge-list-table" class="table table-bordered table-hover">
                                <thead>ass
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">N° de la badge</th>
                                        <th scope="col">Zone à acceder</th>
                                        <th scope="col">Employé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demandes as $row)
                                        <tr>
                                            <td scope="row">
                                                {{ $row['idProd'] }}
                                            </td>
                                            <th scope="row">
                                                {{ $row['noBadge'] }}
                                            </th>
                                            <td scope="row">
                                                {{ $row['zoneAcc'] }}
                                            </td>
                                            <td scope="row">
                                                {{ $row['employe']['nomEmp'] . ' ' . $row['employe']['prenomEmp'] }}
                                            </td>
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
            $('#vbadge-list-table').DataTable({
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
                        extend: 'copy',
                        text: 'Copier',
                    },
                    {
                        extend: 'excel',
                        text: 'Exporter en Excel',
                        title: 'Liste des sociétés',
                    },
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        text: 'Exporter en PDF',
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
