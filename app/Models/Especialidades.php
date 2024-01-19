<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especialidades extends Model
{
    use HasFactory;
    protected $fillable =['especialidad'];

    public function medicos(): HasMany
    {
        return $this->has(Medicos::class);
    }
}
