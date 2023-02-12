@inject('carbon', 'Carbon\Carbon')
@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Acceuil
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>LISTE DES BADGES VISITEUR</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Acceuil</a></li>
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
                            <!-- Default Table -->
                            <table id="vbadge-list-table" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Date de demande</th>
                                        {{-- <th scope="col">Status</th> --}}
                                        <th scope="col">Date de retour</th>
                                        <th scope="col">Badge</th>
                                        <th scope="col">Visiteur</th>
                                        <th scope="col">Pièce d'identité du Visiteur</th>
                                        <th scope="col">N° de la pièce</th>
                                        <th scope="col">Téléphone</th>
                                    </tr>
                                </thead>
                                <tbody class="fs-1">
                                    @foreach ($data as $row)
                                        <tr>
                                            <td scope="row">
                                                {{ $carbon::parse($row->dateDemBVisit)->format('d/m/Y à h:i:s') }}
                                            </td>
                                            {{-- <td scope="row">
                                                {{ $row->status }}
                                            </td> --}}
                                            <td scope="row">
                                                @if ($row->dateRetBVisit != null)
                                                    {{ $carbon::parse($row->dateRetBVisit)->format('d/m/Y à h:i:s') }}
                                                @else
                                                    {{ 'En cours' }}
                                                @endif
                                            </td>
                                            <td scope="row"> {{ $row->numVBadge }} </td>
                                            <td scope="row">{{ $row->nomVis }}</td>
                                            <td scope="row">{{ $row->id_typeVis }}</td>
                                            <td scope="row">{{ $row->num_idVis }}</td>
                                            <td scope="row">{{ $row->telVis }}</td>
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
