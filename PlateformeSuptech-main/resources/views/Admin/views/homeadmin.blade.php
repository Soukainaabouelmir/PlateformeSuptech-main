<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    <style>
        .active {
            background-color:rgb(23, 49, 101);
            color: white;
        }
.custom-background {
    background-color: rgb(23, 49, 101) !important; /* Fond bleu par défaut */
    color: white; /* Couleur du texte en blanc */
    border: none; /* Enlever la bordure si nécessaire */
    transition: background-color 0.3s, transform 0.3s; /* Transition douce */
}

.custom-background:hover {
    background-color: #1858b1 !important; /* Fond bleu plus foncé lors du survol */
    transform: translateY(-5px); /* Légère translation vers le haut lors du survol */
}

        /* Media queries for responsiveness */
        @media screen and (max-width: 320px) {
            #page-content {
                margin-left: 10px;
                margin-right: 10px;
                padding: 20px;
            }
        }
        @media screen and (min-width: 321px) and (max-width: 375px) {
            #page-content {
                margin-left: 20px;
                margin-right: 20px;
                padding: 30px;
            }
        }
        @media screen and (min-width: 376px) and (max-width: 425px) {
            #page-content {
                margin-left: 30px;
                margin-right: 30px;
                padding: 40px;
            }
        }
        @media screen and (min-width: 426px) and (max-width: 768px) {
            #page-content {
                margin-left: 50px;
                margin-right: 50px;
                padding: 50px;
            }
        }
        @media screen and (min-width: 769px) and (max-width: 1024px) {
            #page-content {
                margin-left: 100px;
                margin-right: 100px;
                padding: 60px;
            }
        }
        @media screen and (min-width: 1025px) and (max-width: 1440px) {
            #page-content {
                margin-left: 150px;
                margin-right: 150px;
                padding: 70px;
                overflow-x: hidden;
            }
        }
        @media screen and (min-width: 1441px) and (max-width: 2560px) {
            #page-content {
                margin-left: 200px;
                margin-right: 200px;
                padding: 80px;
            }
        }
        @media screen and (min-width: 2561px) {
            #page-content {
                margin-left: 250px;
                margin-right: 250px;
                padding: 90px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2" id="vertical-sidebar">
                <div class="sidebar-sticky pt-3">
                    <h5>Navigation</h5>
                    <ul class="nav flex-column">
                        <li class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3 4.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 12.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm9-10a.5.5 0 0 1 .5-.5h1.5A2.5 2.5 0 0 1 16 4.5v9a2.5 2.5 0 0 1-2.5 2.5H2A2.5 2.5 0 0 1 0 13.5v-9A2.5 2.5 0 0 1 2 2h1.5a.5.5 0 0 1 .5-.5zm-1 1V4H3v-.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('admin.views.index') }}"
                                class="{{ Request::is('admin/students*') ? 'active' : '' }}">Liste des étudiants</a>
                        </li>
                        <li class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-list-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.854 4.854a.5.5 0 0 0-.708 0L7.5 7.5 6.354 6.354a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M16 2.5a.5.5 0 0 0-.5-.5h-1.639a.5.5 0 0 0-.451.276l-.992 1.985a.5.5 0 0 0 .451.739H15.5a.5.5 0 0 0 .5-.5V2.5zM5 0a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 0zm-3 1.5a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-1 0v-10a.5.5 0 0 1 .5-.5zm5.5.5A.5.5 0 0 0 7 1v10a.5.5 0 0 0 1 0V1a.5.5 0 0 0-.5-.5H6.5zM3 11a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 1 0v-1A.5.5 0 0 0 3 11zm9-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM6.5 5a.5.5 0 0 1 0-1h9a.5.5 0 0 1 0 1h-9zm-3 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                            </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('listPersonnel') }}"
                                class="{{ Request::is('listPersonnel') ? 'active' : '' }}">Liste des enseignants</a>
                        </li>
                        <li class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 3a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-9zm0-1h9a1.5 1.5 0 0 1 1.5 1.5v7A1.5 1.5 0 0 1 11.5 12h-9A1.5 1.5 0 0 1 1 10.5v-7A1.5 1.5 0 0 1 2.5 2zm3 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                <path d="M14 1a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h1v3a.5.5 0 0 0 .854.354l2.647-2.646H12a2 2 0 0 0 2-2V1zm-1 0H3v9h2v3l3-3h5V1z" />
                            </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('reclamationscolarite') }}"
                                class="{{ Request::is('reclamationscolarite') ? 'active' : '' }}">Réclamations de scolarité</a>
                        </li>
                        <li class="p-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.05 1.05A2.48 2.48 0 0 1 2.5 1h11c1.1 0 2 .9 2 2v10a2.48 2.48 0 0 1-1.45 2.45 2.48 2.48 0 0 1-.55.05H2.5A2.48 2.48 0 0 1 1 13.5V2.5c0-.215.04-.42.05-.61zM1.5 2.8L8 8.5l6.5-5.7H1.5zm13.5 10.7v-.7L8 9.5 1.5 12v.7h13z" />
                            </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('demandescolarite') }}"
                                class="{{ Request::is('demandescolarite') ? 'active' : '' }}">Demandes de scolarité</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-10">
                <!-- Contenu principal -->
                @yield('contenu')
            </div>
        </div>
    </div>
