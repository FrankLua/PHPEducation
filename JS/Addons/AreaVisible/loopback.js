function makeCount(count) {

    return function () {
        return ++count;
    }
}

let functionOne = makeCount(0);
let functionTwo = makeCount(1);

alert(functionOne());//1
alert(functionOne());//2
alert(functionTwo());//2
alert(functionTwo());//3


