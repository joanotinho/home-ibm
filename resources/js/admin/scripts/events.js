export let events = () => {

    let sendButton = document.querySelector('.save-button');
    let nameInput = document.getElementById('name');

    if (sendButton) {
        sendButton.addEventListener('click', (event) => {

            let name = nameInput.value;

            if (name) {
                document.dispatchEvent(new CustomEvent('message', {
                    detail: {
                        title: '¡Exito!',
                        text: 'Formulario enviado correctamente',
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