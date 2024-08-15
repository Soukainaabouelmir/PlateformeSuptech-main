@extends('etudiant.layouts.navbaretudiant')

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

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Emploi du Temps</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Emploi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($emplois) && count($emplois) > 0)
                                    @foreach ($emplois as $emploi)
                                        <tr>
                                            <td>
                                                <a href="{{ asset($emploi->emploi_pdf) }}" target="_blank" class="btn" style="color: rgb(63, 63, 232)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16" style="color:rgb(63, 63, 232)">
                                                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                                                        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                                    </svg>
                                                    Télécharger
                                                </a>
                                            </td>
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

<script>
    $('#pdfModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var pdfUrl = button.data('pdf-url');
        var modal = $(this);
        modal.find('.modal-body iframe').attr('src', pdfUrl);
    });

    $('#pdfModal').on('hidden.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-body iframe').attr('src', '');
    });
</script>
@endsection
