<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold">Bienvenue sur le Dashboard 🎉</h1>

        <p class="mt-4">
            Bonjour, {{ auth()->user()->name }}
        </p>

        <form action="/logout" method="POST" class="mt-6">
            @csrf
            <button class="bg-red-600 text-white px-4 py-2 rounded">
                Déconnexion
            </button>
        </form>
    </div>

</body>

</html>
