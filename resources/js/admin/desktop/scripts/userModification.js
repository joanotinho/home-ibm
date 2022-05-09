export let userModification = () => {

    const deleteUserButtons = document.querySelectorAll('.delete-user-button');
    const deleteConfirmationContainer = document.querySelector('.delete-confirmation-container');
    const deleteConfirmation = document.querySelector('.delete-confirmation');
    const deleteCancelButton = document.querySelector('.cancel-delete-user');
    const deleteUser = document.querySelector('.delete-user');

    const editUserButtons = document.querySelectorAll('.edit-user-button');
    const spinner = document.querySelector('.spinner2-container');

    
    editUserButtons.forEach(editUserButton => {

        editUserButton.addEventListener('click', () => {
            
            spinner.classList.add('active'); 
        })
    });

    deleteUserButtons.forEach(deleteUserButton => {

        deleteUserButton.addEventListener('click', () => {
            deleteConfirmationContainer.classList.add('active');
        })
    });

    deleteCancelButton.addEventListener('click', () => {

        deleteConfirmationContainer.classList.remove('active');
        console.log('cancel');
    });

    deleteUser.addEventListener('click', () => {

        deleteConfirmationContainer.classList.remove('active');
        console.log('delete');
    });

    deleteConfirmationContainer.addEventListener('click', (e) => {

        if(e.target === deleteConfirmationContainer) {

            deleteConfirmationContainer.classList.remove('active');
        } 
    });
}