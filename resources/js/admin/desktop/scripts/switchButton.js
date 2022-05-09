export let switchButton = () => {
    
    const icons = document.querySelectorAll('.icon');

    icons.forEach(icon => {

        const onOffSwitchContainer = icon.closest('.on-off-switch');
        const switchInput = onOffSwitchContainer.querySelector('.on-off-switch-input');

        icon.addEventListener('click', () => {
            switchInput.checked = !switchInput.checked;
            onOffSwitchContainer.classList.toggle('active');
        });
    });
}