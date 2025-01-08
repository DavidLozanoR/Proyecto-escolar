<?php
ini_set("display_errors", E_ALL);

require_once "../config/Global.php";
require_once "MainModel.php";

//HABILITAR EL USO DE VARIABLES SESION
    session_start();



	if($_SERVER ["REQUEST_METHOD"] !=="POST"){
		//incluir vista de login
		echo json_encode(["result"=> 0, "msg"=>"METODO NO PERMITIDO"]);
		die();
	}


    //Recepcion de datos
    $user = isset($_POST["usr"]) ? $_POST["usr"]  : "";
    $pass= isset($_POST["pass"]) ? $_POST["pass"] : "";

    //validacion de los datos ingresados
    $model = new MainModel();
    if ($model->createSesion($user,$pass)){
        echo json_encode(["result"=>1,"msg"=> "credenciales correctas"]);

    }else {
        echo json_encode(["result"=>0,"msg"=> "credenciales incorrectas"]);
    }
