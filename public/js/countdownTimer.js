console.log("timer loaded");
const startMins = 5;
let time = startMins * 60;

const timer = document.getElementById('countdown');

setInterval(updateCountdown, 1000);

function updateCountdown() {
    const minutes = Math.floor(time/60);
    let seconds = time % 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    timer.innerHTML = `${minutes}: ${seconds}`;
    time --;
}