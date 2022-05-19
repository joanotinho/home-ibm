export let table = () => {
    
    const editButtons = document.querySelectorAll('.edit-user-button');
    const forms = document.querySelectorAll('.admin-form');

    editButtons.forEach(editButton => {

        editButton.addEventListener('click', (event) => {

            forms.forEach(form => {
                
                let url = editButton.dataset.url;
    
                let sendEditRequest = async () => {
                    
                    let response = await fetch(url, {
                        
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        method: 'GET',
                    })
                    .then(response => {
                    
                        if (!response.ok) throw response;
            
                        return response.json();

                    })
                    .then(json => {
            
                        formContainer.innerHTML = json.form;
                        tableContainer.innerHTML = json.table;

                        document.dispatchEvent(new CustomEvent('loadTable', {
                            detail: {
                                form: json.form,
                            }
                        }));
                    })
                    .catch ( error =>  {
            
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
            
                sendEditRequest();
            });
        });
    });
}