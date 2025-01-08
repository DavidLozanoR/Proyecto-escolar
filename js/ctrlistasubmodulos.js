function eliminaSubmodulo(ordinal, id_submodulo) {
    // Crear formulario pre-relleno
    const inputsJsonArray = [
        { "name": "peticion", "value": "DELETE" },
        { "name": "id_submodulo", "value": id_submodulo }
    ];
    const formulario = createPreFilledForm(inputsJsonArray);

    // Llamar a la función para confirmar la eliminación y procesar el formulario
    asyncConfirmProcessForm(
        formulario,
        "<?php echo SITE_URL; ?>_controller/SubmodulosAsync.php",
        "Eliminación de registro",
        "¿Está seguro de continuar? ¡Esta acción es irreversible!",
        "Resultado del procesamiento",
        remueveSubmoduloTabla,
        ordinal
    );
}

function remueveSubmoduloTabla(ordinal) {
    // Eliminar el elemento del DOM
    const card = document.querySelector(`#submodulesContainer .submodule-card[data-ordinal="${ordinal}"]`);
    if (card) {
        card.remove();
    }
}
s