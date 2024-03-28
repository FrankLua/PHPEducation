import { getMyPosts } from '../updateList/updateList.js';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    debugger
    getMyPosts();
    $(document).on('click', '#pagination_links a', function (e) {

        e.preventDefault();
        var numberPage = this.text;

        getMyPosts(numberPage);
    });
});
$('#update-posts').click(function () {
    debugger
    $("#posts-info").empty();
    getMyPosts();
})