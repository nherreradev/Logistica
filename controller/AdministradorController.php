<?php

class AdministradorController
{

    private $administradorModel;
    private $renderer;
    private $data;
    private $showNotifiacation;


    public function __construct($administradorModel, $renderer)
    {
        if(RoleValidation::validarRol("administrador")){
            $this->administradorModel = $administradorModel;
            $this->renderer = $renderer;
            $this->data["administrador"] = true;
            $this->showNotifiacation = new ShowNotification($renderer,"administrador" );
        }else{
            RoleValidation::logoutPorRolNoValido($renderer);
        }
    }

    public function index()
    {
        echo $this->renderer->render("view/administrador/administradorView.php",$this->data);
    }


    public function obtenerUsuariosSinRol()
    {
        $traerTodosLosUsuariosSinRol = $this->administradorModel->traerTodosLosUsuariosSinRol();

        if ($traerTodosLosUsuariosSinRol != null) {
            $roles = $this->administradorModel->traerTodosLosRoles();
            $this->data["listadoDeUsuariosSinRol"] = $traerTodosLosUsuariosSinRol;
            $this->data["roles"] = $roles;
            echo $this->renderer->render("./view/administrador/listadoDeUsuariosSinRolView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay usuarios pendientes de asignar rol","green");
        }
    }

    public function asignarRolAUsuario()
    {
        if (isset($_POST["usuario"])) {
            $idUsuario = $_POST["usuario"];
        }
        if (isset($_POST["rol"])) {
            $rol = $_POST["rol"];
        }
        $fueAssignado = $this->administradorModel->asignarRol($rol, $idUsuario);

        if ($fueAssignado) {
            $this->showNotifiacation->mostrar("El rol ha sido asignado correctamente","green");
        } else {
            $this->showNotifiacation->mostrar("El rol no se pudo asignar correctamente","red");
        }
    }

    public function traerTodosLosUsuarios()
    {
        $traerTodosLosUsuarios = $this->administradorModel->traerTodosLosUsuarios();

        if ($traerTodosLosUsuarios != null) {
            $this->data["listadoDeUsuariosABloquear"] = $traerTodosLosUsuarios;
            echo $this->renderer->render("./view/administrador/listadoDeUsuariosView.php",$this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay usuarios para borrar o bloquear","red");
        }
    }


    public function bloquearUnUsuario()
    {

        $usuario = $_POST["usuario"];
        $rolesEnLaBaseDeDatos = $this->administradorModel->traerTodosLosRoles();
        $idRolBloqueado = null;

        if ($rolesEnLaBaseDeDatos) {
            foreach ($rolesEnLaBaseDeDatos as $rol) {
                if ($rol["descripcion"] == "bloqueado") {
                    $idRolBloqueado = $rol["id_rol"];
                }
            }
        }

        $fueBloqueado = $this->administradorModel->bloquearAUnUsuario($usuario, $idRolBloqueado);

        if ($fueBloqueado) {
            $this->showNotifiacation->mostrar("Se ha bloqueado el usuario del sistema","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al bloquear el usuario","red");
        }
    }



    public function traerDatosDelUsuarioSeleccionadoParaAModificar()
    {
        $roles = $this->administradorModel->traerTodosLosRoles();
        $usuario = $this->administradorModel->buscarUsuarioPorId($_POST["usuario"]);
        $this->data["mostrarDatosDelUsuarioConcretoAModificar"] = $usuario;
        $this->data["roles"] = $roles;
        echo $this->renderer->render("./view/administrador/mostrarDatosDelUsuarioConcretoAModificarView.php", $this->data);

    }


    public function modificarUsuarioSeleccionado()
    {

        $traerUsuario = $this->administradorModel->buscarUsuarioPorId($_POST["usuario"]);

        $usuarioAModificar = $traerUsuario[0]["usuario"];

        $nombre_completo = $_POST["nombreCompleto"];
        $dni = $_POST["dni"];
        $f_nac = $_POST["f_nac"];
        $id_rol = $_POST["rol"];

        $fueModificado = $this->administradorModel->modificarUnUsuario($usuarioAModificar, $nombre_completo, $dni, $f_nac, $id_rol);

        if ($fueModificado) {
            $this->showNotifiacation->mostrar("Modificacion Exitosa","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo la modificacion","red");
        }

    }

    public function cerrarSesion()
    {
        session_destroy();
        echo $this->renderer->render("./view/loginView.php");

    }


}
