@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Entradas e Saídas</div>

                <div class="card-body">
                    @if($lancamentos->count())
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Descrição</th>
                                <th class="text-center">Fornecedor/Cliente</th>
                                <th class="text-center">Valor</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($lancamentos as $lancamento)
                                <tr>
                                    <td>{{ $lancamento->descricao }}</td>
                                    <td class="text-center">{{ isset($lancamento->fornecedor->nome) ? $lancamento->fornecedor->nome : $lancamento->cliente->nome }}</td>
                                    <td style="font-weight: bold" class="text-center @if($lancamento->fornecedor) text-danger @else text-success @endif">R$ {{ number_format($lancamento->valor, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5 class="text-center">Não há lançamentos na data de hoje</h5>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Top 10 Clientes</div>

                <div class="card-body">
                    @if(count($topClientes))
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th class="text-center">Receita</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($topClientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <td style="font-weight: bold" class="text-center text-success ">R$ {{ number_format($cliente->valor_total, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5 class="text-center">Não há receitas cadastradas</h5>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Top 10 Fornecedores</div>

                <div class="card-body">
                    @if(count($topFornecedores))
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th class="text-center">Custo</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($topFornecedores as $fornecedor)
                                    <tr>
                                        <td>{{ $fornecedor->nome }}</td>
                                        <td style="font-weight: bold" class="text-center text-danger ">R$ {{ number_format($fornecedor->valor_total, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5 class="text-center">Não há custos cadastrados</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
