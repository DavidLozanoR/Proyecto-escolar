//Anular el submit del formulario
let formulario = document.getElementById("formulario");
formulario.addEventListener("submit", formulario_submit);

function formulario_submit(e) {
	e.preventDefault();
	
	//procesamiento asincrono
	asyncProcessForm(formulario, "<?php echo SITE_URL; ?>_controller/PerfilControllerAsync.php", "Procesando los datos", "Espere un momento...", "Resultado del procesamiento", regresaPerfil);
}

function regresaPerfil() {
	location.replace("<?php echo SITE_URL; ?>inicio/perfil/");
	
}