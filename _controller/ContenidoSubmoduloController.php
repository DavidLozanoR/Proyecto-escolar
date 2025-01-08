<?php
ini_set("display_errors", E_ALL);

require_once "MainModel.php";


class ContenidoSubmoduloController {

    const VISTA="_view/contenidosubmodulo.html.php";
    const JS="js/contenidosubmodulo.js";

    private $id_submodulo;
    private $datos;
    private $nombre_submodulo;
    private $peticion;

    function __construct($id=null,$peticion=null)
    {
        $this->id_submodulo=$id;
        $this->peticion=$peticion;
    }

    function renderContent(){
        $model=new MainModel();
       $this->datos=$model->seleccionaRegistros("contenido",["id_contenido","nombre_archivo","ruta_archivo","submodulo_id"],"submodulo_id=?",[$this->id_submodulo]);
       include self::VISTA;
    }

    public function renderJS(){
        include self::JS;
    }

    function submoduloNombre($id_submodulo){
        $model=new MainModel();
        $datosSubmodulo= $model->seleccionaRegistros("submodulos",["nombre"],"id_submodulo=?",[$id_submodulo]);
        $this->nombre_submodulo=$datosSubmodulo["0"]["nombre"];
        return $this->nombre_submodulo;
        
    }
    function moduloId($id_submodulo){
        $model=new MainModel();
        $datosmodulo=$model->seleccionaRegistros("submodulos",["modulo_id"],"id_submodulo=?",[$id_submodulo]);
        return $datosmodulo["0"]["modulo_id"];
    }

    //funcionalidades 
    public function validaAtributos($id=null) {
        $res = true;
        if ( !is_null($id) ) {
			$res = $res && $id != "";
		}
        return $res;
    }

    public function insertaRegistro($nombre_archivo,$ruta_archivo,$submodulo_id){
        $model=new MainModel();
        $res = $model->agregaRegistro("contenido",["nombre_archivo","ruta_archivo","submodulo_id"],[$nombre_archivo,$ruta_archivo,$submodulo_id]);
        return $res;

    }

    public function eliminaRegistro($id_contenido){
        $model=new MainModel();
        $res=$model->borraRegistro("contenido","id_contenido=?",[$id_contenido]);
        return $res;
    }

    public function actualizaRegistro($id,$nombre_archivo,$ruta_archivo,$submodulo_id){
        $model=new MainModel();
        $res=$model->actualizaRegistro("contenido",["nombre_archivo","ruta_archivo","submodulo_id"],"id_contenido=?",[$id],[$nombre_archivo,$ruta_archivo,$submodulo_id,$id]);
        return $res;
    }

    


}



?>