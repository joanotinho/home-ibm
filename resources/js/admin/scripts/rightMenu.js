
export let rightMenu = () => {

    const switchButtons = document.querySelectorAll('.on-off-switch');
    const switchItems = document.querySelectorAll('.on-off-switch-items');
    const icons = document.querySelectorAll('.icon');

    const cleanButton = document.querySelector('.clean-button');
    const cleanConfirmation = document.querySelector('.clean-confirmation-container');

    const saveButton = document.querySelector('.submit-button');
    const savedChanges = document.querySelector('.saved-changes-container');

    switchButtons.forEach(switchButton => {
        icons.forEach(icon => {
            icon.addEventListener('click', () => {
                switchItems.forEach(switchItem => {
                    switchButton.classList.toggle('active');
                });
            });
        });
    });

    cleanButton.addEventListener('click', () => {
        cleanConfirmation.classList.add('active');
    });



    function visibleSaveChanges() {
        savedChanges.classList.add('visible');
        setTimeout(() => {
            setTimeout(() => {
                savedChanges.classList.remove('visible');
            }, 100);
            savedChanges.classList.add('active');
        }, 2000);
        savedChanges.classList.remove('active');
    }

    saveButton.addEventListener('click', () => {
        visibleSaveChanges();
    })
}