<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
    protected $fillable = [
        'tipo','descricao','valor','imagem','publicado'
    ];
}
