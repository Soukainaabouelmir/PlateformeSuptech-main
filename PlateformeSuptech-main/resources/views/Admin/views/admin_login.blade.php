<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .custom-background {
            background-color: #173165;
        }
        .custom-rounded {
            border-radius: 25px;
        }
        .text-color {
            color: #ffffff; /* White text */
        }
        .background-color {
            background-color: #3966c2;
            border: #3966c2;
        }
        .text-size {
            font-size: 25px;
        }
        .img-logo {
            max-width: 300px;
            height: auto;
            display: block;
            margin: 20px auto 80px; /* Centered vertically and adjusted margin */
        }
        .card {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px; /* Default max-width for medium screens */
            height: auto; /* Adjusted height */
            padding: 20px; /* Added padding for better spacing */
        }
        .card-header {
            padding: 15px 0;
        }
        .form-control {
            border-radius: 5px;
        }
        button[type="submit"] {
            border-radius: 5px;
            margin-top: 20px;
            padding: 12px;
            font-size: 18px;
        }
        @media (min-width: 576px) {
            .card {
                max-width: 90%; /* Adjusted max-width for smaller tablets */
            }
        }
        @media (min-width: 768px) {
            .card {
                max-width: 600px; /* Default max-width for tablets */
            }
        }
        @media (min-width: 786px) {
            .card {
                max-width: 800px; /* Adjusted max-width for screens wider than 786px */
            }
        }
        @media (min-width: 992px) {
            .card {
                max-width: 1000px; /* Adjusted max-width for desktops */
            }
        }
        @media (min-width: 1200px) {
            .card {
                max-width: 1000px; /* Adjusted max-width for larger desktops */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <img class="img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo">
                <div class="card custom-background custom-rounded p-3 mt-3">
                    <div class="card-header custom-background text-size text-color text-center"><strong>Connexion</strong></div>
                    <div class="card-body">
                        <form id="loginForm" action="{{ route('login.admin.submit') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nom-d'utilisateur" class="text-color">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="nom-d'utilisateur" placeholder="Entrer votre Nom" name="nom_utilisateur" value="{{ old('nom_utilisateur') }}" required autocomplete="nom_utilisateur" autofocus>
                                @error('nom_utilisateur')
                                    <span role="alert" style="color: rgb(236, 42, 42); font-size:12px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-color">Mot de Passe</label>
                                <input type="password" name="mot_pass" class="form-control" id="password" placeholder="Entrer votre Mot de passe" required autocomplete="current-password">
                                @error('mot_pass')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100 background-color text-color">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
