<?php


class AdministradorController
{

    private $loginModel;
    private $renderer;


    public function __construct($loginModel,$renderer){
        $this->loginModel = $loginModel;
        $this->renderer = $renderer;

    }

    public function index(){

        echo $this->renderer->render( "view/administradorView.php",);
    }


    public function obtenerUsuariosSinRol(){

        $usuariosSinRoles = $this->loginModel->traerTodosLosUsuariosSinRol();


            $data["mensaje"] = $usuariosSinRoles;
                echo $this->renderer->render("./view/administradorView.php", $data);


    }

}