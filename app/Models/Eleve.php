<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Eleve extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nom',
        'prenom',
        'lieu_naissance',
        'date_naissance',
        'profil',
        'sexe'
    ];

    public function __construct()
    {
        // $this->getIds();
        
        $this->numero = $this->getNewNumber();
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }

    // protected function numero(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (int|null $value) => $value,
    //         set: fn (int|null $value) => $value+10,
    //     );
    // }

    public function getNewNumber()
    {
        // $takenNumbers = Eleve::orderBy('numero')->get('numero')->toArray();
        $takenNumbers = DB::table('eleves')->where('etat',1)->orderBy('numero')->get('numero')->toArray();
        // dd($takenNumbers);
        $n = count($takenNumbers);
        for ($i=0; $i < $n; $i++) { 
            if ($takenNumbers[$i]->numero!=$i+1) {
                return $i+1;
            }
        }
        return $n+1;
    }
    //
   public function scopeChangeEtat(Builder $query,array $idEleves,bool $value)
   {
    return $query->whereIn('id', $idEleves)->update(array('etat' => $value));
   }
}
