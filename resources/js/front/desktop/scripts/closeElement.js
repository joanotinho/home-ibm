export function closeElement() {
    const closeButtons = document.querySelectorAll('.close-button');

    closeButtons.forEach(closeButton => {

        const parent = closeButton.closest(".errors-container");
        const elements = closeButton.querySelectorAll('.required');
    
        if (closeButton) {
            
            closeButton.addEventListener('click', () => {

                parent.classList.remove('active');

                elements.forEach(element => {

                    element.classList.add('active');
                });
            });
        }
    });
}