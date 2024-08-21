<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = [
        'id_project',
        'tipo',
        'recurso',
    ];

    // Relación uno a muchos
    public function proyecto()
    {
        return $this->belongsTo(Projects::class, 'id_project');
    }
}
