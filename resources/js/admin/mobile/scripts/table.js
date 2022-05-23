export let renderTable = () => {

    const formContainer = document.querySelector('.form-container');
    const tableContainer = document.querySelector('.table-container');
    
    const editButtons = document.querySelectorAll('.edit-user-button');

    // const deleteCancelButton = document.querySelector('.cancel-delete-user');
    // const deleteConfirmationContainer = document.querySelector('.delete-confirmation-container');
    // const deleteButtons = document.querySelectorAll('.delete-user-button');
    
    const forms = document.querySelectorAll('.admin-form');

    document.addEventListener('renderModules', (event => {
        renderTable();
    }), {once: true});

    editButtons.forEach(editButton => {

        const user = editButton.closest('.draggable-field');
        const deleteButton = user.querySelector('.delete-user-button');

        user.addEventListener('deleteUserSlide', (event) => {

            let url = editButton.dataset.url;

            console.log(url);

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

                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    }

                });

            }
            sendEditRequest();
        });

        // user.addEventListener('click', (event) => {
        //     let url = user.dataset.url;
        //     deleteUser.dataset.url = url;
        //     deleteConfirmationContainer.classList.add('active');
        // });
        
        // deleteCancelButton.addEventListener('click', () => {
    
        //     deleteConfirmationContainer.classList.remove('active');
        // });

        user.addEventListener('deleteUserSlide', (event) => {

            document.dispatchEvent(new CustomEvent('startWait'));

            let url = deleteButton.dataset.url;

            console.log(url);

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

                    document.dispatchEvent(new CustomEvent('renderModules'));
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