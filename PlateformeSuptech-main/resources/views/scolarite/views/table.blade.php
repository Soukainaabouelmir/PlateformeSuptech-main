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
                <div class="logo"> <a class="navbar-brand" href="https://www.suptech-sante.ma/fr"><img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="70%" style="margin-left: 10px;"></div>
                <ul>
                    
                   
                   
                    <li><a href="app-event-calender.html"><i class="ti-view-list-alt"></i> Liste étudiants </a></li>
                    <li><a href="app-email.html"><i class="ti-files"></i>  Demandes étudiants</a></li>
                    <li><a href="app-profile.html"><i class="ti-user"></i> Paiement étudiants</a></li>
                    <li><a href="app-widget-card.html"><i class="ti-layout-grid2-alt"></i> Réclamations étudiants</a></li>
                   
                    <li><a class="sidebar-sub-toggle"><i class="ti-calendar"></i> Emploi du Temps </a>
                       
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-email"></i> Notifications Exams </a>
                       
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Absence étudiants </a>
                       
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Absence Prof </a>
                       
                    </li>
                   
                    
                   
                   
                    <li><a href="#"><i class="ti-close"></i> Déconnecter</a></li>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                               
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="etudiants-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>CNE</th>
                                                <th>CNI</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Téléphone</th>
                                                <th>Email</th>
                                                <th>Adresse</th>
                                                <th>Sexe</th>
                                                <th>Date Naissance</th>
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
        $('#etudiants-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('etudiants.data') }}",
                "type": "GET",
            },
            columns: [
                { data: 'CNE', name: 'CNE' },
                { data: 'CNI', name: 'CNI' },
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'telephone', name: 'telephone' },
                { data: 'Email', name: 'Email' },
                { data: 'Adresse', name: 'Adresse' },
                { data: 'Sexe', name: 'Sexe' },
                { data: 'Date_naissance', name: 'Date_naissance' },
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

</body>
</html>
