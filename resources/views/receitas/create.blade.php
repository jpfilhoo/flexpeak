@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastrar Receita</div>

                    <div class="card-body">
                        <form action="{{ route('receitas.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="descricao">Descricao:</label>
                                    <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}">
                                </div>
                                <div class="col-sm-8 form-group">
                                    <label for="cliente_id">Cliente:</label>
                                    <select class="form-control" id="cliente_id" name="cliente_id">
                                        <option>Selecione um cliente</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="valor">Valor:</label>
                                    <input type="text" name="valor" id="valor" class="form-control" value="{{ old('valor') }}">
                                </div>
                            </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                        <a href="{{ route('fornecedores.index') }}" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
