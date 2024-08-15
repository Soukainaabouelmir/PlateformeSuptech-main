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
                <div class="logo">
                    <a class="navbar-brand" href="">
                        <img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="70%" style="margin-left: 10px;">
                    </a>
                </div>
                <ul>
                    <li><a href="{{ route('absenceacceuil') }}"><i class="ti-view-list-alt"></i> Présence Enseignant</a></li>
                   
        
                    <li><a href="{{ route('scolarite.views.emploi') }}"><i class="ti-calendar"></i> Emploi du Temps </a></li>
                    
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
                                    <i class="ti-user" style="color:#173165;"></i>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Entrez les horaires d'entrée et de sortie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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
            
                <div class="modal-body">
                    <form id="editForm" action="{{ route('absence.store') }}" method="post">
                        @csrf
                        
                        <input type="hidden" id="cin_salarie" name="cin_salarie">
                        <div class="form-group">
                            <label for="heure_depart">CIN PROF</label>
                            <input type="text" class="form-control" id="inputCIN" name="cin_salarie">
                        </div>
                        <div class="form-group">
                            <label for="heure_depart">Heure d'entrer</label>
                            <input type="time" class="form-control" id="heure_depart" name="heure_depart">
                        </div>

                        <div class="form-group">
                            <label for="heure_fin">Heure de sortie</label>
                            <input type="time" class="form-control" id="heure_fin" name="heure_fin">
                        </div>
                        <div class="form-group">
                            <label for="date_seance">Date</label>
                            <input type="date" class="form-control" id="date_seance" name="date_seance">
                        </div>
                        <div class="form-group">
                            <label for="num_element">Matière</label>
                            <select name="num_element" id="num_element" class="form-control">
                               
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #173165" >Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main">
        
        <div class="container-fluid">
           
            <section id="main-content">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="accueil-table" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>CIN</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>                                     
                                                <th>Actions</th>
                                               
                                               
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                 
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                       
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


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
    $('#accueil-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('accueil.data') }}",
            type: "GET",
        },
        columns: [
            { data: 'CIN', name: 'CIN' },
            { data: 'nom', name: 'nom' },
            { data: 'prenom', name: 'prenom' },
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
                    columns: ':visible'
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
    $('#accueil-table').on('click', '.edit-btn', function() {
         $('#editModal').modal('show');
     });
 

    
 
 </script>
 
 <script>
     $(document).ready(function() {
         $('#accueil-table').on('click', '.edit-btn', function(e) {
             e.preventDefault();
             
             // Obtenez la ligne contenant le bouton cliqué
             var row = $(this).closest('tr');
             
             // Récupérez le CIN du professeur à partir de la première cellule de la ligne
             var cin_salarie = row.find('td:eq(0)').text();
             
             // Mettez à jour la valeur du champ de saisie du modal
             $('#inputCIN').val(cin_salarie);
             
             // Affichez le modal
             $('#editModal').modal('show');
         });
     });
     </script>
     
</body>
</html>
