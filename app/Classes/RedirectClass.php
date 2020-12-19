<?php

namespace App\Classes;

use App\Models\Link;
use App\Models\Redirect;
use Illuminate\Support\Facades\Validator;

class RedirectClass
{

    /**
     * Cria um novo Link
     *  
     * @param Illuminate\Http\Request  $request
     * @return string JSON
     */
    public function createRedirect($request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'url' => 'required|string',
                'count' => 'required|integer',
                'link_id' => 'required|integer|exists:links,id'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }
        Redirect::postRedirect($request->all());
        return response()->json(['message' => 'Sucesso ao criar'], 201);
    }

    /**
     * Editar um Link de redirecionamento já existente
     *  
     * @param Illuminate\Http\Request  $request
     * @return string JSON
     */
    public function updateLink($id, $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'url' => 'required|string',
                'count' => 'required|integer'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }
        Redirect::find($id)->update($request->all());
        return response()->json(['message' => 'Succeso ao editar!'], 200);
    }

    /**
     * Retorna url disponível
     *  
     * @param string $route
     * @return string $urlRedirect;
     */
    public function redirectLink($url)
    {
        $redirects = Link::getLink($url);
        $urlRedirect = null;
        if (is_object($redirects))
            foreach ($redirects as $redirect) {
                if ($redirect['count'] != 0) {
                    Redirect::decrementCount($redirect['id']);
                    $urlRedirect = $redirect['url'];
                    break;
                }
            }
        return $urlRedirect;
    }
}
