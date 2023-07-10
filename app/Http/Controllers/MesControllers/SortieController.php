<?php

namespace App\Http\Controllers\MesControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Eleve;
use App\Models\Note;

use App\Models\Ponderation;
use Illuminate\Http\Request;

class SortieController extends Controller
{
    public function getOut(Request $request)
    {
        $ids = $request->ids;
        // dd($ids);
        Eleve::whereIn('id',$ids)->update(['etat'=> 0]);
        return[
            'message'=>'bap'
        ];
    }

    public function insertNote(Request $request, $class_id,$discipline_id,$evaluation_id){
    $pond_datas = Ponderation::where(['classe_id'=>$class_id,'discipline_id'=>$discipline_id,'evaluation_id'=>$evaluation_id,'semestre_id'=>1,'annee_scolaire_id'=>1])->first();
  //  dd($pond);
    $max = $pond_datas->valeur;
    $notes = $request->datas;
    $les_notes=[];
    $invalid_notes=[];
    foreach($notes as $note){
        if($note['note_value']<0  || $note['note_value']> $max){
            $invalid_notes[]=$note;
            //return 'La note ne peut pas etre inferieure a zero ou a la note maximale ';

        }
        else{
            $les_notes[]= ['valeur'=>$note['note_value'],'ponderation_id'=>$pond_datas['id'], 'inscription_id'=>$note['inscrip_id']];

        }

    }
    
    $inserted = Note::insert($les_notes);
    

     return response()->json($invalid_notes);


    }

    public function AfficherNote(Request $request ,$class_id,$discipline_id,$evaluation_id){
        $ponderation= Ponderation::where(['discipline_id'=>$discipline_id, 'evaluation_id'=>$evaluation_id, 'annee_scolaire_id'=>1, 'semestre_id'=>1,'classe_id'=>$class_id])->first();
     $notes= Note::where(['ponderation_id'=>$ponderation->id])->get();
        return NoteResource::collection($notes);
    }
}
