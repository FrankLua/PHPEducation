import { getData } from '../updateList/updateList.js';


$(document).ready(function () {
    debugger
    getData();
    $(document).on('click', '#pagination_links a', function (e) {

        e.preventDefault();
        var numberPage = this.text;
        getData(numberPage);
    });
});

$('#update-posts').click(function () {
    debugger
    $("#posts-info").empty();
    getData();
})








