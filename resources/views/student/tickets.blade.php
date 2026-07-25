<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Billets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-success mb-4">
        🎫 Mes Billets
    </h2>

    @forelse($reservations as $reservation)

    <div class="card mb-3">

        <div class="card-body">

            <h4>{{ $reservation->event->title }}</h4>

            <p><strong>Date :</strong> {{ $reservation->event->date }}</p>

            <p><strong>Heure :</strong> {{ $reservation->event->time }}</p>

            <p><strong>Lieu :</strong> {{ $reservation->event->location }}</p>

            <p>
                <strong>Code :</strong>
                {{ $reservation->ticket_code }}
            </p>

        </div>

    </div>

    @empty

    <div class="alert alert-warning">
        Vous n'avez aucun billet.
    </div>

    @endforelse

</div>

</body>
</html>
