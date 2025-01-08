//Anular el submit del formulario
let formulario = document.getElementById("formulario");
formulario.addEventListener("submit", formulario_submit);
//  location.replace("");
function formulario_submit(e) {
	e.preventDefault();
	
	//procesamiento asincrono
	asyncProcessForm(formulario, "/php/workspace/_controller/LoginAsync.php", "Procesando los datos", "Espere un momento...", "Resultado del procesamiento", regresaPrincipal);
}

function regresaPrincipal() {
	 location.replace("");
	
	
}