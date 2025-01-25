<?php

require_once "MainModel.php";

class ClasesController {

	const VISTA ="_view/agregarclase.html.php";
    const JS="js/ctragregarclase.js";
    private $peticion;
    private $id;
    private $nombre;
    private $descripcion;
    private $horario;
    private $profesor; //nombre de profesor
	private $codigo;
	public $id_usr;
	public $id_perfil;
	private $datos;

	public function __construct( $id = null,$peticion = null,$nombre=null,$id_user=null,$id_perfil=null) { 
		$this->peticion = $peticion;
		$this->id = $id;
        $this->profesor=$nombre;
		$this->id_usr=$id_user;
		$this->id_perfil=$id_perfil;
		//ver si es edicion 
		
			if($peticion !=null && $peticion === "UPDATE"){
				$this->cargaDatos();
			}
	}



	

	private function cargaDatos(){
		$model = new MainModel();
		$datos = $model->seleccionaRegistros("clases", ["id_clase", "nombre", "descripcion","horario","codigo_unico"],
		"id_clase = ?", [$this->id]);
		//TODO: programar select Rows
		$this->nombre=$datos["0"]["nombre"];
		$this->descripcion=$datos["0"]["descripcion"];
        $this->horario=$datos["0"]["horario"];
		$this->codigo=$datos["0"]["codigo_unico"];
		
	}


	public function renderContent() {
		include self::VISTA;
	}
	
	public function renderJS() {
		include self::JS;
	}
	
    public function validaAtributos($id=null,$nombre=null,$descripcion=null,$horario=null, $profesor=null,$codigo=null) {
        $res = true;
		if ( !is_null($id) ) {
			$id = (int)$id;
			$res = $res && is_integer($id) && $id>0;
		}
        if ( !is_null($nombre) ) {
			$res = $res && $nombre != "";
		}
        if (!is_null($descripcion)) {
            $res = $res && $descripcion != "";
        }
        if (!is_null($horario)) {
            $res = $res && $horario != "";
        }
        if (!is_null($profesor)) {
            $res = $res && $profesor != "";
        }
		if (!is_null($codigo)) {
			$res=$res && $codigo != "";
			$codigo = trim($codigo);
			if (strlen($codigo) <= 10 && preg_match('/^[A-Za-z0-9]+$/', $codigo)) {
				$res = $res && true;
			} else {
				$res = false;
			}
		}
        return $res;
    }

	public function verificaExistencia($codigo) {
		$model = new MainModel();
	
		// Eliminar espacios del parámetro recibido
		$codigo = trim($codigo);
	
		// Buscar el registro en la base de datos
		$cons = $model->seleccionaRegistros(
			"clases",
			["codigo_unico"],
			"TRIM(codigo_unico) = ?",
			[$codigo]
		);
	
		// Verificar si se encontró un resultado
		return isset($cons) && !empty($cons);
	}
	


	
	public function insertaRegistro($nombre,$descripcion,$codigo,$id_user,$creado_en,$horario) {
		$model = new MainModel();
		$res = $model->agregaRegistro("clases", ["nombre", "descripcion","codigo_unico","profesor_id","creado_en","horario"],[$nombre,$descripcion,$codigo,$id_user,$creado_en,$horario]);
		return $res;
	}

	public function eliminaRegistro($id) {
		$model = new MainModel();
		$res = $model->borraRegistro("clases", "id_clase=?", [$id]);
		return $res;
	}
	public function eliminaRegistroAlumno($id) {
		$model = new MainModel();
		$res = $model->borraRegistro("clases_registradas", "clase_id=?", [$id]);
		return $res;
	}

	public function actualizaRegistro($id,$nombre,$descripcion,$codigo,$profesor_id,$creado_en,$horario) {
		$model = new MainModel();
		$res = $model->actualizaRegistro("clases", ["nombre", "descripcion","codigo_unico","profesor_id","creado_en","horario"], "id_clase=?", [$nombre, $descripcion,$codigo,$profesor_id,$creado_en,$horario,$id]);
		return $res;
	}

	//seccion de clase alumno

	public function unirClase($codigo,$id_user){
		$model=new MainModel();
		$res = $model->seleccionaRegistros("clases",["id_clase","nombre","descripcion","codigo_unico","profesor_id","horario"],"codigo_unico=?",[$codigo]);
		if (isset($res) && !empty($res)) {
			$time = date("Y-m-d H:i:s");
			$ins=$model->agregaRegistro("clases_registradas",["alumno_id","clase_id","registrado_en"],[$id_user,$res["0"]["id_clase"],$time]);
			return $ins;
		}
	}








}

