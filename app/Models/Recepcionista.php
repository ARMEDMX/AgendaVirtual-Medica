<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Recepcionista extends Model
{
    use HasFactory;
    protected $fillable =['nombre','apellidop','apellidom', 'users_id'];

    public function users() 
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
