<?php


class RegistroModel
{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function registrarEmpleado($usuario, $password, $dni, $f_nac){
        $result = $this->database->ejecutarQuery("insert into empleado(usuario,password,dni,f_nac)
			        VALUES('$usuario', '$password', $dni, $f_nac)");
         return $result;
           }



}



