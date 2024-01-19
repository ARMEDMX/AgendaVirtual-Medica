<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Especialidades;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Medicos extends Model
{
    use HasFactory;
    protected $fillable =['nombre','apellidop','apellidom', 'users_id', 'especialidades_id'];

    public function users() 
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function especialidades() 
    {
        return $this->belongsTo(Especialidades::class, 'especialidades_id');
    }

    public function citas(): HasMany
    {
        return $this->has(Citas::class, 'medicos_id');
    }

    
}
