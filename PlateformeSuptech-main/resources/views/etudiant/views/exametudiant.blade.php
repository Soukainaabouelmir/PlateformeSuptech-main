<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
  
  @section('contenu')

  <style>
 

 .card {
     
   
      background-color: #f8f9fa;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    .card-title {
      color: #102f6d;
      font-size: 22px;
  
  font-weight: 700;
    }
    
    .card-subtitle {
      font-size: 12px;
    }
    
    
    
  
    


    
    </style>
    

    <div class="container">
      @if(isset($message))
          <div class="alert alert-info">{{ $message }}</div>
      @endif
  
      @if(isset($exams) && $exams->isNotEmpty())
          @foreach($exams as $exam)
              <div class="card mb-3" id="myCard">
                  <div class="card-body">
                      <p class="card-title">{{ $exam->element->intitule }}</p>
                      <h6 class="card-subtitle mb-2 text-muted"><strong>Date Exam:</strong> {{ $exam->date_exam }}</h6>
                      <h6 class="card-subtitle mb-2 text-muted"><strong>Heure Exam:</strong> {{ $exam->heure_exam }}</h6>
                      <span class="card-text">Chers étudiant(e), un rappel : un examen est prévu à la date et à l'heure indiquées. Assurez-vous d'être présents et prêts à temps. Bonne chance à tous !</span>
                  </div>
              </div>
          @endforeach
      @else
          <div class="alert alert-info">No exams found.</div>
      @endif
  </div>
  
    

  
  



  @endsection