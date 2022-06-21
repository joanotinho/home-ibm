export let menu = () => {
    
    const mainContent = document.getElementById('main');
    let menuButtons = document.querySelectorAll('.menu-button');

    menuButtons.forEach(menuButton => {

        menuButton.addEventListener('click', () => {
                
            let url = menuButton.dataset.url;

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
                    mainContent.innerHTML = json.content;

                    document.dispatchEvent(new CustomEvent('renderContentModules'));
                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    }

                });
            }
            sendIndexRequest();
        });
    });
}