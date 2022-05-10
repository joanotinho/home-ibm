export function tabs() {

    const tabs = document.querySelectorAll('.tab')

    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {

        tab.addEventListener('click', () => {

            tabs.forEach(tab => {
                tab.classList.remove('active');
            });
            
            tabContents.forEach(tabContent => {

                tabContent.classList.remove('active');

                if(tab.dataset.tabTarget == tabContent.dataset.tabContent){
                    
                    tabContent.classList.add('active');
                    
                    tab.classList.add('active')
                } 
            });
        })
    })
}