<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicamentos extends Model
{
    use HasFactory;
    protected $fillable =['nombre','tipo_medicamento','fecha_caducidad'];

    public function recetas(): HasMany
    {
        return $this->hasMany(Receta::class);
    }
}
