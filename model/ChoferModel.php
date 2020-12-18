<?php


class ChoferModel
{
    private $database;

    public function __construct($database){
        $this->database = $database;
    }



    public function cargarLicenciaYCelular($usuario,$tipoLicencia){

        return $this->database->ejecutarQuery("UPDATE empleado SET tipo_licencia = '$tipoLicencia' WHERE usuario = '$usuario'");


    }

    public function listarProformas($usuario){
        return $this->database->query(" select proforma.id_proforma, cliente.denominacion from proforma 
                                        JOIN cliente
                                        on proforma.id_cliente = cliente.id_cliente
                                        JOIN empleado
                                        on proforma.usuario = empleado.usuario
                                        where empleado.usuario = '$usuario'
                                        and proforma.estado = 'PENDIENTE';");
    }



    public function encontrarProformaPorId($idProforma){
        return $this->database->query("SELECT * FROM `proforma` 
                                        JOIN cliente 
                                        on proforma.id_cliente = cliente.id_cliente
                                        JOIN empleado
                                        on proforma.usuario = empleado.usuario
                                        WHERE proforma.id_proforma = $idProforma");
                                            }

    public function insertarDatosDelViajeEnBD($id_proforma,
                                              $costeo_km_reales,
                                              $costeo_combustible_real,
                                              $fecha_partida_real,
                                              $fecha_arribo_real,
                                              $costeo_viaticos_real,
                                              $costeo_peajes_real,
                                              $costeo_pesajes_real,
                                              $costeo_extras_real,
                                              $costeo_hazard_real,
                                              $costeo_reefer_real,
                                              $costeo_fee_real){

                        $costeo_total_real =  $costeo_km_reales+
                                              $costeo_combustible_real+
                                              $costeo_viaticos_real+
                                              $costeo_peajes_real+
                                              $costeo_pesajes_real+
                                              $costeo_extras_real+
                                              $costeo_hazard_real+
                                              $costeo_reefer_real+
                                              $costeo_fee_real;

        return $this->database->ejecutarQuery("UPDATE proforma p SET 
                                                p.costeo_km_reales = $costeo_km_reales,
                                                p.costeo_combustible_real = $costeo_combustible_real,
                                                p.fecha_partida_real = STR_TO_DATE('$fecha_partida_real', '%Y-%m-%d'),
                                                p.fecha_arribo_real = STR_TO_DATE('$fecha_arribo_real', '%Y-%m-%d'),
                                                p.costeo_viaticos_real = $costeo_viaticos_real,
                                                p.costeo_peajes_Real = $costeo_peajes_real,
                                                p.costeo_pesajes_real = $costeo_pesajes_real,
                                                p.costeo_extras_real = $costeo_extras_real,
                                                p.costeo_hazard_real = $costeo_hazard_real,
                                                p.costeo_reefer_real = $costeo_reefer_real,
                                                p.costeo_fee_real = $costeo_fee_real,
                                                p.estado = 'FINALIZADO',
                                                p.costeo_total_real = $costeo_total_real
                                                where p.id_proforma = $id_proforma;");
    }

    public function buscarInformacionDeChofer($usuario){
        return $this->database->query("SELECT * FROM empleado LEFT JOIN rol ON empleado.id_rol = rol.id_rol LEFT JOIN celular on empleado.usuario = celular.id_chofer LEFT JOIN tipo_de_licencia on empleado.tipo_licencia = tipo_de_licencia.id_tipo_licencia WHERE usuario = '$usuario'");
    }


    public function validarSiELUsuarioEsChoferYSiTodosLosDatosEstanCargados($usuario,$rolDeUsuario){
        $esChoferConDatosValidados = true;

        if($rolDeUsuario == "chofer"){
            $esChoferConDatosValidados= $this->validaSiElChoferTieneTodosLosDatosCargados($usuario);
        }

        return $esChoferConDatosValidados;
    }

    private function validaSiElChoferTieneTodosLosDatosCargados($usuario){

        $losDatosEstanCargados = false;

        $informacionDeChofer = $this->buscarInformacionDeChofer($usuario);

        if($informacionDeChofer[0]["nro"] == null || $informacionDeChofer[0]["tipo_licencia"] == null){

            $losDatosEstanCargados = false;

        }else{

            $losDatosEstanCargados = true;
        }
        return $losDatosEstanCargados;
    }


    public function obtenerTotalCargaCombustible($idProforma){
        return $this->database->executeQuery("SELECT sum(importe) as importe from carga_combustible where id_proforma = $idProforma ");
    }



    public function persistirCargarDeCombustible($cantidad_litros, $importe,$lugar, $id_proforma, $id_posicion){
        return $this->database->executeQuery("INSERT INTO `carga_combustible` (`cantidad_litros`, `importe`, `lugar`, `id_proforma`, `id_posicion`) 
                                                VALUES('$cantidad_litros', $importe, '$lugar', $id_proforma, $id_posicion);");
    }

    public function actualizarTotalReal($idProforma){
        return $this->database->executeQuery("update proforma set costeo_total_real =  ifnull(costeo_combustible_real,0)  + ifnull(costeo_viaticos_real,0) + ifnull(costeo_peajes_real,0) + ifnull(costeo_pesajes_real,0) + ifnull(costeo_extras_real,0) + ifnull(costeo_hazard_real,0) + ifnull(costeo_reefer_real,0) + ifnull(costeo_fee_real,0) where id_proforma = $idProforma");
    }

    public function actualizarTotalEstimado($idProforma){
        return $this->database->executeQuery("update proforma set costeo_total_estimado =  ifnull(costeo_combustible_estimado,0)  + ifnull(costeo_viaticos_estimado,0) + ifnull(costeo_peajes_estimado,0) + ifnull(costeo_pesajes_estimado,0) + ifnull(costeo_extras_estimado,0) + ifnull(costeo_hazard_estimado,0) + ifnull(costeo_reefer_estimado,0) + ifnull(costeo_fee_estimado,0) where id_proforma = $idProforma");
    }
	
	public function persistirPosicion($cor1, $cor2){

        return $this->database->executeQuery("INSERT INTO `posicion` (`cor1`, `cor2`) VALUES ('$cor1', '$cor2');");


    }

    public function traerUltimoIdDePosicionInsertado(){

        return $this->database->query("SELECT MAX(id_posicion) as id FROM posicion;");



    }

}
