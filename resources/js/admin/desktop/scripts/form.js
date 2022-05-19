export let renderForm = () => {

    const forms = document.querySelectorAll('.admin-form');
    const submitButton = document.querySelector('.submit-button');
    const formContainer = document.querySelector('.form-container');
    const tableContainer = document.querySelector('.table-container');

    if (submitButton) {

        submitButton.addEventListener('click', () => {
            
            forms.forEach(form => {
        
                let data = new FormData(form);

                let url = form.action;
    
                if( ckeditors != 'null'){
    
                    Object.entries(ckeditors).forEach(([key, value]) => {
                        data.append(key, value.getData());
                    });
                }

                for (var pair of data.entries()) {
                    console.log(pair[0]+ ', ' + pair[1]); 
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

                    })
                    .catch ( error =>  {
    
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
        
                sendPostRequest();
    
            });
        })
    }

}