export let switchButton = () => {
    
    const switchButtons = document.querySelectorAll('.on-off-switch');
    const switchItems = document.querySelectorAll('.on-off-switch-items');
    const icons = document.querySelectorAll('.icon');


    switchButtons.forEach(switchButton => {

        icons.forEach(icon => {

            icon.addEventListener('click', () => {

                switchItems.forEach(switchItem => {
                    
                    switchButton.classList.toggle('active');
                });
            });
        });
    });
}