<!DOCTYPE html>
<html>
<head>
    <title>Attestation d'inscription</title>
    <style>
        
    </style>
</head>
<body>
    <h1>Releve de Note</h1>
    <p>Nom de l'étudiant : {{ $demande->etudiant_nom }}</p>
    <p>Prénom de l'étudiant : {{ $demande->etudiant_prenom }}</p>
    <p>Description : {{ $demande->document_description }}</p>
</body>
</html>
