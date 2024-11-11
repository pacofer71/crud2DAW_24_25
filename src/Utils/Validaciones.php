<?php
namespace App\Utils;

use App\Db\User;

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
    public static function isEmailValido(string $email): bool{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['err_email']="*** Error debes guardar un email válido";
            return false;
        }
        return true;
    }
    public static function isPerfilValido(string $perfil): bool{
        $perfiles=Datos::getPerfiles();
        if(!in_array($perfil, $perfiles)){
            $_SESSION['err_perfil']="*** Perfil inválido o no seleccionaste ninguno!!!";
            return  false;
        }
        return true;
    }

    public static function existeCampo(string $nonCamp, string $valCamp):bool{
        if(User::existeCampo($nonCamp, $valCamp)){
            $_SESSION["err_$nonCamp"]="*** Error el valor $valCamp ya está registrado";
            return true;
        }
        return false;
    }

    public static function isImagenValida(string $type, int $size): bool{
        if(!in_array($type, Datos::getTypeImages())){
            $_SESSION['err_imagen']="*** Se esperaba un fichero de imagen.";
            return false;
        }
        if($size>2000000){
            $_SESSION['err_imagen']="*** La imagen no debe exceder los 2Mb de tamaño.";
            return false;
        }
        return true;
    }

    public static function pintarError(string $nombre): void{
        if(isset($_SESSION[$nombre])){
            echo "<p class='mt-2 text-red-600 text-sm italic'>{$_SESSION[$nombre]}</p>";
            unset($_SESSION[$nombre]);
        }
    }

}