<?php
ini_set("display_errors", E_ALL);

require_once "../config/Global.php";
require_once "ModulosController.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["result" => 0 ,"msg" => "Método no permitido"]);
    die();
}
session_start();
//Recepción de datos
$peticion = isset($_POST['peticion']) ? $_POST['peticion'] : ""; 
$ctrm=new ModulosController();
/* TODO: FALTA OBTENER ESTOS DATOS CON CUNSULTAS 
$clase_id =
$id_modulo = 

*/
$clase_id=isset($_POST['id_clase']) ? $_POST['id_clase']:"";
$id_modulo=isset($_POST['id_modulo']) ? $_POST['id_modulo']:"";
$nombreModulo = isset($_POST['nombreModulo']) ? $_POST['nombreModulo'] : ""; 
$descripcionModulo = isset($_POST['descripcionModulo']) ? $_POST['descripcionModulo'] : "";
$ctrl=new ModulosController();



//Procesamiento de los datos
$ctrl = new ModulosController();
switch ($peticion) {
    case "INSERT":
        if ( !$ctrl->validaAtributos(null,$nombreModulo,$descripcionModulo) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->insertaRegistro($nombreModulo,$descripcionModulo,$clase_id) ) {
            echo json_encode(["result" => 1, "msg" => "Registro insertado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de inserción en BD"]);
        }
        break;
    case "UPDATE":
        if ( !$ctrl->validaAtributos($id_modulo,$nombreModulo,$descripcionModulo) ){
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->actualizaRegistro($id_modulo,$nombreModulo,$descripcionModulo,$clase_id) ) {
            echo json_encode(["result" => 1, "msg" => "Registro actualizado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de actualización en BD"]);
        }
        break;
    case "DELETE":
        if ( !$ctrl->validaAtributos($id_modulo) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->eliminaRegistro($id_modulo) ) {
            echo json_encode(["result" => 1, "msg" => "Registro eliminado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de eliminación en BD. Puede tener catálogos dependientes"]);
        }
        break;
    default:
        echo json_encode(["result" => 0 ,"msg" => "ERROR: Petición inválida"]);
        die();
}    
