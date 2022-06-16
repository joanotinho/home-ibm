export function plusMinusButton() {

    const buttons = document.querySelectorAll('.stock-button');

    document.addEventListener('renderProductModules', (event => {
        plusMinusButton();
    }), {once: true});

    buttons.forEach(button => {
        const buttonParent = button.closest(".stock-counter");
        const display = buttonParent.children[1];

        button.addEventListener('click', (event) => {

            event.preventDefault();

            if (button.dataset.stockButtonValue == '+') {
                display.value++;
            }

            if (button.dataset.stockButtonValue == '-') {
                if (display.value > 1) {
                    display.value--;
                };
            }

            document.dispatchEvent(new CustomEvent('plusMinusValue', {
                detail: {
                    value: display.value,
                }
            }));
        })
    });
}