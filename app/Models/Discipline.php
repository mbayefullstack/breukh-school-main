<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function code(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value,
            set: fn (string|null $value) => strtoupper($value),
        );
    }
}
