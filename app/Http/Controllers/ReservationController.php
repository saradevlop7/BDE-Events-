<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{

    // Inscription étudiant à un événement
    public function store(Event $event)
    {

        // Vérifier capacité
        if ($event->reservations()->count() >= $event->capacity) {

            return back()->with('error',
                'Cet événement est complet.'
            );
        }


        // Empêcher double réservation
        $exists = Reservation::where('user_id', auth()->id())
            ->where('event_id', $event->id)
            ->exists();


        if ($exists) {

            return back()->with('error',
                'Vous êtes déjà inscrit à cet événement.'
            );

        }


        // Création réservation avec ticket unique
        Reservation::create([

            'user_id' => auth()->id(),

            'event_id' => $event->id,

            'ticket_code' => 'BDE-2026-' . strtoupper(Str::random(5))

        ]);


        return back()->with('success',
            'Inscription réussie ! Votre billet est disponible.'
        );

    }



    // Afficher mes billets
    public function myTickets()
    {

        $reservations = Reservation::where('user_id', auth()->id())
            ->with('event')
            ->get();


        return view('student.tickets',
            compact('reservations')
        );

    }

}
