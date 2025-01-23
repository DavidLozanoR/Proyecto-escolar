<?php
ini_set("display_errors", E_ALL);


require_once "MainModel.php";



class PerfilController{
    
    const VISTA = "_view/perfil_user.html.php";
    const JS = "js/perfiluser.js";


	private $peticion;
    private $id;
	private $edad; //obtenidos al invocar
	private $nombre;
	private $genero;
    private $email;
	private $id_perfil;
	
	public function __construct($peticion = null, $id= null,$id_perfil=null) { 
		$this->peticion = $peticion;
		$this->id = $id;
		$this->id_perfil=$id_perfil;
		//ver si es edicion 
		
			if($peticion !=null && $peticion === "UPDATE"){
				$this->cargaDatos();
			}
	}



	

	private function cargaDatos(){
		$model = new MainModel();
		$datos = $model->seleccionaRegistros("usuarios", ["nombre","email","edad","genero"],
		"id_usuario = ?", [$this->id]);
		//TODO: programar select Rows
		$this->nombre=$datos["0"]["nombre"];
		$this->edad=$datos["0"]["edad"];
        $this->genero=$datos["0"]["genero"];
        $this->email=$datos["0"]["email"];
		
	}


	public function renderContent() {
		include self::VISTA;
	}
	
	public function renderJS() {
		include self::JS;
	}
	
    public function validaAtributos($id=null,$nombre=null,$email=null,$edad=null, $genero=null) {
        $res = true;
        if ( !is_null($id) ) {
			$id = (int)$id;
			$res = $res && is_integer($id) && $id>0;
		}
        if ( !is_null($nombre) ) {
			$res = $res && $nombre != "";
		}
        if (!is_null($genero)) {
            $validos = ['Masculino', 'Femenino', 'Otro'];
            $res = $res && in_array($genero, $validos, true);
        }
        return $res;
    }
    
	
	public function insertaRegistro($nombre, $edad,$genero,$email) {
		$model = new MainModel();
		$res = $model->agregaRegistro("usuarios", ["nombre", "email","edad","genero"], [$nombre,$email,$edad,$genero]);
		return $res;
	}

	public function eliminaRegistro($nombre) {
		$model = new MainModel();
		$res = $model->borraRegistro("usuarios", "nombre=?", [$nombre]);
		return $res;
	}

	public function actualizaRegistro($id,$nombre,$email,$edad,$genero) {
		$model = new MainModel();
		$res = $model->actualizaRegistro("usuarios", ["nombre","email","edad","genero"], "id_usuario=?", [$nombre,$email, $edad,$genero,$id]);
		return $res;
	}

	//TODO: Cargar datos para edicion








}


?>