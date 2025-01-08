<?php

include_once "MainModel.php";
include_once "SubmodulosController.php";
Class ListaSubModulosController {

    const VISTA="_view/submodulos.html.php";
    const JS="js/ctrlistasubmodulos.js";
    public $datos;
    public $id;
    public $modulo;
    private $id_clase;
    
    function __construct($id)
    {
        $this->id=$id;
        $ctrl=new SubModulosController();
        $this->modulo=$ctrl->cargaModulo($id);//carga nombre del modulo
        $this->id_clase=$ctrl->cargaClase($id);
        
        
    }
    

    function renderContent(){
        $model= new MainModel();
        $this->datos=$model->seleccionaRegistros("submodulos",["id_submodulo","nombre","descripcion"],"modulo_id=?",[$this->id]);
        include self::VISTA;

    }
    public function renderJS() {
		include self::JS;
	}

    
    
}




?>