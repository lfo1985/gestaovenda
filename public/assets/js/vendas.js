$(document).ready(function(){

    const atualizaIndicesInputs = () => {
        
        $('.itemVenda').map(function(index){
            $(this).find('[name*="[idProduto]"]').attr('name', 'itemVendas['+index+'][idProduto]');
            $(this).find('[name*="[quantidadeItens]"]').attr('name', 'itemVendas['+index+'][quantidadeItens]');
        });

    }

    const calculaTotal = (quantidade, valor) => {

        return parseFloat(parseInt(quantidade != '' ? quantidade : 0) * parseFloat(valor != '' ? valor : 0.00));
    }

    const buscaValorProduto = async (id, objQuantidade, objValor, objValorTotal) => {

        var dadosProduto = {};

        objValor.val('...');

        await $.get('/produto/dados/'+id, function(produto){

            objValor.val(formataMoeda(produto.valor));

            let total = calculaTotal(objQuantidade.val(), produto.valor);

            objValorTotal.val(formataMoeda(total.toFixed(2)));

            calculaValorTotalGeral();

        }, 'json').fail(function(xhr){

            alert(xhr.responseText);
            objValor.val('0,00');
        
        });

        return dadosProduto;

    }

    const calculaValorTotalGeral = () => {

        let valores = $('#itensVenda .valorTotal').map(function(){
            return parseFloat($(this).val() != '' ? $(this).val().replace('.', '').replace(',', '.') : 0);
        }).get();

        $('#valorTotalGeral').text(formataMoeda(valores.reduce((valor, total) => parseFloat(valor) + total)));

    }

    const realizaCalculos = (objPai) => {

        objPai.find('[name*="[idProduto]"]').on('change', function(){
    
            let itemVenda = $(this).closest('.itemVenda');
            
            buscaValorProduto($(this).val(), itemVenda.find('[name*="quantidadeItens"]'), itemVenda.find('.valor'), itemVenda.find('.valorTotal'));
    
        });
    
        objPai.find('[name*="[quantidadeItens]"]').on('change keyup keydown', function(){
    
            let itemVenda = $(this).closest('.itemVenda');
    
            let objValorTotal = itemVenda.find('.valorTotal');
            let quantidade = itemVenda.find('[name*="[quantidadeItens]"]').val();
            let valor = itemVenda.find('.valor').val().replace('.', '').replace(',', '.');
            
            objValorTotal.val(formataMoeda(calculaTotal(quantidade, valor).toFixed(2)));

            calculaValorTotalGeral();
    
        });

    }

    salvar('[name="formRegistrarVenda"]', function(){
        $('#modalDialogRedir').modal('show');
    });
    
    calendario('.datepicker');

    realizaCalculos($('.itemVenda').first());

    $('#btnAdicionarProduto').on('click', function(){

        let primeiroItemVenda = $('.itemVenda:eq(0)');
        let clone = primeiroItemVenda.clone();
        let btnExcluir = $('<button />').addClass('btn btn-danger').text('Excluir');

        realizaCalculos(clone);

        clone.find('[name*="[quantidadeItens]"]').val('');
        clone.find('.valor').val('');
        clone.find('.valorTotal').val('');

        btnExcluir.on('click', function(){

            $(this).closest('.itemVenda').remove();

            atualizaIndicesInputs();

            calculaValorTotalGeral();
        
        }).insertAfter(clone.find('.inputsDados'));

        $('#itensVenda').append(clone);

        atualizaIndicesInputs();

    });


});