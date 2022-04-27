
export let cleanConfirmation = () => {

    const forms = document.querySelectorAll('.admin-form');

    const cleanButton = document.querySelector('.clean-button');
    const cleanConfirmation = document.querySelector('.clean-confirmation-container');
    const cleanCancelButton = document.querySelector('.cancel-clean');
    const cleanContent = document.querySelector('.clean-content');


    cleanButton.addEventListener('click', () => {
        cleanConfirmation.classList.add('active');
    });
    
    cleanCancelButton.addEventListener('click', () => {
        cleanConfirmation.classList.remove('active');
    });

    cleanContent.addEventListener('click', () => {
        forms.forEach(form => {
            form.reset();
        });
        cleanConfirmation.classList.remove('active');
    });
}