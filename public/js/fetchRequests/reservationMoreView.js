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

console.log(statusdiv);

moreInfoBtn.forEach((btn) => {
    btn.addEventListener("click", function () {
      selectedReservation=btn.dataset.id;
      // console.log(btn.dataset.id);
    
     
      fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationDetailsByID/${btn.dataset.id}`)
      .then(response => response.json())
      .then(reservationData => {
         // console.log(reservationData);
         

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


const options = { 
  month: '2-digit', 
  day: '2-digit',
  year: 'numeric', 
};
//today
// console.log(new Date().toLocaleDateString('en-US', options));
date=reservationData['date'];
selectedDate=convert(date);

// selected date;
// console.log(selectedDate);

var date1 = new Date(new Date().toLocaleDateString('en-US', options));
var date2 = new Date(selectedDate);

// console.log(date1);
// console.log(date2);

var Difference_In_Time = date1.getTime() - date2.getTime();
// To calculate the no. of days between two dates
var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
//To display the final no. of days (result)
// console.log(Difference_In_Days);


function convert(date){
   // console.log("date convert called");
  var datearray = date.split("-");
  var newdate = datearray[1]  + '/' + datearray[2]+ '/' + datearray[0];
  return newdate;
}

if(Difference_In_Days>=2 && reservationData['status']==1){
            
         console.log("ok");   
         }else{

            console.log("not-ok"); 
            const recallModelHeader = document.querySelector(".recall-data-header");
            recallModelHeader.innerHTML="Recalle Details";

            fetch(`http://localhost:80/beauty-craft/SerProvDashboard/updateCustNote/${selectedReservation}`)
.then(response => response.json())
       .then(recalldata => {
         //  console.log(state);
    })

         }
   

        }
      );
    });
});

function editCustNote(){
   proceedBtnId=document.querySelector(".proceedBtn").getAttribute("data-id");
   note=encodeURI(custnote.value);
   console.log(note);
   
   fetch(`http://localhost:80/beauty-craft/SerProvDashboard/updateCustNote/${proceedBtnId}/${note}`)
.then(response => response.json())
       .then(state => {
         //  console.log(state);
    })

}



function recallResrvation(btn){
   console.log("It works");
   const recallService = document.querySelector(".recall-service");
   const recallCustName = document.querySelector(".recall-name");
   const recallStatusDiv = document.querySelector(".recall-moredetails-confirm-status");
   const recallStatusText = document.querySelector(".recall-spn-moredetails-confirm-status");
   const recallTime = document.querySelector(".recall-serviceTime");
   const recallDuration = document.querySelector(".recall-duration");
   const recallMonthAndDay = document.querySelector(".recall-month-day");
   const recallYear = document.querySelector(".recall-year");
   const recallReason = document.querySelector(".recall-reason");

   reservationID=btn.getAttribute("data-id");
   console.log(reservationID);


      fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationDetailsByID/${reservationID}`)
       .then(response => response.json())
       .then(reservationData  => {
          console.log(reservationData);
         recallService.innerHTML = reservationData['name'];
         recallCustName.innerHTML= reservationData['fName']+" "+reservationData['lName'];

         if(reservationData['status']==5){
            recallStatusText.innerHTML="Recalled";
            recallStatusDiv.classList.add('gray');
         
         }else if(reservationData['status']==1){
            recallStatusText.innerHTML="Not Confirmed";
            recallStatusDiv.classList.add('yellow');
            
         }else if(reservationData['status']==2){
            recallStatusText.innerHTML="Confirmed";
            recallStatusDiv.classList.add('blue');
            
         }else if(reservationData['status']==4){
            recallStatusText.innerHTML="Completed";
            recallStatusDiv.classList.add('green');
            
         }

         recallTime.innerHTML= reservationData['startTime']+" - "+reservationData['endTime'];
         recallDuration.innerHTML = reservationData['totalDuration'] +" mins";

         const d=new Date(reservationData['date']).toLocaleString('en-us',{month:'long', day:'numeric'});
        recallMonthAndDay.innerHTML = d;

        const y=new Date(reservationData['date']).toLocaleString('en-us',{ year:'numeric'});
        recallYear.innerHTML = y;



         
        


    })

}




function getReservationList() {
    fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationListByDate/${dateSelector.value}`)
       .then(response => response.json())
       .then(state => {
          dateError.innerHTML = state;
    })
 }