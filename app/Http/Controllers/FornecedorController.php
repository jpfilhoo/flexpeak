<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fornecedores.index')->with([
            'fornecedores' => Fornecedor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedores.create');
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
            Fornecedor::create($data);
            return redirect()->route('fornecedores.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao cadastrar fornecedor');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedores.edit')->with([
            'fornecedor' => $fornecedor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        try {
            $fornecedor->update($request->all());
            return redirect()->route('fornecedores.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao atualizar fornecedor');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        try {
            $fornecedor->delete();
            return redirect()->route('fornecedores.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception('Erro ao excluir fornecedor');
        }
    }
}
