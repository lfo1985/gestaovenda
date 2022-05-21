<?php

namespace App\Http\Controllers;

use App\Models\itemvenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class itemvendaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request, $idVenda)
    {
        $itensVenda = array_map(function($item) use ($idVenda) {

            return [
                'idVenda' => $idVenda,
                'idProduto' => $item['idProduto'],
                'quantidadeItens' => $item['quantidadeItens'],
                'creationDate' => date('Y-m-d H:i:s'),
                'updatedDate' => date('Y-m-d H:i:s')
            ];

        }, $request->itemVendas);

        DB::table('itemvendas')->insertOrIgnore($itensVenda);

    }

    /**
     * Exibe a página do relatório de vendas
     */
    public function report()
    {

        return view('vendas.relatorio', ['dados' => itemvenda::all()->sortByDesc('id')]);

    }

}
