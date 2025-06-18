<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;
    protected $fillable = ['nombre'];

    public function ccee()
    {
        return $this->BelongsToMany(Ce::class, 'notas', 'alumno_id', 'ce_id')->withPivot('nota');
    }
}
