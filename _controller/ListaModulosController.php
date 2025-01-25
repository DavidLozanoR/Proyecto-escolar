<?php

include_once "MainModel.php";

Class ListaModulosController {

    const VISTA="_view/modulos.html.php";
    const JS="js/ctrlistamodulos.js";
    public $datos;
    public $id;
    private $id_perfil;

    function __construct($id)
    {
        $this->id=$id;
        $this->id_perfil=$_SESSION["usuario"]["id_perfil"];
    }
    

    function renderContent(){
        $model= new MainModel();
        $this->datos=$model->seleccionaRegistros("modulos",["id_modulo","nombre","descripcion"],"clase_id=?",[$this->id]);
        include self::VISTA;

    }
    public function renderJS() {
		include self::JS;
	}


}




?>