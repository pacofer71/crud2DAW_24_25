<?php
namespace App\Utils;



class Validaciones{
    public static function sanearCadena(string $cad): string{
        return htmlspecialchars(trim($cad));
    }

    public static function longitudCampoCorrecta($valor, int $lMin, int $lMax): bool{
        if(strlen($valor)<$lMin || strlen($valor)>$lMax){
            $_SESSION['err_username']="*** Error el campo username debe tener entre $lMin y $lMax caracteres";
            return false;
        }
        return true;
    }
    public function isEmailValido(string $email): bool{
        if(!filter_var(FILTER_VALIDATE_EMAIL, $email)){
            $_SESSION['err_email']="*** Error debes guardar un email válido";
            return false;
        }
        return true;
    }
    public function isPerfilValido(string $perfil): bool{
        $perfiles=Datos::getPerfiles();
        if(!in_array($perfil, $perfiles)){
            $_SESSION['err_perfil']="*** Perfil inválido o no seleccionaste ninguno!!!";
            return  false;
        }
        return true;
    }

}