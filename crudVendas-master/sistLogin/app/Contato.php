<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function lista()
    {
        return (object) [
            'nome'=>'Cristina',
            'tel'=>'21 2134-6789'
        ];
    }
}
