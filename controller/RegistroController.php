<?php


class RegistroController
{

    private $registroModel;
    private $renderer;


    public function __construct($registroModel,$renderer){
        $this->registroModel = $registroModel;
        $this->renderer = $renderer;
        $this->showNotifiacation = new ShowNotification($renderer,"registro" );

    }

    public function index(){

        echo $this->renderer->render( "view/registro/registroView.php");
    }


    public function procesarFormulario(){

        $usuario = $_POST["usuario"];
        $nombreCompleto = $_POST["nombreCompleto"];
        $password = $_POST["password"];
        $dni = $_POST["dni"];
        $f_nac = $_POST["f_nac"];

        $usuarioExisteEnDB= $this->registroModel->usuarioYaRegistrado($usuario);

        if(!$usuarioExisteEnDB){
            $fueRegistrado = $this->registroModel->registrarEmpleado($usuario, $nombreCompleto, $password, $dni, $f_nac);
        }

        if(isset($fueRegistrado)){
            $this->showNotifiacation->mostrar("Registro completado con éxito","green");
        }else if($usuarioExisteEnDB){
            $this->showNotifiacation->mostrar("El usuario ya existe","red");
        }else{
            $this->showNotifiacation->mostrar("Error al registrar usuario","red");
        }

    }

}