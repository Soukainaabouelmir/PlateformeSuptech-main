<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
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
                            <label for="etablissement" class="col-md-4 col-form-label text-md-right">Etablissement :</label>
                            <div class="col-md-6">
                                <select class="form-control" id="etablissement" name="etablissement">
                                    <option value="" selected></option>
                                    <option value="MOHAMMEDIA">MOHAMMEDIA</option>
                                    <option value="ESSAOUIRA">ESSAOUIRA</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="cycle" class="col-md-4 col-form-label text-md-right">Cycle :</label>
                            <div class="col-md-6">
                                <select class="form-control" id="cycle" name="cycle">
                                    <option value="" selected></option>
                                    <option value="CPI">Classes Préparatoires Intégrées</option>
                                    <option value="Licence">Licence</option>
                                    <option value="Ingénieur">Ingénieur</option>
                                    <option value="Master">Master</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="filiere" class="col-md-4 col-form-label text-md-right">Filière :</label>
                            <div class="col-md-6">
                                <select class="form-control" id="filiere" name="filiere">
                                    <option value="" selected></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="niveau" class="col-md-4 col-form-label text-md-right">Niveau :</label>
                            <div class="col-md-6">
                                <select class="form-control" id="niveau" name="niveau">
                                    <option value="" selected></option>
                                    <option value="première année" selected>première année</option>
                                    <option value="deuxième année" selected>deuxième année</option>
                                    <option value="" selected></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="groupe" class="col-md-4 col-form-label text-md-right">Groupe :</label>
                            <div class="col-md-6">
                                <select class="form-control" id="groupe" name="groupe">
                                    <option value="" selected></option>
                                    <option value="groupe X " selected>groupe X</option>
                                    <option value="groupe Y " selected>groupe Y</option>
                                    <option value="groupe Z " selected>groupe Z</option>
                                    <option value="" selected></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="mois" class="col-md-4 col-form-label text-md-right">Mois :</label>
                            <div class="col-md-6">
                                <select class="form-control" id="mois" name="mois">
                                    <option value="" selected></option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
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
        <table id="students-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>CNE</th>
                    <th>CNI</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Paiement</th>
                    <th>Mode de paiement</th>
                    <th>Type de paiement</th> <!-- Nouvelle colonne ajoutée -->
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->apogee }}</td>
                    <td>{{ $student->CNE }}</td>
                    <td>{{ $student->CNI }}</td>
                    <td>{{ $student->Nom }}</td>
                    <td>{{ $student->Prenom }}</td>
                    <td style="background-color: {{ $student->paiements->isNotEmpty() ? 'green' : 'red' }};">
                        {{ $student->paiements->isNotEmpty() ? 'Payé' : 'Non payé' }}
                    </td>
                    <td>
                       @if ($student->paiements->isNotEmpty())
                       {{ $student->paiements->first()->getModePaiementDescription() }}
                       @else
                       N/A
                       @endif
                    </td>
                    <td>
                       @if ($student->paiements->isNotEmpty())
                       {{ $student->paiements->first()->getTypePaiementDescription() }}
                       @else
                       N/A
                       @endif
                    </td>
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
            $('#students-table').DataTable();

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route("admin.students.filter") }}',
                    method: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        var table = $('#students-table').DataTable();
                        table.clear().draw();

                        response.students.forEach(function(student) {
                            var paiementStatus = student.paiements.length > 0 ? 'Payé' : 'Non payé';
                            var modePaiementDescription = student.paiements.length > 0 ? student.paiements[0].getModePaiementDescription() : 'N/A';
                            var typePaiementDescription = student.paiements.length > 0 ? student.paiements[0].getTypePaiementDescription() : 'N/A';
                            var paiementColor = student.paiements.length > 0 ? 'green' : 'red';

                            table.row.add([
                                student.apogee,
                                student.CNE,
                                student.CNI,
                                student.Nom,
                                student.Prenom,
                                '<td style="background-color: ' + paiementColor + ';">' + paiementStatus + '</td>',
                                modePaiementDescription,
                                typePaiementDescription
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
