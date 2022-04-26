const editButtons = document.querySelectorAll('.edit-button');
const deleteButtons = document.querySelectorAll('.delete-button');
const deleteConfirmation = document.querySelector('.delete-confirmation-container');
const cleanConfirmation = document.querySelector('.clean-confirmation-container');
const eliminateButtons = document.querySelectorAll('#eliminate');
const cancelButtons = document.querySelectorAll('#cancel');

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

    eliminateButtons.forEach(eliminateButton => {

        eliminateButton.addEventListener('click', () => {
            deleteConfirmation.classList.remove('active');
            cleanConfirmation.classList.remove('active');
        });
    }); 

    cancelButtons.forEach(cancelButton => {

        cancelButton.addEventListener('click', () => {
            deleteConfirmation.classList.remove('active');
            cleanConfirmation.classList.remove('active');
        });
    });
}