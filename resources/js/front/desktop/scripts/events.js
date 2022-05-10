export let events = () => {

    let cartButton = document.querySelector('.cart-button');
    let nameInput = document.getElementById('name');

    if (cartButton) {
        cartButton.addEventListener('click', (event) => {

            if (cartButton) {
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