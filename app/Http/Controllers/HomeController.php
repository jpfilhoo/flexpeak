<?php

namespace App\Http\Controllers;

use App\Custo;
use App\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            // Calculando clientes com maiores receitas
            $topClientes = DB::select('SELECT c.nome, SUM(r.valor) AS valor_total FROM clientes c
                INNER JOIN receitas r ON r.cliente_id = c.id
                GROUP BY c.nome
                ORDER BY valor_total DESC
                LIMIT 10');

            // Calculando fornecedores com maiores custos
            $topFornecedores = DB::select('SELECT f.nome, SUM(c.valor) AS valor_total FROM fornecedors f
                INNER JOIN custos c ON c.fornecedor_id = f.id
                GROUP BY f.nome
                ORDER BY valor_total DESC
                LIMIT 10');

            // Calculando saldo final do dia
            $receitas = Receita::whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime(now())), date('Y-m-d 23:59:59', strtotime(now()))])->get();
            $custos = Custo::whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime(now())), date('Y-m-d 23:59:59', strtotime(now()))])->get();
            $lancamentos = $receitas->merge($custos);
            $valorTotalReceitas = 0;
            $valorTotalCustos = 0;
            foreach($lancamentos as $lancamento) {
                if ($lancamento->cliente) {
                    $valorTotalReceitas = $valorTotalReceitas + $lancamento->valor;
                } else {
                    $valorTotalCustos = $valorTotalCustos + $lancamento->valor;
                }
            }
            $saldoFinal = $valorTotalReceitas - $valorTotalCustos;

            return view('home', [
                'lancamentos' => $lancamentos,
                'saldoFinal' => $saldoFinal,
                'topClientes' => $topClientes,
                'topFornecedores' => $topFornecedores
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao gerar relatórios');
        }
    }
}
