@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('cadastrarProdutos') }}" class="btn btn-info mb-3 text-white">
                <span class="oi oi-plus me-1"></span>
                Cadastar novo produto
            </a>
            <div class="card">
                <div class="card-header"> {{ __('Produtos') }} </div>
                <div class="card-body">
                    <table id="tabelaProdutos" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">Cod. Referência</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Quantidade</th>
                                <th class="text-center">Criado em</th>
                                <th class="text-center">Atualizado em</th>
                                <th class="text-center">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td class="text-center align-middle">{{ $produto->getCodReferencia() }}</td>
                                    <td class="text-center align-middle">{{ $produto->getMarca() }}</td>
                                    <td class="text-center align-middle">{{ decimal2string($produto->getValor()) }}</td>
                                    <td class="text-center align-middle">{{ $produto->getQuantidade() }}</td>
                                    <td class="text-center align-middle">{{ formataData($produto->getCreationDate()) }}</td>
                                    <td class="text-center align-middle">{{ formataData($produto->getUpdatedDate()) }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{ route('editarProdutos', ['id' => $produto->getId()]) }}" class="btn btn-success btn-sm">
                                            <span class="oi oi-pencil me-1"></span>
                                            Editar
                                        </a>
                                        <a href="{{ route('apagarProdutos', ['id' => $produto->getId()]) }}" class="btn btn-danger ms-1 btn-sm excluirRegistro">
                                            <span class="oi oi-circle-x me-1"></span>
                                            Excluir
                                        </a>
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
@endsection

@section('jsPagina')
<script src="{{ asset('js/produtos.js') }}"></script>
@endsection
