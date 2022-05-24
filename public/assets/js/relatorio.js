function verProdutos (obJson){

    $('#modalDetalhesProduto').modal('show');

    var obJson = JSON.parse(obJson);

    var codVenda = '';
    
    obJson.forEach(item => {
        
        let tr = $('<tr />');

        tr.append('<td class="text-center">'+item.codReferencia+'</td>');
        tr.append('<td class="text-center">'+item.marca+'</td>');
        tr.append('<td class="text-center">'+item.quantidade+'</td>');
        tr.append('<td class="text-center">'+formataMoeda(item.valor)+'</td>');
        tr.append('<td class="text-center">'+formataMoeda(item.valor * item.quantidade)+'</td>');

        $('#linhasProdutos').append(tr);

        codVenda = item.codVenda;

    });

    $('#spanCodVenda').text(codVenda);

}

$(document).ready(function(){

    $('#modalDetalhesProduto').on('hidden.bs.modal', function(){
        $('#linhasProdutos').html('');
        $('#spanCodVenda').text('');
    });

    $('#tabelaDadosRelatorio').DataTable({
        ordering: false
    });

});