<?php


class ProformaModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function registrarProforma(
        $id_tractor,
        $id_arrastrado,
        $id_cliente,
        $usuario,
        $fecha,
        $viaje_origen,
        $viaje_destino,
        $viaje_fecha_carga,
        $viaje_ETA,
        $carga_tipo,
        $carga_peso,
        $carga_tipo_hazard,
        $carga_temperatura_reefer,
        $costeo_km_estimados,
        $costeo_combustible_estimado,
        $costeo_viaticos_estimado,
        $costeo_peajes_estimado,
        $costeo_pesajes_estimado,
        $costeo_extras_estimado,
        $costeo_hazard_estimado,
        $costeo_reefer_estimado,
        $costeo_fee_estimado,
        $costeo_total_estimado,
        $viaje_ETD){

        $result = $this->db->ejecutarQuery("
insert into proforma(
        `id_tractor`,
        `id_arrastrado`,
        `id_cliente`,
        `usuario`,
        `fecha`,
        `viaje_origen`
        ,`viaje_destino`,
        `viaje_fecha_carga`,
        `viaje_ETA`,
        `carga_tipo`,
        `carga_peso`,
        `carga_tipo_hazard`,
        `carga_temperatura_reefer`,
        `costeo_km_estimados`,
        `costeo_combustible_estimado`,
        `costeo_viaticos_estimado`,
        `costeo_peajes_estimado`,
        `costeo_pesajes_estimado`,
        `costeo_extras_estimado`,
        `costeo_hazard_estimado`,
        `costeo_reefer_estimado`,
        `costeo_fee_estimado`,
        `costeo_total_estimado`,
        `viaje_ETD`
        )
VALUES(
        $id_tractor,
        $id_arrastrado,
        $id_cliente,
        '$usuario',
        STR_TO_DATE('$fecha', '%Y-%m-%d'),
        '$viaje_origen',
        '$viaje_destino',
        STR_TO_DATE('$viaje_fecha_carga', '%Y-%m-%d'),
        STR_TO_DATE('$viaje_ETA', '%Y-%m-%d'),        
        '$carga_tipo',
        $carga_peso,
        '$carga_tipo_hazard',
        '$carga_temperatura_reefer',
        $costeo_km_estimados,
        $costeo_combustible_estimado,
        $costeo_viaticos_estimado,
        $costeo_peajes_estimado,
        $costeo_pesajes_estimado,
        $costeo_extras_estimado,
        $costeo_hazard_estimado,
        $costeo_reefer_estimado,
        $costeo_fee_estimado,
        $costeo_total_estimado,
        STR_TO_DATE('$viaje_ETD', '%Y-%m-%d'));");

        return $result;
    }

    public function modificar($fecha,
                              $id_cliente,
                              $viaje_origen,
                              $viaje_destino,
                              $viaje_fecha_carga,
                              $viaje_ETD,
                              $viaje_ETA,
                              $carga_tipo,
                              $carga_peso,
                              $carga_tipo_hazard,
                              $carga_temperatura_reefer,
                              $costeo_km_estimados,
                              $costeo_combustible_estimado,
                              $costeo_viaticos_estimado,
                              $costeo_peajes_estimado,
                              $costeo_pesajes_estimado,
                              $costeo_extras_estimado,
                              $costeo_hazard_estimado,
                              $costeo_reefer_estimado,
                              $costeo_fee_estimado,
                              $usuario,
                              $id_tractor,
                              $id_arrastrado,
                              $id_proforma,
                              $costeo_total_estimado

                              )
    {

        $sql = "UPDATE proforma SET ";
        $sql .= "id_tractor = $id_tractor,";
        $sql .= "id_arrastrado = $id_arrastrado,";
        $sql .= "id_cliente = $id_cliente,";
        $sql .= "usuario = '$usuario',";
        $sql .= "fecha = STR_TO_DATE('$fecha', '%Y-%m-%d'),";
        $sql .= "viaje_origen = '$viaje_origen',";
        $sql .= "viaje_destino = '$viaje_destino',";
        $sql .= "viaje_fecha_carga = STR_TO_DATE('$viaje_fecha_carga', '%Y-%m-%d'),";
        $sql .= "viaje_fecha_carga = STR_TO_DATE('$viaje_ETA', '%Y-%m-%d'),";
        $sql .= "viaje_fecha_carga = STR_TO_DATE('$viaje_ETD', '%Y-%m-%d'),";
        $sql .= "carga_tipo = '$carga_tipo',";
        $sql .= "carga_peso = $carga_peso,";
        $sql .= "carga_tipo_hazard = '$carga_tipo_hazard',";
        $sql .= "carga_temperatura_reefer = '$carga_temperatura_reefer',";
        $sql .= "costeo_km_estimados = $costeo_km_estimados,";
        $sql .= "costeo_combustible_estimado = $costeo_combustible_estimado,";
        $sql .= "costeo_viaticos_estimado = $costeo_viaticos_estimado,";
        $sql .= "costeo_peajes_estimado = $costeo_peajes_estimado,";
        $sql .= "costeo_pesajes_estimado = $costeo_pesajes_estimado,";
        $sql .= "costeo_extras_estimado = $costeo_extras_estimado,";
        $sql .= "costeo_hazard_estimado = $costeo_hazard_estimado,";
        $sql .= "costeo_reefer_estimado = $costeo_reefer_estimado,";
        $sql .= "costeo_fee_estimado = $costeo_fee_estimado,";
        $sql .= "costeo_total_estimado = $costeo_total_estimado";
        $sql .= " WHERE id_proforma = $id_proforma";



        return $this->db->executeQuery($sql);


    }

    public function eliminar($id_proforma)
    {
        $sql = "DELETE FROM proforma WHERE id_proforma = $id_proforma";
        return $this->db->executeQuery($sql);
    }


    public function obtenerProformas(){
        $sql = "SELECT * FROM proforma p join cliente c on p.id_cliente = c.id_cliente";
        return $this->db->executeQuery($sql);
    }

    public function obtenerProforma($idProforma){
        $sql = "SELECT * FROM proforma p join cliente c on p.id_cliente = c.id_cliente 
                                         join empleado e on p.usuario = e.usuario 
                                         join tractor t on p.id_tractor = t.id_tractor 
                                         join arrastrado a on p.id_arrastrado = a.id_arrastrado
                                         where p.id_proforma = $idProforma ";
        return $this->db->executeQuery($sql);
    }

    public function traerTodosLosClientes(){
        return $this->db->query("select * from cliente");
    }

    public function traerTodosLosChoferes(){
        return $this->db->query("select e.usuario,  e.nombre_completo from
                                            empleado e
                                            join rol r
                                            on e.id_rol = r.id_rol
                                            join celular c
                                            on e.usuario = c.id_chofer
                                            where r.descripcion = 'chofer'
                                            and e.tipo_licencia is not null
                                            and e.usuario in (select cel.id_chofer
                                            from celular cel)");
    }

    public function traerTodosLosArrastrados(){
        return $this->db->query("select * from arrastrado where eliminado = 0");
    }

    public function traerTodosLosTractores(){
        return $this->db->query("select * from tractor where eliminado = 0");
    }

    public  function obtenerCargasCombustible($idProforma){
        return $this->db->executeQuery("select cantidad_litros, importe , cor1 as latitud, cor2 as longitud from carga_combustible c join posicion p on c.id_posicion = p.id_posicion where id_proforma = $idProforma");
    }

    public function checkearSiLaproformaEstaEnCurso($idProforma){
        return $this->db->query("select id_carga from carga_combustible where id_proforma = $idProforma");
    }

}