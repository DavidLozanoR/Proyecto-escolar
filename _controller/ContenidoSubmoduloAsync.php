<?php
ini_set("display_errors", E_ALL);

require_once "../config/Global.php";
require_once "ContenidoSubmoduloController.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["result" => 0 ,"msg" => "Método no permitido"]);
    die();
}
session_start();
//Recepción de datos
$id_contenido=isset($_POST['id_contenido']) ? $_POST["id_contenido"] : "";
$peticion = isset($_POST['peticion']) ? $_POST['peticion'] : ""; 
$id_submodulo = isset($_POST["id_submodulo"]) ? $_POST["id_submodulo"] : "";
$nombre_archivo = isset($_POST['nombre_archivo']) ? $_POST['nombre_archivo'] : "";
$ruta_archivo= isset($_POST['ruta_archivo']) ? $_POST['ruta_archivo']: "";
$id_perfil=$_SESSION["usuario"]["id_perfil"];
if ($id_perfil==3) {
    echo json_encode(["result" => 0 ,"msg" => "No tienes permitido esta accion"]);
    die();
}
//Procesamiento de los datos
$ctrl = new ContenidoSubmoduloController();
switch ($peticion) {
    case "INSERT":
        if ( !$ctrl->validaAtributos(null,$id_submodulo,$nombre_archivo,$ruta_archivo) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->insertaRegistro($nombre_archivo,$ruta_archivo,$id_submodulo) ) {
            echo json_encode(["result" => 1, "msg" => "Registro insertado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de inserción en BD"]);
        }
        break;
    case "UPDATE":
        if ( !$ctrl->validaAtributos($id_contenido,$id_submodulo,$nombre_archivo,$ruta_archivo) ){
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->actualizaRegistro($id,$nombre,$descripcion,$codigo,$id_user,$creado_en,$horario) ) {
            echo json_encode(["result" => 1, "msg" => "Registro actualizado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de actualización en BD"]);
        }
        break;
    case "DELETE":
        if ( !$ctrl->validaAtributos($id_contenido) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->eliminaRegistro($id_contenido) ) {
            echo json_encode(["result" => 1, "msg" => "Registro eliminado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de eliminación en BD. Puede tener catálogos dependientes"]);
        }
        break;
    default:
        echo json_encode(["result" => 0 ,"msg" => "ERROR: Petición inválida"]);
        die();
}    
