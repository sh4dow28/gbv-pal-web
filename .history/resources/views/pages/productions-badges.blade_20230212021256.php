@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Liste des productions de badges
@endsection
<style>
    .dt-buttons button.dt-button {}
</style>
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>LISTE DES PRODUCTION DE BADGE</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
                    <li class="breadcrumb-item">Demande de Production</li>
                    <li class="breadcrumb-item">Liste des demandes</li>
                    <li class="breadcrumb-item active">Badge</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Liste des demandes de production de badge</h5>
                            <hr />
                            <!-- Default Table -->
                            <table id="vbadge-list-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date demande</th>
                                        <th scope="col">Employé</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Retrait</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <th scope="row"> ozueg </th>
                                            <td scope="row"> pieazh </td>
                                            <td scope="row"> ouf </td>
                                            <td scope="row"> iyfm </td>
                                            <td scope="row">
                                                <i class="bi bi-trash"></i>


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
