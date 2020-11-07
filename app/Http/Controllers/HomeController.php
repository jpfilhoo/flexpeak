<?php

namespace App\Http\Controllers;

use App\Custo;
use App\Receita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $receitas = Receita::whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime(now())), date('Y-m-d 23:59:59', strtotime(now()))])->get();
        $custos = Custo::whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime(now())), date('Y-m-d 23:59:59', strtotime(now()))])->get();

        dd($receitas, $custos);

        return view('home');
    }
}
