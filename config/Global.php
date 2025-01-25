<?php 

	//Redefinir directorios de inclusion de archivos PHP
	set_include_path(
		get_include_path() .
		PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_model' .
		PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/_controller' .
		PATH_SEPARATOR . realpath(__DIR__ . '/..') . '/class'
	);
	define("SITE_URL","http://localhost/php/workspace/");
    define("RUTA_DEFAULT", "inicio");
    define("DB_HOST", "localhost");
    define("DB_BASE", "sistema_clases");
    define("DB_USR", "root");
    define("DB_PASS", "1234");
	define("CLAVE_SECRETA","test");
	?>
	
