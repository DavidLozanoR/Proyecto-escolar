function eliminaRegistro(ordinal, id_modulo) {
    // Crear formulario pre-relleno
    const inputsJsonArray = [
        { "name": "peticion", "value": "DELETE" },
        { "name": "id_modulo", "value": id_modulo }
    ];
    const formulario = createPreFilledForm(inputsJsonArray);

    // Llamar a la función para confirmar la eliminación y procesar el formulario
    asyncConfirmProcessForm(
        formulario,
        "<?php echo SITE_URL; ?>_controller/ModulosAsync.php",
        "Eliminación de registro",
        "¿Está seguro de continuar? ¡Esta acción es irreversible!",
        "Resultado del procesamiento",
        remueveRegistroTabla,
        ordinal
    );
}

function remueveRegistroTabla(ordinal) {
    // Eliminar el elemento del DOM
    const card = document.querySelector(`#modulesContainer .module-card[data-ordinal="${ordinal}"]`);
    if (card) {
        card.remove();
    }
}
