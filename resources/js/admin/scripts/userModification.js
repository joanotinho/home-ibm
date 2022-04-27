export let userModification = () => {
    const editUserButtons = document.querySelectorAll('.edit-user-button');
    const spinner = document.querySelector('.spinner-container');

    const deleteUserButtons = document.querySelectorAll('.delete-user-button');
    const deleteConfirmation = document.querySelector('.delete-confirmation-container');
    const deleteCancelButton = document.querySelector('.cancel-delete-user');
    const deleteUser = document.querySelector('.delete-user');

    editUserButtons.forEach(editUserButton => {
        editUserButton.addEventListener('click', () => {
            spinner.classList.add('active'); 
        })
    });

    deleteUserButtons.forEach(deleteUserButton => {
        deleteUserButton.addEventListener('click', () => {
            deleteConfirmation.classList.add('active');
        });

        deleteCancelButton.addEventListener('click', () => {
            deleteConfirmation.classList.remove('active');
        });
    });
}