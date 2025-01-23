<?php
require_once "MySQLAux.php";

class MainModel{
	
	public function seleccionaRegistros($tabla, $campos, $condicion = null, $params = null) {
		$bd = new MySQLAux(DB_HOST, DB_BASE, DB_USR, DB_PASS);
		return $bd->selectRows($tabla, $campos, $condicion, $params);
	}
	
	public function agregaRegistro($tabla, $campos, $params) {
		$bd = new MySQLAux(DB_HOST, DB_BASE, DB_USR, DB_PASS);
		return $bd->insertRow($tabla, $campos, $params) > 0;
	}

	public function borraRegistro($tabla, $condicion, $params) {
		$bd = new MySQLAux(DB_HOST, DB_BASE, DB_USR, DB_PASS);
		return $bd->deleteRow($tabla, $condicion, $params);
	}

	public function actualizaRegistro($tabla, $campos, $condicion, $params) {
		$bd = new MySQLAux(DB_HOST, DB_BASE, DB_USR, DB_PASS);
		return $bd->updateRow($tabla, $campos, $condicion, $params);
	}
	public function createSesion($usr, $pass) {
		
		$bd = new MySQLAux(DB_HOST, DB_BASE, DB_USR, DB_PASS);
	
		$tabla = "usuarios";
		$campos = ["id_usuario", "nombre", "id_perfil", "contrasena"]; // Incluimos el hash de la contraseña
		$condicion = "email = ?";
		$params = [$usr];
	
		// Ejecutar consulta utilizando la función selectRows
		$resultado = $bd->selectRows($tabla, $campos, $condicion, $params);
	
		if ($resultado && count($resultado) > 0) {
			// Extraer el hash de la contraseña almacenada
			$hashAlmacenado = $resultado[0]["contrasena"];
	
			// Verificar la contraseña ingresada con el hash almacenado
			if (password_verify($pass, $hashAlmacenado)) {
				// Credenciales válidas, guardar datos en la sesión
				$_SESSION["token"] = CLAVE_SECRETA; // Generar el token de sesión
				unset($resultado[0]["contrasena"]); // Eliminar el hash antes de guardar en la sesión
				$_SESSION["usuario"] = $resultado[0]; // Guardar el usuario encontrado
				return true;
			}
		}
		// Credenciales inválidas
		return false;
	}
	
	public function registerUser($nombre_completo,$email,$pass,$edad,$id_perfil){
		$pass_hash=password_hash($pass,PASSWORD_DEFAULT);
		$bd=new MySQLAux(DB_HOST,DB_BASE,DB_USR,DB_PASS);
		return $bd->insertRow("usuarios",["nombre","email","contrasena","edad","id_perfil"],[$nombre_completo,$email,$pass_hash,$edad,$id_perfil]);
	}


	
}
