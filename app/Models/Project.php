<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_creacion',
        'activo',
        'user_id', // Relación con el usuario que crea el proyecto
    ];

    /**
     * Relación con el usuario que creó el proyecto.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
