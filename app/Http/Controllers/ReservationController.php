<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Contact::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(Request $request)
    {
        // Valider les données et enregistrer la réservation
        // Rediriger avec un message de succès
    }

    public function edit($id)
    {
        $reservation = Contact::findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Contact::findOrFail($id);
        // Valider les données et mettre à jour la réservation
        // Rediriger avec un message de succès
    }

    public function destroy($id)
    {
        $reservation = Contact::findOrFail($id);
        // Supprimer la réservation
        // Rediriger avec un message de succès
    }
}
