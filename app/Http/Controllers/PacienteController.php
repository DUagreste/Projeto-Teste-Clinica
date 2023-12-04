<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Retorna todos os Pacientes cadastrados.
     */
    public function index()
    {
        return Paciente::all();
    }

    /**
     * Cria um novo Paciente a partir dos dados da requisição.
     */
    public function store(Request $request)
    {
        if (Paciente::create($request->all())) {
            return response()->json([
                'message' => 'Paciente cadastrado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o paciente!'
        ], 404);
    }

    /**
     * Busca um Paciente com base no ID fornecido, incluindo as Ordens de Serviço relacionadas.
     */
    public function show($paciente)
    {
        $paciente = Paciente::with('ordems')->find($paciente);

        if ($paciente) {
            $response = [
                'paciente' => $paciente,
                'ordems' => $paciente->ordems
            ];
            return $response;
        }

        return response()->json([
            'message' => 'Erro na pesquisa de paciente!'
        ], 404);
    }

    /**
     * Busca um Paciente pelo seu ID e atualiza seus dados com base na requisição.
     */
    public function update(Request $request, $paciente)
    {
        $paciente = Paciente::find($paciente);

        if ($paciente) {
            $paciente->update($request->all());
            return $paciente;
        }

        return response()->json([
            'message' => 'Erro ao atualizar o paciente!'
        ], 404);
    }

    /**
     * Remove um Paciente pelo seu ID.
     */
    public function destroy($paciente)
    {
        if (Paciente::destroy($paciente)) {
            return response()->json([
                'message' => 'Paciente deletado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar o paciente!'
        ], 404);
    }
}
