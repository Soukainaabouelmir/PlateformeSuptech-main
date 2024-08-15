<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
   

   .container{
    background-color: #ffffff;
    margin-top:20px;
    border-radius: 9px;
        /* Bordure pour l'effet de cadre */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.23);
   }

    .form-control {
        border-radius: 5px;
        border: 1px solid #cccccc;
        padding: 10px;
       
        font-size: 14px;
    }

    .button-enregistrer {
        width: 100%;
        padding: 10px;
        background-color: #173165;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button-enregistrer:hover {
        background-color: #0d3d82;
        color: #ffffff;
    }

    .file-upload-btn {
        background-color: #ffffff;
        border: 1px solid #cccccc;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .camera-icon {
        margin-right: 10px;
    }

    .alert {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
        font-size: 14px;
    }
</style>

<div id="reclamation" class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <ul>
        @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>
    <form action="{{route('enreclamation') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="gh" name="apogee" value="{{ $user->apogee ?? '' }}">
       
        <div class="row">
            <div class="col-md-6">
                <h6>Nom</h6>
                <input class="form-control" type="text" placeholder="Votre nom" name="Nom" value="{{ $user->Nom ?? '' }}" readonly>
            </div>
            <div class="col-md-6">
                <h6>Prénom</h6>
                <input class="form-control" type="text" placeholder="Votre prénom" name="Prenom" value="{{ $user->Prenom ?? '' }}" readonly>
            </div>
        </div>

        <div class="row">
            <input type="hidden" id="filiere" name="id_filiere" value="{{ $filiere->id_filiere }}">
            <div class="col-md-6">
                <h6>Type de réclamation :</h6>
                <select class="form-control" name="type_reclamation" required>
                    <option value="Réclamation d'internat">Réclamation d'internat</option>
                    <option value="Réclamation suptech">Réclamation Suptech</option>
                    <option value="Réclamation transport">Réclamation Transport</option>
                </select>
            </div>
            <div class="col-md-6">
                <h6>Description :</h6>
                <textarea class="form-control" rows="8" name="description"></textarea>
            </div>
        </div>

        

        <div class="row">
            <div class="col-md-12">
                <h6>Sélectionner un fichier :</h6>
                <label for="file-reclamation" class="file-upload-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" class="bi bi-camera-fill camera-icon" viewBox="0 0 16 16">
                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                    </svg>
                    <input type="file" id="file-reclamation" name="file_reclamation" class="file-input">
                   
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button class="btn button-enregistrer">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
@endsection
