<?php


class SupervisorController
{
    private $supervisorModel;
    private $renderer;
    private $data;
    private $showNotifiacation;


    public function __construct($supervisorModel, $renderer)
    {
        if(RoleValidation::validarRol("supervisor")){
            $this->supervisorModel = $supervisorModel;
            $this->renderer = $renderer;
            $this->data["supervisor"] = true;
            $this->showNotifiacation = new ShowNotification($renderer,"supervisor" );
        }else{
            RoleValidation::logoutPorRolNoValido($renderer);
        }
    }


    public function index()
    {
        echo $this->renderer->render("view/supervisor/supervisorView.php",$this->data);
    }

    //METODOS DE VALIDAR LICENCIA

    public function traerChoferesQueNoTienenLicenciaValidada(){

        $traerTodosLosChoferesSinLicenciaValida = $this->supervisorModel->traerChoferesAValidarLicencia();
        $traerTodosLosTiposDeLicencia = $this->supervisorModel->traerTiposDeLicencia();

        if ($traerTodosLosChoferesSinLicenciaValida != null) {
            $this->data["traerChoferesQueNoTienenLicenciaValidada"] = $traerTodosLosChoferesSinLicenciaValida;
            $this->data["traerTodosLosTiposDeLicencia"] = $traerTodosLosTiposDeLicencia;
            echo $this->renderer->render("./view/supervisor/validarLicencia/traerChoferesQueNoTienenLicenciaValidadaView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay Choferes con licencia sin validar","red");
        }
    }

    public function validarLicenciaDeChoferSeleccionado(){

        if (isset($_POST["usuario"])) {
            $usuario = $_POST["usuario"];
        }

        if (isset($_POST["idTipoDeLicencia"])) {
            $idTipoDeLicencia = $_POST["idTipoDeLicencia"];
        }
        $fueValidado = $this->supervisorModel->validarLicenciaChofer($usuario,$idTipoDeLicencia);

        if ($fueValidado) {
            $this->showNotifiacation->mostrar("Se ha validado la licencia del chofer con exito","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al validar licencia","red");
        }

    }


    //METODOS DE AMLA CELULARES

    public function listarTodosLosCelulares(){

        $traerTodosLosCelularesRegistrados = $this->supervisorModel->traerTodosLosCelulares();

        if ($traerTodosLosCelularesRegistrados != null) {
            $this->data["listadoDeCelulares"] = $traerTodosLosCelularesRegistrados;
            echo $this->renderer->render("./view/supervisor/celular/listadoDeCelularesView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay celulares registrados","red");
        }
    }

    public function cargarFormularioDeAltaACelular()
    {
        echo $this->renderer->render("./view/supervisor/celular/mostrarFormularioDeAltaCelularView.php",$this->data);
    }


    public function procesarFormularioCelular(){

        $numeroCelular = $_POST["numeroCelular"];

        $celularYaRegistrado = $this->supervisorModel->celularYaRegistrado($numeroCelular);

        if(!$celularYaRegistrado){
            $fueRegistrado = $this->supervisorModel->darDeAltaCelular($numeroCelular);
        }
        if($fueRegistrado){
            $this->showNotifiacation->mostrar("Registro completado con éxito","green");
        }else if($celularYaRegistrado){
            $this->showNotifiacation->mostrar("El celular ya existe","red");
        }else{
            $this->showNotifiacation->mostrar("Error al registrar celular","red");
        }
    }




    public function quitarChoferAsignado(){

        $idCelular = $_POST["idCelular"];

        $choferDesasignado = $this->supervisorModel->desasignarCelular($idCelular);

        if ($choferDesasignado) {
            $this->showNotifiacation->mostrar("El celular ha quedado sin asignar","green");
        } else {
            $this->showNotifiacation->mostrar("No se pudo modificar la asignacionr","red");
        }
    }


    public function mostrarDatosDelCelularConcretoAModificar(){
        $idCelular = $_POST["idCelular"];

        $celularConcretoAModificar = $this->supervisorModel->traerCelularPorId($idCelular);
        $this->data["mostrarDatosDelCelularConcretoAModificar"] = $celularConcretoAModificar;

        echo $this->renderer->render("./view/supervisor/celular/mostrarDatosDelCelularConcretoAModificarView.php", $this->data);
    }



    public function modificarCelularConcreto(){

        $idCelular =  $_POST["idCelular"];
        $numeroDeCelular = $_POST["numeroCelular"];

        $fueModificado = $this->supervisorModel->modificarCelular($idCelular,$numeroDeCelular);

        if ($fueModificado) {
            $this->showNotifiacation->mostrar("Se ha modificado la informacion del celular","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al modificar informacion del celular","red");
        }
    }


