<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','correo','semestre','carrera_id'];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}

