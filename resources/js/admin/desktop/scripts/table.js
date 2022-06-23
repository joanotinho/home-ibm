export let renderTable = () => {

    const tableContainer = document.querySelector('.table-container');
    const editButtons = document.querySelectorAll('.edit-user-button');

    const deleteConfirmationContainer = document.querySelector('.delete-confirmation-container');
    const deleteButtons = document.querySelectorAll('.delete-user-button');

    document.addEventListener("loadTable",( event =>{
        tableContainer.innerHTML = event.detail.table;
    }), {once: true});
    
    document.addEventListener('renderTableModules', (event => {
        renderTable();
    }), {once: true});

    if(editButtons) {

        editButtons.forEach(editButton => {

            editButton.addEventListener('click', () => {

                let url = editButton.dataset.url;
    
                let sendEditRequest = async () => {
    
                    let response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        method: 'GET'
                    })
                    .then(response => {
    
                        if (!response.ok) throw response;
    
                        return response.json();
                    })
                    .then(json => {
    

                        document.dispatchEvent(new CustomEvent('loadForm', {
                            detail: {
                                form: json.form,
                            }
                        }));
    
                        document.dispatchEvent(new CustomEvent('renderFormModules'));
                    })
                    .catch ( error =>  {
    
                        if(error.status == '500'){
                            console.log(error);
                        }
    
                    });
                }
                deleteConfirmationContainer.classList.remove('active');

                sendEditRequest();
            });
        });
    }
    
    if (deleteButtons) {
            
        deleteButtons.forEach(deleteButton => {

            deleteButton.addEventListener('click', () => {
                document.dispatchEvent(new CustomEvent('openModalDelete', {
                    detail: {
                        url: deleteButton.dataset.url,
                    }
                }));
            });
        });
    }
}