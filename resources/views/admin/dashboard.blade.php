<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | BDE Events</title>

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
            color: #fff;
            padding: 35px 20px;
            box-shadow: 5px 0 20px rgba(0, 0, 0, .2);
        }

        .logo {
            width: 90px;
            height: 90px;
            background: #fff;
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
            color: #fff;
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

        .content {
            margin-left: 290px;
            padding: 40px;
        }

        .topbar {
            background: #fff;
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
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 25px;
            font-weight: bold;
        }

        .btn-green:hover {
            background: #166534;
            color: white;
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
            🎓
        </div>

        <h2>BDE Events</h2>

        <a href="{{ route('admin.dashboard') }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('events.create') }}">
            ➕ Ajouter événement
        </a>

        <a href="{{ route('events.index') }}">
            📅 Tous les événements
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
                Gérez les événements et les réservations depuis votre espace administrateur.
            </p>

        </div>

        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card card-dashboard">
                    <h5>📅 Événements</h5>
                    <div class="stat">
                        {{ $events->count() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card card-dashboard">
                    <h5>👥 Étudiants</h5>
                    <div class="stat">
                        {{ \App\Models\User::where('role', 'student')->count() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card card-dashboard">
                    <h5>🎫 Réservations</h5>
                    <div class="stat">
                        {{ \App\Models\Reservation::count() }}
                    </div>
                </div>
            </div>

        </div>

        <div class="table-card">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="fw-bold text-success">
                    Liste des événements
                </h4>


                <a href="{{ route('events.create') }}" class="btn btn-green">
                    ➕ Ajouter un événement
                </a>

            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Prix</th>
                        <th>Places restantes</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>
                    @forelse($events as $event)
                        <tr>

                            <td>{{ $event->title }}</td>

                            <td>{{ $event->date }}</td>

                            <td>{{ $event->location }}</td>

                            <td>{{ $event->price }} DH</td>
                            <td>
                                {{ $event->capacity - $event->reservations->count() }}
                            </td>

                            <td>

                                <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">
                                    Modifier
                                </a>

                                <form action="{{ route('events.destroy', $event) }}" method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer cet événement ?')">

                                        Supprimer

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">
                                Aucun événement disponible.
                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>
