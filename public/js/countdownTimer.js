var btnState = 0;

console.log("timer loaded");

const startMins = 5;
let time = startMins * 60;
// let minutes = Math.floor(time/60);
// let seconds = time % 60;

const timer = document.getElementById('countdown');
const getOTPBtn = document.getElementById('getOTPBtn');

getOTPBtn.addEventListener("click", prepareBtn);


 function prepareBtn(){
     if(btnState == 0){
        event.preventDefault();
     }
    // getOTPBtn.disabled = true;
 }

 // setInterval(updateCountdown, 1000);
//  while(btnState==0){
//     // while(!(minutes == 0 && seconds ==0)){
//         // setTimeout(updateCountdown,1000);
        
//     // }
//  }

 function updateCountdown() {
    //  console.log("yo");
    const minutes = Math.floor(time/60);
    let seconds = time % 60;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    timer.innerHTML = `${minutes}: ${seconds}`;
    time --;
    

}




