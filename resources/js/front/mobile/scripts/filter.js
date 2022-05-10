export function filter() {
    const filter = document.querySelector('.filter');

    if (filter != null) {
        filter.addEventListener('click', () => {
            filter.classList.toggle('active');
        });
    }
}