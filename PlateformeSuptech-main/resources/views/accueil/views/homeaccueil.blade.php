<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">




<style>
    
   
        .custom-background:hover {
            background-color: #1858b1;
            transform: translateY(-5px);
        }
         .custom-background {
            background-color: #173165;
        }
       

        @media (max-width: 575.98px) {
      svg {
          width: 23px;
      }
      a {
          font-size: 9px;
      }
  }

  @media (min-width: 576px) and (max-width: 767.98px) {
      svg {
          width: 25px;
      }
      a {
          font-size: 11px;
      }
  }

  @media (min-width: 768px) and (max-width: 1023.98px) {
      svg {
          width: 28px;
      }
      a {
          font-size: 13px;
      }
  }

  @media (min-width: 1024px) and (max-width: 1440px) {
      svg {
          width: 35px;
      }
      a {
          font-size: 15px;
      }
  }

  @media (min-width: 1440px) and (max-width: 1919.98px) {
      svg {
          width: 45px;
      }
      a {
          font-size: 18px;
      }
      .card {
    width: 450px !important;
    margin-left: 30px !important;
  }
  }

  @media (min-width: 1920px) and (max-width: 2559.98px) {
    .card {
    width: 500px !important;
    margin-left: 30px !important;
  }
  }
  @media (min-width: 2560px) {
    .card {
    width: 600px !important;
    margin-left: 30px !important;
}

  }
    </style>

@extends('accueil.layouts.navbaracceuil')
    @section('contenu')

<div id="page-content" class="d-flex flex-column 
">
    <div class="d-flex justify-content-left">
       <a href="{{ route('absenceacceuil') }}"> <div class="card mb-3 mr-3 mt-4  custom-background" style="width: 300px;color:#ffffff; background-color:#173165; ">
            <!-- Contenu de la carte "Mon Profil" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16"style="color: #ede8e8" >
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('absenceacceuil') }}" style="color: #ede8e8; text-decoration:none;">Présence Ensiegnant</a></h5>
               
            </div>
         </div></a>
         <a href="{{ route('absence') }}" ><div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff; background-color:#173165;">
           
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16"  style="color: #ede8e8;">
                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-9 4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H4a.5.5 0 0 0-.5.5v1zm3.5-.5h1a.5.5 0 0 0 .5.5v1a.5.5 0 0 0-.5.5h-1a.5.5 0 0 0-.5-.5v-1a.5.5 0 0 0 .5-.5zm1.5-2.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1z"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('absence') }}"  style="color: #ffffff;text-decoration:none;">Emploi du Temps</a></h5>
                
            </div>
        </div></a>
        
                       
                          
            
          
    </div></div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection