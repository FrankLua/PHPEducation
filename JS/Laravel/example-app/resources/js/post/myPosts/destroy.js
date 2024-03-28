
import { deleteData } from '../updateList/updateList.js';


$(document).ready(function () {
    $(document).on('click', '#btn-delete-post', function (e) {
        debugger
        let element = $(this);
        let id = element.data("id");
        deleteData(id);

    });
});
