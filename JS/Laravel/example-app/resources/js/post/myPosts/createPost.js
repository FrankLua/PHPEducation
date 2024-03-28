import { getMyPosts } from '../updateList/updateList.js';
debugger
$(document).ready(function () {
    $("#sendPost").on('submit', function (e) {
        e.preventDefault();
        debugger

        let title = $("#name-title").val();
        let content = $("#name-content").val();
        if (!validate([title, content], 6)) toastr.error('Не правильно заполнена форма!');
        else {
            $.ajax({
                url: '/API/Post/Store',
                type: "POST",
                dataType: 'json',
                data: {
                    content: content,
                    title: title
                },
                success: function () {
                    toastr.success('Пост создан, список обновлён!');
                    $("#createModal").removeClass('show');
                    getMyPosts();
                },
                error: function (response) {
                    switch (response.status) {
                        case 403: toastr.error('Ошибка вы не авторизованы'); break;
                        case 500: toastr.error('Ошибка на сервере'); break;
                        default: toastr.error('Неизвестная ошибка'); break;
                    };
                    $("#createModal").removeClass('show');
                    getMyPosts();
                }
            });
        }

    })
})
function validate(dataInputArr, minLength) {
    for (let i = 0; i <= dataInputArr.length - 1; i++) {
        if (dataInputArr[i].length < minLength) {
            return false;
        }
    }
    return true;
}


$("#createPost").on("click", function (event) {
    event.preventDefault();
    let element = $(this);
    let id = element.data("modal");

    $(id).addClass('show');
    window.onclick = function (e) {
        if (e.target == $(id)[0]) {
            $(id).removeClass('show');
        }
    }
});


