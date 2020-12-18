<?php


class LoginController
{

    private $loginModel;
    private $renderer;
    private $moduleInitializer;


    public function __construct($loginModel,$renderer){
        $this->loginModel = $loginModel;
        $this->renderer = $renderer;
        $this->moduleInitializer = new ModuleInitializer();

    }

    public function index(){
        echo $this->renderer->render( "view/loginView.php");
    }


    public function procesarFormulario()
    {
        if (isset($_SESSION["rol"])) {
            Router::executeActionFromController($this->moduleInitializer,$_SESSION["rol"],"index");
        } else {

            $usuarioObtenido = $_POST["usuario"];
            $passwordObtenido = $_POST["password"];
            $usuarioEncontrado = $this->loginModel->buscarEmpleado($usuarioObtenido, $passwordObtenido);

            if ($usuarioEncontrado != null) {

                $rolDeUsuario = $usuarioEncontrado[0]["descripcion"];
                $_SESSION["rol"] = $rolDeUsuario;
                $_SESSION["usuario"] = $usuarioEncontrado[0]["usuario"];
                $roles = $this->loginModel->traerTodosLosRoles();

                foreach ($roles as $rol) {

                    if($rolDeUsuario == "bloqueado"){
                        $data["mensaje"] = $usuarioEncontrado;
                        echo $this->renderer->render("./view/bloqueadoView.php", $data);
                        break;
                    } else if ($rolDeUsuario == null) {
                        $data["mensaje"] = $usuarioEncontrado;
                        echo $this->renderer->render("./view/pendienteDeRolView.php", $data);
                        break;
                    } else if ($rolDeUsuario == $rol["descripcion"]) {

                        Router::executeActionFromController($this->moduleInitializer,$rolDeUsuario,"index");

                    }
                }
            } else {
                $data["mensaje"] = "Usuario y/o contraseña incorrecto";
                echo $this->renderer->render("./view/loginView.php", $data);

            }
        }
    }


}