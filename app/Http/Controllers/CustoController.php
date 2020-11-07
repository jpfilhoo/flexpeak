<?php

namespace App\Http\Controllers;

use App\Custo;
use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('custos.index')->with([
            'custos' => Custo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('custos.create')->with([
            'fornecedores' => Fornecedor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            $data['user_id'] = auth()->id();
            Custo::create($data);
            return redirect()->route('custos.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao cadastrar custo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custo  $custo
     * @return \Illuminate\Http\Response
     */
    public function show(Custo $custo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custo  $custo
     * @return \Illuminate\Http\Response
     */
    public function edit(Custo $custo)
    {
        return view('custos.edit')->with([
            'custo' => $custo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custo  $custo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custo $custo)
    {
        try {
            $custo->update($request->all());
            return redirect()->route('custos.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao atualizar custo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custo  $custo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custo $custo)
    {
        try {
            $custo->delete();
            return redirect()->route('custos.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao excluir custo');
        }
    }
}
