<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce extends Model
{
    /** @use HasFactory<\Database\Factories\CeFactory> */
    use HasFactory;
    protected $table = 'ccee';

    public function alumnos()
    {
        return $this->BelongsToMany(Alumno::class, 'notas', 'ce_id', 'alumno_id')->withPivot('nota');
    }
}
