
export let renderForm = () => {

    const forms = document.querySelectorAll('.admin-form');
    const submitButton = document.querySelector('.submit-button');

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