<?php
require_once("helper/Renderer.php");
include_once("helper/Database.php");
include_once("helper/Config.php");
require_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("helper/RoleValidation.php");
include_once("helper/ShowNotification.php");
include_once("helper/GenerarQr.php");
require_once ("third-party/dompdf/autoload.inc.php");

class ModuleInitializer
{
    private $renderer;
    private $config;
    private $database;


    public function __construct()
    {
        $this->renderer = new Renderer('view/partial');
        $this->config = new Config("config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);

    }

    public function createDefaultController()
    {
        return $this->createLoginController();
    }

    public function createLoginController()
    {
        include_once("model/LoginModel.php");
        include_once("controller/LoginController.php");

        $model = new LoginModel($this->database);
        return new LoginController($model, $this->renderer);
    }

    public function createRegistroController()
    {
        include_once("model/RegistroModel.php");
        include_once("controller/RegistroController.php");

        $model = new RegistroModel($this->database);
        return new RegistroController($model, $this->renderer);
    }
    public function createAdministradorController()
    {
        include_once("model/AdministradorModel.php");
        include_once("controller/AdministradorController.php");

        $model = new AdministradorModel($this->database);
        return new AdministradorController($model, $this->renderer);
    }

    public function createSupervisorController()
{
    include_once("model/SupervisorModel.php");
    include_once("controller/SupervisorController.php");

    $model = new SupervisorModel($this->database);
    return new SupervisorController($model, $this->renderer);
}


    public function createChoferController()
    {
        include_once("model/ChoferModel.php");
        include_once("controller/ChoferController.php");

        $model = new ChoferModel($this->database);
        return new ChoferController($model, $this->renderer);
    }

    public function createProformaController(){
        include_once("model/ProformaModel.php");
        include_once("controller/ProformaController.php");

        $model = new ProformaModel($this->database);
        return new ProformaController($model, $this->renderer);
    }

    public function createEncargadoDeTallerController(){
        include_once("model/EncargadoDeTallerModel.php");
        include_once("controller/EncargadoDeTallerController.php");

        $model = new EncargadoDeTallerModel($this->database);
        return new EncargadoDeTallerController($model, $this->renderer);
    }

}