<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">


    <style>
       input :read-only{
        background-color: #ffffff;
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
tr{
    color: rgb(105, 101, 101)
}

    #boutonInformations:hover{
        background-color: #3966c2;
    border: 5px #3966c2;
    }
    #boutonCursus:hover{
        background-color: #3966c2;
    border: 5px #3966c2;
    }
        .th-color {
            background-color: #3966c2;
            color: rgb(255, 255, 255);
        }
        #renseignement-academique-bourse-content,
#renseignement-academique-baccalaureat-content,
#renseignement-academique-cursus-interne-content,
#renseignement-academique-cursus-externe-content,
#documents-content{
    display: none;
}

       

.content{
    background-color: #ffffff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2), 0 3px 3px rgba(0, 0, 0, 0.23); /* Ombre pour effet 3D */
     
        width: auto;
        margin-left: auto;
       
        margin-right: auto;
}

       

       p{
        font-size: 21px;
        font-weight: 700;
        color: #173165;
       }

        .suptech_sante_radio {
            margin-left: 0px;
        }

        @media (min-width: 768px) {

           
           

            .suptech_sante_radio {
                margin-left: 270px;
            }
        }
        .form-control:disabled, .form-control[readonly] {
    background-color: #ece8e8;
   
}
        
    </style>
@extends('etudiant.layouts.navbaretudiant')

@section('contenu')


   
    
    
       

  

 
   
   
    


               


    <!-- Formulaire pour les informations parents-->

   
   

    

    
    <div id="identifiants-etudiant-content" class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <p>Identifiants étudiant</p>
                    
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Code Apogee</label>
                                        <input type="text" class="form-control" id="id_etudiant" name="apogee" value="{{ $user->apogee ?? '' }}"readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Cycle</label>
                                        <input type="text" class="form-control" id="cycle" name="Cycle" value="{{ $cycle->cycle_intitule ?? '' }}" readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Code National de l'Etudiant(CNE)
                                            :</label>
                                            <input type="text" class="form-control" id="Code_National" name="Cne"
                                            value="{{ $user->CNE ?? '' }}" readonly>
                                    </div>
                                   
                                   

                                </div>
                                <div class="col-lg-6"> @if ($inscriptions->isNotEmpty())
                                    @foreach($inscriptions as $index => $inscriptions)
                                    <div class="form-group">
                                        <label for="inscriptions_num_annee_{{ $index }}">Date Inscription</label>
                                        <input class="form-control" type="text" id="inscriptions_num_annee_{{ $index }}" name="inscriptions_num_annee_{{ $index }}" value="{{ $inscriptions->num_annee }}" readonly>
                                    </div>@endforeach
                                  
                                    @endif
                                    @if ($filiere->isNotEmpty())
                                    @foreach($filiere as $index => $filiere)
                                    <div class="form-group">
                                        <label for="filiere_intitule_{{ $index }}">Filiére</label>
                                        <input class="form-control" type="text" id="filiere_intitule_{{ $index }}" name="filiere_intitule_{{ $index }}" value="{{ $filiere->intitule }}" readonly>
                                    </div> @endforeach
                                   
                                    @endif
                                    @if ($bourse->isNotEmpty())
                                    @foreach($bourse as $index => $bourse)
                                    <div class="form-group">
                                        <label for="bourse_taux_{{ $index }}">Pourcentage de bourse</label>
                                        <input class="form-control" type="text" id="bourse_taux_{{ $index }}" name="bourse_taux_{{ $index }}" value="{{ $bourse->taux_bourse }}" readonly>
                                    </div> @endforeach
                                   
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
        
        <!-- /# column -->
    </div>
    <!-- /# row -->
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <p>Renseignements étudiant</p>
                    
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Nom ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Naissance</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Date_naissance ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Lieu de Naissance</label>
                                        <input class="form-control" type="text" value="{{ $user->lieu_naissance ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Adresse ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->telephone ?? '' }}" readonly>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Prénom</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Prenom ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Sexe</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Sexe ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>CNI /N° Passeport (Pour les étrangers)
                                            :</label>
                                            <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->CNI ?? '' }}" readonly>
                                       
                                    </div>  @if ($pays->isNotEmpty())
                                    @foreach($pays as $index => $pays)
                                    <div class="form-group">
                                        <label for="pays_pays_{{ $index }}">Pays</label>
                                        <input type="text" class="form-control" id="pays_pays_{{ $index }}" name="pays_pays_{{ $index }}" value="{{ $pays->pays }}"  readonly>
                                       
                                    </div> @endforeach
                                  
                                    @endif
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Email ?? '' }}" readonly>
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
        
                            
               
        <!-- /# column -->
    </div>
    <!-- /# row -->

    <div id="identifiants-etudiant-content" class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <p>Informations Tuteur</p>
                    
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <form>
                            @if ($tuteur->isNotEmpty())
                            @foreach($tuteur as $index => $tuteur)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tuteur_nom_{{ $index }}">Nom Tuteur</label>
                                        <input type="text" class="form-control" id="tuteur_nom_{{ $index }}" name="tuteur_nom_{{ $index }}" value="{{ $tuteur->nom }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="profession_{{ $index }}">Profession Tuteur</label>
                                        <input type="text" class="form-control" id="profession_{{ $index }}" name="profession_{{ $index }}" value="{{ $tuteur->profession }}" readonly>
                                    </div>
                                   
                                   
                                    

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tel1_{{ $index }}">Téléphone Tuteur</label>
                                        <input type="text" class="form-control" id="tel1_{{ $index }}" name="tel1_{{ $index }}" value="{{ $tuteur->tel1 }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse_{{ $index }}">Adresse Tuteur</label>
                                        <input type="text" class="form-control" id="adresse_{{ $index }}" name="adresse_{{ $index }}" value="{{ $tuteur->adresse }}" readonly>
                                    </div>
                                  
                                   
                                    
                                </div>
                            </div>
                            @endforeach
                           
                            @endif
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
        
        <!-- /# column -->
    </div>
    <!--<div id="identifiants-etudiant-content" class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <p>Informations Baccalaureat</p>
                    
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <form>
                           
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Série Bac</label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label >Mention Bac</label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                   
                                   
                                    

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Etablissement Bac</label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                   
                                  
                                   
                                    
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
-->
    


    <script>
        const boutonInformations = document.getElementById('boutonInformations');
        const boutonCursus = document.getElementById('boutonCursus');
        
        
        boutonInformations.addEventListener('click', function() {

            
            document.querySelector('.etablissment-content').style.display = 'block';
            document.getElementById('identifiants-etudiant-content').style.display = 'block';
            document.getElementById('renseignements-etudiant-content').style.display = 'block';
            document.getElementById('informations-parents-content').style.display = 'block';
            
           
        
            
            document.getElementById('renseignement-academique-baccalaureat-content').style.display = 'none';
            document.getElementById('renseignement-academique-cursus-externe-content').style.display = 'none';
            

        });
        
       
        boutonCursus.addEventListener('click', function() {
    
    document.getElementById('renseignement-academique-baccalaureat-content').style.display = 'block';
    document.getElementById('renseignement-academique-cursus-externe-content').style.display = 'block';
    
    
    
    
    document.querySelector('.etablissment-content').style.display = 'none';
    document.getElementById('identifiants-etudiant-content').style.display = 'none';
    document.getElementById('renseignements-etudiant-content').style.display = 'none';
    document.getElementById('informations-parents-content').style.display = 'none';
   
    
    
});
</script>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profileImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection

    
