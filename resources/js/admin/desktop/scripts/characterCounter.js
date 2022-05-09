export let characterCounter = () => {

    const characterCounters = document.querySelectorAll('.character-counter');
    
    characterCounters.forEach(characterCounter => {

        const field = characterCounter.closest('.field');
        const counterInput = field.querySelector('.counter-input');
        const maxLengthDisplay = field.querySelector('.max-length-display');

        const inputMaxLength = counterInput.dataset.maxLength;
        maxLengthDisplay.innerHTML = "de " + inputMaxLength;
        
    
        counterInput.addEventListener('input', () => {

            const inputLength = counterInput.value.length;
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
