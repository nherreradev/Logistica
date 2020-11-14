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



}