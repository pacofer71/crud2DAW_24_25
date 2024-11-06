<?php

use App\Db\User;

require __DIR__."/../vendor/autoload.php";
$cant=0;
do{
    $cant=(int) readline("\nDame la cantidad de usuarios a crear (5-50):");
    if($cant<5 || $cant>50){
        echo "\nError se esperaba una cantidad entre 5 y 50";
    }
}while($cant<5 || $cant>50);

User::crearRegistros($cant);
echo "\nSe han creado $cant registros.".PHP_EOL;