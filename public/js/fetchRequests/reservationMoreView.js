const moreInfoBtn = document.querySelectorAll(".btnResMoreInfo");
const serviceName = document.querySelector(".service");
const custName = document.querySelector(".name.cust");
const serviceTime = document.querySelector(".serviceTime");
const duration = document.querySelector(".duration");
const status = document.querySelector(".duration");
const statusdiv = document.querySelector(".moredetails-confirm-status");
const statusdivText = document.querySelector(".spn-moredetails-confirm-status");
const monthAndDay = document.querySelector(".month-day");
const year = document.querySelector(".year");
const reservationnote = document.querySelector(".Reservationnote");
const custnote = document.querySelector(".customerNoteSection");

console.log(reservationnote);

moreInfoBtn.forEach((btn) => {
    btn.addEventListener("click", function () {
      selectedReservation=btn.dataset.id;
      // console.log(btn.dataset.id);
    
     
      fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationDetailsByID/${btn.dataset.id}`)
      .then(response => response.json())
      .then(reservationData => {
         console.log(reservationData);
         

         serviceName.innerHTML = reservationData['name'];
        
        
        custName.innerHTML= reservationData['fName']+" "+reservationData['lName'];
        serviceTime.innerHTML= reservationData['startTime']+" - "+reservationData['endTime'];
        duration.innerHTML = reservationData['totalDuration'] +" mins";

        if(reservationData['status']==5){
         statusdivText.innerHTML="Recalled";
         statusdiv.classList.add('gray');
        
        }else if(reservationData['status']==1){
           statusdivText.innerHTML="Not Confirmed";
         statusdiv.classList.add('yellow');
         
        }else if(reservationData['status']==2){
           statusdivText.innerHTML="Confirmed";
         statusdiv.classList.add('blue');
         
        }else if(reservationData['status']==4){
           statusdivText.innerHTML="Completed";
         statusdiv.classList.add('green');
         
        }
        
        const d=new Date(reservationData['date']).toLocaleString('en-us',{month:'long', day:'numeric'});
        monthAndDay.innerHTML = d;

        const y=new Date(reservationData['date']).toLocaleString('en-us',{ year:'numeric'});
        year.innerHTML = y;

        reservationnote.innerHTML = reservationData['remarks'];
        custnote.innerHTML = reservationData['customerNote'];

        }
      );
    });
});

// function viewReservationDetails(btn){
//   // console.log(btn.getAttribute("data-id"));


// }



// Change of date
// moreInfoBtn.addEventListener('click',
//    function () {
       
//       selectedReservation=moreInfoBtn.dataset.index; 
//       console.log(selectedReservation);    
//    }
// )




function getReservationList() {
    fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationListByDate/${dateSelector.value}`)
       .then(response => response.json())
       .then(state => {
          dateError.innerHTML = state;
    })
 }