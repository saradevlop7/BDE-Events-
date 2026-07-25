<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un événement</title>
<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Dashboard</title>

</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">

    <h1 class="text-3xl font-bold text-green-700 mb-6">
        ➕ Créer un événement
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Titre</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4" required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block font-semibold">Date</label>
                <input type="date" name="date" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-semibold">Heure</label>
                <input type="time" name="time" class="w-full border rounded p-2" required>
            </div>

        </div>

        <div class="mt-4">
            <label class="block font-semibold">Lieu</label>
            <input type="text" name="location" class="w-full border rounded p-2" required>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">

            <div>
                <label class="block font-semibold">Prix</label>
                <input type="number" step="0.01" name="price" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-semibold">Capacité</label>
                <input type="number" name="capacity" class="w-full border rounded p-2" required>
            </div>

        </div>

        <button
            type="submit"
            class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
            Enregistrer
        </button>

    </form>

</div>


</body>
</html>

