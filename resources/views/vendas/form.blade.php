@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Registrar uma nova venda') }} </div>
                <div class="card-body">
                    
                    <form name="formRegistrarVenda" action="{{ route('realizarRegistroVenda') }}" method="post">
                        
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="idCliente">Cliente</label>
                                <select class="form-select" name="idCliente" required>
                                    <option value="">-</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->getId() }}">{{ $cliente->getNome() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="dataPedido">Data</label>
                                <input autocomplete="off" type="text" value="{{ date('d/m/Y') }}" name="dataPedido" class="form-control datepicker" required>
                            </div>
                        </div>

                        <button type="button" id="btnAdicionarProduto" class="btn btn-secondary mb-3">
                            <span class="oi oi-plus"></span>
                            Adicionar produto
                        </button>

                        <div id="itensVenda" class="mb-4">
                            
                            <div class="bg-light itemVenda d-flex justify-content-between border p-2 mb-3">
                                <div class="row inputsDados w-75">
                                    <div class="col-md-4">
                                        <label for="Produto">Produto</label>
                                        <select name="itemVendas[0][idProduto]" class="form-select">
                                            <option value=""></option>
                                            @foreach($produtos as $produto)
                                                <option value="{{ $produto->getId() }}">{{ $produto->getCodReferencia() . ' - ' . $produto->getMarca() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="quantidadeItens">Quantidade</label>
                                        <input type="number" name="itemVendas[0][quantidadeItens]" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Valor Unitário</label>
                                        <input type="text" class="valor form-control" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Valor Total</label>
                                        <input type="text" class="valorTotal form-control" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mb-4">
                            <h3>Valor total da venda: <span id="valorTotalGeral">0,00</span> </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">{{ __('Registrar Venda') }}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalDialogRedir" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Redirecionamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>O que deseja fazer agora?</p>
      </div>
      <div class="modal-footer">
        <a href="{{route('registrarVenda')}}" class="btn btn-primary">Registrar outra venda</a>
        <a href="{{route('relatorioVenda')}}" class="btn btn-success">Ir para o relatório</a>
      </div>
    </div>
  </div>
</div>

@endsection

@section('jsPagina')
<script src="{{ asset('js/vendas.js') }}"></script>
@endsection
