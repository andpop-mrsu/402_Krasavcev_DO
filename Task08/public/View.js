import {
    block_greeting,
    block_information,
    block_showGame,
    block_message,
    block_result,
    block_resultText,
    block_menuGame,
    field_name,
    text_info,
    num_attempt,
    max_num,
    makeNumber,
    hidden_number,
    addNewGame,
    var_num_attempt, block_list, block_text_list
} from './Model.js';

export var userName;

export function informationOutput() {
    if (field_name.value === "") {
        alert("Введите имя")
    } else {
        userName = field_name.value;

        hideAll();

        block_information.style.display = 'flex';

        text_info.innerHTML = "Замечательно, <b>" + userName + "</b>! Давайте сыграем в игру \"Угадай число\"." +
            "  Я загадываю число<b> от 1 до " + max_num +
            "</b> и вы должны отгадать число за <b>" + num_attempt + "</b> попытки.";
    }
}
export function startGame() {
    hideAll();

    block_greeting.style.display = 'flex';
}

export function menuGame(){
    if (field_name.value === "") {
        alert("Введите имя")
    } else {
    hideAll();
    block_menuGame.style.display = 'flex';
    }
}

export function showGameOutput() {
    hideAll();

    makeNumber();

    addNewGame(userName, max_num, num_attempt, hidden_number);

    block_showGame.style.display = 'flex';
}

export function messageOutput(type_message) {
    block_resultText.style.display = "flex";

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

export function writeAllGame(result){
    hideAll();

    block_list.style.display = 'flex';
    block_text_list.innerHTML = result;
}

function hideAll(){
    block_greeting.style.display = 'none';
    block_information.style.display = 'none';
    block_showGame.style.display = 'none';
    block_message.style.display = 'none';
    block_result.style.display = 'none';
    block_menuGame.style.display = 'none';
    block_list.style.display = 'none';
}