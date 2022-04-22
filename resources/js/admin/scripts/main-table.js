const editButtons = document.querySelectorAll('.edit-button');
const deleteButtons = document.querySelectorAll('.delete-button');
const deleteConfirmation = document.querySelector('.delete-confirmation');
const formColumn = document.querySelector('.form-column');
const tableColumn = document.querySelector('.table-column');


export function mainTable() {
    editButtons.forEach(editButton => {
        editButton.addEventListener('click', () => {
            tableColumn.classList.toggle('active');
        });
    });

    deleteButtons.forEach(deleteButton => {
        deleteButton.addEventListener('click', () => {
            deleteConfirmation.classList.add('active');
        })
    });
}