<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Link;

class Redirect extends Model
{
    /**
     * Atributos que podem ser atribuídos em massa
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'count',
        'link_id',
    ];

    /**
     * Relacionamento com o link pai
     * 
     */
    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    /**
     * Cria um novo link de redirecionamento
     *  
     * @param array   $request
     * 
     */
    public static function postRedirect(array $request)
    {
        $link = Link::find($request['link_id']);
        Redirect::create($request)->link()->associate($link);
    }

     /**
     * Retorna Links filhos relacionado ao link pai
     *  
     * @return \App\Redirect
     */
    public static function getLink($url)
    {
        return Redirect::where('url',$url)->with('redirect')->get();
    }

    /**
     * Decrementa 1 do contador 
     *  
     * @param integer $id
     */
    public static function decrementCount($id){
        Redirect::find($id)->decrement('count', 1);
    }
}
