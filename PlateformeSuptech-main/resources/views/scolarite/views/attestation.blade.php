<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Attestation d'inscription</title>
    <style>
        body {
            font-family: "Playfair Display", serif;
            font-optical-sizing: auto;
            font-style: normal;
            background-color: #ffffff;
            color: #333;
        }
        .container {
            background: #fff;
        }
        .logo {
            display: block;
            margin: 0 auto;
            width: 30%;
        }
        h2 {
            text-align: center;
            color: #000000;
            margin-top: 50px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .highlight {
            font-weight: bold;
            color: #000000;
        }
        .extra-margin {
            margin-bottom: 20px; /* Custom margin for specific paragraphs */
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Attestation d'inscription</h2>
        <p class="extra-margin">Le groupe Ecoles SUPTECH atteste par la présente que:</p>
        <p><span class="highlight extra-margin">Nom de l'étudiant : </span>{{ $demande->etudiant_nom }} {{ $demande->etudiant_prenom }}</p>
        <p class="extra-margin extra-margin"><span class="highlight">Date de naissance : </span>{{ $demande->etudiant_date_naissance }}</p>
        <p><span class="highlight extra-margin">Adresse : </span>{{ $demande->etudiant_adresse }}</p>
        <p class="extra-margin"><span>Est inscrit(e) à SUPTECH en tant qu'étudiant(e) en:</p>
        <p><span class="highlight extra-margin">Filière : </span>{{ $demande->filiere_intitule }}</p>
        <p><span class="highlight extra-margin">Durée de la formation : </span>{{ $demande->filiere_duree }}</p>
        <p class="extra-margin"><span class="highlight">Pour l'année 2024-2025</p>
        <p>Cette attestation est délivrée à demande de <span class="highlight">{{ $demande->etudiant_nom }} {{ $demande->etudiant_prenom }} </span>Pour servir et valoir ce que de droit.</p>
    </div>
</body>
</html>
