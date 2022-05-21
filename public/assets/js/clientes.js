$(document).ready(function(){

    // Aplicação do datatable na tabela de listagem de registros
    $('#tabelaClientes').DataTable();

    // Máscaras de telefone
    $('.mascaraTelefoneCelular').mask('(00) 00000-0000');
    $('.mascaraTelefoneFixo').mask('(00) 0000-0000');

    // Gatilho da requisição para gravação de dados
    salvar('[name="formCliente"]', function(){
        redir('/clientes');
    });

    $('.excluirRegistro').on('click', function(e){

        apagar(e.target.href);

        e.preventDefault();

    });

});