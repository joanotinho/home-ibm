
export let renderForm = () => {

    const forms = document.querySelectorAll('.admin-form');
    const submitButton = document.querySelector('.submit-button');
    const errorsContainer = document.querySelector('.errors-container');
    const elements = document.querySelectorAll('.required');

    if (submitButton) {

        submitButton.addEventListener('click', () => {
            
            forms.forEach(form => {
        
                let formData = new FormData(form);
            
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1])
                }
            });
        })
    }

}