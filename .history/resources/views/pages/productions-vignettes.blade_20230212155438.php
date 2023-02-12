@inject('carbon', 'Carbon\Carbon')
@extends('layout.app')
@section('pagetitle')
    GBV-PAL | Liste des productions de vignette
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
                    <li class="breadcrumb-item active">Vignette</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Liste des demandes de production de vignette</h5>
                            <hr />
                            <form method="POST" action=" {{ route('vbadge.request.store') }} ">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputVisitorPhone" class="col-sm-4 col-form-label">
                                        Numéro de téléphone
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="number" name="telVis" class="form-control" id="inputVisitorPhone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputBadgeNo" class="col-sm-4 col-form-label">
                                        Numéro du badge remis
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_badge" class="form-control text-uppercase"
                                            id="inputBadgeNo">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                            <hr>
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
                                            <td scope="row">
                                                {{ $row->idProd }}
                                            </td>
                                            <th scope="row">
                                                {{ $carbon::parse($row->created_at)->format('d/m/Y') }}
                                            </th>
                                            <td scope="row">
                                                {{ $row->employe->nomEmp . ' ' . $row->employe->prenomEmp }}
                                            </td>
                                            <td scope="row">
                                                {{ $row->statProd }}
                                            </td>
                                            <td scope="row" class="text-center">
                                                @if ($row->statProd != 'Terminé')
                                                    <a class="btn btn-success cursor-pointer " data-bs-toggle="modal"
                                                        data-bs-target="#returnbadgemodal">
                                                        <i class="bi bi-check-circle"></i>
                                                    </a>
                                                @else
                                                    <i>Retiré</i>
                                                @endif
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
