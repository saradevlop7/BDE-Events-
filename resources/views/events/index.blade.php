<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des événements</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="text-success">
                📅 Liste des événements
            </h2>

            @auth
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('events.create') }}" class="btn btn-success">
                        + Nouvel événement
                    </a>
                @endif
            @endauth

        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-hover bg-white">

            <thead class="table-success">

                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Lieu</th>
                    <th>Prix</th>
                    <th>Capacité</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($events as $event)
                    <tr>

                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->time }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->price }} DH</td>
                        <td>{{ $event->capacity }}</td>

                        <td>

                            @if (auth()->user()->role == 'student')
                                <form action="{{ route('reservations.store', $event) }}" method="POST">

                                    @csrf

                                    <button type="submit" class="btn btn-primary btn-sm">
                                        S'inscrire
                                    </button>

                                </form>
                            @else
                                <span class="text-muted">Admin</span>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">
                            Aucun événement disponible.
                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</body>

</html>
