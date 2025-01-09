//Anular el submit del formulario
//ctragregarmodulos.js
let formulario = document.getElementById("formulario");
formulario.addEventListener("submit", formulario_submit);

function formulario_submit(e) {
    e.preventDefault();

    // procesamiento asíncrono
    asyncProcessForm(formulario, "<?php echo SITE_URL; ?>_controller/ContenidoSubmoduloAsync.php", "Procesando los datos", "Espere un momento...", "Resultado del procesamiento", regresaALista);
}

function regresaALista(response) {
    let md = document.getElementById("id_submodulo").value;
    location.replace(`<?php echo SITE_URL; ?>inicio/entrarsubmodulo/${md}`);
}
