const imgLinks = [
    'front/images/0.jpg',
    'front/images/1.jpeg',
    'front/images/2.jpg',
    'front/images/3.jpg'
];
const delay = 5000;
let currentIndex = 0;
let backGround = document.getElementById('ground');

let selector = document.getElementById('selector');
debugger
selector.addEventListener('change', (element) => {
    debugger;
    let value = selector.value;
    switch (value) {
        case "0": backGround.style.backgroundImage = "url(" + imgLinks[0] + ")"; break;
        case "1": backGround.style.backgroundImage = "url(" + imgLinks[1] + ")"; break;
        case "2": backGround.style.backgroundImage = "url(" + imgLinks[2] + ")"; break;
        case "3": backGround.style.backgroundImage = "url(" + imgLinks[3] + ")"; break;
    }
});


