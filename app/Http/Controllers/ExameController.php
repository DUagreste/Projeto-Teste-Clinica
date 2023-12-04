<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    /**
     * Retorna todos os Exames cadastrados.
     */
    public function index()
    {
        return Exame::all();
    }

    /**
     * Cria um novo Exame a partir dos dados da requisição.
     */
    public function store(Request $request)
    {
        if (Exame::create($request->all())) {
            return response()->json([
                'message' => 'Exame cadastrado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o exame!'
        ], 404);
    }

    /**
     * Busca um Exame com base no ID fornecido, incluindo o Paciente relacionado.
     */
    public function show($exame)
    {
        //
        $exame = Exame::find($exame);

        if ($exame) {
            $response = [
                'exames' => $exame,
                'paciente' => $exame->paciente
            ];
            return $exame;
        }

        return response()->json([
            'message' => 'Erro na pesquisa de exame!'
        ], 404);
    }

    /**
     * Busca um Exame pelo seu ID e atualiza seus dados com base na requisição.
     */
    public function update(Request $request, $exame)
    {
        $exame = Exame::find($exame);

        if ($exame) {
            $exame->update($request->all());
            return $exame;
        }

        return response()->json([
            'message' => 'Erro ao atualizar o exame!'
        ], 404);
    }

    /**
     * Remove um Exame pelo seu ID.
     */
    public function destroy($exame)
    {
        if (Exame::destroy($exame)) {
            return response()->json([
                'message' => 'Exame deletado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar o exame!'
        ], 404);
    }
}
