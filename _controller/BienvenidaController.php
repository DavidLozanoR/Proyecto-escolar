<?php
require_once "MainModel.php";

class BienvenidaController {
	const VISTA = "_view/bienvenida.html.php";
	const JS = "js/bienvenida.js";
	public $datos;
	
	public function renderContent() {
		include self::VISTA;
	}

	public function renderJS() {
		include self::JS;
	}
}
