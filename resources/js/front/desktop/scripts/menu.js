export let menu = () => {
    
    let mainContent = document.getElementById('main');
    let menuButtons = document.querySelectorAll('.menu-button');

    if(menuButtons) {
        
        menuButtons.forEach(menuButton => {

            menuButton.addEventListener('click', () => {
                    
                let url = menuButton.dataset.url;
                let section = menuButton.dataset.section;
                let currentSection = document.querySelector('.page-section').id;
                sessionStorage.setItem('lastSection', currentSection);
    
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

                        window.history.pushState('', '', url);
                        mainContent.innerHTML = json.content;
    
                        document.dispatchEvent(new CustomEvent(section));
                    
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
    
    window.addEventListener('popstate', event => {

        let url = window.location.href;

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

                document.dispatchEvent(new CustomEvent('loadSection', {
                    detail: {
                        section: sessionStorage.getItem('lastSection')
                    }
                }));

                let currentSection = document.querySelector('.page-section').id;
                sessionStorage.setItem('lastSection', currentSection);
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