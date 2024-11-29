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