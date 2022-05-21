@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Relatório de vendas') }} </div>
                <div class="card-body">
                    <table id="tabelaDadosRelatorio" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">Data da Venda</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Cod. Ref.</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Total de itens</th>
                                <th class="text-center">Valor unitário</th>
                                <th class="text-center">Valor total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dados as $item)
                                <tr>
                                    <td class="text-center">{{ formataData($item->venda->getDataPedido()) }}</td>
                                    <td class="text-center">{{ $item->venda->cliente->getNome() }}</td>
                                    <td class="text-center">{{ $item->produto->getCodReferencia() }}</td>
                                    <td class="text-center">{{ $item->produto->getMarca() }}</td>
                                    <td class="text-center">{{ $item->getQuantidadeItens() }}</td>
                                    <td class="text-center">{{ formataDinheiroBr($item->produto->getValor()) }}</td>
                                    <td class="text-center">{{ formataDinheiroBr($item->getQuantidadeItens() * $item->produto->getValor()) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsPagina')
<script src="{{ asset('js/relatorio.js') }}"></script>
@endsection