</body>
</html>

@extends('admin.layouts.navbaradmin')

@section('contenu')
<div id="page-content" class="d-flex flex-column" style="margin-left: 250px; padding: 20px; margin-right: 10px; margin-top: -298px; padding: 40px;">
    <div class="d-flex justify-content-left">
        <a href="{{ route('dashboard') }}">
            <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px; color: #ffffff; margin-right: 20px;">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="color: #ffffff;">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                    </svg>
                    <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('dashboard') }}" style="color: #ede8e8; text-decoration: none;">Tableau de bord</a></h5>
                </div>
            </div>
        </a>

        <a href="{{ route('gestioncomptes') }}">
            <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px; color: #ffffff; margin-right: 20px;">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16" style="color: #ffffff;">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                    <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('gestioncomptes') }}" class="{{ Request::is('gestioncomptes') ? 'active' : '' }}" style="color: #ede8e8; text-decoration: none;">Gestion des comptes</a></h5>
                </div>
            </div>
        </a>

        <a href="{{ route('listetudiant') }}">
            <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px; color: #ffffff; margin-right: 20px;">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16" style="color: #ffffff;">
                        <path d="M5 6.5C5 7.328 4.328 8 3.5 8S2 7.328 2 6.5 2.672 5 3.5 5 5 5.672 5 6.5zm2 0C7 7.328 6.328 8 5.5 8S4 7.328 4 6.5 4.672 5 5.5 5 7 5.672 7 6.5zm4-2c0 .828-.672 1.5-1.5 1.5S8 5.328 8 4.5 8.672 3 9.5 3 11 3.672 11 4.5zm2.5 6c0 .828-.672 1.5-1.5 1.5S10.5 11.328 10.5 10.5 11.172 9 12 9s1.5.672 1.5 1.5zm-9 2c0 .828-.672 1.5-1.5 1.5S2 13.328 2 12.5 2.672 11 3.5 11 5 11.672 5 12.5zm7 1c0 .828-.672 1.5-1.5 1.5S9 14.328 9 13.5 9.672 12 10.5 12s1.5.672 1.5 1.5z"/>
                    </svg>
                    <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('listetudiant') }}" class="{{ Request::is('listetudiant') ? 'active' : '' }}" style="color: #ede8e8; text-decoration: none;">Liste des étudiants</a></h5>
                </div>
            </div>
        </a>

        <a href="{{ route('listPersonnel') }}">
            <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px; color: #ffffff; margin-right: 20px;">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16" style="color: #ffffff;">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm2-7c1.657 0 3-1.343 3-3S6.657 1 5 1 2 2.343 2 4s1.343 3 3 3zM7 8.5C7 9.328 6.328 10 5.5 10S4 9.328 4 8.5 4.672 7 5.5 7 7 7.672 7 8.5zm5-2c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z"/>
                    </svg>
                    <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('listPersonnel') }}" class="{{ Request::is('listPersonnel') ? 'active' : '' }}" style="color: #ede8e8; text-decoration: none;">Liste des enseignants</a></h5>
                </div>
            </div>
        </a>

        <a href="{{ route('reclamationscolarite') }}">
            <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px; color: #ffffff; margin-right: 20px;">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16" style="color: #ffffff;">
                        <path fill-rule="evenodd" d="M2.5 3a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-9zm0-1h9a1.5 1.5 0 0 1 1.5 1.5v7A1.5 1.5 0 0 1 11.5 12h-9A1.5 1.5 0 0 1 1 10.5v-7A1.5 1.5 0 0 1 2.5 2zm3 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                        <path d="M14 1a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h1v3a.5.5 0 0 0 .854.354l2.647-2.646H12a2 2 0 0 0 2-2V1zm-1 0H3v9h2v3l3-3h5V1z"/>
                    </svg>
                    <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('reclamationscolarite') }}" class="{{ Request::is('reclamationscolarite') ? 'active' : '' }}" style="color: #ede8e8; text-decoration: none;">Réclamations scolarité</a></h5>
                </div>
            </div>
        </a>

        <a href="{{ route('demandescolarite') }}">
            <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px; color: #ffffff; margin-right: 20px;">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16" style="color: #ffffff;">
                        <path fill-rule="evenodd" d="M1.05 1.05A2.48 2.48 0 0 1 2.5 1h11c1.1 0 2 .9 2 2v10a2.48 2.48 0 0 1-1.45 2.45 2.48 2.48 0 0 1-.55.05H2.5A2.48 2.48 0 0 1 1 13.5V2.5c0-.215.04-.42.05-.61zM1.5 2.8L8 8.5l6.5-5.7H1.5zm13.5 10.7v-.7L8 9.5 1.5 12v.7h13z"/>
                    </svg>
                    <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('demandescolarite') }}" class="{{ Request::is('demandescolarite') ? 'active' : '' }}" style="color: #ede8e8; text-decoration: none;">Demandes de scolarité</a></h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
