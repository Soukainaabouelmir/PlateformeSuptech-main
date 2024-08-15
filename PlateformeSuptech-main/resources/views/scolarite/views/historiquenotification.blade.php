<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 120px;" >
    
        
    <div class="container fixed-top-barre" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <form action="{{ route('hisroriqueprof.search') }}" method="GET" class="mb-3 fixed-top-barre"> <!-- Ajoutez la classe ici -->
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Rechercher un étudiant...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="background-color:#173165;">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th class="th-color border" scope="col">Enseignant</th>
            <th class="th-color border" scope="col">Cycle</th>
            <th class="th-color border" scope="col">Filiére</th>
            <th class="th-color border" scope="col">Groupe</th>
            <th class="th-color border" scope="col">Niveau</th>
            <th class="th-color border" scope="col">Matiére</th>
            
            <th class="th-color border" scope="col">Horaire</th>
            <th class="th-color border" scope="col">Date</th>
            <th class="th-color border" scope="col">Activités</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($seances as $seance)
        <tr>
            <td class="border">{{ $seance->nom_enseignant }}</td>
            <td class="border">{{ $seance->Cycle }}</td>
            <td class="border">{{ $seance->Filiere }}</td>
            <td class="border">{{ $seance->Groupe}}</td>
            <td class="border">{{ $seance->Niveau }}</td>
            <td class="border">{{ $seance->Matiere }}</td>
            <td class="border">{{ $seance->horaire }}</td>
            <td class="border">{{ $seance->Date }}</td>
           <td class="border">{{ $seance->Activites }}</td>
           
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection