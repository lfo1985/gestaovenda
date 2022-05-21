$(document).ready(function(){

    // Aplicação do datatable na tabela de listagem de registros
    $('#tabelaProdutos').DataTable();

    // Máscaras de telefone
    $('.mascaraValor').mask('000000,00', {reverse: true});

    // Gatilho da requisição para gravação de dados
    salvar('[name="formProduto"]', function(){
        redir('/produtos');
    });

    $('.excluirRegistro').on('click', function(e){

        apagar(e.target.href);

        e.preventDefault();

    });

});