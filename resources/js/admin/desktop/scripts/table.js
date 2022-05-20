export let table = () => {

    const formContainer = document.querySelector('.form-container');
    const tableContainer = document.querySelector('.table-container');
    const editButtons = document.querySelectorAll('.edit-user-button');

    const deleteCancelButton = document.querySelector('.cancel-delete-user');
    const deleteConfirmationContainer = document.querySelector('.delete-confirmation-container');
    const deleteButtons = document.querySelectorAll('.delete-user-button');
    const deleteUser = document.querySelector('.delete-user');
    
    const forms = document.querySelectorAll('.admin-form');

    editButtons.forEach(editButton => {

        if(editButton) {

            editButton.addEventListener('click', (event) => {

                let url = editButton.dataset.url;
    
                let sendEditRequest = async () => {
    
                    document.dispatchEvent(new CustomEvent('startWait'));
    
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
    
                    })
                    .catch ( error =>  {
    
                        if(error.status == '500'){
                            console.log(error);
                        }
    
                    });
    
                }
                sendEditRequest();

                document.dispatchEvent(new CustomEvent('reloadModels', {
                    detail: {
                        table: tableContainer,
                        form: formContainer,
                    }
                }));
            });
        }
    });

    if (deleteButtons) {
        
        deleteButtons.forEach(deleteButton => {

                deleteButton.addEventListener('click', (event) => {
                    
                    let url = deleteButton.dataset.url;
                    deleteUser.dataset.url = url;
                    deleteConfirmationContainer.classList.add('active');
                });
                
                deleteCancelButton.addEventListener('click', () => {
            
                    deleteConfirmationContainer.classList.remove('active');
                });

                deleteUser.addEventListener('click', (event) => {

                    let url = deleteUser.dataset.url;

                    let sendDeleteRequest = async () => {
        
                        document.dispatchEvent(new CustomEvent('startWait'));
        
                        let response = await fetch(url, {
                            headers: {
                                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                            method: 'DELETE'
                        })
                        .then(response => {
        
                            if (!response.ok) throw response;
        
                            return response.json();
                        })
                        .then(json => {
        
                            formContainer.innerHTML = json.form;
                            tableContainer.innerHTML = json.table;

                            document.dispatchEvent(new CustomEvent('loadDelete', {
                                detail: {
                                    url: url,
                                }
                            }));
                        })
                        .catch ( error =>  {
        
                            if(error.status == '500'){
                                console.log(error);
                            }
                        });
                    }
                    sendDeleteRequest();
                });
        });
    }
}