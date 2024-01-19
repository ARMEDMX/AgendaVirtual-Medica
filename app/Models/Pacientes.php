<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pacientes extends Model
{
    use HasFactory;
    protected $fillable =['nombre','apellidop','apellidom','genero','fechanac','email', 'users_id'];

    public function users() 
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function citas(): HasMany
    {
        return $this->has(Citas::class, 'pacientes_id');
    }
}
