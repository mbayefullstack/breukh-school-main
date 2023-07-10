<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClasseResource;
use App\Http\Resources\PonderationResource;
use App\Models\Classe;
use App\Models\Ponderation;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes =  Classe::with('niveau')->get();
        // $classes->load('niveau');
        return ClasseResource::collection($classes);
    }

    public function indexCoef(string $id)
    {
        $ponderations = Ponderation::where('classe_id',$id)->get();
        return PonderationResource::collection($ponderations);
    }

    public function storeCoef(Request $request, string $id)
    {
        // $ponderation = Ponderation::create($request->validate([]));
        $ponderation = Ponderation::create([
            ...$request->validate([
                "discipline_id"     => "required|integer|exists:disciplines,id",
                "evaluation_id"     => "required|integer|exists:evaluations,id",
                "valeur"            => "required"
            ]),
            "annee_scolaire_id"     => 1,
            "semestre_id"           => 1,
            "classe_id"             => $id,
        ]);
        
        return new PonderationResource($ponderation);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
