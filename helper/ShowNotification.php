<?php


class ShowNotification
{
    private $renderer;
    private $rol;

    public function __construct($renderer,$rol)
    {
        $this->renderer = $renderer;
        $this->rol = $rol;
    }

    public function mostrar($mensajeAMostrar,$colorDelTexto){

        $habilitarHeaderCorrespondiendteAlRol = $this->rol;

        $data["notificacion"] = $mensajeAMostrar;
        $data["colorNotificacion"] = $colorDelTexto;
        $data["$habilitarHeaderCorrespondiendteAlRol"] = true;

        echo $this->renderer->render('./view/'.$this->rol.'/'.$this->rol.'View.php', $data);
    }

}