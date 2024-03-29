/* 
callback - это функция переданная в другую функцию как аргумент
*/

function myfunc(callback) {
    const a = [4, 5, 6];
    let element = document.querySelector('.myClass');
    callback(element, a)
}

function out(elem, arr) {
    elem.innerHTML = arr.join('-');
}

myfunc(out);

//getData(outInfo);

function getData(callback) {
    fetch('https://api.publicapis.org/entries')
        .then(response => response.json())
        .then(data => callback(data.entries))
        .catch(error => console.error(error));


}


function outInfo(data) {
    data.forEach(function (item, index, array) {
        console.log(item);
    });
}