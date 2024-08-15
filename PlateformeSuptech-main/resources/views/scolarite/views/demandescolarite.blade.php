<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
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
    
</style>
<body>


    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo"> <a class="navbar-brand" href=""><img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="70%" style="margin-left: 10px;"></div>
                <ul>
                    
                   
                   
                    <li><a href="{{ route('listetudiant') }}"><i class="ti-view-list-alt"></i> Liste étudiants </a></li>
                    <li><a href="{{ route('demandescolarite') }}"><i class="ti-files"></i>  Demandes étudiants</a>
                   </li>
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
                                   
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="reject-form" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Motif de Rejet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="motif_rejet">Indiquez le motif du rejet:</label>
                        <textarea class="form-control" id="motif_rejet" name="motif_rejet" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Rejeter la demande</button>
                </div>
            </form>
        </div>
    </div>
</div>

   

                                    <table id="demandes-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Apogee</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Filiére</th>
                                                <th>Type de demande</th>
                                                <th>Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->

                <div class="row">
                    <div class="col-lg-12">
                       
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
        $('#demandes-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('demandes.data') }}",
                type: "GET",
            },
            columns: [
                { data: 'apogee', name: 'apogee' },
                { data: 'etudiant_nom', name: 'etudient.Nom' },
                { data: 'etudiant_prenom', name: 'etudient.Prenom' },
                { data: 'etudiant_telephone', name: 'etudient.telephone' },
                { data: 'etudiant_email', name: 'etudient.Email' },
                { data: 'filiere_intitule', name: 'filiere.intitule' },
                { data: 'document_description', name: 'document_admin.description' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: 'visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
    });
</script>

<script>
      
    var userButton = document.querySelector('.dropdown-toggle');

    
    var userDropdownMenu = document.querySelector('#userDropdownMenu');

    
    userButton.addEventListener('click', function() {
        
        userDropdownMenu.classList.toggle('show');
    });
</script>
<script>
    function confirmValidation(apogee) {
    if (confirm('Are you sure you want to validate this request?')) {
        document.getElementById('validate-form-' + apogee).submit();
    }
}

function confirmArchive(apogee) {
    if (confirm('Are you sure you want to archive this request?')) {
        document.getElementById('archive-form-' + apogee).submit();
    }
}
</script>

<script>
    $('#rejectModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
    var apogee = button.data('apogee'); // Extraire les informations depuis les attributs data-*

    var form = $('#reject-form');
    form.attr('action', '/demandes/rejeter/' + apogee);
});

</script>


</body>
</html>
