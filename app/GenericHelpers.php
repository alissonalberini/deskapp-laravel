<?php

if (!function_exists('set_message_sucess')){
    
    function set_message_sucess($text = 'Ação realizada com sucesso!') {
        $message = collect([
            'title' => 'Bom trabalho!!', 
            'message' => $text, 
            'type' => 'success'
        ]);
        session()->flash('message',$message);
        return;
    }
}

if (!function_exists('set_message_error')){
    
    function set_message_error($text = 'Ação não realizada!') {
        
        $message = collect([
            'title' => 'Ops!', 
            'message' => $text, 
            'type' => 'error'
        ]);
        session()->flash('message',$message);
        return;
    }
}

if (!function_exists('valida_ie')) {

    /**
     * Valida se a incrição estadual é valida, em tamanho e digito verificador.
     * @param  string  $inscricao_estadual
     * @return boolean
     */
    function valida_ie($inscricao_estadual) {
        if (empty($inscricao_estadual)) {   
            return false;
        }
        if ($inscricao_estadual == 'ISENTO') {
            return true;
        }
        
        if ($inscricao_estadual <> '') {

            // Elimina possivel mascara
            $inscricao_estadual = preg_replace("/[^0-9]/", "", $inscricao_estadual);
            
            //Adicionava zeros a esquerda!
            //$inscricao_estadual = str_pad($inscricao_estadual, 11, '0', STR_PAD_LEFT);
            
            // se não tiver 11 digitos não é valido
            if (strlen($inscricao_estadual) != 11) {
                return false;
            }

            if (!calculaDigito($inscricao_estadual)) {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

}


if (!function_exists('calculaDigito')){
    
    function calculaDigito($inscricao_estadual) {
        $peso = 3;
        $posicao = 10;
        $soma = 0;
        $length = strlen($inscricao_estadual);
        $corpo = substr($inscricao_estadual, 0, $length - 1);

        foreach (str_split($corpo) as $item) {

            $soma += $item * $peso;
            $peso--;

            if ($peso == 1) {
                $peso = 9;
            }
        }

        $resto = $soma % 11;
        $dig = 11 - $resto;

        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig == $inscricao_estadual[$posicao];
    }
}


if (!function_exists('valida_cpf')) {

    /**
     * Valida se o cpf é valido, em tamanho e digito verificador.
     *
     * @param  string  $cpf
     * @return boolean
     */
    function valida_cpf($cpf) {
        
        if (empty($cpf)) {   
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

}


if (!function_exists('valida_cnpj')) {
    
    /**
     * Valida se O CNPJ é validO, em tamanho e digito verificador.
     *
     * @param  string  $cnpj
     * @return boolean
     */

    function valida_cnpj($cnpj)
    {
    
    
    $cnpj = preg_replace( '/\D/', '', $cnpj );
    
    if ( strlen( $cnpj ) != 14 ) {
        return false;
    }
    
    if( preg_match( '/^(\d{1})\1{13}$/', $cnpj ) ) {
        return false;
    }
    
    $soma = 0;
    for( $i = 0; $i < 12; $i++ ) {
        
        /** verifica qual é o multiplicador. Caso o valor do caracter seja entre 0-3, diminui o valor do caracter por 5
         * caso for entre 4-11, diminui por 13 **/
        $multiplicador = ( $i <= 3 ? 5 : 13 ) - $i;
        
        $soma += $cnpj{$i} * $multiplicador; 
    } 
    $soma = $soma % 11;
    
    
    if ( $soma == 0 || $soma == 1 ) {
        $digitoUm=0;
    } else { 
        $digitoUm = 11 - $soma;
    }
    
    if ( (int)$digitoUm == (int)$cnpj{12} ) {
        
        $soma = 0;
        
        for( $i = 0; $i < 13; $i++ ) {           
        
            /** verifica qual é o multiplicador. Caso o valor do caracter seja entre 0-4, diminui o valor do caracter por 6
             * caso for entre 4-12, diminui por 14 **/
            $multiplicador = ( $i <= 4 ? 6 : 14 ) - $i;
            $soma += $cnpj{$i} * $multiplicador; 
        }
        $soma = $soma % 11;
        if ( $soma == 0 || $soma == 1) {
            $digitoDois=0;
        } else {
            $digitoDois = 11 - $soma;
        }
        if ( $digitoDois == $cnpj{13}) {
            return true;
        }
    }
    return false;
}
}    