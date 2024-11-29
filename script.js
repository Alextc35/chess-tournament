// Cuando la ventana o el documento se carga completamente
window.onload = function() {
    // Selecciona el campo de entrada (input) con el ID 'addPlayer'.
    const inputField = document.getElementById('addPlayer');
    // Establece el foco en el campo de entrada seleccionado para que el usuario pueda escribir de inmediato.
    inputField.focus();
}

/**
 * Muestra un formulario de edición asociado a un elemento específico en la página.
 *
 * Esta función localiza un formulario de edición basado en el índice proporcionado,
 * lo hace visible y oculta los botones de edición y eliminación asociados al mismo elemento.
 *
 * @param {number|string} index - El índice del elemento para identificar el formulario
 *                                y los botones correspondientes. Generalmente, este índice
 *                                se usa como parte del identificador HTML de los elementos.
 */
function showEditForm(index) {
    const form = document.getElementById('editForm-' + index);
    form.style.display = 'block';

    const editButton = document.getElementById('editButton-' + index);
    const deleteButton = document.getElementById('deleteButton-' + index);
    if (editButton && deleteButton) {
        editButton.style.display = 'none';
        deleteButton.style.display = 'none';
    }
}

/**
 * Oculta un formulario de edición asociado a un elemento específico y vuelve
 * a mostrar los botones de edición y eliminación.
 *
 * @param {number|string} index - El índice del elemento para identificar el formulario
 *                                y los botones correspondientes. Generalmente, este índice
 *                                se usa como parte del identificador HTML de los elementos.
 */
function hideEditForm(index) {
    const form = document.getElementById('editForm-' + index);
    form.style.display = 'none';

    const editButton = document.getElementById('editButton-' + index);
    const deleteButton = document.getElementById('deleteButton-' + index);
    if (editButton && deleteButton) {
        editButton.style.display = 'inline';
        deleteButton.style.display = 'inline';
    }
}