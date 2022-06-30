<?php

namespace APP\Controller;

use APP\Model\Product;
use APP\Model\Provider;
use APP\Utils\Redirect;
use APP\Model\Validation;

use function PHPSTORM_META\type;

require '../../vendor/autoload.php';






if (empty($_POST)) {
    session_start();
    // Redirecionar o usuário
    Redirect::redirect(
        type: 'error',
        message: 'Requisição inválida!!!'
    );
}

$cnpj = $_POST ["cnpj"];
$name = $_POST ["name"];
$phone = $_POST ["phone"];

$error = array();
if(!Validation::validateName($name)){
    array_push($error, "O nome deve conter mais de 2 caracteres!!!");
}

if($error){
    Redirect::redirect(
        message: $error,
        type: 'warning'
    );
}
else{
    Redirect::redirect(
        message: "O fornecedor $name foi cadastrado com sucesso!!!"
    );
    }

// array_unshift -> Adicionar no início do array
// array_push -> Adicionar no final do array

// array_shift -> Remove do início do array
// array_pop -> Remove do final do array

