
    // Función para buscar dinámicamente
    document.getElementById('searchInput').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const cards = document.querySelectorAll('#cardsContainer .card');
        cards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            card.style.display = title.includes(filter) ? '' : 'none';
        });
    });

// Función para eliminar contenido
function eliminarContenido(cardId, id) {
    // Crear un formulario con los datos necesarios
    const formulario = createPreFilledForm([
        { "name": "peticion", "value": "DELETE" },
        { "name": "id", "value": id }
    ]);

    // Confirmar el proceso y enviar la solicitud
    asyncConfirmProcessForm(
        formulario,
        "<?php echo SITE_URL; ?>_controller/ContenidoSubmoduloAsync.php",
        "Eliminación de contenido",
        "¿Está seguro de continuar? ¡Esta acción es irreversible!",
        "Resultado del procesamiento",
        remueveTarjeta,
        cardId
    );
}

// Función para eliminar la tarjeta del DOM
function remueveTarjeta(cardId) {
    const card = document.getElementById(cardId);
    if (card) {
        card.remove();
    } else {
        console.error(`No se encontró la tarjeta con el ID ${cardId}`);
    }
}

