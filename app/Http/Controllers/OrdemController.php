<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use Illuminate\Http\Request;

class OrdemController extends Controller
{
    /**
     * Retorna todas as Ordens de Serviço.
     */
    public function index()
    {
        return Ordem::all();
    }

    /**
     * Cria uma nova Ordem de Serviço a partir dos dados da requisição.
     */
    public function store(Request $request)
    {
        if (Ordem::create($request->all())) {
            return response() -> json([
                'message' => 'Ordem de serviço cadastrada com sucesso!'
            ], 201);
        }

            return response() -> json([
                'message' => 'Erro ao cadastrar a ordem de serviço!'
            ], 404);
    }

    /**
     * Busca uma Ordem de Serviço pelo seu ID, incluindo Pacientes e Exames relacionados.
    */
    public function show($ordem)
    {
        $ordem = Ordem::with('paciente.exames')->find($ordem);
        if ($ordem){
            return $ordem;
        }

            return response() -> json([
                'message' => 'Erro na pesquisa da ordem de serviço!'
            ], 404);
    }

    /**
     * Busca uma Ordem de Serviço pelo seu ID e atualiza seus dados com base na requisição.
     */
    public function update(Request $request, $ordem)
    {
        $ordem = Ordem::find($ordem);
        if ($ordem) {
            $ordem->update($request->all());

            return $ordem;
        }

            return response() -> json([
                'message' => 'Erro ao atualizar a ordem de serviço!'
            ], 404);
    }

    /**
     * Remove uma Ordem de Serviço pelo seu ID.
     */
    public function destroy($ordem)
    {
        if (Ordem::destroy($ordem)){
            return response() -> json([
                'message' => 'Ordem de serviço deletada com sucesso!'
             ], 201);
        }

            return response() -> json([
                'message' => 'Erro ao deletar ordem de serviço!'
            ], 404);
    }
}
