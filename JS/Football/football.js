



function generateString() {
    let max = Math.round(Math.random() * 100);
    let result = '';
    for (i = 0; i < max; i++) {
        result += Math.round(Math.random() * 1).toString();

    }
    return result;

}

function findDanger(players, dangerCount = 7) {
    alert(players);
    debugger
    let lastPlayer;
    let count = 1;
    for (let i = 0; i < players.length; i++) {
        let player = players[i];
        if (player === lastPlayer) {
            count++;
            if (count >= dangerCount) return true;
        }
        else {
            lastPlayer = player;
            count = 1;
        }
    }
    return false;
}

if (findDanger(generateString())) alert("YES");
else alert("NO");