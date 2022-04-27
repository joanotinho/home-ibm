export let characterCounter = () => {
    const characterCounters = document.querySelectorAll('.character-counter');
    const counterInputs = document.querySelectorAll('.counter-input');
    const maxLengthDisplay = document.querySelector('.max-length-display');

    characterCounters.forEach(characterCounter => {

        counterInputs.forEach(counterInput => {

            maxLengthDisplay.innerHTML = "de " + counterInput.dataset.maxLength;

            counterInput.addEventListener('keydown', () => {

                const counterValue = counterInput.value.length;
                const maxLength = counterInput.dataset.maxLength;
                characterCounter.innerHTML = counterValue;

                if (counterValue >= maxLength) {
                    characterCounter.classList.add('character-counter-max-value');
                    counterInput.maxLength = counterValue;
                }
            });
        });
    });
}
