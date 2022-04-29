import { max } from "lodash";

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


    const characterCounters = document.querySelectorAll('.character-counter');
    
    characterCounters.forEach(characterCounter => {

        const field = characterCounter.closest('.field');
        const counterInput = field.querySelector('.counter-input');
        const maxLengthDisplay = field.querySelector('.max-length-display');
    

        maxLengthDisplay.innerHTML = "de " + counterInput.dataset.maxLength;
    
    
        counterInput.addEventListener('keydown', () => {
    
            // cuenta la longitud del input
            const inputLength = counterInput.value.length;

            // define la longitud maxima del input, sacada del dataset
            const maxLength = counterInput.dataset.maxLength;

            // imprimimos el valor del input en el contador
            characterCounter.innerHTML = inputLength;
    
    
            if(inputLength >= maxLength) {
                characterCounter.classList.add('character-counter-max-value');
                counterInput.maxLength = inputLength;
            } else {
                characterCounter.classList.remove('character-counter-max-value');
            }
        });
    });

}
