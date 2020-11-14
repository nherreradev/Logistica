<?php


class RegistroController
{

    private $loginModel;
    private $renderer;


    public function __construct($loginModel,$renderer){
        $this->loginModel = $loginModel;
        $this->renderer = $renderer;

    }

    public function index(){

        echo $this->renderer->render( "view/registroView.php");
    }


    public function procesarFormulario(){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $dni = $_POST["dni"];
        $f_nac = $_POST["f_nac"];


        $fueRegistrado = $this->loginModel->registrarEmpleado($usuario, $password, $dni, $f_nac);

        if($fueRegistrado){
            echo $this->renderer->render("./view/loginCorrectoView.php");
        }else{
            $data["mensaje"] = "Error al registrar usuario";
            echo $this->renderer->render("./view/registroView.php", $data);
        }
    }

}