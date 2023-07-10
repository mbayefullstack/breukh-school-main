<?php

namespace App\Http\Controllers;

use App\Http\Resources\NiveauxResource;
use App\Models\Niveaux;
use Illuminate\Http\Request;

class NiveauxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveaux = Niveaux::all();
        $niveaux->load('classes');
        return NiveauxResource::collection($niveaux);
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
