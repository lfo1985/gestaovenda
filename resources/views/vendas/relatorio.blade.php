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
                                <th class="text-center">Cod. Venda</th>
                                <th class="text-center">Data da Venda</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Quantidade total de itens</th>
                                <th class="text-center">Valor total da venda</th>
                                <th class="text-center">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dados as $item)
                                <tr>
                                    <td class="text-center">{{ $item->codVenda }}</td>
                                    <td class="text-center">{{ formataData($item->data) }}</td>
                                    <td class="text-center">{{ $item->cliente }}</td>
                                    <td class="text-center">{{ $item->quantidade }}</td>
                                    <td class="text-center">{{ formataDinheiroBr($item->total) }}</td>
                                    <td class="text-center">
                                        <button onclick="verProdutos('{{ $item->json }}')" class="btn btn-info">
                                            <span class="oi oi-magnifying-glass"></span>
                                            Ver Produtos
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalDetalhesProduto" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lista de produtos vendidos - Cod. da Venda <span id="spanCodVenda"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Cod. Ref.</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Valor total</th>
                </tr>
            </thead>
            <tbody id="linhasProdutos"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('jsPagina')
<script src="{{ asset('js/relatorio.js') }}"></script>
@endsection
