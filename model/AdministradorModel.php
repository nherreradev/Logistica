<?php


class AdministradorModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function asignarRol($id_rol, $idUsuario){
        return $this->db->ejecutarQuery("UPDATE empleado SET id_rol = '$id_rol' WHERE id_usuario = '$idUsuario'");
    }

    public function deleteUsuario($idUsuario){
        return $this->db->ejecutarQuery("delete from empleado where id_usuario = '$idUsuario'");
    }

    public function traerTodosLosUsuariosSinRol(){
        return $this->db->query("select e.id_usuario FROM empleado e where e.id_rol IS null");
    }

    





}