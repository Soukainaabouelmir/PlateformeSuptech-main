

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
<!-- Assurez-vous que FontAwesome est inclus -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link href="{{ asset('asset/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>
<style>
    .logo{
        background-color: rgb(255, 255, 255);
    }
    .form-select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 100%;
        }
        .modal-open {
    overflow:hidden;
}
        /* Style pour l'état hover */
        .form-select:hover {
            border-color: #356895;
        }

        /* Style pour l'état focus */
        .form-select:focus {
            border-color: #4e73df;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
      
       
        
</style>
<body>


    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo"> <a class="navbar-brand" href=""><img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="70%" style="margin-left: 10px;"></div>
                <ul>
                    
                   
                   
                    <li><a href="{{ route('listetudiant') }}"><i class="ti-view-list-alt"></i> Liste étudiants </a></li>
                    <li><a href="{{ route('demandescolarite') }}"><i class="ti-files"></i>  Demandes étudiants</a></li>
                    <li><a href="{{ route('paiementscolarite') }}"><i class="ti-user"></i> Paiement étudiants</a></li>
                    <li><a href="{{ route('reclamationscolarite') }}"><i class="ti-layout-grid2-alt"></i> Réclamations étudiants</a></li>
                   
                    <li><a href="{{ route('scolarite.views.emploi') }}"><i class="ti-calendar"></i> Emploi du Temps </a>
                       
                    </li>
                    <li><a href="{{ route('scolarite.views.notificationsexam') }}"><i class="ti-email"></i> Notifications Exams </a>
                       
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Absence étudiants </a>
                       
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Absence Prof </a>
                       
                    </li>
                   
                    
                   
                   
                    
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->


<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                  
                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <li class="nav-item">
                                @if (Auth::user())
                                    <span class="navbar-text" style="color:#173165; font-size:15px;font-weight:600;">
                                        {{ Auth::user()->name }}
                                    </span>
                                @else
                                    <a class="nav-link" href="#" style="color: #173165;">Nom utilisateur</a>
                                @endif
                                <i class="ti-user" style="color:#173165;" ></i>
                            </li>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-close"></i>  déconnecter
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
                                        Ajouter un étudiant
                                    </button>

                                    <!-- Modal HTML -->
                                    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addStudentModalLabel">Ajouter un étudiant</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('etudiants.store') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-4">Nom
                                                                <input class="form-control" type="text" name="Nom">
                                                            </div>
                                                            <div class="col-md-4">Prénom
                                                                <input class="form-control" type="text" name="Prenom">
                                                            </div>
                                                            <div class="col-md-4">Date de naissance
                                                                <input class="form-control" type="date" name="Date_naissance">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">CNE
                                                                <input class="form-control" type="text" name="CNE">
                                                            </div>
                                                            <div class="col-md-4">CNI
                                                                <input class="form-control" type="text" name="CNI">
                                                            </div>
                                                            <div class="col-md-4">Téléphone
                                                                <input class="form-control" type="text" name="telephone">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">Email
                                                                <input class="form-control" type="email" name="Email">
                                                            </div>
                                                            <div class="col-md-4">Adresse
                                                                <input class="form-control" type="text" name="Adresse">
                                                            </div>
                                                            <div class="col-md-4">Sexe
                                                                <select class="form-control" name="Sexe">
                                                                    <option value="M">Masculin</option>
                                                                    <option value="F">Féminin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">Filière
                                                                <select class="form-control" id="filiere" name="id_filiere" required>
                                                                    <option value="" disabled selected></option>
                                                                    <option value="2">Génie Industriel et Logistique Hospitalière</option>
                                                                    <option value="1">Classes Préparatoires</option>
                                                                    <option value="3">Sciences de Gestion en Milieu Hospitalier et Industrie Médicale</option>
                                                                    <option value="4">Génie Digital et Intélligence Artificielle en santé</option>
                                                                    <option value="5">Dispositifs Médicaux et affaires Réglementaires</option>
                                                                    <option value="6">Génie Biomédical</option>
                                                                    <option value="7">Maintenance Médicale</option>
                                                                    <option value="8">Entrepreneuriat et Management Technologique</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">Semestre
                                                                <select class="form-control" id="semestre" name="id_semestre">
                                                                    <option value="1">S1</option>
                                                                    <option value="2">S2</option>
                                                                    <option value="3">S3</option>
                                                                    <option value="4">S4</option>
                                                                    <option value="5">S5</option>
                                                                    <option value="6">S6</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">Date inscriptions
                                                                <input class="form-control" type="text" name="num_annee">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">Etablissement
                                                                <select class="form-control" name="code_postal" required>
                                                                    <option value="28630">MOHAMMEDIA</option>
                                                                    <option value="44003">ESSAOUIRA</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">Bourse
                                                                <select class="form-control" id="Pourcentage_bourse" name="id_bourse" >
                                                                    <option value="" disabled selected></option>
                                                                    <option value="8">0%</option>
                                                                    <option value="6">10%</option>
                                                                    <option value="10">20%</option>
                                                                    <option value="11">30%</option>
                                                                    <option value="12">40%</option>
                                                                    <option value="2">50%</option>
                                                                    <option value="3">60%</option>
                                                                    <option value="4">70%</option>
                                                                    <option value="6">80%</option>
                                                                    <option value="9">90%</option>
                                                                    <option value="1">100%</option>
                                                                </select> 
                                                            </div>
                                                            <div class="col-md-4">Pays
                                                                <select class="form-control" id="id_pays" name="id_pays" required>
                                                                    <option value="212">Maroc</option>
                                                                    <option value="2">Autre</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">Série de Bac
                                                                <select class="form-control"  id="input_16" name="id_diplome">

                                                                    <option></option>
                                                                    <option value="2">SCIENCES EXPERIMENTALES - PC Français </option>
                                                                    <option value="2">SCIENCES EXPERIMENTALES - PC </option>
                                                                    <option value="3">SCIENCES EXPERIMENTALES - SVT </option>
                                                                    <option value=""> SCIENCES MATHEMATIQUES - A </option>
                                                                    <option value="SCIENCES MATHEMATIQUES - B"> SCIENCES MATHEMATIQUES - B </option>
                                                                    <option value="SCIENCES TECHNIQUE - GENIE MECANIQUE"> SCIENCES TECHNIQUE - GENIE MECANIQUE </option>
                                                                    <option value="SCIENCES TECHNIQUE - GENIE ELECTRIQUE"> SCIENCES TECHNIQUE - GENIE ELECTRIQUE </option>
                                                                    <option value="SCIENCES TECHNIQUE - GENIE CIVIL"> SCIENCES TECHNIQUE - GENIE CIVIL </option>
                                                                    <option value="SCIENCES TECHNIQUE - GENIE CHIMIQUE"> SCIENCES TECHNIQUE - GENIE CHIMIQUE </option>
                                                                    <option value="SCIENCES TECHNIQUE - GENIE AGRONOMIQUE"> SCIENCES TECHNIQUE - GENIE AGRONOMIQUE </option>
                                                                    <option value="SCIENCES TECHNIQUE - GENIE ECONOMIQUE"> SCIENCES TECHNIQUE - GENIE ECONOMIQUE</option>
                                                                
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">Mention du Bac
                                                                <select class="form-control" id="mention_bac" name="mention" >
                                                                    <option value="" disabled selected></option>
                                                                    <option value="AB">Assez Bien</option>
                                                                    <option value="P">Passable</option>
                                                                    <option value="B">Bien</option>
                                                                    <option value="TB">Très Bien</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">Année du Bac
                                                                <input class="form-control" type="text" name="Annee_bac">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">Nom Tuteur
                                                                <input class="form-control" type="text" name="nom">
                                                            </div>
                                                            <div class="col-md-4">Téléphone Tuteur
                                                                <input class="form-control" type="text" name="tel1">
                                                            </div>
                                                            <div class="col-md-4">Adresse Tuteur
                                                                <input class="form-control" type="text" name="adresse">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- Table HTML -->
                                    <table id="etudiants-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Apogee</th>
                                                <th>CNE</th>
                                                <th>CNI</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Téléphone</th>
                                                <th>Email</th>
                                                <th>Adresse</th>
                                                <th>Sexe</th>
                                                <th>Date Naissance</th>
                                                <th>Filiere</th>
                                                <th>Etablissement</th>
                                                <th>Taux de Bourse</th>
                                                <th>Nom Tuteur</th>
                                                <th>Téléphone Tuteur</th>
                                                <th>Adresse Tuteur</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table data will be populated here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<!-- jquery vendor -->
<script src="{{ asset('asset/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/jquery.nanoscroller.min.js') }}"></script>
<!-- nano scroller -->
<script src="{{ asset('asset/js/lib/menubar/sidebar.js') }}"></script>
<script src="{{ asset('asset/js/lib/preloader/pace.min.js') }}"></script>
<!-- sidebar -->
<!-- bootstrap -->
<script src="{{ asset('asset/js/lib/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/scripts.js') }}"></script>
<!-- scripit init-->
<script src="{{ asset('asset/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/buttons.flash.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/datatables-init.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        var table = $('#etudiants-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('etudiants.data') }}",
                "type": "GET",
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'apogee', name: 'apogee' },
                { data: 'CNE', name: 'CNE' },
                { data: 'CNI', name: 'CNI' },
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'telephone', name: 'telephone' },
                { data: 'Email', name: 'Email' },
                { data: 'Adresse', name: 'Adresse' },
                { data: 'Sexe', name: 'Sexe' },
                { data: 'Date_naissance', name: 'Date_naissance' },
                { data: 'filiere', name: 'filiere' },
                { data: 'ville', name: 'ville' },
                { data: 'bourse_taux_bourse', name: 'bourse_taux_bourse' },
                { data: 'tuteur_nom', name: 'tuteur_nom' },
                { data: 'tuteur_tel1', name: 'tuteur_tel1' },
                { data: 'tuteur_adresse', name: 'tuteur_adresse' },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<div style="display: flex; gap: 5px;">' +
                            '<button class="btn btn-sm btn-primary edit-btn" data-id="' + row.id + '">Modifier</button>' +
                            '<button class="btn btn-sm btn-danger delete-btn" data-id="' + row.id + '">Supprimer</button>' +
                        '</div>';
                    }
                }
            ],
            dom: 'Bfrtip',
           
            buttons: [
            {
                extend: 'excelHtml5',
                text: 'Exporter en Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json"  // Pour changer la langue en français
        }
});
    
        // Edit Button Handler
        $('#etudiants-table tbody').on('click', '.edit-btn', function() {
            var row = $(this).closest('tr');
            row.find('td').each(function(index, td) {
                if (index < 16) { // Exclude the Actions column
                    var cellData = $(td).text();
                    var input = $('<input>', {
                        type: 'text',
                        class: 'form-control',
                        value: cellData
                    });
                    $(td).html(input);
                }
            });
    
            // Replace Edit button with Save and Cancel buttons
            var saveBtn = $('<button>', {
                text: 'Save',
                class: 'btn btn-sm btn-success save-btn'
            });
            var cancelBtn = $('<button>', {
                text: 'Cancel',
                class: 'btn btn-sm btn-secondary cancel-btn'
            });
            $(this).replaceWith(saveBtn.add(cancelBtn));
        });
    
        // Save Button Handler
        $('#etudiants-table tbody').on('click', '.save-btn', function() {
            var row = $(this).closest('tr');
            var rowData = { id: $(this).siblings('.edit-btn').data('id') };
    
            row.find('td').each(function(index, td) {
                if (index < 16) {
                    var input = $(td).find('input');
                    if (input.length) {
                        var key = table.column(index).dataSrc();
                        rowData[key] = input.val();
                    }
                }
            });
    
            console.log('Données envoyées:', rowData); // Pour déboguer
    
            $.ajax({
                url: '/etudiants/' + rowData.id,
                method: 'PUT',
                data: rowData,
                success: function(response) {
                    table.ajax.reload(null, false); // Reload the table data
                    alert('Étudiant mis à jour avec succès');
                },
                error: function(xhr) {
                    console.error('Erreur lors de la mise à jour:', xhr.responseText);
                    var errorMessages = xhr.responseJSON.message || 'Erreur inconnue';
                    if (xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        errorMessages = '';
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessages += errors[key] + '\n';
                            }
                        }
                    }
                    alert('Erreur lors de la mise à jour de l\'étudiant:\n' + errorMessages);
                }
            });
        });
    
        // Cancel Button Handler
        $('#etudiants-table tbody').on('click', '.cancel-btn', function() {
            table.ajax.reload(null, false); // Reload the table data
        });
    
        // Delete Button Handler
        $('#etudiants-table tbody').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            var row = $(this).closest('tr');
            if (confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')) {
                $.ajax({
                    url: '/etudiants/' + id,
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content') // Inclure le token CSRF
                    },
                    success: function(response) {
                        table.row(row).remove().draw(); // Remove row from table
                        alert(response.message); // Affiche un message de succès
                    },
                    error: function(xhr) {
                        console.error('Erreur lors de la suppression:', xhr.responseText);
                        alert('Erreur lors de la suppression de l\'étudiant: ' + xhr.responseText);
                    }
                });
            }
        });
    });
    </script>
    
    
</body>
</html>
