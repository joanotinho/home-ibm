export function localeTabs() {

    const tabs = document.querySelectorAll('.locale-tab');
    const tabContents = document.querySelectorAll('.locale-tab-content');

    tabs.forEach(tab => {

        tab.addEventListener('click', () => {

            tabs.forEach(tab => {
                tab.classList.remove('active');
            });
            
            tabContents.forEach(tabContent => {

                tabContent.classList.remove('active');

                if(tab.dataset.tabTarget == tabContent.dataset.tabContent){
                    
                    tab.classList.add('active');
                    tabContent.classList.add('active');
                    
                } 
            });
        })
    })
}