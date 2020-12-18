<?php


class SupervisorModel
{
    private $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function registrarCliente($email, $telefono, $contacto1, $contacto2, $cuit,$denominacion,$calle,$nro, $codigoPostal){
        $result = $this->db->ejecutarQuery(
            "insert into cliente(email,telefono,contacto1,contacto2,cuit, denominacion, direccion_calle, direccion_nro, direccion_cp) 
                        VALUES('$email', '$telefono', '$contacto1', '$contacto2', '$cuit','$denominacion','$calle', '$nro', '$codigoPostal')"
        );
        return $result;
    }

    public function eliminarClientePorId($idCliente){
        return $this->db->ejecutarQuery("delete from cliente where cliente.id_cliente = $idCliente");
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

    public function buscarClientePorId($id_cliente){
        return $this->db->query("select * from cliente where cliente.id_cliente = $id_cliente");

    }

    public function modificarCliente
    ($idCliente, $email, $telefono, $contacto1, $contacto2, $cuit, $denominacion, $direccion_calle, $direccion_nro, $direccion_cp){

        return $this->db->ejecutarQuery("
                            UPDATE cliente SET
                            email = '$email' ,
                            telefono = '$telefono',
                            contacto1 = '$contacto1', 
                            contacto2 = '$contacto2',
                            cuit = '$cuit',
                            denominacion = '$denominacion',
                            direccion_calle = '$direccion_calle',
                            direccion_nro = '$direccion_nro',
                            direccion_cp = '$direccion_cp'
                            WHERE cliente.id_cliente = $idCliente"
        );
    }

    public function listarClientes(){
        return $this->db->query("SELECT * FROM cliente");
    }

    public function clienteYaRegistrado($cuit)
    {
        $result = $this->db->ejecutarQuery("SELECT * FROM cliente WHERE cuit = '$cuit'");

        return mysqli_num_rows($result);

    }


    public function buscarArrastradoPorId($idArrastrado){
        return $this->db->query("select * from arrastrado where arrastrado.id_arrastrado = $idArrastrado");
    }

    public function registrarArrastrado($numeroDeChasis, $patente){
        $result = $this->db->ejecutarQuery(
            "insert into arrastrado(nro_chasis,patente_arrastrado) 
                        VALUES('$numeroDeChasis', '$patente')"
        );
        return $result;
    }

    public function arrastradoYaRegistrado($patente)
    {
        $result = $this->db->ejecutarQuery("SELECT * FROM arrastrado WHERE patente_arrastrado = '$patente'");

        return mysqli_num_rows($result);
    }

    public function eliminarArrastrado($idArrastrado){
        $result = $this->db->ejecutarQuery("update arrastrado SET eliminado = 1 where id_arrastrado   = $idArrastrado");
        return $result;
    }


    public function listarArrastrados(){
        return $this->db->query("SELECT * FROM arrastrado where eliminado = 0");
    }

    public function modificarArrastrado($idArrastrado,$numeroDeChasis, $patente){

        return $this->db->ejecutarQuery("
                            UPDATE arrastrado SET
                            nro_chasis = '$numeroDeChasis' ,
                            patente_arrastrado = '$patente'
                            WHERE arrastrado.id_arrastrado = $idArrastrado"
        );
    }













    public function buscarTractorPorId($idTractor){
        return $this->db->query("select * from tractor where tractor.id_tractor = $idTractor");
    }

    public function registrarTractor($anioFabricacion, $nroMotor, $nroChasis, $marca, $modelo,$patente,$kilometraje){
        $result = $this->db->ejecutarQuery(
            "insert into tractor(año_fabricacion,nro_motor,nro_chasis,marca,modelo, patente_tractor, kilometraje) 
                        VALUES( STR_TO_DATE('$anioFabricacion', '%Y-%m-%d'), '$nroMotor', '$nroChasis', '$marca', '$modelo','$patente',$kilometraje)"
        );
        return $result;
    }

    public function tractorYaRegistrado($patente)
    {
        $result = $this->db->ejecutarQuery("SELECT * FROM tractor WHERE patente_tractor = '$patente'");

        return mysqli_num_rows($result);
    }


    public function eliminarTractor($idTractor){
        $result = $this->db->ejecutarQuery("update tractor SET eliminado = 1 where tractor.id_tractor   = $idTractor");
        return $result;
    }


    public function listarTractores(){
        return $this->db->query("SELECT * FROM tractor where eliminado = 0");
    }

    public function modificarTractor($idTractor,$anioFabricacion, $nroMotor, $nroChasis, $marca, $modelo,$patente,$kilometraje){

        return $this->db->ejecutarQuery("
                            UPDATE tractor SET
                            año_fabricacion = STR_TO_DATE('$anioFabricacion', '%Y-%m-%d') ,
                            nro_motor = '$nroMotor',
                            nro_chasis = '$nroChasis', 
                            marca = '$marca',
                            modelo = '$modelo',
                            patente_tractor = '$patente',
                            kilometraje = '$kilometraje'
                            WHERE tractor.id_tractor= $idTractor"
        );
    }



    public function traerChoferesAValidarLicencia(){
        return $this->db->query("   select * from empleado
                                    JOIN rol
                                    on empleado.id_rol = rol.id_rol
                                    where empleado.tipo_licencia is null
                                    and rol.descripcion = 'chofer';");
    }

    public function traerTiposDeLicencia(){
        return $this->db->query("SELECT * from tipo_de_licencia");
    }

    public function validarLicenciaChofer($usuario ,$tipoDeLicencia){
        return $this->db->ejecutarQuery("UPDATE empleado SET tipo_licencia = '$tipoDeLicencia' WHERE usuario= '$usuario'");
    }




    public function traerTodosLosCelulares(){
        return $this->db->query("SELECT * from celular celu left join empleado emp ON emp.usuario = celu.id_chofer");
    }

    public function traerCelularPorId($idCelular){
        return $this->db->query("SELECT * from celular celu left join empleado emp ON emp.usuario = celu.id_chofer WHERE id_celular = $idCelular");
    }

    public function celularYaRegistrado($numeroCelular)
    {
        $result = $this->db->ejecutarQuery("SELECT * FROM celular WHERE nro = $numeroCelular");

        return mysqli_num_rows($result);
    }

    public function darDeAltaCelular($numeroCelular){
        return $this->db->ejecutarQuery("insert into celular(nro) 
                        VALUES($numeroCelular)");
    }

    public function modificarCelular($idCelular,$nuevoNumeroDeCelular){
        return $this->db->ejecutarQuery("UPDATE celular SET nro = $nuevoNumeroDeCelular WHERE id_celular = $idCelular ");
    }


    public function desasignarCelular($idCelular){
        return $this->db->ejecutarQuery("UPDATE celular SET id_chofer = null where id_celular = $idCelular ");
    }

    public function asignarCelular($idCelular, $chofer){
        return $this->db->ejecutarQuery("UPDATE celular SET id_chofer = '$chofer' WHERE id_celular = $idCelular ");
    }

    public function traerATodosLosChoferesSinCelularAsignado(){
        return $this->db->query("   SELECT * from empleado emp JOIN
                                    rol r
                                    on emp.id_rol = r.id_rol
                                    where r.descripcion = 'chofer'
                                    and NOT EXISTS (SELECT NULL FROM celular celu WHERE celu.id_chofer = emp.usuario);");
    }

    public function traerTodosLosCelularesSinAsignar(){
        return $this->db->query("SELECT * from celular where  id_chofer is null");

    }

    public function obtenerCantidadProformasPorEstado(){
        return $this->db->executeQuery("SELECT count(*) from proforma where estado = 'PENDIENTE' UNION ALL SELECT count(*) from proforma where estado = 'FINALIZADO' ");
    }

    public function obtenerArrastradosYTractores(){
        return $this->db->executeQuery("select count(*) from arrastrado where eliminado = 0 UNION ALL select count(*) from tractor where eliminado = 0");
    }

}