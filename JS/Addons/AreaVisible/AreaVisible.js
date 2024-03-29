/* 
Если переменная объявлена внутри блока кода {...}, то она видна только внутри этого блока.
*/
{
    // выполняем некоторые действия с локальной переменной, которые не должны быть видны снаружи

    let message = "Hello"; // переменная видна только в этом блоке

    alert(message); // Hello
}

alert(message); // ReferenceError: message is not defined

/* 
Для if, for, while и т.д. переменные, объявленные в блоке кода {...}, также видны только внутри:
*/
if (true) {
    let phrase = "Hello";

    alert(phrase); // Hello
}

alert(phrase); // Ошибка, нет такой переменной!

/* 
То же самое можно сказать и про циклы for и while:
*/
for (let i = 0; i < 3; i++) {
    // переменная i видна только внутри for
    alert(i); // 0, потом 1, потом 2
}

alert(i); // Ошибка, нет такой переменной!

/* 
Лексическое окружение






*/

//это глобальное лексическое окружение в нем есть переменная x и y имеет доступ только к своим переменным 
let x = "My name is 'X'"

let y = function () {
    // Второе локальное лексическое окружение имеет доступ и к своим переменным и к переменным родительского окружения
    return x + ". My second name is 'Y'";
}// Так же это пример замыкания