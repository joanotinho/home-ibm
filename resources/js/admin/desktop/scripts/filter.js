export let filter = () => {
    
    const filterContainer = document.querySelector('.filters-container');
    const filterIcons = document.querySelector('.filter-icons');
    const shownIcon = document.querySelector('.shown-icon');
    const hiddenIcon = document.querySelector('.hidden-icon');

    hiddenIcon.addEventListener('click', () => {
        filterIcons.classList.add('active');
        filterContainer.classList.add('active');
    });

    shownIcon.addEventListener('click', () => {
        filterIcons.classList.remove('active');
        filterContainer.classList.remove('active');
    });
    
}