    public function mostrarCelularesSinAsignacionDeChofer(){

        $traerTodosLosCelularesSinChoferAsignado = $this->supervisorModel->traerTodosLosCelularesSinAsignar();
        $traerTodosLosChoferesSinCelularAsignado = $this->supervisorModel->traerATodosLosChoferesSinCelularAsignado();

        if($traerTodosLosChoferesSinCelularAsignado == null){
            $this->showNotifiacation->mostrar("No hay choferes para asignar","red");
        }else{

            if ($traerTodosLosCelularesSinChoferAsignado != null) {
                $this->data["mostrarCelularesSinAsignacionDeChofer"]= $traerTodosLosCelularesSinChoferAsignado;
                $this->data["choferesSinCelularAsignado"]= $traerTodosLosChoferesSinCelularAsignado;
                echo $this->renderer->render("./view/supervisor/celular/mostrarCelularesSinAsignacionDeChoferView.php",$this->data);
            } else {
                $this->showNotifiacation->mostrar("No hay celulares sin ser asignados","red");
            }
        }
    }

    public function asignarCelularAChofer(){
        $idCelular =  $_POST["idCelular"];
        $choferAsignado = $_POST["usuario"];

        $fueAsignado = $this->supervisorModel->asignarCelular($idCelular,$choferAsignado);

        if ($fueAsignado) {
            $this->showNotifiacation->mostrar("Se ha asignado el chofer correctamente","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al asignar el chofer","red");
        }
    }

    //METODOS DE AMBL EQUIPOS
    //METODOS DE AMBL TRACTORES

    public function listarTodosLosTractores(){

        $traerTodosLostractoresRegistrados = $this->supervisorModel->listarTractores();

        if ($traerTodosLostractoresRegistrados != null) {
            $this->data["listadoDeTractor"] = $traerTodosLostractoresRegistrados;

            echo $this->renderer->render("./view/supervisor/equipo/tractor/listadoDeTractorView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay tractores registrados","red");
        }
    }

    public function mostrarDetalleDeTractor(){

        $idTractor = $_POST["id_tractor"];
        $this->data["detalleTractor"] = $this->supervisorModel->buscarTractorPorId($idTractor);
        echo $this->renderer->render("./view/supervisor/equipo/tractor/detalleTractorView.php", $this->data);
    }

    public function darAltaATractor()
    {
        $this->data["mostrarFormularioDeAltaDeTractor"] = true ;
        echo $this->renderer->render("./view/supervisor/equipo/tractor/mostrarFormularioDeAltaDeTractorView.php", $this->data);
    }

