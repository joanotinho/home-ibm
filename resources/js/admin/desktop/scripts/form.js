export let renderForm = () => {

    const forms = document.querySelectorAll('.admin-form');
    const submitButton = document.querySelector('.submit-button');
    const formContainer = document.querySelector('.form-container');
    const tableContainer = document.querySelector('.table-container');
    
    const cleanButton = document.querySelector('.clean-button');
    const cleanConfirmationContainer = document.querySelector('.clean-confirmation-container');
    const cleanConfirmation = document.querySelector('.clean-content');
    const cleanCancel = document.querySelector('.cancel-clean');

    document.addEventListener("loadForm", (event => {

        formContainer.innerHTML = event.detail.form;
    }), {once: true});

    document.addEventListener("renderFormModules", (event => {
        renderForm();
    }), {once: true});

     
    if (cleanButton) {
            
        cleanButton.addEventListener('click', () => {
            
            let url = cleanButton.dataset.url;
            cleanConfirmation.dataset.url = url;
            cleanConfirmationContainer.classList.add('active');
        });
        
        cleanCancel.addEventListener('click', () => {
        
            cleanConfirmationContainer.classList.remove('active');
        });

        cleanConfirmation.addEventListener('click', () => {

            let url = cleanConfirmation.dataset.url;

            console.log(url);

            let sendCleanRequest = async () => {

                document.dispatchEvent(new CustomEvent('startWait'));

                let response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    method: 'GET'
                })
                .then(response => {

                    if (!response.ok) throw response;

                    if (response.status == '200') {
                        return response.json();
                    }

                })
                .then(json => {

                    formContainer.innerHTML = json.form;

                    document.dispatchEvent(new CustomEvent('renderFormModules'));
                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    }
                });
            }

            sendCleanRequest();

            cleanConfirmationContainer.classList.remove('active');
        });
    }

    submitButton.addEventListener('click', () => {
        
        forms.forEach(form => {
    
            let data = new FormData(form);

            let url = form.action;
            
            Object.entries(ckeditors).forEach(([key, value]) => {
                data.append(key, value.getData());
                // console.log(key, value.getData());
            });

            for (let pair of data.entries()) {
                console.log(pair[0] + ', ' + pair[1])
            }

            let sendPostRequest = async () => {

                document.dispatchEvent(new CustomEvent('startWait'));
                
                let response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                    },
                    method: 'POST',
                    body: data
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
                            table: json.table,
                        }
                    }));
                    
                    document.dispatchEvent(new CustomEvent('renderFormModules'));
                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    };
                });
            };
            sendPostRequest();
        });
    });

}