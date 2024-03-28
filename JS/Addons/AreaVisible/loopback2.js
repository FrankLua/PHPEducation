function createIncrementAndLog() {
    let count = 0;
    function increment() {
        ++count;
        return count;
    }
    let message = `Count is ${count}`;
    function log() {
        console.log(message);

    }
    return [increment, log]
}
const [funcA, funcB] = createIncrementAndLog();
console.log(funcA());//1
console.log(funcA())//2
console.log(funcA())//3
console.log(funcA())//4
console.log(funcA())//5
funcB();// Count is 0