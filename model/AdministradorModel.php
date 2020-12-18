<?php


class AdministradorModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function buscarUsuarioPorId($usuario){
        return $this->db->query("SELECT * FROM empleado emp left join rol rol ON rol.id_rol =  emp.id_rol where usuario = '$usuario'");
    }

    public function asignarRol($id_rol, $usuario){
        return $this->db->ejecutarQuery("UPDATE empleado SET id_rol = '$id_rol' WHERE usuario = '$usuario'");
    }

    public function deleteUsuario($usuario){
        return $this->db->ejecutarQuery("delete from empleado where usuario = '$usuario'");
    }

    public function traerTodosLosUsuariosSinRol(){
        return $this->db->query("select * FROM empleado e where e.id_rol IS null");
    }

    public function traerTodosLosUsuarios(){
        return $this->db->query("SELECT * FROM empleado emp left join rol rol ON rol.id_rol =  emp.id_rol where emp.id_rol <> 1 OR emp.id_rol IS null ");
    }


    public function modificarUnUsuario($usuarioAModificar, $nombreCompleto, $dni,$f_nac,$id_rol){
        return $this->db->ejecutarQuery("UPDATE empleado SET 
 nombre_completo = '$nombreCompleto' ,
  dni = $dni,
   f_nac = STR_TO_DATE('$f_nac', 
  '%Y-%m-%d'), 
  id_rol = '$id_rol'
   WHERE usuario = '$usuarioAModificar'");
    }

    

    public function traerTodosLosRoles(){
        return $this->db->query("select * FROM rol");
    }

    public function bloquearAUnUsuario($usuario,$idRolBloqueado){
        return $this->db->ejecutarQuery("UPDATE empleado SET id_rol = $idRolBloqueado 
                                        WHERE usuario = '$usuario'");
    }




    





}