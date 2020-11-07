@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Clientes</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">Telefone</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nome }}</td>
                                        <td class="text-center">{{ $cliente->tipo }}</td>
                                        <td class="text-center">{{ $cliente->email }}</td>
                                        <td class="text-center">{{ $cliente->telefone }}</td>
                                        <td class="text-center d-flex justify-content-center">
                                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-primary mr-2">Editar</a>
                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
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
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
