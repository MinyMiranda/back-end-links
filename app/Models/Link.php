<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model 
{

    /**
     * Atributos que podem ser atribuídos em massa
     *
     * @var array
     */
    protected $fillable = [
        'url'
    ];
}
