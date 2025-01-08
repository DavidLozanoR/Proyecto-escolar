

var tblDatos = new DataTable('#tblDatos');

function eliminaRegistro(ordinal, id) {
    const formulario = createPreFilledForm([
        {"name":"peticion", "value":"DELETE"},
        {"name":"id", "value":id}
    ]);

    asyncConfirmProcessForm(formulario, "<?php echo SITE_URL; ?>_controller/ClasesAsync.php", "Eliminación de registro", "¿Está seguro de continuar? ¡Esta acción es irreversible!", "Resultado del procesamiento", remueveRegistroTabla, ordinal);
}

function remueveRegistroTabla(ordinal) {
    tblDatos.row(ordinal).remove().draw(false); //false preserva la paginación en datatables
}

