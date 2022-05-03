export let notification = () => {
    const notificationContainer = document.querySelector('.notification-container');
    const notificationTitle = document.querySelector('.notification-title');
    const notificationDescription = document.querySelector('.notification-description');

    
    notificationContainer.classList.add('visible');

    if(notificationContainer.classList.contains('success')) {

        notificationTitle.innerHTML = 'Saved changes';
        notificationDescription.innerHTML = 'Your changes have been saved successfully';

    } else if(notificationContainer.classList.contains('error')) {

        notificationTitle.innerHTML = 'Error';
        notificationDescription.innerHTML = 'Your changes have not been saved successfully';

    }
}