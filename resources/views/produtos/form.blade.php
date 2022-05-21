@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ $produto->getId() != '' ? __('Editar Produto') : __('Cadastrar novo Produto') }} </div>
                <div class="card-body">
                    
                    <form name="formProduto" action="{{ $produto->getId() != '' ? route('realizaEdicaoProdutos', ['id' => $produto->getId()]) : route('realizaCadastroProdutos') }}" method="post">
                        
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label for="codReferencia">Cod. de Referência</label>
                                <input autocomplete="off" type="text" value="{{ $produto->getCodReferencia() }}" name="codReferencia" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="marca">Marca</label>
                                <input autocomplete="off" type="text" value="{{ $produto->getMarca() }}" name="marca" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="quantidade">Quantidade</label>
                                <input autocomplete="off" type="number" value="{{ $produto->getQuantidade() }}" name="quantidade" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="valor">Valor</label>
                                <input autocomplete="off" type="text" value="{{ decimal2string($produto->getValor(), 2) }}" name="valor" class="form-control mascaraValor">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="descricao">Descrição</label>
                                <textarea name="descricao" rows="5" class="form-control">{{ $produto->descricao }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">{{ $produto->getId() != '' ? __('Editar') : __('Cadastrar') }}</button>
                                <a href="{{ route('produtos') }}" type="submit" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsPagina')
<script src="{{ asset('js/produtos.js') }}"></script>
@endsection
