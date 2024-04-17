

function request(callBack) {
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/todos/1",
        method: "GET"
    }).done(function (data) {
        callBack(data)
    }).fail(function (errorThrown) {
        callBack(errorThrown)
    }).always(callBack('Запрос Прошёл'))
}

function callBack(response) {
    console.log(response)
}

request(callBack);
debugger

