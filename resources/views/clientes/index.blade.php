@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('cadastrarClientes') }}" class="btn btn-info mb-3 text-white">
                <span class="oi oi-plus me-1"></span>
                Cadastar novo cliente
            </a>
            <div class="card">
                <div class="card-header"> {{ __('Clientes') }} </div>
                <div class="card-body">
                    <table id="tabelaClientes" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Endereço</th>
                                <th class="text-center">CPF/CNPJ</th>
                                <th class="text-center">Telefone Celular</th>
                                <th class="text-center">Telefone Fixo</th>
                                <th class="text-center">Criado em</th>
                                <th class="text-center">Atualizado em</th>
                                <th class="text-center">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td class="text-center align-middle">{{ $cliente->getNome() }}</td>
                                    <td class="text-center align-middle">{{ $cliente->getEndereco() }}</td>
                                    <td class="text-center align-middle">{{ $cliente->getCpfCnpj() }}</td>
                                    <td class="text-center align-middle">{{ $cliente->getTelefoneCelular() }}</td>
                                    <td class="text-center align-middle">{{ $cliente->getTelefoneFixo() }}</td>
                                    <td class="text-center align-middle">{{ formataData($cliente->getCreationDate()) }}</td>
                                    <td class="text-center align-middle">{{ formataData($cliente->getUpdatedDate()) }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{ route('editarClientes', ['id' => $cliente->getId()]) }}" class="btn btn-success btn-sm">
                                            <span class="oi oi-pencil me-1"></span>
                                            Editar
                                        </a>
                                        <a href="{{ route('apagarClientes', ['id' => $cliente->getId()]) }}" class="btn btn-danger btn-sm ms-1 excluirRegistro">
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
<script src="{{ asset('js/clientes.js') }}"></script>
@endsection
