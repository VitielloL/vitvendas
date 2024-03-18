<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $dados = Produto::all();
        return view('produto.index')->with('dados', $dados);
    }

    public function show($id)
    {
        $dado = Produto::where('id', $id)->get();
        if (!empty($dado)) {
            return view('produto.show')->with('dado', $dado);
        } else {
            return redirect()->route('produto');
        }
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        Produto::create($dados);
        return redirect()->route('produto');
    }

    public function edit($id)
    {
        $dado = Produto::where('id',$id)->get()->first();
        if(!empty($dado)){
            return view('produto.edit')->with('dado',$dado);
        } else {
            return redirect()->route('produto');
        }
    }

    public function update(Request $request, $id)
    {
        $dado = Produto::find($id);

        $dado->titulo = $request->titulo;
        $dado->valor = $request->valor;
        $dado->descricao = $request->descricao;

        $dado->save();
        return redirect()->route('produto');
    }

    public function destroy($id)
    {
        $dado = Produto::where('id', $id)->get();
        if (!empty($dado)) {
            DB::delete('DELETE FROM produto WHERE id = ?', [$id]);
        }
        return redirect()->route('produto');
    }
}
