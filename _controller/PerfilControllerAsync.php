<?php
ini_set("display_errors", E_ALL);

require_once "../config/Global.php";
require_once "PerfilController.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["result" => 0 ,"msg" => "Método no permitido"]);
    die();
 }

//Recepción de datos
session_start();
$id = (int )$_SESSION["usuario"]["id_usuario"];
$peticion = isset($_POST['peticion']) ? $_POST['peticion'] : ""; 
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$email = isset($_POST["email"]) ? $_POST["email"]: ""; 
$edad = isset($_POST['edad']) ? $_POST['edad'] : "";
$genero = isset($_POST['genero']) ? $_POST['genero'] : "";
//Procesamiento de los datos
$ctrl = new PerfilController();
switch ($peticion) {
    case "INSERT":
        if ( !$ctrl->validaAtributos(null,$nombre,$email,$edad,$genero) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->insertaRegistro($nombre, $edad,$genero,$email) ) {
            echo json_encode(["result" => 1, "msg" => "Registro insertado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de inserción en BDs"]);
        }
        break;
    case "UPDATE":
        if ( !$ctrl->validaAtributos($id,$nombre,$email,$edad,$genero)  ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->actualizaRegistro($id,$nombre,$email,$edad,$genero) ) {
            echo json_encode(["result" => 1, "msg" => "Registro actualizado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de actualización en BD"]);
        }
        break;
    case "DELETE":
        if ( !$ctrl->validaAtributos($nombre,$email,$edad,$genero) ) {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Datos inválidos"]);
        }
        else if ( $ctrl->eliminaRegistro($nombre) ) {
            echo json_encode(["result" => 1, "msg" => "Registro eliminado correctamente"]);
        } else {
            echo json_encode(["result" => 0 ,"msg" => "ERROR: Problema de eliminación en BD. Puede tener catálogos dependientes"]);
        }
        break;
    default:
        echo json_encode(["result" => 0 ,"msg" => "ERROR: Petición inválida"]);
        die();
}    
