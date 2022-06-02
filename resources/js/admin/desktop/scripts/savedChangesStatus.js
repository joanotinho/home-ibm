export let savedChangesStatus = () => {
    let sendButton = document.querySelector('.save-button');
    let nameInput = document.getElementById('name');
    let deleteButton = document.querySelector('.delete-user');

    const notification = document.querySelector('.notification');
    const notificationTitle = document.getElementById('notification-title');
    const notificationMessage = document.getElementById('notification-message');
    
    document.addEventListener('responseStatus', (event => {
    
        
        notificationTitle.innerHTML = event.detail.title;
        notificationMessage.innerHTML = event.detail.text;
        notification.classList.add(event.detail.type);
        notification.classList.add('visible');

        setTimeout(() => {
            notification.classList.remove('visible');
            notification.classList.remove(event.detail.type);
        }, 5000);
    }));
    

    if (deleteButton) {
        deleteButton.addEventListener('responseStatus', (event) => {
            
            notificationTitle.innerHTML = event.detail.title;
            notificationMessage.innerHTML = event.detail.text;
            notification.classList.add(event.detail.type);
            notification.classList.add('visible');
    
            setTimeout(() => {
                notification.classList.remove('visible');
                notification.classList.remove(event.detail.type);
            }, 5000);
        });
    }
} 