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

        $dados = itemvenda::all()->sortByDesc('id');

        $dadosOrganizados = [];

        if($dados){
            foreach ($dados as $item) {
                $dadosOrganizados[$item->idVenda]['dados'] = [
                    'codVenda' => str_pad($item->getIdVenda(), 5, 0, STR_PAD_LEFT),
                    'data' => $item->venda->getDataPedido(),
                    'cliente' => $item->venda->cliente->getNome(),
                    'quantidade' => 0,
                    'total' => 0,
                    'json' => ''
                ];
                $dadosOrganizados[$item->idVenda]['itens'][] = [
                    'codVenda' =>str_pad($item->getIdVenda(), 5, 0, STR_PAD_LEFT),
                    'codReferencia' => $item->produto->getCodReferencia(),
                    'marca' => $item->produto->getMarca(),
                    'valor' => $item->produto->getValor(),
                    'quantidade' => $item->getQuantidadeItens(),
                    'total' => $item->getQuantidadeItens() * $item->produto->getValor()
                ];
            }
        }

        $dadosFinaisRelatorio = array_map(function($item){

            $arrayQuantidade = array_column($item->itens, 'quantidade');
            $arrayTotal = array_column($item->itens, 'total');

            $dados = $item->dados;
            $dados->quantidade = array_sum($arrayQuantidade);
            $dados->total = array_sum($arrayTotal);
            $dados->json = json_encode($item->itens);

            return $dados;

        }, array2object($dadosOrganizados));

        return view('vendas.relatorio', ['dados' => $dadosFinaisRelatorio]);

    }

}
