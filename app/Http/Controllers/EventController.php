<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Afficher tous les événements
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    // Afficher le formulaire
    public function create()
    {
        return view('events.create');
    }

    // Enregistrer un événement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|integer|min:1',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Événement créé avec succès.');
    }

    // Afficher un événement
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Formulaire de modification
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    // Modifier un événement
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|integer|min:1',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Événement modifié avec succès.');
    }

    // Supprimer un événement
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Événement supprimé avec succès.');
    }
    // Dashboard étudiant

    public function dashboard()
    {
        $events = Event::all();

        return view('student.dashboard', compact('events'));
    }
    // Dashboard Admin
    public function adminDashboard()
    {
        $events = Event::latest()->get();

        return view('admin.dashboard', compact('events'));
    }
}
