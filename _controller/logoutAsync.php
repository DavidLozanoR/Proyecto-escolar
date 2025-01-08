<?php
ini_set("display_errors", E_ALL);


class logoutAsync{
    const JS="js/logout.js";
 
        public function __construct() {
            $this->cerrarSesion();
        }
    
        private function cerrarSesion() {

            session_unset();  // Elimina todas las variables de sesión
            session_destroy(); // Destruye la sesión
            
            // Redirigir al usuario a la página de login
            echo "<script>window.location.href='" . SITE_URL . "inicio/';</script>";

            exit();
        }

    
    

}


?>
