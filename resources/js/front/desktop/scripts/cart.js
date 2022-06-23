export let sendCart = () => {

    let mainContainer = document.getElementById('main');
    let forms = document.querySelectorAll('.front-form');
    let addToCartButton = document.querySelector('.cart-button');
    let buttons = document.querySelectorAll('.cart-stock-button');
    let payButton = document.querySelector('.pay-button');

    document.addEventListener('renderProductModules', (event => {
        sendCart();
    }), {once: true});

    if(addToCartButton) {

        let productAmount = document.querySelector('.number-display').value;
        
        document.addEventListener('plusMinusValue', (event) => {

            productAmount = event.detail.value;
        });

        addToCartButton.addEventListener('click', (event) => {

            event.preventDefault();
            
            forms.forEach(form => {
        
                let data = new FormData(form);
                let url = form.action;

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
                        
                        mainContainer.innerHTML = json.content;
                        
                        document.dispatchEvent(new CustomEvent('renderProductModules'));
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

    if(buttons) {
        buttons.forEach(button => {

            button.addEventListener('click', (event) => {
    
                event.preventDefault();
    
                let url = button.dataset.url;
                console.log(url);
    
                let sendPostRequest = async () => {
                    
                    let response = await fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                        },
                        method: 'GET'
                    })
                    .then(response => {
                    
                        if (!response.ok) throw response;
    
                        return response.json();
                    })
                    .then(json => {
    
                        mainContainer.innerHTML = json.content;
                        
                        document.dispatchEvent(new CustomEvent('renderProductModules'));
                    })
                    .catch ( error =>  {
    
                        if(error.status == '500'){
                            console.log(error);
                        };
                    });
                };
                
                sendPostRequest();
            })
        });
    }

    if(payButton){
        payButton.addEventListener('click', () => {
            
            let url = payButton.dataset.url;
            
            let sendIndexRequest = async () => {
    
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
                    
                    mainContainer.innerHTML = json.content;
                    
                    document.dispatchEvent(new CustomEvent('renderProductModules'));
                })
                .catch ( error =>  {
    
                    if(error.status == '500'){
                        console.log(error);
                    }
    
                });
            }
            sendIndexRequest();
        });
    }
}