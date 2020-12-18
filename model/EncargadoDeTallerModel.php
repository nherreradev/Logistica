<?php


class EncargadoDeTallerModel
{

    private $db;

    public function __construct($database){
        $this->db = $database;
    }


    public function traerTodosLosTractores(){

        return $this->db->query("select * from tractor where kilometraje != -1");

    }

    public function traerTodosLosMecanicos(){

        return $this->db->query("select * from mecanico");

    }

    public function cargarServiceEnBD(
                                                            $costo,
                                                            $descripcion,
                                                            $fecha,
                                                            $repuesto_utilizado,
                                                            $id_tractor,
                                                            $id_mecanico,
                                                            $km_unidad,
                                                            $tipo_service){

         $result = $this->db->ejecutarQuery("insert into service(    costo,
                                                            descripcion,
                                                            fecha,
                                                            repuesto_utilizado,
                                                            id_tractor,
                                                            id_mecanico,
                                                            km_unidad,
                                                            tipo_service)
                                                            VALUES(                                                            
                                                            $costo, 
                                                            '$descripcion',
                                                            STR_TO_DATE('$fecha', '%Y-%m-%d'),
                                                            '$repuesto_utilizado',
                                                            $id_tractor,
                                                            $id_mecanico,
                                                            $km_unidad,
                                                            '$tipo_service');");

         return $result;


    }

    public function modificarService($id_service, $costo, $descripcion, $fecha, $repuesto_utilizado, $id_tractor, $id_mecanico, $km_unidad,$tipo_service){

        $result = $this->db->ejecutarQuery("   update service set
                                     costo = $costo,
                                     descripcion = '$descripcion',
                                     fecha = STR_TO_DATE('$fecha', '%Y-%m-%d'), 
                                     repuesto_utilizado = '$repuesto_utilizado',
                                     id_tractor = $id_tractor,
                                     id_mecanico = $id_mecanico,
                                     km_unidad = $km_unidad,
                                     tipo_service = '$tipo_service'
                                     WHERE service.id_service = $id_service;");

        return $result;

    }

    public function traerTodosLosService(){
        return $this->db->query("select * from service");

    }

    public function buscarServicePorId($id_service){
        return $this->db->query( "select *
                                    from service s
                                    join mecanico m
                                    on s.id_mecanico = m.id_mecanico
                                    JOIN tractor t
                                    on s.id_tractor = t.id_tractor
                                    where id_service = $id_service");

    }






}