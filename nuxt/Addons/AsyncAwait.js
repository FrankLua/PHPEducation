/* 
async-функции всегда возвращают промисы:

*/
async function fn() {
    return 'hello';
  }
fn().then(console.log)
// hello
function fn() {
    return Promise.resolve('hello');
  }
   
fn().then(console.log);
  // hello


  const a = await 9; // = await Promise.resolve(9);

/* Необработанные ошибки обертываются в rejected промис.
Тем не менее в async-функциях можно использовать конструкцию try/catch для того,
чтобы выполнить синхронную обработку ошибок. */

console.log('start');

const promise1 = new Promise((resolve, reject) => {
  console.log(1)
})

console.log('end');
// start 1 end
console.log('start');

const promise1 = new Promise((resolve, reject) => {
  console.log(1)
  resolve(2)
})

promise1.then(res => {
  console.log(res)
})

console.log('end');

//start 1 end 2
console.log('start');

const promise1 = new Promise((resolve, reject) => {
  console.log(1)
  resolve(2)
  console.log(3)
})

promise1.then(res => {
  console.log(res)
})

console.log('end');

// start 1 3 end 2

console.log('start');

const promise1 = new Promise((resolve, reject) => {
  console.log(1)
})

promise1.then(res => {
  console.log(2)
})

console.log('end');
//start 1 end

console.log('start')

const fn = () => (new Promise((resolve, reject) => {
  console.log(1);
  resolve('success')
}))

console.log('middle')

fn().then(res => {
  console.log(res)
})

console.log('end')
//start middle 1 end success

console.log('start')

setTimeout(() => {
  console.log('setTimeout')
})

Promise.resolve().then(() => {
  console.log('resolve')
})

console.log('end');

//start  end  resolve setTimeout.
