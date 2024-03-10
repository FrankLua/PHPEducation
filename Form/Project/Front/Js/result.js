async function main() {
    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });
    let query = params.id;

    debugger;
    await getData(query);








}
debugger
main();


async function getData(id) {
    const imgLinks = [
        '../front/images/successful1.jpg',
        '../front/images/successful2.jpg',
        '../front/images/successful3.jpg',
        '../front/images/fail.jpg',
    ];
    let path = "http://phpeducation/Form/Project/Back/getOrder.php?id=" + id;
    let backGround = document.getElementById('ground');
    let infoElement = document.getElementById("info");
    let title = document.getElementById("title");
    try {

        const res = await fetch(path, {
            method: "GET",
            headers: { 'content-type': 'application/json' }
        });
        let response = await res.json();
        response = response[0];

        title.innerText = "Успех!";
        infoElement.innerText = "Поздравляю " + response.firstName
            + " Вы успешно зарегистрировались на концерт группы " + response.group
            + " на вашу почту " + response.email + " было отправленно сообщение";

        switch (response.group) {
            case "RadioHead": backGround.style.backgroundImage = "url(" + imgLinks[0] + ")"; break;
            case "Земфира": backGround.style.backgroundImage = "url(" + imgLinks[1] + ")"; break;
            case "Ghinzu": backGround.style.backgroundImage = "url(" + imgLinks[2] + ")"; break;
        }
    }
    catch {
        let blur = document.getElementById("blur");
        let title = document.getElementById("title");

        title.innerText = "Провал!";
        blur.style.backdropFilter = "blur(0px)";

        infoElement.innerText = "Произошла ошибка на сервере, попробуйте снова!";
        backGround.style.backgroundImage = "url(" + imgLinks[3] + ")";
    }


}