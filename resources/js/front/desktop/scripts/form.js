export let renderForm = () => {

    const mainContent = document.getElementById('main');
    const forms = document.querySelectorAll('.front-form');
    const submitButton = document.querySelector('.submit-button');
    
    document.addEventListener("contact",( event =>{
        
        renderForm();

    }), {once: true});

    document.addEventListener("checkout",( event =>{
        
        renderForm();

    }), {once: true});

 
    if(submitButton) {
        
        submitButton.addEventListener('click', (event) => {

            event.preventDefault();
            
            forms.forEach(form => {
        
                let data = new FormData(form);
                let url = form.action;
    
                Object.entries(ckeditors).forEach(([key, value]) => {
                    data.append(key, value.getData());
                });

                let sendPostRequest = async () => {
    
                    
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
                            
                        document.dispatchEvent(new CustomEvent('contact'));
                        document.dispatchEvent(new CustomEvent('checkout'));
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