<?php


class RegistroModel
{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function registrarEmpleado($usuario, $password, $dni, $f_nac, $id_rol){
        $result = $this->database->queryInsertar("insert into empleado(usuario,password,dni,f_nac,id_rol)
			        VALUES('$usuario', '$password', $dni, $f_nac, $id_rol)");
         return $result;
           }



}



