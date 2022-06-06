export let renderForm = () => {

    const mainContent = document.getElementById('main');
    const forms = document.querySelectorAll('.front-form');
    const submitButton = document.querySelector('.submit-button');

    if(submitButton) {
        
        submitButton.addEventListener('click', (event) => {

            event.preventDefault();
            
            forms.forEach(form => {
        
                let data = new FormData(form);
                let url = form.action;
    
                console.log(url);
                
                Object.entries(ckeditors).forEach(([key, value]) => {
                    data.append(key, value.getData());
                });
    
                // for (let pair of data.entries()) {
                //     console.log(pair[0] + ', ' + pair[1])
                // }

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
                        mainContent.innerHTML = json.content;
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
}