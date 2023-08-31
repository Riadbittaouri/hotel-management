<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reservations = Contact::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'date1' => 'required|date',
            'date2' => 'required|date|after:date1',
            'subject' => 'required',
        ]);

        // Créer une nouvelle réservation
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'date1' => $request->input('date1'),
            'date2' => $request->input('date2'),
            'subject' => $request->input('subject'),
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function edit($id)
    {
        $reservation = Contact::find($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'date1' => 'required|date',
            'date2' => 'required|date|after:date1',
            'subject' => 'required',
        ]);

        // Mettre à jour la réservation
        $reservation = Contact::find($id);
        $reservation->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'date1' => $request->input('date1'),
            'date2' => $request->input('date2'),
            'subject' => $request->input('subject'),
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Contact::find($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
