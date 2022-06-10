export let renderProduct = () => {
    
    const mainContainer = document.getElementById('main');
    const productButtons = document.querySelectorAll('.product-button a');
    const categoryButtons = document.querySelectorAll('.category-button');

    document.addEventListener('renderProductModules', (event => {
        renderProduct();
    }), {once: true});

    productButtons.forEach(productButton => {
        
        document.addEventListener('loadProduct', (event => {
            
        }), {once: true});

        productButton.addEventListener('click', () => {
                
            let url = productButton.dataset.url;
            
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

                    mainContainer.innerHTML =  json.content;
                    

                    document.dispatchEvent(new CustomEvent('renderProductModules'));
                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    }

                });
            }

            sendEditRequest();
        });
    });

    if(categoryButtons) {
        
        categoryButtons.forEach(button => {

            button.addEventListener('click', (event) => {

                event.preventDefault();

                let url = button.dataset.url;
                console.log(url);

                let sendFilterRequest = async () => {
    
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
                };
                sendFilterRequest();
            });
        });
    }
}