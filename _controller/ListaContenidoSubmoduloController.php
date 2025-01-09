<?php


include_once "MainModel.php";
include_once "ContenidoSubmoduloController.php";

class ListaContenidoSubmoduloController {

    const VISTA="_view/contenidosubmodulo.html.php";
    const JS="js/ctrlistacontenidosubmodulo.js";

    private $id_submodulo;
    private $id_modulo;
    private $nombre_submodulo;
    private $datos;

    function __construct($id)
    {
        $this->id_submodulo=$id;
        $datos=new ContenidoSubmoduloController($id);
        $this->nombre_submodulo=$datos->submoduloNombre($id);
        $this->id_modulo=$datos->moduloId($id);

    }

    function renderContent(){
        $model=new MainModel();
        $this->datos=$model->seleccionaRegistros("contenido",["id_contenido","nombre_archivo","ruta_archivo","submodulo_id"],"submodulo_id=?",[$this->id_submodulo]);
        foreach ($this->datos as &$reg) { // Usamos "&" para modificar directamente el array
            $googleDriveURL = $reg["ruta_archivo"];

            // Extraer el ID del archivo de Google Drive
            if (preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $googleDriveURL, $matches)) {
            $fileID = $matches[1];
            $reg["downloadURL"] = "https://drive.google.com/uc?export=download&id=" . $fileID;
            } else {
            $reg["downloadURL"] = "#"; // Si no es una URL válida
        }
    }
    unset($reg); // Evita posibles errores al modificar referencias en foreach
       include self::VISTA;
    }

    public function renderJS(){
        include self::JS;
    }


}



?>