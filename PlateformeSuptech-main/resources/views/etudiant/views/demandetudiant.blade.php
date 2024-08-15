<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<link href="{{ asset('asset/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
    .container {
        
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        border: 2px ; /* Bordure pour l'effet de cadre */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.23); /* Ombre pour effet 3D */
     
        width: auto;
        margin-left: auto;
       
        margin-right: auto;
        transform: perspective(1000px) rotateX(1deg) rotateY(1deg); /* Effet de transformation 3D */
    }
input{
    background-color: #8f8f8f;
   
}
    h6 {
        color: #173165;
        margin-bottom: 10px;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 8px;
        margin-bottom: 20px;
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
    }

    @media (max-width: 320px) {
        #demande {
            padding: 20px;
        }
        .form-control {
            padding: 6px;
        }
    }

    @media (min-width: 375px) {
        #demande {
            max-width: 80%;
        }
    }

    @media (min-width: 425px) {
        #demande {
            max-width: 90%;
        }
    }

    @media (min-width: 768px) {
        #demande {
            max-width: 600px;
        }
    }

    @media (min-width: 1440px) {
        #demande {
            max-width: 900px;
        }
    }

    @media (min-width: 1024px) {
        #demande {
            max-width: 800px;
        }
    }

    @media (width: 2560px) {
        #demande {
            max-width: 1700px;
            height: 500px;
            margin-left: -80px;
            margin-top: 120px;
        }
        .button-enregistrer {
            margin-top: 40px;
        }
        form {
            margin-top: 10px;
            margin: 20px;
            padding: 30px;
        }
    }

    @media (width: 1920px) {
        .container {
            max-width: 1700px;
            margin-left: 20px;
        }
        img {
            width: 150px;
        }
    }

    #boutonInformations, #boutonCursus {
        background-color: #173165;
        color: white;
        text-align: center;
        text-decoration: none;
        padding: 5px;
        font-size: 17px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        border: 5px #173165;
        transition-duration: 0.4s;
    }

    #historique-demande-content {
        display: none;
    }
</style>

<div class="container" id="informations-demande-content" style=" margin-top: 30px;">
    
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

    
        <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Informations Demande</strong></legend>
        <form action="{{ route('endemande') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input class="form-control" type="hidden" name="apogee" value="{{ $user->apogee ?? '' }}" readonly>
                </div>
            </div>
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
                <div class="col-md-6">
                    <h6>Date:</h6>
                    <input class="form-control" type="date" name="date_demande">
                </div>
                <input type="hidden" id="filiere" name="id_filiere" value="{{ $filiere->id_filiere }}">
                <div class="col-md-6">
                    <h6>Type de demande :</h6>
                    <select class="form-control" name="id_document">
                        <option value="1">Attestation Inscription</option>
                        <option value="2">Relevé de Note</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <button class="btn button-enregistrer">Enregistrer</button>
                </div>
            </div>
        </form>
    
        
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
   
</script>

@endsection
