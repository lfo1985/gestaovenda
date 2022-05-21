$(document).ready(function(){

    // Gatilho da requisição para gravação de dados
    salvar('[name="formRegistrarVenda"]', function(){
        $('#modalDialogRedir').modal('show');
    });
    
    calendario('.datepicker');

    const atualizaIndicesInputs = () => {
        
        $('.itemVenda').map(function(index){
            $(this).find('[name*="[idProduto]"]').attr('name', 'itemVendas['+index+'][idProduto]');
            $(this).find('[name*="[quantidadeItens]"]').attr('name', 'itemVendas['+index+'][quantidadeItens]');
        });

    }

    $('#btnAdicionarProduto').on('click', function(){

        let primeiroItemVenda = $('.itemVenda:eq(0)');
        let clone = primeiroItemVenda.clone();
        let btnExcluir = $('<button />').addClass('btn btn-danger').text('Excluir');
        
        clone.find('[name*="[quantidadeItens]"]').val('');

        btnExcluir.on('click', function(){

            $(this).closest('.itemVenda').remove();

            atualizaIndicesInputs();
        
        }).insertAfter(clone.find('.inputsDados'));; 

        $('#itensVenda').append(clone);

        atualizaIndicesInputs();

    });

});