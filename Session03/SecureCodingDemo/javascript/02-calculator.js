const expression = document.querySelector('#expression');
const result = document.querySelector('#result');

function calculate() {
    // Student exercise: the input is controlled by the user.
    const value = expression.value;
    result.textContent = Function(`"use strict"; return (${value})`)();
}

document.querySelector('#calculate').addEventListener('click', calculate);
