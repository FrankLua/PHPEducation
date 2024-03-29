let a = 5;

/* setTimeout(() => {
    a = 10;
}, 1000) */
console.log(a);


let promise = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve(a = "sdas");

    }, 1000)
})
promise.then(function () { // resolve
    return a += "I'm work"
})
    .then(() => { // идёт друг за другом
        console.log(a);
    })
promise.catch((e) => { //reject
    console.log(e)
})
    .finally(() => { // работает в любом случае
        console.log('final')
    })