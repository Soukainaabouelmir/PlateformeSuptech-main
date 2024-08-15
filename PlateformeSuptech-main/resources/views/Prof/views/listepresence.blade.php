<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('prof.layouts.navbarprof')
@section('contenu')

<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 120px;">
    <div class="container barrecherche fixed-top-barre" style="margin-top: 50px;">

        <div class="row">
            <div class="col-md-9">
            <button id="saveAbsences" class="btn btn-primary mt-3 ml-5" style=" background-color: #173165">Enregistrer</button>
        </div>
    </div>                  
                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
                                <th class="th-color border">Numéro</th>
                                <th class="th-color border">Apogée</th>
                                <th class="th-color border">CNE</th>
                                <th class="th-color border">CNI</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">Date</th>
                                <th class="th-color border">heure</th>
                                <th class="th-color border">Absence</th>
                             
                               
                                
                               
                            </tr>
                        </thead>
                    </table>
                </div>
             

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

<script>

$('#etudiants-table').DataTable({
  
    processing: true,
    serverSide: true,
    ajax: "{{ route('dataetudiant') }}",
    columns: [
        { data: 'numero', name: 'numero' },
        { data: 'Apogee', name: 'Apogee' },
        { data: 'CNE', name: 'CNE' },
        { data: 'CNI', name: 'CNI' },
        { data: 'Nom', name: 'Nom' },
        { data: 'Prenom', name: 'Prenom' },
      
        { data: 'Date', name: 'Date' },
        { data: 'Heure', name: 'Heure' },
     
        {
                        data: 'absence',
                        name: 'absence',
                        render: function(data, type, row) {
                            return `
                                <select class="form-control absence-select" data-apogee="${row.numero}">
                                    <option value="">Sélectionner</option>
                                    <option value="A" ${data === 'A' ? 'selected' : ''}>A</option>
                                    <option value="P" ${data === 'P' ? 'selected' : ''}>P</option>
                                    <option value="R" ${data === 'R' ? 'selected' : ''}>R</option>
                                </select>
                            `;
                        }
                    }
       
    ]
});



    
$('#saveAbsences').on('click', function() {
    var absences = [];
    $('.absence-select').each(function() {
        var id_absence = $(this).data('apogee'); // Ensure this fetches id_absence correctly
        var absence = $(this).val();
        if (absence) {
            absences.push({ id_absence: id_absence, absence: absence });
        }
    });

    // Use Fetch API to send the data
    fetch('{{ route("saveAbsence") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is sent
        },
        body: JSON.stringify({
            updates: absences
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Absences sauvegardées avec succès.');
        } else {
            alert(data.error || 'Une erreur est survenue lors de la mise à jour des absences.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Une erreur est survenue lors de la mise à jour des absences.');
    });
});



 
</script>
@endsection