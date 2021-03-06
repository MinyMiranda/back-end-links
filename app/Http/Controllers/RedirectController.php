<?php

namespace App\Http\Controllers;

use App\Classes\RedirectClass;
use Illuminate\Http\Request;
use App\Models\Redirect;

class RedirectController extends Controller
{

    /**
     * Retorna todos os links filhos relacionado áquele link pai
     *  
     * @return string JSON
     */
    public function get($id)
    {
        return response()->json(
            Redirect::getRedirect($id)
        );
    }

    /**
     * Cria um novo Link de redirecionamento
     *  
     * @param Illuminate\Http\Request $request
     * @return string JSON
     */
    public function store(Request $request)
    {

        $create = new RedirectClass;
        return  $create->createRedirect($request);
    }

    /**
     * Edita um Link de Redirecionamento
     *  
     * @param Illuminate\Http\Request $request
     * @return string JSON
     */
    public function update(Request $request)
    {

        $update = new RedirectClass;
        return  $update->updateLink($request);
    }

    /**
     * Destrói um Link de redirecionamento
     *  
     * @param Illuminate\Http\Request $request
     * @return string JSON
     */
    public function destroy($id)
    {
        Redirect::find($id)->delete();
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }

    /**
     * Redireciona para os links disponíveis da rota
     *  
     * @param string $route
     * @return mixed
     */
    public function routes($route)
    {
        $link = new RedirectClass;
        $link = $link->redirectLink($route);
        if (isset($link)) {
            return $link;
        } else {
            return response()->json(['message' => 'Rota não possue nenhum redirect válido'], 404);
        }
    }
}
