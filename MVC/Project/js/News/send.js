let numberPage = document.querySelector("#cursorPages");

numberPage.forEach(function(elem) {
    elem.addEventListener("onClick", function(el) {
        id = el.getAttribute('id');
        fetch(`/News/?id=${id}`)      
    }
    )
});