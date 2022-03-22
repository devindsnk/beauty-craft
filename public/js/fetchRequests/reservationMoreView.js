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
    
     getReservationMoreData (selectedReservation);
     

    });
});

function filterReservationsForSPOverview(){
   console.log("Function called-test");
   const datepicker=document.getElementById("datePickerSPRes");
   const servicepicker=document.getElementById("serviceSelectorSPRes");
   const statuspicker=document.getElementById("staffSelectorSPRes");
   let dVal = (!datepicker.value )? "all" : datepicker.value;

   window.location.replace(`http://localhost/beauty-craft/SerProvDashboard/reservations/${dVal}/${servicepicker.value}/${statuspicker.value}`);

}

function getReservationMoreData (selectedReservation){
   fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationDetailsByID/${selectedReservation}`)
      .then(response => response.json())
      .then(reservationData => {
        console.log(reservationData);
        serviceName.innerHTML = reservationData['name'];
        custName.innerHTML= reservationData['fName']+" "+reservationData['lName'];
        serviceTime.innerHTML= reservationData['startTime']+" - "+reservationData['endTime'];
        duration.innerHTML = reservationData['totalDuration'] +" mins";
         // document.getElementById("resStatus").className = "confirm-status status-btn btn text-uppercase";

          const recallmodelbutton=document.getElementById("recallModelOpenBtn");
          console.log(recallmodelbutton);

         //  if(reservationData['status']==3||reservationData['status']==4||reservationData['status']==0){
            
            
         //  }

         if(reservationData['status']==5){
            statusdivText.innerHTML="Recalled";
            document.getElementById("resStatus").className = "confirm-status status-btn btn text-uppercase yellow";
                        recallmodelbutton.classList.remove("hide");

            // statusdiv.classList.add('grey');
            
         
         }else if(reservationData['status']==1){
            statusdivText.innerHTML="Not Confirmed";
                        recallmodelbutton.classList.remove("hide");

            // statusdiv.classList.add('yellow');
            document.getElementById("resStatus").className = "confirm-status status-btn btn text-uppercase blue";
            
         }else if(reservationData['status']==2){
            statusdivText.innerHTML="Confirmed";
                        recallmodelbutton.classList.remove("hide");

            // statusdiv.classList.add('blue');
            document.getElementById("resStatus").className = "confirm-status status-btn btn text-uppercase green";
           }else if(reservationData['status']==3){
            statusdivText.innerHTML="No Show";
            // statusdiv.classList.add('blue');
            document.getElementById("resStatus").className = "confirm-status status-btn btn text-uppercase grey";
            recallmodelbutton.classList.add("hide");
            
         }else if(reservationData['status']==4){
            statusdivText.innerHTML="Completed";
            // statusdiv.classList.add('green');
                        document.getElementById("resStatus").className = "confirm-status status-btn btn text-uppercase grey";   
                        recallmodelbutton.classList.add("hide");
         }
         else if(reservationData['status']==0){
            statusdivText.innerHTML="Cancelled";
            // statusdiv.classList.add('green');
                        document.getElementById("resStatus").className = "confirm-status status-btn btn text-uppercase red";
                        recallmodelbutton.classList.add("hide");

            
         }
        
        const d=new Date(reservationData['date']).toLocaleString('en-us',{month:'long', day:'numeric'});
        monthAndDay.innerHTML = d;

        const y=new Date(reservationData['date']).toLocaleString('en-us',{ year:'numeric'});
        year.innerHTML = y;

        reservationnote.innerHTML = reservationData['remarks'];

         if(reservationData['remarks']){
            reservationnote.innerHTML = reservationData['remarks'];
        }else{
            reservationnote.innerHTML = 'None';
        }


        if(reservationData['customerNote']){
            custnote.innerHTML = reservationData['customerNote'];
        }else{
            custnote.innerHTML = 'None';
        }
        


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


            function convert(date)
            {
               // console.log("date convert called");
            var datearray = date.split("-");
            var newdate = datearray[1]  + '/' + datearray[2]+ '/' + datearray[0];
            return newdate;
            }
            const recallModelHeader = document.querySelector(".recall-data-header");
            if(Difference_In_Days>=2 && reservationData['status']==1)
            {
               recallModelHeader.innerHTML="Reservation Recall";             
                     
            }else{

               
               const recallModelHeader = document.querySelector(".recall-data-header");
               recallModelHeader.innerHTML="Recall Details";

               

            }
            statusdiv.setAttribute('data-id', reservationData['status']);

        }

      );
}
 
function getReservationMoreDataBackBtn(){
   console.log("function called");
  
   selectedReservation=document.querySelector(".proceedBtn").getAttribute("data-id");
   console.log(selectedReservation);
}


function editCustNote(){
   console.log("edit called");
   
   selectedReservation=document.querySelector(".proceedBtn").getAttribute('data-id');
   console.log(selectedReservation);
   editedNote=document.querySelector(".customerNoteSection").value;
 
   console.log(editedNote);
   
   fetch(`http://localhost:80/beauty-craft/SerProvDashboard/updateCustNote/${selectedReservation}/${editedNote}`)
    window.location.reload();

}



