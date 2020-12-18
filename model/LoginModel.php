<?php


class LoginModel
{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function buscarEmpleadoPorUsuarioYPassword($nombre, $password){
        return $this->database->query("SELECT * FROM empleado WHERE usuario = '$nombre' and password = '$password'");
    }

    public function buscarEmpleado($usuario,$password){
        return $this->database->query("SELECT * FROM empleado LEFT JOIN rol ON empleado.id_rol = rol.id_rol WHERE usuario = '$usuario' and password = '$password'");
    }


    public function traerTodosLosRoles(){
        return $this->database->query("select * FROM rol");
    }


}