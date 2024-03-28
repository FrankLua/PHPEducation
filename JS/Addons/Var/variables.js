/* 
Переменная – это «именованное хранилище» для данных. Мы можем использовать переменные для хранения товаров, посетителей и других данных.

*/

let message; // Объявление
let user = 'John', age = 25, message2 = 'Hello'; //Мы также можем объявить несколько переменных в одной строке:

/* 
Различия var и let
1) Для «var» не существует блочной области видимости
Область видимости переменных var ограничивается либо функцией, либо, если переменная глобальная, то скриптом.
*/
if (true) {
    var test = true; // используем var вместо let
}

alert(test);

function sayHi() {
    if (true) {
        var phrase = "Привет";
    }

    alert(phrase); // срабатывает и выводит "Привет"
}

sayHi();
alert(phrase); // Ошибка: phrase не определена (видна в консоли разработчика)

/* 
2) «var» допускает повторное объявление
*/
var user = "Пётр";

var user = "Иван";

alert(user); // Иван
/* 
3) В самом начале исполнения скрипта всегда идёт объявление var переменных
Это поведение называется «hoisting» (всплытие, поднятие), потому что все объявления переменных var «всплывают» в самый верх функции

*/
function sayHi() {
    phrase = "Привет";

    alert(phrase);

    var phrase;
}
sayHi();
//Объявления переменных «всплывают», но присваивания значений – нет.
function sayHi() {
    alert(phrase);

    var phrase = "Привет";
}

sayHi();

/* 
Имена переменных
В JavaScript есть два ограничения, касающиеся имён переменных:

Имя переменной должно содержать только буквы, цифры или символы $ и _.
Первый символ не должен быть цифрой.

Если имя содержит несколько слов, обычно используется верблюжья нотация,
*/
let переменная = 'sdfsfsd'; // можно писать на кириллице 
/*
Названия: let, class, return и function зарезервированы.



Создание переменной без использования

*/
// заметка: "use strict" в этом примере не используется

num = 5; // если переменная "num" раньше не существовала, она создаётся

alert(num); // 5

"use strict";

num = 5; // ошибка: num is not defined


/* 

Константы

*/
const myBirthday = '18.04.1982'; // объявление

myBirthday = '01.01.2001'; // ошибка, константу нельзя перезаписать!


/* 

Широко распространена практика использования констант в качестве псевдонимов для трудно запоминаемых значений
*/

const COLOR_RED = "#F00";
const COLOR_GREEN = "#0F0";
const COLOR_BLUE = "#00F";
const COLOR_ORANGE = "#FF7F00";

// ...когда нам нужно выбрать цвет
let color = COLOR_ORANGE;
alert(color); // #FF7F00

/* 
Как называть
Если коснтанта известна до загрузке то ПРОПИСНЫМИ COLOR_BLACK
Если константа не известная то camelCase
*/

/* 

Используйте легко читаемые имена, такие как userName или shoppingCart.
Избегайте использования аббревиатур или коротких имён, таких как a, b, c, за исключением тех случаев, когда вы точно знаете, что так нужно.
Делайте имена максимально описательными и лаконичными. Примеры плохих имён: data и value.
Такие имена ничего не говорят. Их можно использовать только в том случае,
если из контекста кода очевидно, какие данные хранит переменная.
Договоритесь с вашей командой об используемых терминах.
Если посетитель сайта называется «user», тогда мы должны называть связанные с ним переменные currentUser или newUser,
 а не, к примеру, currentVisitor или newManInTown.
 */