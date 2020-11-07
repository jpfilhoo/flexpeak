@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastrar Fornecedor</div>

                    <div class="card-body">
                        <form action="{{ route('fornecedores.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone') }}">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="tipo">Tipo:</label>
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option>Selecione um tipo</option>
                                        <option value="PF">Pessoa Física</option>
                                        <option value="PJ">Pessoa Jurídica</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="cnpj">CNPJ:</label>
                                    <input type="text" name="cnpj" id="cnpj" class="form-control" value="{{ old('cnpj') }}">
                                </div>
                                <hr>
                                <div class="col-sm-3 form-group">
                                    <label for="cep">CEP:</label>
                                    <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep') }}">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="cidade">Cidade:</label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" value="{{ old('cidade') }}">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label for="uf">UF:</label>
                                    <input type="text" name="uf" id="uf" maxlength="2" class="form-control" value="{{ old('uf') }}">
                                </div>
                                <div class="col-sm-5 form-group">
                                    <label for="bairro">Bairro:</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" value="{{ old('bairro') }}">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="rua">Rua:</label>
                                    <input type="text" name="rua" id="rua" class="form-control" value="{{ old('rua') }}">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label for="numero">Número:</label>
                                    <input type="text" name="numero" id="numero" class="form-control" value="{{ old('numero') }}">
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
