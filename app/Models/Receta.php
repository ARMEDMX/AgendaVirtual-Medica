<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicamentos;
use App\Models\Citas;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receta extends Model
{
    use HasFactory;
    protected $fillable =['citas_id','medicamentos_id','dosis','frecuencia','duracion','viaadmin'];

    public function medicamentos() 
    {
        return $this->belongsTo(Medicamentos::class, 'medicamentos_id');
    }

    public function citas()
    {
        return $this->belongsTo(Citas::class, 'citas_id');
    }
}
