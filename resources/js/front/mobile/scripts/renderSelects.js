export let renderSelects = () => {
    
    const contentContainers = document.querySelectorAll('.contents');

    contentContainers.forEach(contentContainer => {

        const container = contentContainer.closest('.selects-container');
        const optionsSelect = container.querySelector('.options-select select');

        if (optionsSelect) {

            optionsSelect.addEventListener('change', (e) => {
                
                const option = e.target.value;
                const contents = contentContainer.querySelectorAll('.content');
                
                contents.forEach(content => {


                    if(option == content.dataset.option) {
                        
                        content.classList.add('show');
                    } else {
                        
                        content.classList.remove('show');
                    }
                });
            });
        }
    });
}