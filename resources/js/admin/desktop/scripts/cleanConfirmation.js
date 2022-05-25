
export let cleanConfirmation = () => {

    const forms = document.querySelectorAll('.admin-form');

    const cleanButton = document.querySelector('.clean-button');
    const cleanConfirmationContainer = document.querySelector('.clean-confirmation-container');
    const cleanCancelButton = document.querySelector('.cancel-clean');
    const cleanContent = document.querySelector('.clean-content');

    cleanConfirmationContainer.addEventListener('click', (e) => {

        if(e.target === cleanConfirmationContainer) {
            
            cleanConfirmationContainer.classList.remove('active');
        } 

        
    });
}