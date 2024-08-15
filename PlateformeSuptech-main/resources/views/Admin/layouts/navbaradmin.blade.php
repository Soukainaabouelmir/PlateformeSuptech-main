<title>Espace Admin</title>
<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .navbar {
        box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        z-index: 1000;
        position: fixed;
        top: 0;
        height: 60px;
        width: 100%;
        background-color: #fff;
    }

    .sidebar {
        transition: left 0.3s ease;
        background-color: rgb(23, 49, 101);
        font-family: Arial, sans-serif;
        width: auto;
        height: 100%;
        position: fixed;
        top: 40px;
        left: 0;
        overflow-y: hidden;

    }





    #vertical-sidebar ul li {
        padding: 15px;
        transition: all 0.3s ease;
        width: 100%;
        display: block;
        font-weight: 600;

        /* Set width to 100% for all sidebar items */
    }

    #vertical-sidebar ul li a {
        color: #ffffff;
        text-decoration: none;

    }

    #vertical-sidebar ul li.active {
        background-color: rgb(57, 102, 194);
        width: 250%;
    }

    #vertical-sidebar ul li.active a {
        color: #ffffff;
        width: 250px;
    }

    #vertical-sidebar ul {
        list-style-type: none;
        padding: 0;
        color: #e9ecef;


    }



    /* Default styles for the sidebar */
    .sidebar {
        background-color: #173165;
        border-right: 0px solid #ffffff;

        width: 250px;
    }



    .navbar-item {
        text-decoration: none;
        color: #173165;
        margin: -40px;

    }

    /* Media query for screens smaller than 768px */
    @media (max-width: 768px) {
        .sidebar {
            width: 250px;
            /* Hide the sidebar by default on smaller screens */
        }

    }

    /* Media query for screens larger than 768px */

    /* Responsive styles */
    @media (max-width: 991.98px) {

        /* Tablets */
        .sidebar {
            width: 200px;

        }
    }


    @media (max-width: 575.98px) {


        .sidebar {
            width: 150px;

        }
    }

    /* Media queries for responsive design */

    /* Phones */
    @media (max-width: 320px) {
        .container {
            padding: 0 10px;

        }

    }

    @media (min-width: 321px) and (max-width: 375px) {
        .container {
            padding: 0 20px;

        }
    }

    @media (min-width: 376px) and (max-width: 425px) {
        .container {
            padding: 0 30px;

        }
    }

    @media (min-width: 426px) and (max-width: 768px) {
        .container {
            padding: 0 40px;

        }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
        .container {
            padding: 0 50px;
        }
    }

    @media (min-width: 1025px) and (max-width: 1440px) {
        .container {
            padding: 0 60px;


        }

    }

    @media (min-width: 1441px) and (max-width: 2560px) {
        .container {
            padding: 0 70px;

        }

    }
</style>

<body>


    <nav class="navbar">
        <div class="container">
            <img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="13%">
            <div class="navbar-left">
                <div class="d-flex align-items-center">
                    @if (Auth::user())
                        <span class="navbar-item p-5" style="text-decoration: none; color:#173165; font-weight: 600;">
                            {{ Auth::user()->name }}
                        </span>
                    @else
                        <a class="navbar-item p-5" href="#" style="text-decoration: none;">Nom utilisateur</a>
                    @endif
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-person-fill icon-style" viewBox="0 0 16 16" style="color: #173165;">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="userDropdownMenu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Se deconnecter
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div id="vertical-sidebar">

            <div class="row">
                <div class="col-md-4">
                    <div class="sidebar">
                        <ul class="list-unstyled">
                            <li class="p-2 mb-2 " style="margin-top:50px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                                </svg>&nbsp;&nbsp;&nbsp;
                                <a class="lien" href="{{ route('dashboard') }}"
                                    class="{{ Request::is('dashboard') ? 'active' : '' }}">Tableau de bord</a>
                            </li>






                            <li class="p-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    <path fill-rule="evenodd"
                                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('gestioncomptes') }}"
                                    class="{{ Request::is('gestioncomptes') ? 'active' : '' }}">Gestion des comptes</a>
                            </li>
   <!-- Nouveaux éléments du menu -->
   <li class="p-2 mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
        class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M3 4.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 12.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm9-10a.5.5 0 0 1 .5-.5h1.5A2.5 2.5 0 0 1 16 4.5v9a2.5 2.5 0 0 1-2.5 2.5H2A2.5 2.5 0 0 1 0 13.5v-9A2.5 2.5 0 0 1 2 2h1.5a.5.5 0 0 1 .5-.5zm-1 1V4H3v-.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
    </svg>&nbsp;&nbsp;&nbsp;
    <a class="lien {{ Request::is('admin/students*') ? 'active' : '' }}" href="{{ route('admin.views.index') }}">
        Liste des étudiants
    </a>
</li>

<li class="p-2 mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
        class="bi bi-list-check" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M10.854 4.854a.5.5 0 0 0-.708 0L7.5 7.5 6.354 6.354a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0 0-.708z" />
        <path fill-rule="evenodd"
            d="M16 2.5a.5.5 0 0 0-.5-.5h-1.639a.5.5 0 0 0-.451.276l-.992 1.985a.5.5 0 0 0 .451.739H15.5a.5.5 0 0 0 .5-.5V2.5zM5 0a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 0zm-3 1.5a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-1 0v-10a.5.5 0 0 1 .5-.5zm5.5.5A.5.5 0 0 0 7 1v10a.5.5 0 0 0 1 0V1a.5.5 0 0 0-.5-.5H6.5zM3 11a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 1 0v-1A.5.5 0 0 0 3 11zm9-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM6.5 5a.5.5 0 0 1 0-1h9a.5.5 0 0 1 0 1h-9zm-3 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
    </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('profs.views.index') }}"
        class="{{ Request::is('/profs') ? 'active' : '' }}">Liste des enseignants</a>
</li>

                        <li class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M9.293 0a1 1 0 0 1 .707.293l4 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2A2 2 0 0 1 2 0h7.293zm.707 4H10a1 1 0 0 1-1-1V1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H10a1 1 0 0 1-1-1zm1 4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1h5zm0 2a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1h5z" />
                            </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('demandescolarite') }}"
                                class="{{ Request::is('demandescolarite') ? 'active' : '' }}">Demande de scolarité</a>
                        </li>
                        <li class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-chat-text" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 3a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-9zm0-1h9a1.5 1.5 0 0 1 1.5 1.5v7A1.5 1.5 0 0 1 11.5 12h-9A1.5 1.5 0 0 1 1 10.5v-7A1.5 1.5 0 0 1 2.5 2zm3 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                <path d="M14 1a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h1v3a.5.5 0 0 0 .854.354l2.647-2.646H12a2 2 0 0 0 2-2V1zm-1 0H3v9h2v3l3-3h5V1z" />
                            </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('reclamationscolarite') }}"
                                class="{{ Request::is('reclamationscolarite') ? 'active' : '' }}">Réclamations scolarité</a>
                        </li>
                        </ul>
                    </div>
                </div>

                @yield('contenu')

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarItems = document.querySelectorAll('#vertical-sidebar ul li');

            sidebarItems.forEach(item => {

                if (item.querySelector('a').href === window.location.href) {
                    item.classList.add('active');
                }

                item.addEventListener('click', function() {
                    // Remove the 'active' class from all sidebar items
                    sidebarItems.forEach(i => i.classList.remove('active'));
                    // Add the 'active' class to the clicked item
                    this.classList.add('active');
                });
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
</body>
