export function plusMinusButton() {

    const buttons = document.querySelectorAll('.stock-button');

    buttons.forEach(button => {
        const buttonParent = button.closest(".stock-counter");
        const display = buttonParent.children[1];
        button.addEventListener('click', () => {
            if (button.dataset.stockButtonValue == '+') {
                display.value++;
            }

            if (button.dataset.stockButtonValue == '-') {
                display.value--;

                if (display.value < 0) {
                    display.value = 0;
                };
            }
        })
    });
}