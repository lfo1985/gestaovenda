@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ $cliente->getId() != '' ? __('Editar Cliente') : __('Cadastrar novo Cliente') }} </div>
                <div class="card-body">
                    
                    <form name="formCliente" action="{{ $cliente->getId() != '' ? route('realizaEdicaoClientes', ['id' => $cliente->getId()]) : route('realizaCadastroClientes') }}" method="post">
                        
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label for="nome">Nome</label>
                                <input autocomplete="off" type="text" value="{{ $cliente->getNome() }}" name="nome" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="cpfCnpj">CPF / CNPJ</label>
                                <input autocomplete="off" type="text" value="{{ $cliente->getCpfCnpj() }}" name="cpfCnpj" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="endereco">Endereço</label>
                                <input autocomplete="off" type="text" value="{{ $cliente->getEndereco() }}" name="endereco" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="telefoneCelular">Telefone Celular</label>
                                <input autocomplete="off" type="tel" value="{{ $cliente->getTelefoneCelular() }}" name="telefoneCelular" placeholder="(00) 00000-0000" class="form-control mascaraTelefoneCelular">
                            </div>
                            <div class="col-md-3">
                                <label for="telefoneFixo">Telefone Fixo</label>
                                <input autocomplete="off" type="tel" value="{{ $cliente->getTelefoneFixo() }}" name="telefoneFixo" placeholder="(00) 0000-0000" class="form-control mascaraTelefoneFixo">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">{{ $cliente->getId() != '' ? __('Editar') : __('Cadastrar') }}</button>
                                <a href="{{ route('clientes') }}" type="submit" class="btn btn-danger">Cancelar</a>
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
<script src="{{ asset('js/clientes.js') }}"></script>
@endsection
