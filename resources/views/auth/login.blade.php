<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDE-Events | Connexion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#166534,#22c55e);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Segoe UI,Tahoma,Geneva,Verdana,sans-serif;
        }

        .login-card{
            width:900px;
            max-width:95%;
            border:none;
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 20px 50px rgba(0,0,0,.25);
        }

        .left-side{
            background:linear-gradient(180deg,#15803d,#22c55e);
            color:white;
            padding:60px 40px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }

        .left-side h1{
            font-weight:bold;
            font-size:42px;
        }

        .left-side p{
            opacity:.9;
            text-align:center;
        }

        .right-side{
            padding:50px;
            background:white;
        }

        .form-control{
            border-radius:12px;
            padding:12px;
        }

        .btn-login{
            background:#16a34a;
            color:white;
            border-radius:12px;
            padding:12px;
            font-weight:bold;
            transition:.3s;
        }

        .btn-login:hover{
            background:#166534;
            color:white;
        }

        .logo{
            width:90px;
            height:90px;
            border-radius:50%;
            background:white;
            color:#16a34a;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:40px;
            margin-bottom:20px;
        }
    </style>

</head>

<body>

<div class="card login-card">

    <div class="row g-0">

        <div class="col-md-5 left-side">

            <div class="logo">
                🎉
            </div>

            <h1>BDE Events</h1>

            <p class="mt-3">
                Gérez les événements du campus,
                les réservations et les billets
                depuis une seule plateforme.
            </p>

        </div>

        <div class="col-md-7 right-side">

            <h2 class="fw-bold mb-4 text-success">
                Connexion
            </h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Entrer votre email"
                        required>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Mot de passe
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Entrer votre mot de passe"
                        required>

                </div>

                <button class="btn btn-login w-100">
                    Se connecter
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>
