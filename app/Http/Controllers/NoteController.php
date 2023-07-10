<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Discipline;
use App\Models\Evaluation;
use App\Models\Ponderation;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request, Classe $classe, Discipline $discipline, Evaluation $eval)
    {
        //Recuperer la ponderation
        $ponderation = Ponderation::where('annee_scolaire_id',1)
                        ->where('discipline_id',$discipline->id)
                        ->where('classe_id',$classe->id)
                        ->where('evaluation_id',$eval->id)
                        ->where('semestre_id',1)->first();
        if(!$ponderation){
            abort(404,'Resource not found!');
        }
        //
        ['data' =>$data] = $request->validate([
            'data'      => 'required|array'
        ]);
        //
        $noteInvalides = [];
        foreach ($data as $d) {
            ['inscription_id'=>$idIns,'valeur'=>$note] = $d;
            if($note < 0 || $note > $ponderation->valeur){
                $noteInvalides[] = $d;
            }else{
                //Insertion
            }
        }
        //
        if(!empty($noteInvalides)){
            return [
                'data'=>$noteInvalides,
                'message'   => 'Ces notes ne sont pas ajoutées car elles sont invalides, la note max est : '.$ponderation->valeur
            ];
        }
        return [
            'message'   => 'ok'
        ];
        
    }
}
