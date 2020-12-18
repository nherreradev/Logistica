<?php
include_once("third-party/phpqrcode/qrlib.php");

class GenerarQr
{

    public static function generarCodigoQR($idProforma){
        $codeContents = "localhost/chofer/mostrarFormularioCargaCombustible?id_proforma=".$idProforma;
        $pngAbsoluteFilePath = 'C:\xampp\htdocs/view/supervisor/proforma/codigoQrPng/codigoQR.png';

        QRcode::png($codeContents, $pngAbsoluteFilePath);

    }
}