<?php


class EncargadoDeTallerController
{

    private $encargadoDeTallerModel;
    private $renderer;
    private $data;
    private $showNotifiacation;


    public function __construct($encargadoDeTallerModel, $renderer)
    {
        if(RoleValidation::validarRol("encargadoDeTaller")){
            $this->encargadoDeTallerModel = $encargadoDeTallerModel;
            $this->renderer = $renderer;
            $this->data["encargadoDeTaller"] = true;
            $this->showNotifiacation = new ShowNotification($renderer,"encargadoDeTaller" );
        }else{
            RoleValidation::logoutPorRolNoValido($renderer);
        }
    }


    public function index()
    {
        echo $this->renderer->render("view/encargadoDeTaller/encargadoDeTallerView.php",$this->data);
    }

    public function mostrarFormularioAltaDeService(){

        $this->data["cargarSelectTractor"] = $this->encargadoDeTallerModel->traerTodosLosTractores();
        $this->data["cargarSelectMecanico"] = $this->encargadoDeTallerModel->traerTodosLosMecanicos();

        echo $this->renderer->render("./view/encargadoDeTaller/formularioAltaDeServiceView.php", $this->data);

    }

    public function procesarService(){

        $costo = $_POST["costo"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];
        $repuesto_utilizado = $_POST["repuesto_utilizado"];
        $id_tractor = $_POST["id_tractor"];
        $id_mecanico = $_POST["id_mecanico"];
        $km_unidad = $_POST["km_unidad"];
        $tipo_service = $_POST["tipo_service"];


        $result = $this->encargadoDeTallerModel->cargarServiceEnBD(
            $costo,
            $descripcion,
            $fecha,
            $repuesto_utilizado,
            $id_tractor,
            $id_mecanico,
            $km_unidad,
            $tipo_service);

        if ($result) {
            $this->showNotifiacation->mostrar("Se cargo el service correctamente","green");
        } else {
            $this->showNotifiacation->mostrar("Error al cargar el service","red");
        }
    }



    public function mostrarFormularioModificarService(){

        $id_service = $_POST["id_service"];

        $this->data["cargarSelectTractor"] = $this->encargadoDeTallerModel->traerTodosLosTractores();
        $this->data["cargarSelectMecanico"] = $this->encargadoDeTallerModel->traerTodosLosMecanicos();
        $this->data["modificarServiceConcreto"] = $this->encargadoDeTallerModel->buscarServicePorId($id_service);

        echo $this->renderer->render("./view/encargadoDeTaller/modificarServiceConcretoView.php", $this->data);

    }

    public function modificarService(){

        $id_service = $_POST["id_service"];
        $costo = $_POST["costo"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];
        $repuesto_utilizado = $_POST["repuesto_utilizado"];
        $id_tractor = $_POST["id_tractor"];
        $id_mecanico = $_POST["id_mecanico"];
        $km_unidad = $_POST["km_unidad"];
        $tipo_service = $_POST["tipo_service"];

        $result = $this->encargadoDeTallerModel->modificarService(
            $id_service,
            $costo,
            $descripcion,
            $fecha,
            $repuesto_utilizado,
            $id_tractor,
            $id_mecanico,
            $km_unidad,
            $tipo_service);

        if ($result) {
            $this->showNotifiacation->mostrar("Se cargo el service correctamente","green");
        } else {
            $this->showNotifiacation->mostrar("Error al cargar el service","red");
        }
    }


    public function traerTodosLosService(){

        $traerPosiblesService = $this->encargadoDeTallerModel->traerTodosLosService();

        if ($traerPosiblesService != null) {
            $this->data["mostrarTodosLosServicesRegistrados"] = $traerPosiblesService;
            echo $this->renderer->render("./view/encargadoDeTaller/mostrarTodosLosServicesRegistradosView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay services registrados","red");
        }
    }

    public function verDetalleDeServices(){
        $idService = $_POST["id_service"];

        $this->data["verDetalleDeServices"] = $this->encargadoDeTallerModel->buscarServicePorId($idService);

        echo $this->renderer->render("./view/encargadoDeTaller/mostrarDetalleDeServicesView.php", $this->data);
    }



    public function cerrarSesion()
    {
        session_destroy();
        echo $this->renderer->render("./view/loginView.php");

    }

}

