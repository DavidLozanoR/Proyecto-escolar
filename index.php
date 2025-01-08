<?php 
	ini_set("display_errors", E_ALL);
	
	require_once "config/Global.php";

	//sesion

	//*****verificar sesion valida*****
	session_start();
	if(!isset($_SESSION["token"])|| $_SESSION["token"]!==CLAVE_SECRETA){
		//incluir vista de login
		include "_view/login.html.php";
		die();
    	//fin de verificación de sesion
	}
	//Determinar el controlador / accion / id del usuario
	$querystring = isset($_GET["querystring"]) ? $_GET["querystring"] : RUTA_DEFAULT;
	if ( !str_ends_with($querystring, "/") ) {
		$querystring = $querystring."/"; //le falta /, se la pongo
	} 
	$peticion = explode("/", $querystring);
	$controlador = isset($peticion[0]) ? $peticion[0] : "";
	$accion = isset($peticion[1]) ? $peticion[1] : "";
	$id = isset($peticion[2]) ? $peticion[2] : "";
	 $id_user = $_SESSION["usuario"]["id_usuario"];
	 $nom_user = $_SESSION["usuario"]["nombre"];
	//Procesar la peticion cargando el controlador adecuado
	switch ($controlador) {
		case "inicio":
			if ($accion == "") {
				require_once "_controller/BienvenidaController.php";
				$ctrl = new BienvenidaController();//Pagina principal, perfil profesor
			} else if ($accion == "perfil") {
				require_once "_controller/PerfilController.php";
				$ctrl = new PerfilController("UPDATE", $id_user);
			} else if ($accion == "clases") {
				require_once "_controller/ListaClasesController.php";
				$ctrl = new ListaClasesController($nom_user);
			} else if ($accion =="editarclase"){
				require_once "_controller/ClasesController.php";
				$ctrl =new ClasesController($id,"UPDATE",$nom_user,$id_user);
			}else if ($accion =="agregarclase"){
				require_once "_controller/ClasesController.php";
				$ctrl =new ClasesController(null,"INSERT",$nom_user,$id_user);
			}else if ($accion =="entrarclase"){
				require_once "_controller/ListaModulosController.php";
				$ctrl =new ListaModulosController($id);
			}else if($accion=="editarmodulo"){
				require_once "_controller/ModulosController.php";
				$ctrl=new ModulosController($id,"UPDATE");
			}else if($accion=="agregarmodulo"){
				require_once "_controller/ModulosController.php";
				$ctrl=new ModulosController($id,"INSERT");
			}else if($accion=="entrarmodulo"){
				require_once "_controller/ListaSubmodulosController.php";
				$ctrl=new ListaSubmodulosController($id);
			}else if($accion=="editarsubmodulo"){
				require_once "_controller/SubModulosController.php";
				$ctrl=new SubModulosController($id,"UPDATE");
			}else if($accion=="agregarsubmodulo"){
				require_once "_controller/SubModulosController.php";
				$ctrl=new SubModulosController($id,"INSERT");
			}else if($accion=="entrarsubmodulo"){
				require_once "_controller/ListaContenidoSubmoduloController.php";
				$ctrl=new ListaContenidoSubmoduloController($id);
			}else if($accion=="salir"){
				require_once "_controller/logoutAsync.php";
				$ctrl=new logoutAsync();
			}
		break;
		default:
			echo "<h1>404</h1><p>Controlador inválido</p>";
			die();
	}
	
	//Incluir la plantilla contenedora
	include "_view/master.html.php";
?>