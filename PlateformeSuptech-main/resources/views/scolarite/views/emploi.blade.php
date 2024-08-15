<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('scolarite.layouts.navbarscolarite')

<style>
    #modifier {
        background-color: #173165;
        color: rgb(255, 255, 255);
        border: none;
       
        width: 100%;
        height: 40px;
    }

    #modifier:hover {
        background-color: #3966c2;
    }

    @media (width: 2560px) {
        .container {
            max-width: 2600px;
        }
    }

    h3 {
        font-size: 25px;
        font-weight: 700;
    }

    @media (width: 1920px) {
        .content {
            margin-left: -20px;
        }
        img {
            width: 130px;
        }
    }

    .form-container {
        background-color: white;
        border-radius: 2px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: perspective(1000px) rotateX(0deg) rotateY(0deg) rotateZ(0deg);
    }
</style>

@section('contenu')
<div id="informations-personnelles-content" class="content" style="margin-top:40px;">
    <div class="content">
        <div id="reclamation" class="container form-container">
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

            <form action="{{ route('emploi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    
                   
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_filiere"><strong>Filiere:</strong></label>
                            <select name="id_filiere" id="id_filiere" class="form-control">
                                <option value=""></option>
                                @foreach ($filieres as $filiere)
                                    <option value="{{ $filiere->id_filiere }}">{{ $filiere->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_filiere"><strong>Etablissement:</strong></label>
                            <select name="code_postal" id="etablissement" class="form-control">
                                <option value=""></option>
                                <option value="28630">MOHAMMEDIA</option>
                                <option value="44003">ESSAOUIRA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="emploi_pdf"><strong>Emploi du temps (PDF)</strong></label>
                            <input type="file" name="emploi_pdf" id="emploi_pdf" class="form-control" accept=".pdf">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" id="modifier" name="enregistrer" class="btn btn-primary">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection