<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vendaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('vendas.form', [
            'clientes' => \App\Models\cliente::all(),
            'produtos' => \App\Models\produto::all()
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

            DB::beginTransaction();
    
            $venda = new \App\Models\venda;
    
            $venda->setIdCliente($request->idCliente);
            $venda->setDataPedido(formataData($request->dataPedido, 'bdData'));
    
            $venda->save();

            \App\Http\Controllers\itemvendaController::store($request, $venda->getId());
    
            DB::commit();

            return response()->json([
                'cod' => 1,
                'mensagem' => 'Venda registrada com sucesso!'
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();

        }

    }

}