    public function procesarFormularioTractor(){

        $anioFabricacion = $_POST["anioFabricacion"];
        $nroMotor = $_POST["nroMotor"];
        $nroChasis = $_POST["nroChasis"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $patente = $_POST["patente"];
        $kilometraje = $_POST["kilometraje"];

        $tractoreExisteEnBD= $this->supervisorModel->tractorYaRegistrado($patente);

        if(!$tractoreExisteEnBD){
            $fueRegistrado = $this->supervisorModel->registrarTractor($anioFabricacion , $nroMotor, $nroChasis, $marca , $modelo , $patente , $kilometraje );
        }

        if(isset($fueRegistrado)){
            $this->showNotifiacation->mostrar("Registro completado con éxito","green");
        }else if($tractoreExisteEnBD){
            $this->showNotifiacation->mostrar("El tractor ya existe","red");
        }else{
            $this->showNotifiacation->mostrar("Error al registrar tractor","red");
        }

    }

    public function listarTodosLosTractoresAEliminar(){

        $traerTodosLostractoresRegistrados = $this->supervisorModel->listarTractores();

        if ($traerTodosLostractoresRegistrados != null) {
            $this->data["listadoDeTractoresAEliminar"] = $traerTodosLostractoresRegistrados;
            echo $this->renderer->render("./view/supervisor/equipo/tractor/listadoDeTractoresAEliminarView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay tractores registrados para eliminar","red");
        }
    }


    public function eliminarTractor(){

        $idTractor = $_POST["id_tractor"];

        $fueBorrado = $this->supervisorModel->eliminarTractor($idTractor);

        if ($fueBorrado) {
            $this->showNotifiacation->mostrar("Se ha borrado el tractor de la base de datos","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al eliminar","red");
        }
    }

    public function listarTodosLosPosiblesTractoresAModificar()
    {

        $traerTodosLostractoresRegistrados = $this->supervisorModel->listarTractores();

        if ($traerTodosLostractoresRegistrados != null) {
            $this->data["listarTodosLosPosiblesTractoresAModificar"] = $traerTodosLostractoresRegistrados;
            echo $this->renderer->render("./view/supervisor/equipo/tractor/listarTodosLosPosiblesTractoresAModificarView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay tractores registrados para modificar","red");
        }
    }

    public function mostrarDatosDelTractorConcretoAModificar(){
        $idTractor = $_POST["id_tractor"];
        $this->data["mostrarDatosDelTractorConcretoAModificar"] = $this->supervisorModel->buscarTractorPorId($idTractor);
        echo $this->renderer->render("./view/supervisor/equipo/tractor/mostrarDatosDelTractorConcretoAModificarView.php", $this->data);
    }

    public function modificarTractorConcreto(){

        $idTractor =  $_POST["id_tractor"];
        $anioFabricacion = $_POST["anioFabricacion"];
        $nroMotor = $_POST["nroMotor"];
        $nroChasis = $_POST["nroChasis"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $patente = $_POST["patente"];
        $kilometraje = $_POST["kilometraje"];

        $fueModificado = $this->supervisorModel->modificarTractor($idTractor,$anioFabricacion,$nroMotor,$nroChasis,$marca,$modelo,$patente,$kilometraje);

        if ($fueModificado) {
            $this->showNotifiacation->mostrar("Se ha modificado el tractor en la base de datos","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al modificar cliente","red");
        }
    }

    //METODOS DE AMBL ARRASTRADOS

    public function listarTodosLosArrastrados(){

        $traerTodosLosArrastradosRegistrados = $this->supervisorModel->listarArrastrados();

        if ($traerTodosLosArrastradosRegistrados != null) {
            $this->data["listadoDeArrastrado"] = $traerTodosLosArrastradosRegistrados;
            echo $this->renderer->render("./view/supervisor/equipo/arrastrado/listadoDeArrastradoView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay arrastrados registrados","red");
        }
    }

    public function mostrarDetalleDeArrastrado(){

        $idArrastrado = $_POST["id_arrastrado"];
        $this->data["detalleArrastrado"] = $this->supervisorModel->buscarArrastradoPorId($idArrastrado);
        echo $this->renderer->render("./view/supervisor/equipo/arrastrado/detalleArrastradoView.php", $this->data);
    }

    public function darAltaAArrastrado()
    {
        echo $this->renderer->render("./view/supervisor/equipo/arrastrado/mostrarFormularioDeAltaDeArrastradoView.php",$this->data);
    }

    public function procesarFormularioArrastrado(){

        $patente = $_POST["patente"];
        $nroChasis = $_POST["nroChasis"];

        $arrastradoExisteEnBD= $this->supervisorModel->arrastradoYaRegistrado($patente);

        if(!$arrastradoExisteEnBD){
            $fueRegistrado = $this->supervisorModel->registrarArrastrado($patente , $nroChasis);
        }

        if($fueRegistrado){
            $this->showNotifiacation->mostrar("Registro completado con éxito","green");
        }else if($arrastradoExisteEnBD){
            $this->showNotifiacation->mostrar("El arrastrado ya existe","red");
        }else{
            $this->showNotifiacation->mostrar("Error al registrar arrastrado","red");
        }
    }

    public function listarTodosLosArrastradosAEliminar(){

        $traerTodosLosArrastradosRegistrados = $this->supervisorModel->listarArrastrados();

        if ($traerTodosLosArrastradosRegistrados != null) {
            $this->data["listadoDeArrastradosAEliminar"] = $traerTodosLosArrastradosRegistrados;
            echo $this->renderer->render("./view/supervisor/equipo/arrastrado/listadoDeArrastradosAEliminarView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay arrastrados registrados para eliminar","red");
        }
    }

    public function eliminarArrastrado(){

        $idArrastrado = $_POST["id_arrastrado"];

        $fueBorrado = $this->supervisorModel->eliminarArrastrado($idArrastrado);

        if ($fueBorrado) {
            $this->showNotifiacation->mostrar("Se ha borrado el arrastrado de la base de datos","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al borrar el arrastrado","red");
        }
    }

    public function listarTodosLosPosiblesArrastradosAModificar(){
        $traerTodosLosArrastradosRegistrados = $this->supervisorModel->listarArrastrados();

        if ($traerTodosLosArrastradosRegistrados != null) {
            $this->data["listarTodosLosPosiblesArrastradosAModificar"] = $traerTodosLosArrastradosRegistrados;
            echo $this->renderer->render("./view/supervisor/equipo/arrastrado/listarTodosLosPosiblesArrastradosAModificarView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay Arrastrados registrados para modificar","red");
        }
    }

    public function mostrarDatosDelArrastradoConcretoAModificar(){
        $idArrastrado = $_POST["id_arrastrado"];
        $this->data["mostrarDatosDelArrastradoConcretoAModificar"] = $this->supervisorModel->buscarArrastradoPorId($idArrastrado);
        echo $this->renderer->render("./view/supervisor/equipo/arrastrado/mostrarDatosDelArrastradoConcretoAModificarView.php", $this->data);
    }

    public function modificarArrastradoConcreto(){

        $idArrastrado =  $_POST["id_arrastrado"];
        $patente = $_POST["patente"];
        $nroChasis = $_POST["nroChasis"];

        $fueModificado = $this->supervisorModel->modificarArrastrado($idArrastrado,$nroChasis, $patente);

        if ($fueModificado) {
            $this->showNotifiacation->mostrar("Se ha modificado el arrastrado en la base de datos","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al modificar arrastrado","red");
        }
    }

    //METODOS DE AMBL CLIENTES

    public function listarTodosLosClientes(){

        $traerTodosLosClientesRegistrados = $this->supervisorModel->listarClientes();

        if ($traerTodosLosClientesRegistrados != null) {
            $this->data["listadoDeClientes"] = $traerTodosLosClientesRegistrados;
            echo $this->renderer->render("./view/supervisor/cliente/listadoDeClientesView.php", $this->data);
        } else {
            $this->showNotifiacation->mostrar("No hay clientes registrados","red");
        }

    }

    public function mostrarDetalleDeCliente(){
        $id_cliente = $_POST["id_cliente"];
        $this->data["detalleCliente"] = $this->supervisorModel->buscarClientePorId($id_cliente);

        echo $this->renderer->render("./view/supervisor/cliente/detalleClienteView.php", $this->data);
    }


    public function darAltaACliente()
    {
        echo $this->renderer->render("./view/supervisor/cliente/mostrarFormularioDeAltaDeClienteView.php", $this->data);
    }

    public function procesarFormularioCliente(){

        $denominacion = $_POST["denominacion"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $contacto1 = $_POST["contacto1"];
        $contacto2 = $_POST["contacto2"];
        $cuit = $_POST["cuit"];
        $calle = $_POST["calle"];
        $nro = $_POST["nro"];
        $codigoPostal = $_POST["codigoPostal"];

        $clienteExisteEnBD= $this->supervisorModel->clienteYaRegistrado($cuit);

        if(!$clienteExisteEnBD){
            $fueRegistrado = $this->supervisorModel->registrarCliente(

                "$email",
                $telefono,
                $contacto1,
                $contacto2,
                $cuit,
                $denominacion,
                $calle,
                $nro,
                $codigoPostal );
        }

        if(isset($fueRegistrado)){
            $this->showNotifiacation->mostrar("Registro completado con éxito","green");
        }else if($clienteExisteEnBD){
            $this->showNotifiacation->mostrar("El cliente ya existe","red");
        }else{
            $this->showNotifiacation->mostrar("Error al registrar cliente","red");
        }

    }



    public function eliminarCliente(){

        $idCliente = $_POST["id_cliente"];

        $fueBorrado = $this->supervisorModel->eliminarClientePorId($idCliente);

        if ($fueBorrado) {
            $this->showNotifiacation->mostrar("Se ha borrado el cliente de la base de datos","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al borrar cliente","red");
        }

    }


    public function mostrarDatosDelClienteConcretoAModificar(){
        $id_cliente = $_POST["id_cliente"];
        $this->data["mostrarDatosDelClienteConcretoAModificar"] = $this->supervisorModel->buscarClientePorId($id_cliente);
        echo $this->renderer->render("./view/supervisor/cliente/mostrarDatosDelClienteConcretoAModificarView.php", $this->data);
    }

    public function modificarClienteConcreto(){
        $id_cliente = $_POST["id_cliente"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $contacto1 = $_POST["contacto1"];
        $contacto2 = $_POST["contacto2"];
        $cuit = $_POST["cuit"];
        $denominacion = $_POST["denominacion"];
        $direccion_calle = $_POST["direccion_calle"];
        $direccion_nro = $_POST["direccion_nro"];
        $direccion_cp = $_POST["direccion_cp"];

        $fueModificado = $this->supervisorModel->modificarCliente
        ($id_cliente,$email,$telefono,$contacto1,$contacto2,$cuit,$denominacion,$direccion_calle,$direccion_nro,$direccion_cp);

        if ($fueModificado) {
            $this->showNotifiacation->mostrar("Se ha modificado el cliente en la base de datos","green");
        } else {
            $this->showNotifiacation->mostrar("Fallo al modificar cliente","red");
        }
    }

    public function obtenerEstadoProformas(){
        $rows = $this->supervisorModel->obtenerCantidadProformasPorEstado();
        $aRows = [];
        foreach($rows as $row){
            array_push($aRows,intval($row["count(*)"]));
        }
        echo json_encode($aRows);
    }

    public function obtenerEquipos(){
        $rows = $this->supervisorModel->obtenerArrastradosYTractores();
        $aRows = [];
        foreach($rows as $row){
            array_push($aRows,intval($row["count(*)"]));
        }
        echo json_encode($aRows);
    }


    public function cerrarSesion()
    {
        session_destroy();
        echo $this->renderer->render("./view/loginView.php");
    }

}