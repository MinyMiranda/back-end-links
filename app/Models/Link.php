<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Redirect;
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

     /**
     * Relacionamento com os links de redirecionamento
     * 
     */
    public function redirect()
    {
        return $this->hasMany(Redirect::class);
    }
}
