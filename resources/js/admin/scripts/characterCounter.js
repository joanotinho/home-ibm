export let characterCounter = () => {

    const characterCounters = document.querySelectorAll('.character-counter');
    
    characterCounters.forEach(characterCounter => {

        const field = characterCounter.closest('.field');
        const counterInput = field.querySelector('.counter-input');
        const maxLengthDisplay = field.querySelector('.max-length-display');
    

        maxLengthDisplay.innerHTML = "de " + counterInput.dataset.maxLength;
    
    
        counterInput.addEventListener('input', () => {
    
            // cuenta la longitud del input
            const inputLength = counterInput.value.length;

            // define la longitud maxima del input, sacada del dataset
            const inputMaxLength = counterInput.dataset.maxLength;

            // imprimimos el valor del input en el contador
            characterCounter.innerHTML = inputLength;
    
            if(inputLength >= inputMaxLength) {
                characterCounter.classList.add('character-counter-max-value');
                counterInput.maxLength = inputLength;
            } else {
                characterCounter.classList.remove('character-counter-max-value');
            }
        });
    });
}
