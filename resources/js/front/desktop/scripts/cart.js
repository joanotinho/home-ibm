export let renderCart = () => {

    let mainContainer = document.getElementById('main');
    let buttons = document.querySelectorAll('.cart-stock-button');
    let payButton = document.querySelector('.pay-button');

    document.addEventListener("cart",( event =>{
        
        renderCart();

    }), {once: true});

    buttons.forEach(button => {

        button.addEventListener('click', (event) => {

            event.preventDefault();

            let url = button.dataset.url;

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
                    
                    document.dispatchEvent(new CustomEvent('cart'));   

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

    if(payButton) {

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
                    
                    document.dispatchEvent(new CustomEvent('checkout'));   

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