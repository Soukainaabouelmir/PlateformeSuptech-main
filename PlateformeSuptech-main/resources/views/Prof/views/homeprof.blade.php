<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('prof.layouts.navbarprof')
   
 
@section('contenu')


    <style>
        .custom-background:hover{
background-color:#1858b1;
        transform: translateY(-5px);
        }
        .custom-background{
            background-color:#173165;
        } 
        
/* For screens smaller than 320px */
@media screen and (max-width: 320px) {
    /* Adjust the margin and padding for smaller screens */
    #page-content {
        margin-left: 10px;
        margin-right: 10px;
        padding: 20px;
    }
}

/* For screens between 321px and 375px */
@media screen and (min-width: 321px) and (max-width: 375px) {
    /* Adjust the margin and padding for smaller screens */
    #page-content {
        margin-left: 20px;
        margin-right: 20px;
        padding: 30px;
    }
}

/* For screens between 376px and 425px */
@media screen and (min-width: 376px) and (max-width: 425px) {
    /* Adjust the margin and padding for smaller screens */
    #page-content {
        margin-left: 30px;
        margin-right: 30px;
        padding: 40px;
    }
}

/* For screens between 426px and 768px */
@media screen and (min-width: 426px) and (max-width: 768px) {
    /* Adjust the margin and padding for medium screens */
    #page-content {
        margin-left: 50px;
        margin-right: 50px;
        padding: 50px;
    }
}

/* For screens between 769px and 1024px */
@media screen and (min-width: 769px) and (max-width: 1024px) {
    /* Adjust the margin and padding for medium screens */
    #page-content {
        margin-left: 100px;
        margin-right: 100px;
        padding: 60px;
        
    }
}

/* For screens between 1025px and 1440px */
@media screen and (min-width: 1025px) and (max-width: 1440px) {
    /* Adjust the margin and padding for large screens */
    #page-content {
        margin-left: 150px;
        margin-right: 150px;
        padding: 70px;
        overflow-x: hidden;
    }
}

/* For screens between 1441px and 2560px */
@media screen and (min-width: 1441px) and (max-width: 2560px) {
    /* Adjust the margin and padding for extra large screens */
    #page-content {
        margin-left: 200px;
        margin-right: 200px;
        padding: 80px;
        
    }
}

/* For screens larger than 2560px */
@media screen and (min-width: 2561px) {
    /* Adjust the margin and padding for extra large screens */
    #page-content {
        margin-left: 250px;
        margin-right: 250px;
        padding: 90px;
    }
   
}


    </style>

<div id="page-content" class="d-flex flex-column" style="margin-left: 250px; padding: 20px;
margin-right:10px;margin-top:30px; padding: 40px;
">
    <div class="d-flex justify-content-left">
       <a href="{{ route('PresenceEtudiant') }}"> <div class="card mb-3 mr-3 mt-4  custom-background" style="width: 300px;color:#ffffff; margin-right: 20px;"style="color: #ffffff;">
            <!-- Contenu de la carte "Mon Profil" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16"style="color: #ffffff;">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('PresenceEtudiant') }}" style="color: #ede8e8; text-decoration:none;">Présence</a></h5>
                
            </div>
         </div></a>

       <a href="{{route('cahiertextprof')}}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
            <!-- Contenu de la carte "Emploi du temps" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16" style="color: #ffffff;">
                    <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"><a href="{{route('cahiertextprof')}}" class="{{ Request::is('emploi') ? 'active' : '' }}" style="color: #ede8e8;text-decoration:none;">Cahier De Texte</a></h5>
               
            </div>
        </div></a>
        
       <a href="{{route('historiqueprof')}}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
            <!-- Contenu de la carte "Mes Réclamations" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16" style="color: #ffffff;">
                    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8">  <a href="{{route('historiqueprof')}}" class="{{ Request::is('reclamation') ? 'active' : '' }}" style="color: #ede8e8;text-decoration:none;">Historique</a></h5>
                
            </div>
        </div></a>
    </div>
    <div class="d-flex justify-content-left mt-2">
     

        
        <a href="{{ route('noteetudiants') }}" ><div class="card mb-3 mr-3 custom-background" style="width: 280px;color:#ffffff;margin-right: 20px;">
             <!-- Contenu de la carte "Mes Demandes" -->
             <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16"  style="color: #ede8e8"><!-- ce lien pour icon mes notes-->
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                  </svg>
                 <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('noteetudiants') }}" class="{{ Request::is('exam') ? 'active' : '' }}" style="color: #ede8e8;text-decoration:none;">  Notes</a></h5>
                
             </div>
         </div></a></div>

          
    </div>

    
      
                    








@endsection

