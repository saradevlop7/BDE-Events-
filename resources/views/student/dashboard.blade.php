<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant | BDE Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
        body{
            background:linear-gradient(135deg,#14532d,#16a34a,#4ade80);
            min-height:100vh;
            font-family:Segoe UI,sans-serif;
        }
        .sidebar{
            width:270px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:linear-gradient(180deg,#166534,#22c55e);
            color:#fff;
            padding:35px 20px;
        }
        .logo{
            width:90px;
            height:90px;
            background:#fff;
            color:#16a34a;
            border-radius:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:40px;
            margin:auto auto 20px;
        }
        .sidebar h2{
            text-align:center;
            margin-bottom:40px;
        }
        .sidebar a{
            display:block;
            color:#fff;
            text-decoration:none;
            padding:14px;
            border-radius:10px;
            margin-bottom:10px;
        }
        .sidebar a:hover{
            background:rgba(255,255,255,.2);
        }
        .content{
            margin-left:290px;
            padding:40px;
        }
        .topbar,.table-card,.card-dashboard{
            background:#fff;
            border-radius:20px;
            padding:25px;
            box-shadow:0 10px 25px rgba(0,0,0,.1);
        }
        .table-card{
            margin-top:30px;
        }
        .card-dashboard{
            text-align:center;
        }
        .stat{
            font-size:40px;
            color:#16a34a;
            font-weight:bold;
        }
    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo">🎓</div>

    <h2>BDE Events</h2>

    <a href="{{ route('student.dashboard') }}">🏠 Dashboard</a>

    <a href="{{ route('events.index') }}">📅 Événements</a>

    <a href="{{ route('tickets.index') }}">🎫 Mes Billets</a>

    <hr>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger w-100">Déconnexion</button>
    </form>

</div>

<div class="content">

    <div class="topbar">
        <h3 class="text-success">
            Bonjour {{ auth()->user()->name }} 👋
        </h3>

        <p>
            Bienvenue dans votre espace étudiant.
        </p>
    </div>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card-dashboard">
                <h5>📅 Événements</h5>
                <div class="stat">{{ $events->count() }}</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-dashboard">
                <h5>🎫 Mes Billets</h5>
                <div class="stat">{{ auth()->user()->reservations->count() }}</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-dashboard">
                <h5>⭐ Réservations</h5>
                <div class="stat">{{ auth()->user()->reservations->count() }}</div>
            </div>
        </div>

    </div>

    <div class="table-card">

        <h4 class="text-success mb-4">
            Événements disponibles
        </h4>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered">

            <thead class="table-success">
                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Prix</th>
                    <th>Action</th>
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
                            <form action="{{ route('reservations.store',$event) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    S'inscrire
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
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
