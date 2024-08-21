<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = [
        'id_project',
        'id_user',
        'tarea',
        'fecha_fin',
        'descripcion',
    ];

    // Relación uno a muchos
    public function proyecto()
    {
        return $this->belongsTo(Projects::class, 'id_project');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
