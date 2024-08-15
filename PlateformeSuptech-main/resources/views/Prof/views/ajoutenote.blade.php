<!-- ajoutenote.blade.php -->

<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@extends('prof.layouts.navbarprof')
@section('contenu')

<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 120px;">
    <div class="container barrecherche fixed-top-barre" style="margin-top: 50px;">
      
          
      
          
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de l'étudiant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formModifierEtudiant" action="{{ route('profupdate') }}" method="POST">
                            @csrf
                            <input type="hidden" id="apogee" name="apogee" value="">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCTR1">CTR1</label>
                                <input type="text" class="form-control" id="inputCTR1" name="CTR1" min="0" max="20">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCTR2">CTR2</label>
                                <input type="text" class="form-control" id="inputCTR2" name="CTR2" min="0" max="20">
                            </div></div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEF">EF</label>
                                <input type="text" class="form-control" id="inputEF" name="EF" min="0" max="20">
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="inputTP">TP</label>
                                <input type="text" class="form-control" id="inputTP" name="TP" min="0" max="20">
                            </div></div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;background-color:#173165">Enregistrer les modifications</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        

        
        <div class="container">
            <table class="table table-striped" id="etudiants-table">
                <thead>
                    <tr>
                     
                    
                        <th class="th-color border">Numéro</th>
                        <th class="th-color border">CNE</th>
                        <th class="th-color border">CNI</th>
                        <th class="th-color border">Nom</th>
                        <th class="th-color border">Prénom</th>
                        <th class="th-color border">CTR1</th>
                        <th class="th-color border">CTR2</th>
                        <th class="th-color border">EF</th>
                        <th class="th-color border">TP</th>
                        <th class="th-color border">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    $('#etudiants-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
                url: "{{ route('data') }}",
                type: 'GET'
            },

        columns: [ 
           
            { data: 'Apogee', name: 'Apogee' },
            { data: 'CNE', name: 'CNE' },
            { data: 'CNI', name: 'CNI' },
            { data: 'Nom', name: 'Nom' },
            { data: 'Prenom', name: 'Prenom' },
            { data: 'CTR1', name: 'CTR1' },
            { data: 'CTR2', name: 'CTR2' },
            { data: 'EF', name: 'EF' },
            { data: 'TP', name: 'TP' },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            }
        ]
    });

    $(document).ready(function() {
    $('#etudiants-table').on('click', '.edit-btn', function(e) {
        e.preventDefault();

        var etudiantId = $(this).data('id');
        var row = $(this).closest('tr');
       
        var CTR1 = row.find('td:eq(5)').text().trim();
        var CTR2 = row.find('td:eq(6)').text().trim();
        var EF = row.find('td:eq(7)').text().trim();
        var TP = row.find('td:eq(8)').text().trim();

        $('#apogee').val(etudiantId);
        $('#inputCTR1').val(CTR1);
        $('#inputCTR2').val(CTR2);
        $('#inputEF').val(EF);
        $('#inputTP').val(TP);

        $('#exampleModalEdit').modal('show');
    });

    $('#formModifierEtudiant').submit(function(e) {
        var ctr1 = parseFloat($('#inputCTR1').val());
        var ctr2 = parseFloat($('#inputCTR2').val());
        var ef = parseFloat($('#inputEF').val());
        var tp = parseFloat($('#inputTP').val());

        if (ctr1 < 0 || ctr1 > 20 || ctr2 < 0 || ctr2 > 20 || ef < 0 || ef > 20 || tp < 0 || tp > 20) {
            e.preventDefault();
            alert("Les notes doivent être comprises entre 0 et 20.");
            return false;
        }
    });
});

 

</script>
<script>
    //exporter 
    document.getElementById('exporter').addEventListener('click', function() {
            var data = table.rows().data().toArray();
            var rows = [['Numéro', 'CNE', 'CNI', 'Nom', 'Prénom', 'CTR1', 'CTR2', 'EF', 'TP']];

            data.forEach(function(row) {
                rows.push([
                    row.Apogee,
                    row.CNE,
                    row.CNI,
                    row.Nom,
                    row.Prenom,
                    row.CTR1,
                    row.CTR2,
                    row.EF,
                    row.TP
                ]);
            });

            var worksheet = XLSX.utils.aoa_to_sheet(rows);
            var workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Etudiants");

            XLSX.writeFile(workbook, "etudiants.xlsx");
        });
</script>
@endsection
