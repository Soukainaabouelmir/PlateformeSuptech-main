<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .custom-background {
        background-color: #173165;


    }

    .card {
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        /* Adjust values as needed */
    }

    .text-color {
        color: aliceblue
    }

    .background-color {
        background-color: #3966c2;
        border: #3966c2;
    }

    .custom-rounded {
        border-radius: 25px;
    }

    .text-size {
        font-size: 25px;
    }
</style>

<body class=" text-color">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <img class="m-0 p-0 mt-0 img-logo mx-auto d-block" src="{{ asset('asset/images/logo.webp') }}"
                    alt="suptech logo" width="55%">

                <div class="card custom-background custom-rounded p-3">
                    <div class="card-header custom-background text-size text-color text-center">
                        <strong>Connexion</strong></div>
                    <div class="card-body">
                        <form id="loginForm" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom-d'utilisateur" class="text-color">Nom d'utilisateur</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-color">Mot de Passe</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit"
                                class="btn btn-primary w-100 background-color text-color">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<!-- resources/views/login.blade.php -->
