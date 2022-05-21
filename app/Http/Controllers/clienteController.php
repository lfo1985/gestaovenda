<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientes.index', ['clientes' => cliente::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.form', ['cliente' => new \App\Models\cliente()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cliente = new \App\Models\cliente;

        $cliente->setNome($request->nome);
        $cliente->setEndereco($request->endereco);
        $cliente->setCpfCnpj($request->cpfCnpj);
        $cliente->setTelefoneCelular($request->telefoneCelular);
        $cliente->setTelefoneFixo($request->telefoneFixo);

        $cliente->save();
        
        return response()->json([
            'cod' => 1,
            'mensagem' => 'Cliente salvo com sucesso!'
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

        return view('clientes.form', ['cliente' => cliente::find($id)]);
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
        $cliente = \App\Models\cliente::find($id);

        $cliente->setNome($request->nome);
        $cliente->setEndereco($request->endereco);
        $cliente->setCpfCnpj($request->cpfCnpj);
        $cliente->setTelefoneCelular($request->telefoneCelular);
        $cliente->setTelefoneFixo($request->telefoneFixo);

        $cliente->save();

        return response()->json([
            'cod' => 1,
            'mensagem' => 'Cliente salvo com sucesso!'
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
        
        \App\Models\cliente::destroy($id);

        return response()->json([
            'cod' => 1,
            'mensagem' => 'Cliente excluído com sucesso!'
        ]);

    }
}
