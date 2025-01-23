<?php
require_once "MainModel.php";

class BienvenidaController {
	const VISTA = "_view/bienvenida.html.php";
	const JS = "js/bienvenida.js";
	private $id_perfil;
	
	
	function __construct($id_perfil){
		$this->id_perfil=$id_perfil;
	}


	public function renderContent() {
		include self::VISTA;
	}

	public function renderJS() {
		include self::JS;
	}
}
