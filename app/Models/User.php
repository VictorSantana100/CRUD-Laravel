<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected  $fillable = [
        'primeiro_nome',
        'sobrenome',
        'num_celular',
        'email'
    ];
}
