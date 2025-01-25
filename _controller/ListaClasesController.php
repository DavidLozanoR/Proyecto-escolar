<?php
require_once "MainModel.php";


class ListaClasesController {
	const VISTA = "_view/clases.html.php";
	const JS = "js/ctrlistaclases.js";
	public $datos;
	public $profesor;
	public $id_user;
	private $id_perfil;
	private $clase_detalles=[];

	function __construct($profesor)
	{
		
		$this->profesor=$profesor;
		if (isset($_SESSION["usuario"]["id_usuario"])) {
            $this->id_user = $_SESSION["usuario"]["id_usuario"];
			$this->id_perfil = $_SESSION["usuario"]["id_perfil"];
        } else {
            die("Error: No hay usuario autenticado en la sesión.");
        }
	}


	public function renderContent() {
		$model = new MainModel();
		if($this->id_perfil==2){
			$this->datos = $model->seleccionaRegistros("clases", ["id_clase", "nombre", "descripcion","horario","codigo_unico"],"profesor_id=?",[$this->id_user]);
		}else if($this->id_perfil==3){
			$clases_registradas = $model->seleccionaRegistros("clases_registradas", ["clase_id"],"alumno_id=?",[$this->id_user]);
			foreach($clases_registradas as $clase){
				$clase_detalles = $model->seleccionaRegistros("clases",["id_clase","nombre","descripcion","codigo_unico","profesor_id","horario"],"id_clase=?",[$clase["clase_id"]]);
				if(!empty($clase_detalles)){
					$clase_info = $clase_detalles[0];

                    $profesor = $model->seleccionaRegistros( "usuarios",["nombre"], "id_usuario=?",[$clase_info["profesor_id"]]);

                    $clase_info["profesor_nombre"] = !empty($profesor) ? $profesor[0]["nombre"] : "Desconocido";

					$this->clase_detalles[]=$clase_info;
				}
			}
		}
		include self::VISTA;
	}

	public function renderJS() {
		include self::JS;
	}
}
