@extends('scolarite.layouts.navbarscolarite')

@section('contenu')

<!DOCTYPE html>
<html>
<head>
    
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        #calendar {
            max-width: 900px;
            max-height: 600px;
            margin: 40px auto;
            padding: 0 10px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .fc-toolbar {
            background-color: #0b3d71;
            color: white;
            border-radius: 8px 8px 0 0;
            padding: 10px;
        }

        .fc-toolbar-title {
            font-size: 24px;
            font-weight: bold;
        }

        .fc-button-group .fc-button {
            background-color: #0b3766;
            border: none;
            color: white;
        }

        .fc-button-group .fc-button:hover {
            background-color: #0b3766;
        }

        .fc-button-primary:not(:disabled).fc-button-active {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .fc-view-container {
            padding: 20px;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #092b4f;
            color: white;
            border-radius: 10px 10px 0 0;
            border: #092b4f;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        @media (max-width: 768px) {
            #calendar {
                margin: 20px auto;
                padding: 0 5px;
            }
        }
    </style>
</head>
<body>
    <div id="calendar"></div>

    <!-- Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm" method="POST" action="{{ route('storeEvent') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputField1">Filiere</label>
                            <select name="id_element" id="inputField1" class="form-control">
                                @foreach ($elements as $element)
                                    <option value="{{ $element->id_element }}">{{ $element->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputField2">Groupe</label>
                            <select class="form-control" name="N_Groupe" id="inputField2">
                                <option value="1">GR1</option>
                                <option value="2">GR2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputField3">Prof</label>
                            <select class="form-control" name="id_prof" id="inputField3">
                                @foreach ($professors as $professor)
                                    <option value="{{ $professor->id_personnel }}">{{ $professor->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputField4">Date</label>
                            <input type="date" class="form-control" id="inputField4" name="id_date">
                        </div>
                        <div class="form-group">
                            <label for="inputField5">Heure Début</label>
                            <select name="heure_debut" id="inputField5" class="form-control">
                                @foreach ($heure_debuts as $heure_debut)
                                    <option value="{{ $heure_debut->id_heure_debut }}">{{ $heure_debut->heure_debut }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputField6">Heure Fin</label>
                            <select name="heure_fin" id="inputField6" class="form-control">
                                @foreach ($heure_fins as $heure_fin)
                                    <option value="{{ $heure_fin->id_heure_fin }}">{{ $heure_fin->heure_fin }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputField7">Salle</label>
                            <select name="salle" id="inputField7" class="form-control">
                                @foreach ($salles as $salle)
                                    <option value="{{ $salle->id_salle }}">{{ $salle->num_salle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="startTime" name="startTime">
                        <input type="hidden" id="endTime" name="endTime">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="eventForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                selectable: true,
                events: '/save-calendar', // URL to fetch events from
                select: function(info) {
                    // Set the start and end date/time in the form
                    $('#startTime').val(info.startStr);
                    $('#endTime').val(info.endStr);
                    $('#eventModal').modal('show');
                }
            });

            calendar.render();
        });
    </script>

</body>
</html>

@endsection
