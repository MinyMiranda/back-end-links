<?php

namespace App\Http\Controllers;

use App\Classes\LinkClass;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{


    /**
     * Cria um novo Link
     *  
     * @param Illuminate\Http\Request $request
     * @return string JSON
     */
    public function store(Request $request)
    {

        $create = new LinkClass;
        return  $create->createLink($request);
    }

    /**
     * Edita um Link
     *  
     * @param Illuminate\Http\Request $request
     * @return string JSON
     */
    public function update(Request $request)
    {
        $update = new LinkClass;
        return  $update->updateLink($request);
    }

    /**
     * Destrói um Link
     *  
     * @param Illuminate\Http\Request $request
     * @return string JSON
     */
    public function destroy($id)
    {
        Link::find($id)->delete();
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }
}
