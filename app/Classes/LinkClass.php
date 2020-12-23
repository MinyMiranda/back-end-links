<?php

namespace App\Classes;

use App\Models\Link;
use Illuminate\Support\Facades\Validator;

class LinkClass
{

    /**
     * Cria um novo Link
     *  
     * @param Illuminate\Http\Request  $request
     * @return string JSON
     */
    public function createLink($request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'url' => 'required|string|unique:links',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }
        Link::create($request->all());
        return response()->json(['message'=>'Sucesso ao criar'], 201);
    }

    /**
     * Edita um Link já existente
     *  
     * @param Illuminate\Http\Request  $request
     * @return string JSON
     */
    public function updateLink($request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'url' => 'required|string|unique:links',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }
        Link::find($request->id)->update($request->all());
        return response()->json(['message' => 'Succeso ao editar!'], 200);
    }
}
