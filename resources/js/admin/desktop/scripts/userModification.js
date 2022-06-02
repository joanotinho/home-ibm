export let userModification = () => {

    const deleteConfirmationContainer = document.querySelector('.delete-confirmation-container');
    const deleteCancelButton = document.querySelector('.cancel-delete-user');
    const deleteUser = document.querySelector('.delete-user');
    const formContainer = document.querySelector('.form-container');
    const tableContainer = document.querySelector('.table-container');

    const editUserButtons = document.querySelectorAll('.edit-user-button');
    const spinner = document.querySelector('.spinner2-container');

    document.addEventListener('openModalDelete', (event => {
        
        console.log(event.detail.url);
        deleteUser.dataset.url = event.detail.url;
        deleteConfirmationContainer.classList.add('active');
    }));
    
    deleteCancelButton.addEventListener('click', () => {
    
        deleteConfirmationContainer.classList.remove('active');
    });
    
    deleteConfirmationContainer.addEventListener('click', (e) => {

        if(e.target === deleteConfirmationContainer) {

            deleteConfirmationContainer.classList.remove('active');
        } 
    });

    deleteUser.addEventListener('click', () => {

        let url = deleteUser.dataset.url;

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

                if (response.ok) {
                    
                    document.dispatchEvent(new CustomEvent('responseStatus', {
                        detail: {
                            title: '¡Exito!',
                            text: 'Usuario eliminado correctamente',
                            type: 'success'
                        }
                    }));
                } else if (!response.ok) {

                    document.dispatchEvent(new CustomEvent('responseStatus', {
                        detail: {
                            status: '¡Error!',
                            text: 'Formulario no enviado',
                            type: 'error'
                        }
                    }));
                }

                if (!response.ok) throw response;

                return response.json();
            })
            .then(json => {

                if(json.table){
                    document.dispatchEvent(new CustomEvent('loadTable', {
                        detail: {
                            table: json.table,
                        }
                    }));
                }

                document.dispatchEvent(new CustomEvent('loadForm', {
                    detail: {
                        form: json.form,
                    }
                }));

                deleteConfirmationContainer.classList.remove('active');

                document.dispatchEvent(new CustomEvent('renderTableModules'));
                // document.dispatchEvent(new CustomEvent('renderFormModules'));
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