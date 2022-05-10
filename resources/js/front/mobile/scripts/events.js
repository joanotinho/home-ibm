export let events = () => {

    let sendButton = document.querySelector('.cart-button');

    if (sendButton) {
        sendButton.addEventListener('click', (event) => {

            if (sendButton) {
                document.dispatchEvent(new CustomEvent('message', {
                    detail: {
                        title: '¡Exito!',
                        text: 'Producto añadido al carrito',
                        type: 'success'
                    }
                }));
            } else {
                document.dispatchEvent(new CustomEvent('message', {
                    detail: {
                        title: '¡Error!',
                        text: 'Formulario no enviado',
                        type: 'error'
                    }
                }));
            }
        });
    }
}