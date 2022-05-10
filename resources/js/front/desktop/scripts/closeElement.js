export function closeElement() {
    const closeButton = document.querySelector('.close-button');
    const parent = document.querySelector(".parent");
    const elements = document.querySelectorAll('.required');

    if (closeButton) {
        closeButton.addEventListener('click', () => {
            parent.classList.remove('active');
            elements.forEach(element => {
                element.classList.add('active');
            });
        });
    }
}