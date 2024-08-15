



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Inclure DataTables -->
<script type="text/javascript" src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Feuille de style personnalisée -->
<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
   
@extends('scolarite.layouts.navbarscolarite')
<style>
    th{
        background-color: #b9b7b7;
        color: #ffffff;
    }
  
</style>
@section('contenu')
<div class="container" style="margin-left: 210px; margin-top: 140px;">
    <div class="row">
        <div class="col-md-9">
            <table id="demandesTable" class="table">
                <thead>
                    <tr>
                        <th class="th-color border" scope="col">Apogee</th>
                        <th class="th-color border" scope="col">Nom</th>
                        <th class="th-color border" scope="col">Prénom</th>
                        <th class="th-color border" scope="col">Filière</th>
                        <th class="th-color border" scope="col">Semestre</th>
                        <th class="th-color border" scope="col">Numéro de Téléphone</th>
                        <th class="th-color border" scope="col">Email</th>
                        <th class="th-color border" scope="col">Type</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

<script>

$('#demandesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('demandes.etudiants') }}",
            columns: [
               
                { data: 'apogee', name: 'apogee' },
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'filiere', name: 'filiere' },
                { data: 'semestre', name: 'semestre' },
                { data: 'Numero', name: 'Numero' },
                { data: 'Email', name: 'Email' },
                { data: 'Type', name: 'Type' },
                
                
            ]
        });
</script>
@endsection
