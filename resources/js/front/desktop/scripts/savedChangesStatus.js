export let savedChangesStatus = () => {
    
    const notification = document.querySelector('.notification');

    if (notification) {
        document.addEventListener('message', (event => {
        
            const notificationTitle = document.getElementById('notification-title');
            const notificationMessage = document.getElementById('notification-message');
    
            
            notificationTitle.innerHTML = event.detail.title;
            notificationMessage.innerHTML = event.detail.text;
            notification.classList.add(event.detail.type);
            notification.classList.add('visible');
    
            setTimeout(() => {
                notification.classList.remove('visible');
                notification.classList.remove(event.detail.type);
            }, 5000);
            
        }));
    }
} 