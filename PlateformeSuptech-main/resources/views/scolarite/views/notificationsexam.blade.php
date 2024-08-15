<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    <title>Responsive Form</title>
    <style>
        #modifier {
            background-color: #173165;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            width: 100%;
            height: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        #modifier:hover {
            background-color: #3966c2;
        }

        .container {
            max-width: 100%;
            padding: 0 15px;
        }

        img {
            width: 100%;
            max-width: 130px;
        }

        h3 {
            font-size: 25px;
            font-weight: 700;
        }

        /* Form Container Styles */
        #reclamation {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 2px;
            background-color: #fff;
            transform: perspective(1000px) rotateX(1deg);
            transition: transform 0.3s ease;
        }

        /* Responsive Styles */
        @media (min-width: 2560px) {
            .container {
                max-width: 2600px;
            }
        }

       
        @media (max-width: 768px) {
            #informations-personnelles-content {
                margin-left: 0;
                margin-top: 20px;
            }

            .row > div {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    @extends('scolarite.layouts.navbarscolarite')

    @section('contenu')
    <div id="informations-personnelles-content" class="content" style="margin-top: 40px;">
        <div class="content">
            <div id="reclamation" class="container">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('exams.store') }}" method="POST">
                    @csrf
                   
                   
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_filiere"><strong>Filiere:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <select name="id_filiere" id="id_filiere" class="form-control">
                                        @foreach($filieres as $filiere)
                                            <option value="{{ $filiere->id_filiere }}">{{ $filiere->intitule }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_element"><strong>Matière:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <select name="id_element" id="id_element" class="form-control">
                                        @foreach($elements as $element)
                                            <option value="{{ $element->id_element }}">{{ $element->intitule }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date_exam" class="form-label"><strong>Date Exam:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="date_exam" id="date_exam" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="heure_exam" class="form-label"><strong>Heure Exam:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control" name="heure_exam" id="heure_exam" placeholder="De ... à ...." required>
                                </div>
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
    @endsection
</body>
</html>
