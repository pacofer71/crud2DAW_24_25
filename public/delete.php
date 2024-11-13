<?php

use App\Db\User;

session_start();
$id=filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if(!$id || $id<=0){
    header("Location:users.php");
    exit;
}
require __DIR__."/../vendor/autoload.php";

$usuario=User::read($id);
if(count($usuario)==0){
    header("Location:users.php");
    exit;
}
$imagen=$usuario[0]->getImagen();
User::delete($id);
if(basename($imagen)!='rana.jpg'){
    unlink($imagen);
}
$_SESSION['mensaje']="Usuario Borrado";
header("Location:users.php");