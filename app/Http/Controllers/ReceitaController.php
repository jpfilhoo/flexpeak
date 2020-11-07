<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('receitas.index')->with([
            'receitas' => Receita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receitas.create')->with([
            'clientes' => Cliente::all()
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
            Receita::create($data);
            return redirect()->route('receitas.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao cadastrar receita');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        return view('receitas.edit')->with([
            'receita' => $receita
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
        try {
            $receita->update($request->all());
            return redirect()->route('receitas.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao atualizar receita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        try {
            $receita->delete();
            return redirect()->route('receitas.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao excluir receita');
        }
    }
}
