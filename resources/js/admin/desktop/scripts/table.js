export let renderTable = () => {

    const formContainer = document.querySelector('.form-container');
    const tableContainer = document.querySelector('.table-container');
    const editButtons = document.querySelectorAll('.edit-user-button');

    const deleteCancelButton = document.querySelector('.cancel-delete-user');
    const deleteConfirmationContainer = document.querySelector('.delete-confirmation-container');
    const deleteButtons = document.querySelectorAll('.delete-user-button');
    const deleteUser = document.querySelector('.delete-user');
    
    const forms = document.querySelectorAll('.admin-form');

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
                
                let url = deleteButton.dataset.url;
                deleteUser.dataset.url = url;
                deleteConfirmationContainer.classList.add('active');
            });
        });
        
        deleteCancelButton.addEventListener('click', () => {
        
            deleteConfirmationContainer.classList.remove('active');
        });

        deleteUser.addEventListener('click', () => {

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

                    if (response.status == '200') {
                        return response.json();
                    }

                })
                .then(json => {

                    tableContainer.innerHTML = json.table;
                    formContainer.innerHTML = json.form;

                    document.dispatchEvent(new CustomEvent('loadDelete', {
                        detail: {
                            form: json.form,
                        }
                    }));

                    document.dispatchEvent(new CustomEvent('renderTableModules'));
                    document.dispatchEvent(new CustomEvent('renderFormModules'));
                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    }
                });
            }
            sendDeleteRequest();
        });
    }
}