<?php
ini_set("display_errors", E_ALL);

require_once "../config/Global.php";
require_once "SubModulosController.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["result" => 0 ,"msg" => "Método no permitido"]);
    die();
}

//Recepción de datos
$peticion = isset($_POST['peticion']) ? $_POST['peticion'] : ""; 
/* TODO: FALTA OBTENER ESTOS DATOS CON CUNSULTAS 
$modulo_id =
$id_submodulo = 

*/
session_start();
$modulo_id=isset($_POST['id_modulo']) ? $_POST['id_modulo']:"";
$id_submodulo=isset($_POST['id_submodulo']) ? $_POST['id_submodulo']:"";
$nombreSubModulo = isset($_POST['nombreSubModulo']) ? $_POST['nombreSubModulo'] : ""; 
$descripcionSubModulo = isset($_POST['descripcionSubModulo']) ? $_POST['descripcionSubModulo'] : "";
$id_perfil=$_SESSION["usuario"]["id_perfil"];
if ($id_perfil==3) {
    echo json_encode(["result" => 0 ,"msg" => "No tienes permitido esta accion"]);
    die();
}



//Procesamiento de los datos
$ctrl = new SubModulosController();
switch ($peticion) {
    case "INSERT":
        if ( !$ctrl->validaAtributos(null,$nombreSubModulo,$descripcionSubModulo) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->insertaRegistro($nombreSubModulo,$descripcionSubModulo,$modulo_id) ) {
            echo json_encode(["result" => 1, "msg" => "Registro insertado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de inserción en BD"]);
        }
        break;
    case "UPDATE":
        if ( !$ctrl->validaAtributos($id_submodulo,$nombreSubModulo,$descripcionSubModulo) ){
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->actualizaRegistro($id_submodulo,$nombreSubModulo,$descripcionSubModulo,$modulo_id) ) {
            echo json_encode(["result" => 1, "msg" => "Registro actualizado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de actualización en BD"]);
        }
        break;
    case "DELETE":
        if ( !$ctrl->validaAtributos($id_submodulo) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->eliminaRegistro($id_submodulo) ) {
            echo json_encode(["result" => 1, "msg" => "Registro eliminado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de eliminación en BD. Puede tener catálogos dependientes"]);
        }
        break;
    default:
        echo json_encode(["result" => 0 ,"msg" => "ERROR: Petición inválida"]);
        die();
}    
