<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    

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
                @yield('contenu')
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</body>
</html>