function recallResrvation(btn){
   // console.log("It works");
   const recallService = document.querySelector(".recall-service");
   const recallCustName = document.querySelector(".recall-name");
   const recallStatusDiv = document.querySelector(".recall-moredetails-confirm-status");
   const recallStatusText = document.querySelector(".recall-spn-moredetails-confirm-status");
   const recallTime = document.querySelector(".recall-serviceTime");
   const recallDuration = document.querySelector(".recall-duration");
   const recallMonthAndDay = document.querySelector(".recall-month-day");
   const recallYear = document.querySelector(".recall-year");
   const recallReason = document.querySelector(".recall-reason");
   const errormsg = document.querySelector(".recall.error");
   errormsg.innerHTML="";

   reservationID=btn.getAttribute("data-id");
   // console.log(reservationID);


      fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationDetailsByID/${reservationID}`)
       .then(response => response.json())
       .then(reservationData  => {
                console.log(reservationData);
               recallService.innerHTML = reservationData['name'];
               recallCustName.innerHTML= reservationData['fName']+" "+reservationData['lName'];
               document.getElementById("recallResStatus").className = "recall-moredetails-confirm-status confirm-status ";
               if(reservationData['status']==5){
                  recallStatusText.innerHTML="Recalled";
                  recallStatusDiv.classList.add('yellow');
               
               }else if(reservationData['status']==1){
                  recallStatusText.innerHTML="Not Confirmed";
                  recallStatusDiv.classList.add('blue');
                  
               }else if(reservationData['status']==2){
                  recallStatusText.innerHTML="Confirmed";
                  recallStatusDiv.classList.add('green');

                     }else if(reservationData['status']==3){
                     recallStatusText.innerHTML="No Show";
                     recallStatusDiv.classList.add('grey');

                     }else if(reservationData['status']==0){
                     recallStatusText.innerHTML="Cancelled";
                     recallStatusDiv.classList.add('red');
                  
               }else if(reservationData['status']==4){
                  recallStatusText.innerHTML="Completed";
                  recallStatusDiv.classList.add('grey');
                  
               }
// console.log("TT");
               const errormsg = document.querySelector(".recall.error");

               recallTime.innerHTML= reservationData['startTime']+" - "+reservationData['endTime'];
               recallDuration.innerHTML = reservationData['totalDuration'] +" mins";

               const d=new Date(reservationData['date']).toLocaleString('en-us',{month:'long', day:'numeric'});
               recallMonthAndDay.innerHTML = d;

               const y=new Date(reservationData['date']).toLocaleString('en-us',{ year:'numeric'});
               recallYear.innerHTML = y;

               if(reservationData['status']!=1){
                  recallModelBtn.classList.add('btn-error-red');
                  
                  errormsg.innerHTML="Already Responded,can not delete the recall request."
                  recallModelBtn.classList.add('hide');
                  recallModelBtn.setAttribute('data-Rstatus', recallStatus); 

               }
               
      });
     const recallModelBtn=document.querySelector(".recall.proceedBtn");
     const resRecallModal = document.querySelector('.reservation-recall');
     const resMoreInfoBtnList = document.querySelectorAll(".btnResMoreInfo");
     recallModelBtn.innerHTML="";
     recallReason.innerHTML='';
      if(statusdiv.getAttribute("data-id")==5){
        
         recallModelBtn.classList.add('btn-error-red');

         fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationRecallData/${btn.dataset.id}`)
         .then(response => response.json())
         .then(recallData => {
            console.log(recallData);
            recallReason.innerHTML=recallData['recallReason'];
            recallReason.setAttribute('data-id', recallData['recallStatus']); 
   
        

            recallStatus=recallReason.getAttribute("data-id");
           

            if(recallData['recallStatus']){

            }
            
            if(recallStatus==1){
                  recallModelBtn.classList.add('btn-error-red');
                  const errormsg = document.querySelector(".recall.error");
                  errormsg.innerHTML="Already Responded,can not delete the recall request."
                  recallModelBtn.innerHTML="Close";
                  recallModelBtn.setAttribute('data-Rstatus', recallStatus); 

         
                  if (recallModelBtn) {
                        recallModelBtn.addEventListener("click",function () {
                        resRecallModal.classList.remove("show"); 
                     });
                  }

               }if(recallStatus==0){
                  recallModelBtn.setAttribute('data-Rstatus', recallStatus);
                  const errormsg = document.querySelector(".recall.error");
                  errormsg.innerHTML=""
                  recallModelBtn.classList.remove('hide');
                  recallModelBtn.innerHTML="Delete";


                  
               }
          });


      }else{
         recallModelBtn.setAttribute('data-Rstatus', 2);
         recallModelBtn.innerHTML="Send Recall"
         recallModelBtn.classList.add('btn-success-green');

      }
      
 recallModelBtn.setAttribute('data-Rid', recallStatus); 
   

}

function proceedRecall(){
   
   // const proceedRecallBtn = ;
   console.log('recall funtion called ');
var rReason=document.querySelector(".recall-reason-section").value;
selectedReservation=document.querySelector(".proceedBtn").getAttribute("data-id");

console.log(selectedReservation);
console.log(rReason);
if(rReason){
   fetch(`http://localhost:80/beauty-craft/SerProvDashboard/sendRecallRequest/${selectedReservation}/${rReason}`)
   //     .then(response => response.json())
   //     .then(state => {
   //       //  dateError.innerHTML = state;
   //       console.log(state);
   //  })

console.log("KK");
}
}


console.log('recall delete funtion called ');
const deletaRecallRequest=document.getElementById("recallRequestDeleteBtn");
   console.log(deletaRecallRequest);
   console.log(deletaRecallRequest.getAttribute("data-id"));
   // selectedReservation

    
    deletaRecallRequest.addEventListener("click", function () {
      selectedReservation=deletaRecallRequest.dataset.id;
      fetch(`http://localhost:80/beauty-craft/SerProvDashboard/deleteRecallRequest/${deletaRecallRequest.value}`)
     

    });




function getReservationList() {
    fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationListByDate/${dateSelector.value}`)
       .then(response => response.json())
       .then(state => {
          dateError.innerHTML = state;
    })
 }