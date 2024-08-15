<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('RH.layouts.navbarrh')
   
 
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
        display: flex;
        justify-content: center;
        padding: 20px;
    }
    
}

/* For screens between 321px and 375px */
@media screen and (min-width: 321px) and (max-width: 375px) {
    /* Adjust the margin and padding for smaller screens */
    #page-content {
        display: flex;
        justify-content: center;
        padding: 30px;
    }
}

/* For screens between 376px and 425px */
@media screen and (min-width: 376px) and (max-width: 425px) {
    /* Adjust the margin and padding for smaller screens */
    #page-content {
        display: flex;
            justify-content: center;
        padding: 40px;
    }
}


@media screen and (min-width: 426px) and (max-width: 768px) {
    
    #page-content {
        display: flex;
        justify-content: center;
        padding: 50px;
    }
}


@media screen and (min-width: 769px) and (max-width: 1024px) {
   
    #page-content {
        display: flex;
            justify-content: center;
        padding: 60px;
        
    }
}


@media screen and (min-width: 1025px) and (max-width: 1440px) {
 
    #page-content {
        display: flex;
        justify-content: center;
        overflow-x: hidden;
    }
}


@media screen and (min-width: 1441px) and (max-width: 2560px) {
    
    #page-content {
        display: flex;
            justify-content: center;
        padding: 80px;
        
    }
}


@media screen and (max-width: 2560px) {
   
    #page-content {
        display: flex;
            justify-content: center;
            padding: 90px;
    }
   
}


    </style>

<div id="page-content" class="d-flex flex-column" style=" 
margin-top:30px; padding: 40px;">
    <div class="d-flex justify-content-left">
      
       

       <a href="{{route('dashboardrh')}}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
          
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="color:#ffffff;">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"><a href="{{route('dashboardrh')}}" class="{{ Request::is('emploi') ? 'active' : '' }}" style="color: #ede8e8;text-decoration:none;">Tableau de bord</a></h5>
               
            </div>
        </div></a>

        <a href="{{ route('listPersonnel') }}"> <div class="card mb-3 mr-3 mt-4  custom-background" style="width: 300px;color:#ffffff; margin-right: 20px;"style="color: #ffffff;">
           
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16"  style="color: #ffffff;">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('listPersonnel') }}" style="color: #ede8e8; text-decoration:none;"> Liste Personnel</a></h5>
                
            </div>
         </div></a>
      
      
    </div>
   

          
    </div>

    
      
                    








@endsection

