<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des événements</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

<div class="max-w-6xl mx-auto mt-10">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-green-700">
            📅 Liste des événements
        </h1>

        <a href="{{ route('events.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">
            + Nouvel événement
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-green-600 text-white">

                <tr>
                    <th class="p-3">Titre</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Heure</th>
                    <th class="p-3">Lieu</th>
                    <th class="p-3">Prix</th>
                    <th class="p-3">Capacité</th>
                </tr>

            </thead>

            <tbody>

                @forelse($events as $event)

                    <tr class="border-b text-center">

                        <td class="p-3">{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->time }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->price }} DH</td>
                        <td>{{ $event->capacity }}</td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-5 text-center text-gray-500">
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
