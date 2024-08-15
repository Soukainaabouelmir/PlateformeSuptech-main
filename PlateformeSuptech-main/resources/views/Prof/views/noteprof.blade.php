<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('prof.layouts.navbarprof')
@section('contenu')


               
     
    
        
               


   
           
<style>
    
    /* Styles personnalisés */
   form {
        margin-top: 200px; /* Espacement par rapport au haut */
       
    }

    h6 {
        margin-bottom: 0.6rem; /* Espacement entre les éléments */
    }

    /* Cadre autour du formulaire */
    
.buttton-suivant{
    background-color:#173165;
    width: 100%;
}

</style>

<div class="container" style="margin-left: 180px; margin-top:-50px; ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <form action="{{ route('etudiants') }}" method="GET">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Etablissement :</h6>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="etablissement" name="etablissement" >
                                <option value="0: undefined" selected></option>
                                <option value="MOHAMMEDIA" >MOHAMMEDIA</option>
                                <option value="ESSAOUIRA" >ESSAOUIRA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Cycle :</h6>
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
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Filière :</h6>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="filiere" name="filiere" >
                                <option value="0: undefined" selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Niveau :</h6>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="niveau" name="niveau" >
                                <option value="0: undefined" selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Groupe :</h6>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="groupe" name="groupe" required>
                                <option value="0: undefined" selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Matière :</h6>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="matiere" name="matiere" required>
                                <option value="0: undefined" selected></option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary buttton-suivant" type="submit">Suivant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
            "filieres": ["","Master en dispositifs médicaux et affaires réglementaires", "Master en Maintenance et Génie biomédical","Entrepreneuriat et Management Technologique"],
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
   
   
w
</script>


     


   



@endsection