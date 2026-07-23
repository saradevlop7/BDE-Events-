<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {

            background: linear-gradient(135deg, #14532d, #16a34a, #4ade80);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

    

        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #166534, #22c55e);
            color: white;
            padding: 35px 20px;
            box-shadow: 5px 0 20px rgba(0, 0, 0, .2);
        }

        .logo {
            width: 90px;
            height: 90px;
            background: white;
            color: #16a34a;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            margin: auto;
            margin-bottom: 20px;
        }

        .sidebar h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 12px;
            transition: .3s;
            font-size: 17px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, .2);
            transform: translateX(8px);
        }

        /* Content */

        .content {
            margin-left: 290px;
            padding: 40px;
        }

        .topbar {
            background: white;
            border-radius: 20px;
            padding: 25px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
            margin-bottom: 30px;
        }

        .topbar h3 {
            color: #166534;
            font-weight: bold;
        }

        .card-dashboard {
            border: none;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            transition: .3s;
        }

        .card-dashboard:hover {
            transform: translateY(-8px);
        }

        .stat {
            font-size: 42px;
            color: #16a34a;
            font-weight: bold;
        }

        .btn-green {
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 25px;
            font-weight: bold;
        }

        .btn-green:hover {
            background: #166534;
            color: white;
        }

        .btn-danger {
            border-radius: 12px;
            font-weight: bold;
        }

        .table-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-top: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .table thead {
            background: #16a34a;
            color: white;
        }

        .table tbody tr:hover {
            background: #f3fff7;
        }
    </style>

</head>

<body>

    <div class="sidebar">

        <div class="logo">
            🎉
        </div>

        <h2>BDE Events</h2>

        <a href="{{ route('admin.dashboard') }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('events.index') }}">
            📅 Gestion des événements
        </a>

        <a href="{{ route('events.create') }}">
            ➕ Ajouter un événement
        </a>

        <hr>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-danger w-100">
                Déconnexion
            </button>

        </form>

    </div>

    <div class="content">

        <div class="topbar">

            <h3>
                Bonjour {{ auth()->user()->name }} 👋
            </h3>

            <p class="text-muted mb-0">
                Bienvenue dans votre espace d'administration BDE Events.
                Gérez facilement les événements du campus.
            </p>

        </div>

        <div class="row">

            <div class="col-md-4 mb-4">

                <div class="card card-dashboard">

                    <h5>📅 Total Événements</h5>

                    <div class="stat">
                        0
                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card card-dashboard">

                    <h5>🎫 Réservations</h5>

                    <div class="stat">
                        0
                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card card-dashboard">

                    <h5>🎓 Étudiants</h5>

                    <div class="stat">
                        0
                    </div>

                </div>

            </div>

        </div>

        <div class="table-card">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="fw-bold text-success">
                    Gestion des événements
                </h4>

                <a href="{{ route('events.create') }}" class="btn btn-green">
                    ➕ Nouvel événement
                </a>

            </div>

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Titre</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Prix</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td colspan="5" class="text-center text-muted py-4">

                            Aucun événement disponible.

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>
