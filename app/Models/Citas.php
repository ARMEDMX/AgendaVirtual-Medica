<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Medicamentos;

class Citas extends Model
{
    use HasFactory;
    protected $fillable =['fecha','hora', 'medicos_id', 'pacientes_id'];

    public function medicos() 
    {
        return $this->belongsTo(Medicos::class, 'medicos_id');
    }

    public function pacientes() 
    {
        return $this->belongsTo(Pacientes::class, 'pacientes_id');
    }
    
    public function recetas() 
    {
        return $this->hasMany(Receta::class, 'citas_id');
    }
    
   

}
