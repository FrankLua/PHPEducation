
let message = 'Привет';

((message) => {
    message = message + '2'
})();

(() => {
    alert(message);
})();

