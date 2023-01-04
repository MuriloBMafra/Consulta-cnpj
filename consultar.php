<?php

require __DIR__.'/vendor/autoload.php';

$cnpj = $_POST['cnpj'];
//Importando a class Speedio
use \App\WebService\Speedio;

//nova instancia de Speedio

$obSpeedio = new Speedio;

//Utilizando o metodo de consulta para consultar o CNPJ
$resultado = $obSpeedio->consultarCNPJ($cnpj);

echo "<pre>";
print_r($resultado);
echo "<pre>"; exit;