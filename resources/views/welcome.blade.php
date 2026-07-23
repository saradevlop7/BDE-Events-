<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant - BDE Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <h1 class="text-3xl font-bold text-green-700">
            Dashboard Étudiant 🎓
        </h1>

        <p class="mt-4 text-lg">
            Bonjour,
            <span class="font-semibold">
                {{ auth()->user()->name }}
            </span>
        </p>

        <p class="mt-2 text-gray-600">
            Rôle :
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                {{ auth()->user()->role }}
            </span>
        </p>

        <hr class="my-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <a href="{{ route('events.index') }}"
               class="bg-green-600 hover:bg-green-700 text-white text-center py-3 rounded-lg transition">
                📅 Voir les événements
            </a>

            <a href="#"
               class="bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-lg transition">
                🎫 Mes billets
            </a>

        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-8">
            @csrf

            <button
                type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg transition">
                Déconnexion
            </button>
        </form>

    </div>

</div>

</body>
</html>
