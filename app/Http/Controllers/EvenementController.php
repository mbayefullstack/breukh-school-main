<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Participation;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Evenement::orderBy('date')->get();
        return $events;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Evenement::create([
            ...$request->validate([
                'titre'   => 'required|string',
                'date'      => 'required|date|after:today +1day',
                'description' => 'required|string',
            ]),
            'user_id'   => 1
            ]);
            return $event;
    }

    public function paticipation(Request $request, Evenement $evenement)
    {

        ['classes' =>$idClasses] = $request->validate([
            'classes'      => 'required|array'
        ]);
        foreach ($idClasses as $idClasse) {
            Participation::create([
                'classe_id'     => $idClasse,
                'evenement_id'  => $evenement->id
            ]);
        }
        return ['message'   => 'ok'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
