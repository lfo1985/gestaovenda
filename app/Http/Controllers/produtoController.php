<?php

namespace App\Http\Controllers;

use App\Models\produto;
use Illuminate\Http\Request;

class produtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtos.index', ['produtos' => produto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.form', ['produto' => new produto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $produto = new produto;

        $produto->setCodReferencia($request->codReferencia);
        $produto->setDescricao($request->descricao);
        $produto->setMarca($request->marca);
        $produto->setValor(string2decimal($request->valor));
        $produto->setQuantidade($request->quantidade);
        
        $produto->save();
        
        return response()->json([
            'cod' => 1,
            'mensagem' => 'Produto cadastrado com sucesso!'
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('produtos.form', ['produto' => produto::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = \App\Models\produto::find($id);

        $produto->setCodReferencia($request->codReferencia);
        $produto->setDescricao($request->descricao);
        $produto->setMarca($request->marca);
        $produto->setValor(string2decimal($request->valor));
        $produto->setQuantidade($request->quantidade);

        $produto->save();

        return response()->json([
            'cod' => 1,
            'mensagem' => 'Produto editado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        \App\Models\produto::destroy($id);

        return response()->json([
            'cod' => 1,
            'mensagem' => 'Produto excluído com sucesso!'
        ]);

    }
}
