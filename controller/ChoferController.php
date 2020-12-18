<?php


class ChoferController
{
    private $choferModel;
    private $renderer;
    private $data;
    private $showNotifiacation;


    public function __construct($choferModel, $renderer)
    {
        if(RoleValidation::validarRol("chofer")){
            $this->choferModel = $choferModel;
            $this->renderer = $renderer;
            $this->data["chofer"] = true;
            $this->showNotifiacation = new ShowNotification($renderer,"chofer" );
        }else{
            RoleValidation::logoutPorRolNoValido($renderer);
        }
    }

    public function index()
    {
        $usuario = $_SESSION["usuario"];
        $rolDeUsuario = $_SESSION["rol"];


        if(!$this->choferModel->validarSiELUsuarioEsChoferYSiTodosLosDatosEstanCargados($usuario,$rolDeUsuario)){

            $informacionDeChofer =$this->choferModel->buscarInformacionDeChofer($usuario);


            $this->data["faltaValidarLicenciaYORegistro"] = $informacionDeChofer;

            echo $this->renderer->render("view/chofer/choferSinDatosValidadosView.php", $this->data);
            exit();

        }

        echo $this->renderer->render("view/chofer/choferView.php",$this->data);
    }


    public function mostrarLasProformasPendientesDeFinalizar(){

        $usuario = $_SESSION["usuario"];
        $traerTodasLasProformasPendientesDeFinalizar = $this->choferModel->listarProformas($usuario);


        if ($traerTodasLasProformasPendientesDeFinalizar != null) {
            $this->data["listadoDeProformas"] = $traerTodasLasProformasPendientesDeFinalizar;
            echo $this->renderer->render("view/chofer/listadoDeProformasView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay Proformas a cargar","red");
        }
    }

    public function modificarProformaConcreta()
    {
        $id_proforma = $_POST["id_proforma"];

        $this->data["mostrarFormularioCargaDeDatosDelViaje"] = $this->choferModel->encontrarProformaPorId($id_proforma);

        $costoCombustible = $this->choferModel->obtenerTotalCargaCombustible($id_proforma);

        $this->data["costo_combustible_real"] = $costoCombustible;

        echo $this->renderer->render("view/chofer/mostrarFormularioCargaDeDatosDelViajeView.php", $this->data);
    }

    public function procesarDatosDeViaje(){

        $id_proforma = $_POST["id_proforma"];

        $costeo_km_reales = $_POST["costeo_km_reales"];
        $costeo_combustible_real = $_POST["costeo_combustible_real"];
        $fecha_partida_real = $_POST["fecha_partida_real"];
        $fecha_arribo_real = $_POST["fecha_arribo_real"];
        $costeo_viaticos_real = $_POST["costeo_viaticos_real"];
        $costeo_peajes_real = $_POST["costeo_peajes_real"];
        $costeo_pesajes_real = $_POST["costeo_pesajes_real"];
        $costeo_extras_real = $_POST["costeo_extras_real"];
        $costeo_hazard_real = $_POST["costeo_hazard_real"];
        $costeo_reefer_real = $_POST["costeo_reefer_real"];
        $costeo_fee_real = $_POST["costeo_fee_real"];

        $result = $this->choferModel->insertarDatosDelViajeEnBD(
            $id_proforma,
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
            $costeo_fee_real);

        $result = $this->choferModel->actualizarTotalReal($id_proforma);

        $result = $this->choferModel->actualizarTotalEstimado($id_proforma);

            if ($result) {
                $this->showNotifiacation->mostrar("Modificacion Exitosa","green");
            } else {
                $this->showNotifiacation->mostrar("Fallo la modificacion","red");
            }

    }


    public function verDetalleDeProformaConcretaAModificar(){

        $idProforma = $_POST["id_proforma"];

        $this->data["verDetalleDeProformaConcretaAModificar"] = $this->choferModel->encontrarProformaPorId($idProforma);

        echo $this->renderer->render("view/chofer/verDetalleDeProformaConcretaAModificarView.php", $this->data);


    }

    public function corregirProformaEnBD(){

        $this->procesarDatosDeViaje();

    }



    public function mostrarFormularioCargaCombustible(){

        $this->data["id_proforma"] = $_GET["id_proforma"];


        //esto lo alimenta un metodo de adri
        $this->data["lugar"] = "Cordoba";



        echo $this->renderer->render("view/chofer/cargaCombustibleView.php", $this->data);
    }

    public function procesarCargaCombustible(){


        $cor1 = $_POST["latitud"];


        $cor2 = $_POST["longitud"];


        $lugar = $_POST["lugar"];

        $this->choferModel->persistirPosicion($cor1, $cor2);

        $id_posicion = $this->choferModel->traerUltimoIdDePosicionInsertado();

        $id_posicion_limpio = $id_posicion[0]["id"];



        $cantidad_litros = $_POST["cantidad_litros"];

        $importe = $_POST["importe"];



        $id_proforma = $_POST["id_proforma"];

        $result = $this->choferModel->persistirCargarDeCombustible($cantidad_litros, $importe,$lugar, $id_proforma, $id_posicion_limpio);

        if ($result) {
            $this->showNotifiacation->mostrar("Carga Exitosa","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al cargar","red");
        }

       
    }

    public function cerrarSesion()
    {
        session_destroy();
        echo $this->renderer->render("./view/loginView.php");

    }


}
