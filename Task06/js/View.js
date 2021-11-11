import {
    block_greeting,
    block_information,
    block_showGame,
    block_message,
    block_result,
    block_resultText,
    field_name,
    text_info,
    num_attempt,
    max_num,
    makeNumber,
    hidden_number,
    var_num_attempt
} from './Model.js';

export var userName;

export function startGame() {
    block_greeting.style.display = 'flex';
    block_information.style.display = 'none';
    block_showGame.style.display = 'none';
    block_message.style.display = 'none';
    block_result.style.display = 'none';
}

export function informationOutput() {
    if (field_name.value === "") {
        alert("Введите имя")
    } else {
        userName = field_name.value;

        block_greeting.style.display = 'none';
        block_information.style.display = 'flex';
        block_showGame.style.display = 'none';

        text_info.innerHTML = "Замечательно, <b>" + userName + "</b>! Давайте сыграем в игру \"Угадай число\"." +
            "  Я загадываю число<b> от 1 до " + max_num +
            "</b> и вы должны отгадать число за <b>" + num_attempt + "</b> попытки.";
    }
}

export function showGameOutput() {
    block_greeting.style.display = 'none';
    block_information.style.display = 'none';
    block_showGame.style.display = 'flex';
    block_message.style.display = 'none';
    block_result.style.display = 'none';

    makeNumber();
}

export function messageOutput(type_message) {
    if (type_message === "less") {
        block_message.style.display = 'flex';
        block_message.innerHTML = "Ваше число слишком маленькое! Кол-во попыток: " + var_num_attempt;
    }
    if (type_message === "more") {
        block_message.style.display = 'flex';
        block_message.innerHTML = "Ваше число слишком большое! Кол-во попыток: " + var_num_attempt;
    }
    if (type_message === "win") {
        block_message.style.display = 'none';
        block_showGame.style.display = 'none';
        block_result.style.display = 'flex';
        block_resultText.innerHTML = "Поздравляю! Вы отгадали число " + hidden_number +
            " c " + (num_attempt - var_num_attempt + 1) + "-й попытки";
    }
    if (type_message === "loss") {
        block_message.style.display = 'none';
        block_showGame.style.display = 'none';
        block_result.style.display = 'flex';
        block_resultText.innerHTML = "К сожалению вы не отгадали число " + hidden_number;
    }
}