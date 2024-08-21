<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = [
        'nombre',
        'id_gerente',
        'fecha_fin',
        'telefono',
        'descripcion',
    ];

    // Relación uno a muchos
    public function tareas()
    {
        return $this->hasMany(Tareas::class, 'id_project');
    }

    public function recursos()
    {
        return $this->hasMany(Recursos::class, 'id_project');
    }

    public function riesgos()
    {
        return $this->hasMany(Riesgos::class, 'id_project');
    }

    public function gerente()
    {
        return $this->belongsTo(User::class, 'id_gerente');
    }
}
