<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('Prof.layouts.navbarprof')
@section('contenu')




    <style>
        

        .btn-primary {
            background-color: #3966c2;
            width: 100px;
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
h3{
    font-size: 25px;
    font-weight: 700;
}
      

        /* Style pour les boutons cochés avec la couleur de fond verte */
    </style>

<div id="informations-personnelles-content" class="content" style="margin-left: -20px; margin-top:70px; overflow: hidden;">
    <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
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
    <form id="informations-personnelles" action="{{ route('enregistrer.cahier') }}" method="post">
        @csrf
        <div style="text-align: center;">
            <img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="25%">
            <h3 style=" padding:8px;">CAHIER DE TEXTES</h3>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Etablissement :</strong></h6>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="etablissement" name="etablissement" >
                            <option value="0: undefined" selected></option>
                            <option value="mohammadia" >Mohammadia</option>
                            <option value="essaouira" >Essaouira</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Cycle :</strong></h6>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="cycle" name="cycle" required>
                            <option value="0: undefined" selected></option>
                            <option value="CPI">Classes Préparatoires Intégrées</option>
                            <option value="Licence">Licence</option>
                            <option value="Ingénieur">Ingénieur</option>
                            <option value="Master">Master</option>
                        </select>
                    </div>
                    
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Filière :</strong></h6>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="filiere" name="filiere" >
                            <option value="0: undefined" selected></option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="date" class="form-label"><strong>Date Seance:</strong></label>
                    </div>
                    <div class="col-md-6 mt-3">
                        <input type="date" class="form-control" id="date" name="date_seance" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Groupe :</strong></h6>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="groupe" name="groupe" required>
                            <option value="0: undefined" selected></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Niveau :</strong></h6>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="niveau" name="niveau" >
                            <option value="0: undefined" selected></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <h6> <strong>Matière :</strong></h6>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="matiere" name="matiere" required>
                            <option value="0: undefined" selected></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="somme" class="form-label"><strong>Enseignant:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="somme" name="enseignant" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="N_passeport" class="form-label"><strong>Date depart:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" id="hd" name="hd" placeholder="De ... " required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="N_passeport" class="form-label"><strong>heure de fin:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" id="hf" name="hf" placeholder="à ... " required>
                    </div>
                </div>
            </div>
           
        </div>


        <div class="row mt-3">
            <div class="col-md-12">
                <label for="mode"><strong>Activités objectifs de la séance :</strong></label>
              
                </div>
                <div class="col-md-12">
                    <textarea name="activite" id="activite" class="form-control" rows="9"></textarea>
                </div>
                
            </div>
        

            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" id="modifier" name="modifier" class="btn btn-primary">Enregistrer</button>
            </div></div>
       
    </form>
</fieldset>
</div>
</div>

<script>
    var etablissementDropdown = document.getElementById("etablissement");
     var cycleDropdown = document.getElementById("cycle");
    
     var filiereDropdown = document.getElementById("filiere");
    
     var groupeDropdown = document.getElementById("groupe");
   
     var matiereDropdown = document.getElementById("matiere");
     var niveauDropdown = document.getElementById("niveau");
    
     var options = {
         "CPI": {
             "filieres": [""],
             "niveaux":["","1ère Année","2ème Année"],
             "groupes": ["","Groupe 1", "Groupe 2", "Groupe 3"],
             "matieres": ["","Matière 1", "Matière 2", "Matière 3"]
         },
         "Licence": {
             "filieres": ["","Maintenance Médicale", "Génie Industriel et Logistique Hospitalière", "Informatique Décisionnelle et e-Santé", "Sciences de Gestion", "Techniques de Laboratoires de Biologie Médicale", "Infirmier Polyvalent", "Infirmier en Anesthésie et Réanimation", "Infirmier en Instrumentalisation de Bloc Opératoire"],
             "niveaux":[""],
             "groupes": ["","Groupe A", "Groupe B", "Groupe C"],
             "matieres": ["","Mathématiques", "Physique", "Chimie"]
         },
         "Ingénieur": {
             "filieres": ["","Génie Biomédical", "Génie digital et intelligence Artificielle en santé", "Filière Ingénieur 3"],
             "niveaux":[""],
             "groupes": ["","Groupe X", "Groupe Y", "Groupe Z"],
             "matieres": ["","Informatique", "Électronique", "Mécanique"]
         },
         "Master": {
             "filieres": ["","Master en dispositifs médicaux et affaires réglementaires", "Master en Maintenance et Génie biomédical","Master en entreprenariat et Management Technologique"],
             "niveaux":[""],
             "groupes": ["","Groupe I", "Groupe II", "Groupe III"],
             "matieres": ["","Recherche Opérationnelle", "Machine Learning", "Big Data"]
         }
     };
 
     
     cycleDropdown.addEventListener("change", function() {
       
         filiereDropdown.innerHTML = "";
         groupeDropdown.innerHTML = "";
         matiereDropdown.innerHTML = "";
        niveauDropdown.innerHTML = "";
         
         var selectedCycle = this.value;
         var selectedOptions = options[selectedCycle];
         
         selectedOptions.filieres.forEach(function(filiere) {
             var option = document.createElement("option");
             option.text = filiere;
             filiereDropdown.add(option);
         });
         selectedOptions.groupes.forEach(function(groupe) {
             var option = document.createElement("option");
             option.text = groupe;
             groupeDropdown.add(option);
         });
         selectedOptions.matieres.forEach(function(matiere) {
             var option = document.createElement("option");
             option.text = matiere;
             matiereDropdown.add(option);
         });
         selectedOptions.niveaux.forEach(function(niveau) {
             var option = document.createElement("option");
             option.text = niveau;
            niveauDropdown.add(option);
         });
         
     });
    
    
 
 </script>
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.submit-btn');
        buttons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                const action = event.target.value;
                const form = document.getElementById('informations-personnelles');

                if (action === 'enregistrer_telecharger') {
                    form.action = "{{ route('telecharger.cahier') }}";
                } else if (action === 'enregistrer') {
                    form.action = "{{ route('enregistrer.cahier') }}";
                }
            });
        });
    });
</script>

 

@endsection