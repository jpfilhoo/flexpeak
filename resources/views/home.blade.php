@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Entradas e Saídas</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Descrição</th>
                            <th class="text-center">Fornecedor</th>
                            <th class="text-center">Valor</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($custos as $custo)
                            <tr>
                                <td>{{ $custo->descricao }}</td>
                                <td class="text-center">{{ $custo->fornecedor->nome }}</td>
                                <td class="text-center">R$ {{ number_format($custo->valor, 2, ',', '.') }}</td>
                                <td class="text-center">{{ date('d/m/Y' ,strtotime($custo->created_at)) }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    <a href="{{ route('custos.edit', $custo->id) }}" class="btn btn-sm btn-primary mr-2">Editar</a>
                                    <form action="{{ route('custos.destroy', $custo->id) }}" method="POST">
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
                    <a href="{{ route('custos.create') }}" class="btn btn-primary">Cadastrar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
