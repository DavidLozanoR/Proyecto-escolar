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
		// Crear instancia de la clase estática o acceder al método según tu implementación
		$bd = new MySQLAux(DB_HOST, DB_BASE, DB_USR, DB_PASS);
	
		// TODO: Cambiar metodo de encriptacion por uno más seguro
		$passEncriptada = md5($pass);
	
		// Parámetros para la consulta
		$tabla = "usuarios";
		$campos = ["id_usuario", "nombre", "id_perfil"];
		$condicion = "email = ? AND contrasena = ?";
		$params = [$usr, $passEncriptada];
	
		// Ejecutar consulta utilizando la función selectRows
		$resultado = $bd->selectRows($tabla, $campos, $condicion, $params);
	
		if ($resultado && count($resultado) > 0) {
			// Credenciales válidas, guardar datos en la sesión
			$_SESSION["token"] = CLAVE_SECRETA; // Generar el token de sesión
			$_SESSION["usuario"] = $resultado[0]; // Guardar la primera fila (el usuario encontrado)
			return true;
		} else {
			// Credenciales inválidas
			return false;
		}
	}
	
}
