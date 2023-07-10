<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semestres = Semestre::orderBy('libelle')->get();
        return $semestres;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $semestre = Semestre::create(
            $request->validate([
                'libelle'       => 'required|string|unique:semestres,libelle'
            ])
        );
        return $semestre;
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
