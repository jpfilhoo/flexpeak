@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Receitas</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($receitas as $receita)
                                    <tr>
                                        <td>{{ $receita->descricao }}</td>
                                        <td class="text-center">{{ $receita->cliente->nome }}</td>
                                        <td class="text-center">R$ {{ number_format($receita->valor, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ date('d/m/Y' ,strtotime($receita->created_at)) }}</td>
                                        <td class="text-center d-flex justify-content-center">
                                            <a href="{{ route('receitas.edit', $receita->id) }}" class="btn btn-sm btn-primary mr-2">Editar</a>
                                            <form action="{{ route('receitas.destroy', $receita->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('receitas.create') }}" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
