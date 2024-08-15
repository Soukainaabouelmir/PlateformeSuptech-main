<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        .month-btn {
            background-color: rgb(210, 9, 9);
            
            color: white;
            
            width: 100px;
        }
.modal {
    width: auto;
}
        .month-btn:not(:disabled):not(.disabled).active {
            background-color: #4CAF50;
        }


        .btn-primary {
            background-color: #3966c2;
            width: 100px;
        }

        .month-btn {
            margin: 5px;
        }

        .btn-close {
            background-color: #3966c2;
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
            background-color: #3966c2
        }

        .camera-button {

            background-color: transparent;
            border: none;

        }
        @media (min-width: 320px) {
    .modal{
        height:500px;
        /* Rétablir la largeur maximale pour les écrans plus grands */
    }
    
}

.modal{
    height: 700px;
}
#boutonInformations, #boutonCursus{
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
#historique-paiement-content{
    display: none;
}
.content{
   
    border: 2px ;
       padding: 5px;
       
     height: auto;
     width: auto;
}
.month-btninternat:not(:disabled):not(.disabled).active {
            background-color: #4CAF50;
        }
        .btn-group-toggle {
            display: flex;
            width: 100%;
            flex-wrap: wrap; /* Assure que les éléments restent sur une seule ligne */
            overflow-x: auto; /* Ajoute une barre de défilement horizontale si nécessaire */
            padding: 10px; /* Espacement intérieur */
            gap: 10px; /* Espace entre les boutons */
        }
       
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                  
                    
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <form id="informations-personnelles" action="{{ route('enpaiement') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                    
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" class="form-control" id="Email" name="apogee" value="{{ $user->apogee ?? '' }}" readonly>
                                <div class="form-group">
                                    <label>Nom De l'etudiant</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->Nom ?? '' }} {{ $user->Prenom ?? '' }}" readonly>
                                </div>
                               
                                
                                <input type="hidden" id="filiere" name="id_filiere" value="{{ $filiere->id_filiere }}">
                                <div class="form-group">
                                    <label>Date Paiement</label>
                                    <input type="date" class="form-control" id="date_paiement" name="date_paiement" required>
                                </div>
                                <div class="form-group">
                                    <label for="mode"><strong>Mode de règlement Scolaire:</strong></label>
                                    <div class="mode-reglement_radio d-flex justify-content-start">
                                        <label class="mr-3">
                                            <input type="radio" name="id_modepaiement" value="1">
                                            Espèces
                                        </label>
                                        <label class="mr-3">
                                            <input type="radio" name="id_modepaiement" value="2">
                                            Chèque
                                        </label>
                                        <label>
                                            <input type="radio" name="id_modepaiement" value="3">
                                            Virement
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                
                                
                                <div class="form-group">
                                    <label>La Somme totale :</label>
                                    <input type="number" class="form-control" id="montant" name="montant" value="" required>
                                </div>
                              
                                <div class="form-group">
                                    <label>Choix</label>
                                    <select id="type_frais" class="form-control" name="id_typepaiement">
                                        <option value="1">Ecole</option>
                                        <option value="2">Internat</option>
                                        <option value="4">Transport</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputFile" class="camera-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-camera-fill ml-2" viewBox="0 0 16 16" style="color: #173165">
                                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M4.5 3a1 1 0 0 0-.8.4L2.7 5H1a1 1 0 0 0-1 1v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a1 1 0 0 0-1-1h-1.7l-1-1.6a1 1 0 0 0-.8-.4h-7ZM8 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                        </svg>
                                        Choisir un fichier
                                        <input type="file" class="form-control-file" id="inputFile" name="image">
                                    </label>
                                </div>
                               
                            </div>
                            <h5>Ecole</h5>
                            <div class="col-md-12">
                                <label>Reste à payer</label>
                                <input type="text" class="form-control" id="resteAPayer" name="resteAPayer" value="{{ $resteAPayer }}" readonly>
                            </div>
                            <div class="btn-group-toggle" data-toggle="buttons">
                               
                                @foreach (['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Septembre', 'Octobre', 'Novembre', 'Decembre'] as $mois)
                                    <label class="btn btn-outline-secondary month-btn {{ in_array($mois, $paidMonths) ? 'disabled bg-success' : '' }}">
                                        <input type="checkbox" class="month-checkbox" value="{{ $mois }}" name="mois_concerne[ecole][]" {{ in_array($mois, $paidMonths) ? 'checked disabled' : '' }}> {{ $mois }}
                                    </label>
                                @endforeach
                            </div>
                            <h5>Internat</h5>
                            <div class="col-md-12">
                            <label>Reste à payer (Internat)</label>
                            <input type="text" class="form-control" id="resteAPayerInternat" name="resteAPayerInternat" value="{{ $resteAPayerInternat }}" readonly>
                            </div>
                            <div class="btn-group-toggle" data-toggle="buttons">
                               
                                @foreach (['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Septembre', 'Octobre', 'Novembre', 'Decembre'] as $mois)
                                    <label class="btn btn-outline-secondary month-btn {{ in_array($mois, $paidMonthsInternat) ? 'disabled bg-success' : '' }}" data-type="internat">
                                        <input type="checkbox" class="month-checkbox monthinternat-btn" value="{{ $mois }}" name="mois_concerne[internat][]" {{ in_array($mois, $paidMonthsInternat) ? 'checked disabled' : '' }}> {{ $mois }}
                                    </label>
                                @endforeach
                            </div>
                            <h5>Transport</h5>
                            <div class="col-md-12">
                                    <label>Reste à payer (Transport)</label>
                                   
                                    <input type="text" class="form-control" id="resteAPayerTransport" name="resteAPayerTransport" value="{{$resteAPayerTransport}}" readonly>
                                </div>
                            <div class="btn-group-toggle" data-toggle="buttons">
                                
                                @foreach (['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Septembre', 'Octobre', 'Novembre', 'Decembre'] as $mois)
                                    <label class="btn btn-outline-secondary month-btn {{ in_array($mois, $paidMonthsTransport) ? 'disabled bg-success' : '' }}" data-type="transport">
                                        <input type="checkbox" class="month-checkbox" value="{{ $mois }}" name="mois_concerne[transport][]" {{ in_array($mois, $paidMonthsTransport) ? 'checked disabled' : '' }}> {{ $mois }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #173165; width:100%;">Payer</button>
                    </form>
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
        
                            
               
        <!-- /# column -->
    </div>                          
                              
                                   
    
               



    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>


  
       
               
                
               
              
              
                     
              
                
              
     

<script>
   document.querySelectorAll('.month-btn').forEach(button => {
    button.addEventListener('click', function() {
        const month = this.getAttribute('data-month');
    });
});

const monthButtons = document.querySelectorAll('.month-btn');

monthButtons.forEach(button => {
    button.addEventListener('click', () => {
        const isActive = button.classList.contains('active');
        if (isActive) {
            button.classList.remove('active');
        } else {
            button.classList.add('active');
        }
    });
});

function enregistrerPaiement() {
    var moisSelectionnesEcole = [];
    var moisSelectionnesInternat = [];
    var moisSelectionnesTransport = [];

    $('.month-checkbox:checked').each(function() {
        var type = $(this).closest('.month-btn').data('type');
        if (type === 'ecole') {
            moisSelectionnesEcole.push($(this).val());
        } else if (type === 'internat') {
            moisSelectionnesInternat.push($(this).val());
        } else if (type === 'transport') {
            moisSelectionnesTransport.push($(this).val());
        }
    });

    $.ajax({
        type: 'POST',
        url: '{{ route('enpaiement') }}', 
        data: {
            mois_concerne_ecole: moisSelectionnesEcole,
            mois_concerne_internat: moisSelectionnesInternat,
            mois_concerne_transport: moisSelectionnesTransport,
        },
        success: function(response) {
            alert('Mois enregistrés avec succès!');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


</script>
<script>
    $('#savebtn').on('click', function() {
        $('#informations-personnelles').submit();
    });
</script>
@endsection