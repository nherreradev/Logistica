<?php


class RoleValidation
{


    public static function validarRol($rolAChekear){
        $rolValido = false ;
        if (isset($_SESSION["rol"])) {
            if ($_SESSION["rol"] == $rolAChekear) {
                $rolValido = true;
            }
        }
        return $rolValido;
    }


    public static function logoutPorRolNoValido($renderer){
        session_destroy();
        echo $renderer->render("view/loginView.php");
        exit();
    }

}