export let checkout = () => {

    let mainContainer = document.getElementById('main');
    let forms = document.querySelectorAll('.front-form');
    let placeOrderButton = document.querySelector('.place-order-button');

    document.addEventListener('renderProductModules', (event => {
        checkout();
    }), {once: true});

    if(placeOrderButton) {

        placeOrderButton.addEventListener('click', (event) => {

            event.preventDefault();
            
            forms.forEach(form => {
                
                let data = new FormData(form);
                let url = placeOrderButton.dataset.url;
                console.log(data);
        
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
}