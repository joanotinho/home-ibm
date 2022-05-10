export function plusMinusButton() {

    const buttons = document.querySelectorAll('.stock-button');

    if (buttons) {
        buttons.forEach(button => {
            const buttonParent = button.closest(".stock-counter");
            const display = buttonParent.children[1];
            button.addEventListener('click', () => {
                if (button.dataset.stockButtonValue == '+') {
                    display.value++;
                }
    
                if (button.dataset.stockButtonValue == '-') {
                    if (display.value > 1) {
                        display.value--;
                    };
                }
            })
        });
    }
}