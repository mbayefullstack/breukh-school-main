<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evenement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function participations(): HasMany   
    {
        return $this->hasMany(Participation::class);
    }
}
