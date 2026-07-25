<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier événement</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="mb-4 text-success">
            Modifier un événement
            
        </h2>


        <form action="{{ route('events.update',$event) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="title" class="form-control" value="{{ $event->title }}">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $event->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ $event->date }}">
            </div>

            <div class="mb-3">
                <label>Heure</label>
                <input type="time" name="time" class="form-control" value="{{ $event->time }}">
            </div>

            <div class="mb-3">
                <label>Lieu</label>
                <input type="text" name="location" class="form-control" value="{{ $event->location }}">
            </div>

            <div class="mb-3">
                <label>Prix</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $event->price }}">
            </div>

            <div class="mb-3">
                <label>Capacité</label>
                <input type="number" name="capacity" class="form-control" value="{{ $event->capacity }}">
            </div>

            <button class="btn btn-success">
                Mettre à jour
            </button>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                Retour
            </a>

        </form>

    </div>

</div>

</body>
</html>
