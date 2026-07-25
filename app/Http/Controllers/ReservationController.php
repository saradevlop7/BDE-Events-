<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Réserver un événement
    public function store(Event $event)
    {
        // Vérifier si l'étudiant est déjà inscrit
        $exists = Reservation::where('user_id', auth()->id())
            ->where('event_id', $event->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Vous êtes déjà inscrit à cet événement.');
        }

        // Vérifier la capacité
        if ($event->reservations()->count() >= $event->capacity) {
            return back()->with('error', 'Cet événement est complet.');
        }

        // Créer la réservation
        Reservation::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'ticket_code' => 'BDE-2026-' . rand(10000,99999),
        ]);

        return back()->with('success', 'Réservation effectuée avec succès.');
    }

    // Mes billets
    public function myTickets()
    {
        $reservations = Reservation::where('user_id', auth()->id())
            ->with('event')
            ->get();

        return view('student.tickets', compact('reservations'));
    }
}
