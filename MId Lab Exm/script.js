const display = document.getElementById('display');

function DisplayThis(input) {
    if (display.value === "Invalid") {
        display.value = "";
    }
    display.value += input;
}
function clearDisplay() {
    display.value = "";
}
function calculate() {
    try {
        const expression = display.value;
        let operator = "";

        if (expression.includes('+')) operator = '+';
        else if (expression.includes('-')) operator = '-';
        else if (expression.includes('*')) operator = '*';
        else if (expression.includes('/')) operator = '/';

        if (operator === "") return;

        const parts = expression.split(operator);
        
        const num1 = parseFloat(parts[0]);
        const num2 = parseFloat(parts[1]);

        if (isNaN(num1) || isNaN(num2)) {
            display.value = "Invalid";
            return;
        }

        let result;
        if (operator === '+') result = num1 + num2;
        else if (operator === '-') result = num1 - num2;
        else if (operator === '*') result = num1 * num2;
        else if (operator === '/') {
            if (num2 === 0) {
                display.value = "Invalid";
                return;
            }
            result = num1 / num2;
        }

        if (result !== undefined && !isNaN(result)) {
            display.value = result;
        } else {
            display.value = "Invalid";
        }

    } catch (error) {
        display.value = "Invalid";
    }
}