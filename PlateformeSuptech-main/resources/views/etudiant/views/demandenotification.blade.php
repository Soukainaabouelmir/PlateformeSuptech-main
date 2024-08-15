<link href="{{ asset('asset/css/lib/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/lib/themify-icons.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('asset/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/lib/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/lib/helper.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>

<style>
.logo {
    background-color: rgb(255, 255, 255);
}

#modifier {
    background-color: #173165;
    color: rgb(255, 255, 255);
    border: none;
    border-radius: 5px;
    width: 100%;
    height: 40px;
}

#modifier:hover {
    background-color: #3966c2;
}
th{
    background-color: #173165;
    color: rgb(255, 255, 255);
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
                <li><a href="{{ route('Profil_etudiant') }}"><i class="ti-user"></i> Mon Profil </a></li>
                <li><a href="{{ route('etudiant.emplois') }}"> <i class="ti-calendar"></i> Emploi du Temps</a></li>
                <li><a href="{{ route('paiement') }}"> <i class="ti-credit-card"></i>Paiement </a></li>
                <li><a href="{{ route('etudiant.views.exametudiant') }}"><i class="ti-marker-alt"></i> Mes Exams</a></li>
                <li><a href="{{ route('note') }}"><i class="ti-view-list-alt"></i> Notes </a></li>
                <li><a href="{{ route('demande') }}"><i class="ti-files"></i> Mes Demandes </a></li>
                <li><a href="{{ route('demandenotification') }}"><i class="ti-time"></i> Historique demandes </a></li>
                <li><a href="{{ route('reclamation') }}"><i class="ti-alert"></i> Mes Réclamations </a></li>
               
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
                                @if($authUser)
                                <span class="navbar-item p-3" style="text-decoration: none; color:#173165; font-weight: 600;">
                                    {{ $authUser->Nom }} {{ $authUser->Prenom }}
                                </span>
                            @else
                                <a class="navbar-item p-5" href="#" style="text-decoration: none;">Nom utilisateur</a>
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
    <div class="main">
        <div class="container-fluid">
            
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="demandes-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th style="color: rgb(255, 255, 255);">Type</th>
                                                <th style="color: rgb(255, 255, 255);">Date de demande</th>

                                                <th style="color: rgb(255, 255, 255);">Etat Actuel</th>
                                                <th style="color: rgb(255, 255, 255);">Motif</th>
                                            
                                                
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
   $('#demandes-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route('demandeEtudiants') }}',
    columns: [
        { data: 'document_description', name: 'document_admin.description' },
        { data: 'DateDemande', name: 'DateDemande' },
        { data: 'EtatDemande', name: 'EtatDemande' },
        { data: 'Motif', name: 'Motif' },
    ]
});

</script>

</body>
</html>
