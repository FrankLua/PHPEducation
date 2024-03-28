

export function getData(page = 0) {
    $.ajax({
        url: `/API/Post/GetPosts?page=${page}`,
        method: 'get',

        success: function (response) {

            $("#posts-info").empty();
            $("#posts-info").append(response);
            debugger
            toastr.info("Список обновлён");

        },
        error: function (response) {
            console.log(response);
        }
    });
}
export function deleteData(id) {
    $.ajax({
        url: `/API/Post/Destroy?id=${id}`,
        method: 'delete',
        data: { id: id },
        success: function () {
            toastr.success("Удаление прошло успешно");
            getMyPosts();
        },
        error: function (response) {
            switch (response.status) {
                case 403: toastr.error('Ошибка вы не авторизованы'); break;
                case 500: toastr.error('Ошибка на сервере'); break;
                default: toastr.error('Неизвестная ошибка'); break;
            };
        }
    });
}
export function getMyPosts(page = 0) {
    $.ajax({
        url: `/API/Post/GetMyPosts?page=${page}`,
        method: 'get',
        success: function (response) {
            debugger
            $("#posts-info").empty();
            $("#posts-info").append(response);
            toastr.info("Список обновлён");

        },
        error: function (response) {
            console.log(response);
        }
    });
}
