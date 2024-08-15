

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
                    <li><a href="{{ route('dashboardrh') }}"><i class="ti-view-list-alt"></i>Tableau de bord</a></li>
               
    
                <li><a href="{{ route('listPersonnel') }}"><i class="ti-calendar"></i> Liste Personnels </a></li>

                    
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
            @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                                                    <form action="{{ route('ajouter-Personnel') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-4 mb-2">
                                                                <label for="nom">Nom</label>
                                                                <input class="form-control" type="text" name="nom" id="nom">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="prenom">Prénom</label>
                                                                <input class="form-control" type="text" name="prenom" id="prenom">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="CIN">Code national (CIN)</label>
                                                                <input class="form-control" type="text" name="CIN" id="CIN">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-2">
                                                                <label for="RIB">RIB</label>
                                                                <input class="form-control" type="text" name="RIB" id="RIB">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="matricule_cnss">Matricule CNSS</label>
                                                                <input class="form-control" type="text" name="matricule_cnss" id="matricule_cnss">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="type_contrat">Type Contrat</label>
                                                                <input class="form-control" type="text" name="type_contrat" id="type_contrat">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-2">
                                                                <label for="contrat_pdf">Contrat PDF</label>
                                                                <input class="form-control" type="file" name="contrat_pdf" id="contrat_pdf">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="cv_pdf">CV PDF</label>
                                                                <input class="form-control" type="file" name="cv_pdf" id="cv_pdf">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="cin_pdf">CIN PDF</label>
                                                                <input class="form-control" type="file" name="cin_pdf" id="cin_pdf">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-2">
                                                                <label for="id_lieu">Etablissement</label>
                                                                <select class="form-control" name="id_lieu" id="id_lieu">
                                                                    <option value=""></option>
                                                                    <option value="1">SALE</option>
                                                                    <option value="2">CASA</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="est_prof">Prof</label>
                                                                <select class="form-control" name="est_prof" id="est_prof">
                                                                    <option value=""></option>
                                                                    <option value="1">Oui</option>
                                                                    <option value="0">Non</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="est_salarie">Salarie</label>
                                                                <select class="form-control" name="est_salarie" id="est_Salarie">
                                                                    <option value=""></option>
                                                                    <option value="1">Oui</option>
                                                                    <option value="0">Non</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="est_doctorant">Doctorant</label>
                                                                <select class="form-control" name="est_doctorant" id="est_Doctorant">
                                                                    <option value=""></option>
                                                                    <option value="1">Oui</option>
                                                                    <option value="0">Non</option>
                                                                </select>
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

                                    <table id="personnel-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CIN</th>
                                                <th>Matricule CNSS</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>RIB</th>
                                                <th>Type de contrat</th>
                                                <th>Contrat PDF</th>
                                                <th>CV PDF</th>
                                                <th>CIN PDF</th>
                                                <th>Lieu</th>
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
    
        var table = $('#personnel-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('getDatapersonnel') }}",
                "type": "GET",
            },
            columns: [
                { data: 'id_personnel', name: 'id_personnel' },
                    { data: 'CIN', name: 'CIN' },
                    { data: 'matricule_cnss', name: 'matricule_cnss' },
                   
                    { data: 'nom', name: 'nom' },
                    { data: 'prenom', name: 'prenom' },
                  
                    { data: 'RIB', name: 'RIB' },
                    
                    { data: 'type_contrat', name: 'type_contrat' },
                    { data: 'contrat_pdf', name: 'contrat_pdf' },
                    { data: 'cv_pdf', name: 'cv_pdf' },
                    { data: 'cin_pdf', name: 'cin_pdf' },
                    { data: 'lieu_affect', name: 'lieu_affect' },

                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                   
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: { 
                        modifier: { page: 'all' }
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: { 
                        modifier: { page: 'all' }
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: { 
                        modifier: { page: 'all' }
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: { 
                        modifier: { page: 'all' }
                    }
                },
                {
                    extend: 'print',
                    exportOptions: { 
                        modifier: { page: 'all' }
                    }
                }
            ]
        });
    
        // Edit Button Handler
        $('#personnel-table tbody').on('click', '.edit-btn', function() {
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
        $('#personnel-table tbody').on('click', '.save-btn', function() {
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
                url: '/personnel/' + rowData.id,
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
        $('#personnel-table tbody').on('click', '.cancel-btn', function() {
            table.ajax.reload(null, false); // Reload the table data
        });
    
        // Delete Button Handler
        $('#personnel-table tbody').on('click', '.delete-btn', function() {
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
