export let characterCounter = () => {
    // const characterCounters = document.querySelectorAll('.character-counter');
    // const counterInputs = document.querySelectorAll('.counter-input');
    // const maxLengthDisplays = document.querySelectorAll('.max-length-display');

    
    // characterCounters.forEach(characterCounter => {

    //     counterInputs.forEach(counterInput => {

    //         maxLengthDisplays.forEach(maxLengthDisplay => {
    //             maxLengthDisplay.innerHTML = "de " + counterInput.dataset.maxLength;
    //         });

    //         counterInput.addEventListener('keydown', () => {

    //             const counterValue = counterInput.value.length;
    //             const maxLength = counterInput.dataset.maxLength;
    //             characterCounter.innerHTML = counterValue;

    //             if (counterValue >= maxLength) {
                    
    //                 characterCounter.classList.add('character-counter-max-value');
    //                 counterInput.maxLength = counterValue;
    //             } else {
    //                 characterCounter.classList.remove('character-counter-max-value');
    //             }
    //         });
    //     });
    // });

    const characterCounterContainers = document.querySelectorAll('.character-counter-container');
    const fieldInputs = document.querySelectorAll('.field-input');

    characterCounterContainers.forEach(characterCounterContainer => {


        const characterCounter = characterCounterContainer.querySelector('.character-counter');
        const maxLengthDisplay = characterCounterContainer.querySelector('.max-length-display');
        const counterInputs = document.querySelectorAll('.counter-input');
        
            counterInputs.forEach(counterInput => {

                maxLengthDisplay.innerHTML = "de " + counterInput.dataset.maxLength;

                counterInput.addEventListener('keydown', () => {

                    const counterValue = counterInput.value.length;
                    const maxLength = counterInput.dataset.maxLength;
                    characterCounter.innerHTML = counterValue;

                    if (counterValue >= maxLength) {
                        
                        characterCounter.classList.add('character-counter-max-value');
                        counterInput.maxLength = counterValue;
                    } else {
                        characterCounter.classList.remove('character-counter-max-value');
                    }
                });
            });
    });
}
