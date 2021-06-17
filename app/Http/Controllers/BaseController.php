<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
    protected $classe;

    public function index(Request $request)
    {
        return $this->classe::paginate();
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);

        if(is_null($recurso)){
            return response()->json('', 204);
        }

        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if(is_null($recurso)){
            return response()->json(['Erro' => 'Não encontrado!'], 404);
        }

        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function destroy(int $id)
    {
        $qtdRemovidos = $this->classe::destroy($id);

        if ($qtdRemovidos === 0){
            return response()->json(['Erro' => 'Erro ao remover!'], 404);
        }

        return response()->json('', 204);
    }
}