<?php
/**
 * Função para autoformatar datas do formato de banco de dados para o brasileiro
 * 
 * @param string $dataHora recebe a hora
 * @param string $tipo recebe qual o tipo de saida (data / dataHora)
 * @return string
 */
function formataData($dataHora, $tipo = 'data'){

    // Valida se a data está definida para evitar erro do Carbon
    if($dataHora != ''){
        
        if($tipo == 'bdData' || $tipo == 'bdDataHora'){
            
            $hora = '';

            if($tipo == 'bdDataHora' && (string) strpos($dataHora, ':') != ''){
                $hora = ' '.explode(' ', $dataHora)[1];
            }

            list($dia, $mes, $ano) = explode('/', $dataHora);

            return $ano.'-'.$mes.'-'.$dia.$hora;
        
        } else {

            // Escolhe qual o tipo de formatação
            if($tipo == 'data'){
                // Formato com apenas a data
                $formato = 'DD/MM/Y';
            } else if($tipo == 'dataHora'){
                // Formato com data e hora
                $formato = 'DD/MM/Y HH:mm:ss';
            }
    
            // Retorno da data formata utilizando a lib Carbon
            return \Carbon\Carbon::parse($dataHora)->locale('pt_BR')->isoFormat($formato);

        }

    } else {

        // Caso não tenha data definida, retorna null
        return null;

    }

}

/**
 * Retorna as variáveis da requisição http
 * 
 * @param string $chave nome da chave do valor
 * @return string 
 */
function varsRequest($chave){

    // Chama a lib que busca dinamicamente as vars da requisição http
    $request = new Illuminate\Http\Request;

    // Veriica se a propriedade existe na instancia
    if(property_exists($request, $chave)){
        // Caso exista, retorna a mesma
        return $request->$chave;
    } else {
        // Caso não retorna uma string vazia
        return '';
    }

}

/**
 * Função que converte números decimais em string
 * 
 * @param string $valor
 * @param string $decimais
 */
function decimal2String($valor, $decimais = null){
    if($valor != ''){
        if(!is_null($decimais)){
            return number_format($valor, $decimais, ',', '');
        } else {
            return str_replace('.', ',', $valor);
        }
    } else {
        return null;
    }
}

/**
 * Função que converte strings em números decimais
 * 
 * @param string $valor
 */
function string2decimal($valor){
    if($valor != ''){
        return str_replace(',', '.', $valor);
    } else {
        return null;
    }
}

/**
 * Função para converter o valor que vem no formato americano para o brasileiro
 * 
 * @param string $valor
 * @return string
 */
function formataDinheiroBr($valor){
    return number_format($valor, 2, ',', '.');
}