<?php

namespace App\WebService;

class Speedio{

    /**
     *     URL base da API do Speedio
     */
    const URL_BASE = 'https://api-publica.speedio.com.br';

    /**
     * Método responsavél por consultar o CPJ nas APIs do Speedio
     * @param string $cnpj
     * @return array
     */

    public function consultarCNPJ($cnpj){
        return $this->get('/buscarcnpj?cnpj='.$cnpj);
    }

    /**
     * Método responsável por executar a consulta nas APIs do Speedio
     */
    public function get($resource){
        //endpoint completo da API
        $endpoint = self::URL_BASE.$resource;

        //inicia o curl
        $curl = curl_init();

        //configurações do curl
        curl_setopt_array($curl,[
            CURLOPT_URL =>$endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //EXECUTA A REQUISIÇÃO
        $response = curl_exec($curl);

        //FECHA A CONEXÃO
        curl_close($curl);

        //RESPONSE EM ARRAY
        
        $responseArray = json_decode($response,true);

        // //retorna o array com os dados
         return is_array($responseArray) ? $responseArray : [];
    }
}