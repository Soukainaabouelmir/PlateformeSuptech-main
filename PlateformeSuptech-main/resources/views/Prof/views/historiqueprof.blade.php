<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@extends('prof.layouts.navbarprof')
@section('contenu')

<div class="container-fluid mt-5" style="margin-left:150px;margin-top: 120px;">
    <div class="container  barrecherche fixed-top-barre" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-9">
                
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
                                <th class="th-color border">Numero de seance</th>
                                <th class="th-color border">Date</th>
                                <th class="th-color border">Heure de depart</th>
                                <th class="th-color border">Heure de fin</th>
                                <!--<th class="th-color border">Matière</th>
                                <th class="th-color border">Niveau </th>
                                <th class="th-color border">Groupe</th>-->
                                <th class="th-color border">Activites</th>
                               <th class="th-color border">Element</th>
                                <th class="th-color border">Groupe</th>
                                <th class="th-color border">Filiere</th>
                                <th class="th-color border">Niveau</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

<script>
  
        $('#etudiants-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('hisroriqueprofesseur') }}",
            columns: [
                { data: 'num_seance', name: 'num_seance' },  
                { data: 'date_seance', name: 'date_seance' },
                { data: 'heure_depart', name: 'heure_depart' },
                { data: 'heure_fin', name: 'heure_fin' },
                { data: 'objectif', name: 'objectif' },
                /*{ data: 'element.intitule', name: 'element.intitule' },
        { 
            data: 'groupe.intitule',
            name: 'groupe.intitule',
            render: function(data, type, full, meta) {
                // Si vous avez plusieurs groupes, vous devrez les concaténer ici
                return data; 
            } 
        },
        { 
            data: 'groupe.filiere.intitule',
            name: 'groupe.filiere.intitule',
            render: function(data, type, full, meta) {
                // Si vous avez plusieurs filières, vous devrez les concaténer ici
                return data; 
            } 
        },
        { 
            data: 'groupe.inscriptions.0.niveau',
            name: 'groupe.inscriptions.niveau',
            render: function(data, type, full, meta) {
                // Vous pouvez ajuster cette logique selon vos besoins
                return data; 
            } 
        }*/
    
            { data: 'element', name: 'element' },
            { data: 'groupe', name: 'groupe' },
            { data: 'filiere', name: 'filiere' },
            { data: 'niveau', name: 'niveau' }
    ]
});
    
          
    
</script>


@endsection
