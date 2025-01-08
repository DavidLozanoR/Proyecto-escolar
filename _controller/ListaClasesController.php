<?php
require_once "MainModel.php";


class ListaClasesController {
	const VISTA = "_view/clases.html.php";
	const JS = "js/ctrlistaclases.js";
	public $datos;
	public $profesor;
	public $id_user;

	function __construct($profesor)
	{
		
		$this->profesor=$profesor;
		if (isset($_SESSION["usuario"]["id_usuario"])) {
            $this->id_user = $_SESSION["usuario"]["id_usuario"];
        } else {
            die("Error: No hay usuario autenticado en la sesión.");
        }
	}


	public function renderContent() {
		$model = new MainModel();
		$this->datos = $model->seleccionaRegistros("clases", ["id_clase", "nombre", "descripcion","horario","codigo_unico"],"profesor_id=?",[$this->id_user]);
		include self::VISTA;
	}

	public function renderJS() {
		include self::JS;
	}
}
