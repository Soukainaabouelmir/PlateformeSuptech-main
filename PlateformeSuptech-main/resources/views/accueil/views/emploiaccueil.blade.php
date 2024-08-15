<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('accueil.layouts.navbaracceuil')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
@section('contenu')
<style>
    .card-header {
        font-size: 21px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: #173165;
    }

    th {
        color: #173165;
    }

    @media (min-width: 2065px) {
        .card {
            width: 1800px;
            margin-left: -500px;
            margin-top: 80px; 
        }
    }
    @media (min-width: 2028px) {
        .card {
            width: 1200px;
            margin-left: 10px;
            margin-top: 80px; 
        }
    }
</style>

<div class="container" style="margin-left: 240px; margin-top:90px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Emploi du Temps</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Filiére</th>
                                    <th>Semestre</th>
                                    <th>Emploi du temps</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($emplois) && count($emplois) > 0)
                                    @foreach ($emplois as $emploi)
                                        <tr>
                                            <td>{{ $emploi->semestre }}</td>
                                            
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16" style="color:rgb(63, 63, 232)">
                                                    <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                                                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                                </svg>
                                                <a href="{{ asset($emploi->emploi_pdf) }}" target="_blank" class="btn " style="color: rgb(63, 63, 232)">Télécharger</a>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">Aucun emploi du temps trouvé.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

