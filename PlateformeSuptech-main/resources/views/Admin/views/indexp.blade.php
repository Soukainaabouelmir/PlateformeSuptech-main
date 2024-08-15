<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des professeurs</title>
    <!-- Inclure le CSS de DataTables -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Inclure le CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inclure l'icône -->
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
</head>
<body>
    @extends('admin.layouts.navbaradmin')

    @section('contenu')
    <style>
        /* Styles personnalisés */
        .filter-form {
            margin-top: 50px;
        }
        .form-container {
            margin-bottom: 30px;
        }
        h6 {
            margin-bottom: 0.6rem; /* Espacement entre les éléments */
        }
        .button-suivant {
            background-color: #173165;
            width: 100%;
        }
        .table-container {
            margin-top: 30px;
            padding: 0 147px;
            max-width: 1127px;
        }
        .row {
            margin-right: -28px;
        }
    </style>

    <div class="container filter-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <form id="filter-form">
                        @csrf
                        <div class="form-group row mt-3">
                            <label for="specialite" class="col-md-4 col-form-label text-md-right">Spécialité :</label>
                            <div class="col-md-6">
                                <select class="form-control" id="specialite" name="specialite">
                                    <option value="">Sélectionner une spécialité</option>
                                    @foreach($specialites as $specialite)
                                        <option value="{{ $specialite->id_specialite }}">{{ $specialite->specialite }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary button-suivant" type="submit">Filtrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container table-container">
        <table id="profs-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Matricule CNSS</th>
                    <th>Spécialité</th>
                    <th>Contrat</th>
                    <th>CIN</th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($profs as $prof)
                <tr>
                <td>{{ $prof->nom }}</td>
                    <td>{{ $prof->prenom }}</td>
                    <td>{{ $prof->matricule_cnss }}</td>
                    <td>{{ $prof->specialite }}</td>
                    <td>{{ $prof->type_contrat }}</td>
                    <td>{{ $prof->CIN }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Inclure le JS de DataTables -->
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#profs-table').DataTable();

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route("profs.data") }}',
                    method: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        var table = $('#profs-table').DataTable();
                        table.clear().draw();

                        response.profs.forEach(function(prof) {
                            table.row.add([
                                prof.nom,
                                prof.prenom,
                                prof.matricule_cnss,
                                prof.specialite,
                                prof.type_contrat,
                                prof.CIN
                            ]).draw(false);
                        });
                    }
                });
            });
        });
    </script>
    @endsection
</body>
</html>
