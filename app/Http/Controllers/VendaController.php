<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;

class VendaController extends Controller
{
    public function index()
    {
        $dados = Venda::all();
        return view('venda.index')->with('dados', $dados);
    }

    public function show($id)
    {
        $dado = Venda::where('id', $id)->get();
        if (!empty($dado)) {
            return view('venda.show')->with('dado', $dado);
        } else {
            return redirect()->route('venda');
        }
    }

    public function create()
    {   
        $dados['cliente'] = Cliente::all();
        $dados['produto'] = Produto::all();

        return view('venda.create')->with('dados', $dados);
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        Venda::create($dados);
        return redirect()->route('venda');
    }
}
