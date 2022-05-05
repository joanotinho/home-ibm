export let tooltip = () => {
    
    const tooltips = document.querySelectorAll('.tooltip');

    tooltips.forEach(tooltip => {

        const tooltipContainer = tooltip.closest('.tooltip-container');
        const tooltipText = tooltipContainer.querySelector('.tooltip-text');
        const tooltipTextValue = tooltipText.dataset.name;
        const tooltipTextPosition = tooltipText.dataset.position;
        
        tooltipText.classList.add('tooltip-text--' + tooltipTextPosition);

        tooltipText.innerHTML = tooltipTextValue;
        

        tooltipContainer.addEventListener('mouseover', (e) => {
            tooltip.classList.add('show');
        });

        tooltipContainer.addEventListener('mouseout', (e) => {
            tooltip.classList.remove('show');
        });
    });
}