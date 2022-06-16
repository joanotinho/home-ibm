export let sendCart = () => {

    let mainContainer = document.getElementById('main');
    let forms = document.querySelectorAll('.front-form');
    let addToCartButton = document.querySelector('.cart-button');

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
                
                for (let pair of data.entries()) {
                    console.log(pair[0] + ', ' + pair[1])
                }

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