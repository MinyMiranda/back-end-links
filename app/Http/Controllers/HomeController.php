<?php

namespace App\Http\Controllers;

use App\Models\Link;

class HomeController extends Controller
{

    /**
     * Retorna todos os Links Juntamento com os links filhos
     *  
     * @return string JSON
     */
    public function index()
    {
        return response()->json(
            Link::getAllLinks()
        );
    }
}
