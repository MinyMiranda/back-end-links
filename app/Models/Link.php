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

     /**
     * Retorna Links cadastrados juntamente com os links de redirecionamento filhos
     *  
     * @return \App\Link
     */
    public static function getAllLinks()
    {
        return Link::with('redirect')->get();
    }

     /**
     * Retorna Redirects relacionadas a url enviada
     *  
     * @return \App\Link
     */
    public static function getLink($url)
    {
        $link=Link::firstWhere('url',$url);
        if(isset($link)){
            return $link->redirect()->get();
        }
        return $link;
    }
}
