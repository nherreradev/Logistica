<?php


class RegistroModel
{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function registrarEmpleado($usuario, $nombreCompleto, $password, $dni, $f_nac){
        $result = $this->database->ejecutarQuery("insert into empleado(usuario,nombre_completo,password,dni,f_nac)
			        VALUES('$usuario', '$nombreCompleto', '$password', $dni, STR_TO_DATE('$f_nac', '%Y-%m-%d'))");
         return $result;
           }



    public function usuarioYaRegistrado($usuario)
    {
        $result = $this->database->ejecutarQuery("SELECT * FROM empleado WHERE usuario = '$usuario'");

        return mysqli_num_rows($result);
    }

}



