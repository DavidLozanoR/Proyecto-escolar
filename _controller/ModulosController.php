<?php

require_once "MainModel.php";

class ModulosController {

	const VISTA ="_view/agregarmodulo.html.php";
    const JS="js/ctragregarmodulo.js";
    private $peticion;
    private $id;
    private $nombre;
    private $descripcion;
    private $clase; //nombre de la clase a la que pertenece el módulo
    private $id_clase;//id de la clase a la que pertenece el módulo
    private $id_modulo; //esta variable la utilizo en la peticion insert
	public function __construct( $id = null,$peticion = null) { 
		$this->peticion = $peticion;
		$this->id = $id;
		//ver si es edicion 
		
			if($peticion !=null && $peticion === "UPDATE"){
				$this->cargaDatos();
                $this->cargaClase($this->id_clase); // Cargar el nombre de la clase
			}
            if($peticion!=null && $peticion ==="INSERT"){
                $this->cargaClase($id); // Cargar el nombre de la clase
            }
	}


	private function cargaDatos(){
		$model = new MainModel();
		$datos = $model->seleccionaRegistros("modulos", ["id_modulo","nombre", "descripcion","clase_id"],
		"id_modulo = ?", [$this->id]);
		//TODO: programar select Rows
        $this->id_modulo=$datos["0"]["id_modulo"];
		$this->nombre=$datos["0"]["nombre"];
		$this->descripcion=$datos["0"]["descripcion"];
        $this->id_clase=$datos["0"]["clase_id"];
		
	}
    public function cargaClase($id_clase) {
         $model = new MainModel();
          $datosClase = $model->seleccionaRegistros("clases", ["nombre"], "id_clase = ?", 
          [$id_clase]);
           $this->clase = $datosClase["0"]["nombre"]; 
           
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
	
	public function insertaRegistro($nombre,$descripcion,$clase_id) {
		$model = new MainModel();
		$res = $model->agregaRegistro("modulos", ["nombre","descripcion", "clase_id"],[$nombre,$descripcion,$clase_id]);
		return $res;
	}

	public function eliminaRegistro($id) {
		$model = new MainModel();
		$res = $model->borraRegistro("modulos", "id_modulo=?", [$id]);
		return $res;
	}

	public function actualizaRegistro($id,$nombre,$descripcion,$clase_id) {
		$model = new MainModel();
		$res = $model->actualizaRegistro("modulos", ["nombre", "descripcion","clase_id"], "id_modulo=?", [$nombre, $descripcion,$clase_id,$id]);
		return $res;
	}

	//TODO: Cargar datos para edicion








}

