<?php

require_once "MainModel.php";

class SubModulosController {

	const VISTA ="_view/agregarsubmodulo.html.php";
    const JS="js/ctragregarsubmodulo.js";
    private $peticion;
    private $id;
    private $nombre;
    private $descripcion;
    private $modulo; //nombre de la clase a la que pertenece el módulo
    private $id_modulo;//id de la clase a la que pertenece el módulo
    private $id_submodulo; //esta variable la utilizo en la peticion insert
	private $id_clase;
	public function __construct( $id = null,$peticion = null) { 
		$this->peticion = $peticion;
		$this->id = $id;
		//ver si es edicion 
		
			if($peticion !=null && $peticion === "UPDATE"){
				$this->cargaDatos();
                $this->cargaModulo($this->id_modulo); // Cargar el nombre de la clase
			}
            if($peticion!=null && $peticion ==="INSERT"){
                $this->cargaModulo($id); // Cargar el nombre de la clase
            }
	}


	private function cargaDatos(){
		$model = new MainModel();
		$datos = $model->seleccionaRegistros("submodulos", ["id_submodulo","nombre", "descripcion","modulo_id"],
		"id_submodulo = ?", [$this->id]);
		//TODO: programar select Rows
        $this->id_submodulo=$datos["0"]["id_submodulo"];
		$this->nombre=$datos["0"]["nombre"];
		$this->descripcion=$datos["0"]["descripcion"];
        $this->id_modulo=$datos["0"]["modulo_id"];
		
	}
    public function cargaModulo($id_modulo) {
         $model = new MainModel();
          $datosClase = $model->seleccionaRegistros("modulos", ["nombre"], "id_modulo = ?", 
          [$id_modulo]);
          //TODO:Probablemente se tenga que cambiar la logica en esta seccion.
		  
		  return   $this->modulo = $datosClase["0"]["nombre"]; 
           
    }
	public function cargaClase($id_modulo) {
		$model = new MainModel();
		 $datosClase = $model->seleccionaRegistros("modulos", ["clase_id"], "id_modulo = ?", 
		 [$id_modulo]);
		 //TODO:Probablemente se tenga que cambiar la logica en esta seccion.
		return   $this->id_clase = $datosClase["0"]["clase_id"]; 
		  
   }


	public function renderContent() {
		include self::VISTA;
	}
	
	public function renderJS() {
		include self::JS;
	}
	
    public function validaAtributos($nombre=null,$descripcion=null) {
        $res = true;
        if ( !is_null($nombre) ) {
			$res = $res && $nombre != "";
		}
        if (!is_null($descripcion)) {
            $res = $res && $descripcion != "";
        }
        return $res;
    }
	
	public function insertaRegistro($nombre,$descripcion,$modulo_id) {
		$model = new MainModel();
		$res = $model->agregaRegistro("submodulos", ["nombre","descripcion", "modulo_id"],[$nombre,$descripcion,$modulo_id]);
		return $res;
	}

	public function eliminaRegistro($id) {
		$model = new MainModel();
		$res = $model->borraRegistro("submodulos", "id_submodulo=?", [$id]);
		return $res;
	}

	public function actualizaRegistro($id,$nombre,$descripcion,$modulo_id) {
		$model = new MainModel();
		$res = $model->actualizaRegistro("submodulos", ["nombre", "descripcion","modulo_id"], "id_submodulo=?", [$nombre, $descripcion,$modulo_id,$id]);
		return $res;
	}

	//TODO: Cargar datos para edicion








}

