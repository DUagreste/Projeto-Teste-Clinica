@extends('templates.template')

@section('conteudo')
<div class="container">
        <h1 style="text-align:center">Lista de Pacientes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>João da Silva</td>
                    <td>(11) 1234-5678</td>
                    <td>
                        <a href="#" class="btn">Editar</a>
                        <a href="#" class="btn">Excluir</a>
                    </td>
                </tr>
                <!-- Adicione mais linhas para mais registros -->
            </tbody>
        </table>
    </div>
@endsection