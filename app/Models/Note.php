<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Note extends Model
{  protected $guarded=[];
    use HasFactory;

    function inscription() :BelongsTo {
        return $this->belongsTo(Inscription::class);
    }
}
