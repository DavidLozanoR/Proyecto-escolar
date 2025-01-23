<?php
ini_set("display_errors", E_ALL);

require_once "../config/Global.php";
require_once "MainModel.php";

//HABILITAR EL USO DE VARIABLES SESION
    // session_start();

	if($_SERVER ["REQUEST_METHOD"] !=="POST"){
		//incluir vista de login
		echo json_encode(["result"=> 0, "msg"=>"METODO NO PERMITIDO"]);
		die();
	}


    //Recepcion de datos
    $primer_apellido=isset($_POST["p_apellido"]) ? $_POST["p_apellido"] : "";
    $segundo_apellido=isset($_POST["s_apellido"]) ? $_POST["s_apellido"] : "";
    $nombres=isset($_POST["nombres"]) ? $_POST["nombres"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"]  : "";
    $pass= isset($_POST["pass"]) ? $_POST["pass"] : "";
    $edad=isset($_POST["edad"]) ? $_POST["edad"] : "";
    $perfil= isset($_POST["perfil"]) ? $_POST["perfil"] : "";
    // Concatenar el nombre completo y eliminar espacios adicionales
    $nombre_completo = trim($primer_apellido . " " . $segundo_apellido . " " . $nombres);
    //comprobar perfiles
    if($perfil=="Profesor"){
        $id_perfil=2;
    }else if($perfil=="Alumno"){
        $id_perfil=3;
    }else if($Perfil!="Profesor"||$perfil!="Alumno"){
        $id_perfil=0;
    }

    //validacion de los datos ingresados
    $model=new MainModel();
        if(comprobarDatos($nombre_completo,$email,$pass,$edad,$id_perfil)){//si los datos son validos
            $model->registerUser($nombre_completo,$email,$pass,$edad,$id_perfil);
            echo json_encode(["result"=>1,"msg"=> "Usuario Registrado, Inicia sesión"]);
        }else{
            echo json_encode(["result" => 0, "msg" => "Datos no válidos"]);
        }


        function comprobarDatos($nombre_completo, $email, $pass, $edad,$id_perfil) {
        
            // Verificar longitud máxima de 100 caracteres y que no esté vacío
            if (strlen($nombre_completo) > 100 || empty($nombre_completo)) {
                return false;
            }
        
            // Validar que no contenga solo espacios y cumpla el formato
            if (!preg_match("/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\s]+$/", $nombre_completo)) {
                return false;
            }
        
            // Validar email (formato estándar)
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
        
            // Validar contraseña (mínimo 8 caracteres, al menos una letra, un número y un carácter especial)
            if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $pass)) {
                return false;
            }
        
            // Validar edad (número entero entre 17 y 90)
            if (!filter_var($edad, FILTER_VALIDATE_INT, ["options" => ["min_range" => 17, "max_range" => 90]])) {
                return false;
            }
            //id
            if($id_perfil==0){
                return false;
            }
        
            // Todos los datos son válidos
            return true;
        }
        

