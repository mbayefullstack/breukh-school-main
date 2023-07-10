<?php

namespace App\Http\Controllers;

use App\Http\Resources\InscriptionResource;
use App\Models\Eleve;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DB::beginTransaction();
        // dd($takenNumbers = DB::table('eleves')->orderBy('numero')->get('numero')->toArray());
        $eleve = Eleve::create([
            ...$request->validate([
                'date_naissance'      => 'sometimes|date|before:today -4years',
            ]),
            'nom'               => $request->nom,
            'prenom'            => $request->prenom,
            'lieu_naissance'    => $request->lieu_naissance,
            // 'date_naissance'    => $request->date_naissance,
            'profil'            => $request->profil,
            'sexe'              => $request->sexe,
        ]);
        //
        $inscription = Inscription::create([
            'eleve_id'          => $eleve->id,
            'date'              => Now(),
            'classe_id'         => $request->classe_id,
            'annee_scolaire_id' => 1

        ]);
        return new InscriptionResource($inscription);
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

    public function sortie(Request $request)
    {
        ['eleves_id'=>$idEleves] = $request->validate([
            'eleves_id'     => 'required|array'
        ]);
        // Eleve::whereIn('id', $idEleves)->update(array('etat' => 1));
        Eleve::changeEtat($idEleves,0);
        return ['message'=>'ok'];
    }
}
