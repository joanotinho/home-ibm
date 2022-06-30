export let renderProduct = () => {
    
    const mainContainer = document.getElementById('main');
    const productButtons = document.querySelectorAll('.product-button a');
    const forms = document.querySelectorAll('.front-form');
    let addToCartButton = document.querySelector('.cart-button');
    const categoryButtons = document.querySelectorAll('.category-button');
    const orderSelect = document.querySelector('.order-select');

    document.addEventListener("products",(event =>{
        renderProduct();
    }), {once: true});

    productButtons.forEach(productButton => {
            
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
                    
                    document.dispatchEvent(new CustomEvent('products'));   
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
    
    if(addToCartButton) {

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
                        
                        document.dispatchEvent(new CustomEvent('cart'));   

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
                        
                        document.dispatchEvent(new CustomEvent('products'));   
            
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

    if(orderSelect) {

        orderSelect.addEventListener('change', (event) => {

            event.preventDefault();
            
            let url = orderSelect.value;

            let sendOrderRequest = async () => {

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
                    
                    document.dispatchEvent(new CustomEvent('products'));   
  
                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    }

                });
            };
            sendOrderRequest();
        });
    }
}