@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Receita</div>

                    <div class="card-body">
                        <form action="{{ route('receitas.update', $receita->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="descricao">Descricao:</label>
                                    <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $receita->descricao }}">
                                </div>
                                <div class="col-sm-8 form-group">
                                    <label for="cliente">Cliente:</label>
                                    <input type="text" id="cliente" class="form-control" value="{{ $receita->cliente->nome }}" readonly>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="valor">Valor:</label>
                                    <input type="text" name="valor" id="valor" class="form-control" value="{{ $receita->valor }}">
                                </div>
                            </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <a href="{{ route('receitas.index') }}" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
