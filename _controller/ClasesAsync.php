<?php
ini_set("display_errors", E_ALL);

require_once "../config/Global.php";
require_once "ClasesController.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["result" => 0 ,"msg" => "Método no permitido"]);
    die();
}
session_start();
//Recepción de datos
$peticion = isset($_POST['peticion']) ? $_POST['peticion'] : ""; 
$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$horario = isset($_POST['horario']) ? $_POST['horario'] : "";
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$profesor = isset($_POST['profesor']) ? $_POST['profesor'] : "";
$creado_en = date('Y-m-d H:i:s'); // Generar la fecha actual
$id_user=$_SESSION["usuario"]["id_usuario"];
//Procesamiento de los datos
$ctrl = new ClasesController();
switch ($peticion) {
    case "INSERT":
        if ( !$ctrl->validaAtributos(null,$nombre,$descripcion,$horario, $profesor ) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->insertaRegistro($nombre,$descripcion,$codigo,$id_user,$creado_en,$horario ) ) {
            echo json_encode(["result" => 1, "msg" => "Registro insertado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de inserción en BD"]);
        }
        break;
    case "UPDATE":
        if ( !$ctrl->validaAtributos($id,$nombre,$descripcion,$horario, $profesor ) ){
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->actualizaRegistro($id,$nombre,$descripcion,$codigo,$id_user,$creado_en,$horario) ) {
            echo json_encode(["result" => 1, "msg" => "Registro actualizado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de actualización en BD"]);
        }
        break;
    case "DELETE":
        if ( !$ctrl->validaAtributos($id) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->eliminaRegistro($id) ) {
            echo json_encode(["result" => 1, "msg" => "Registro eliminado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de eliminación en BD. Puede tener catálogos dependientes"]);
        }
        break;
    default:
        echo json_encode(["result" => 0 ,"msg" => "ERROR: Petición inválida"]);
        die();
}    
