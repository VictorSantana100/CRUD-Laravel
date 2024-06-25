<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected  $fillable = [
        'primeiro_nome',
        'sobrenome',
        'num_celular',
        'email'
    ];

    public function vinculo(){
        return $this->HasOne(VinculoEmpregaticio::class, 'user_key');
    }
}
