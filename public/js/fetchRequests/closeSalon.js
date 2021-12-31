// console.log("hhh");
const CloseSalonDate = document.querySelector(".addItemsModalDate");
const AddCloseDateProceedBtn = document.querySelector(".addCloseDateProceed")
let rescount = 0;
const CloseSalonDateReservationDiv = document.querySelector(".closeSalonReservationRecallAndErrorText");
CloseSalonDateReservationDiv.style.display = "none";

CloseSalonDate.addEventListener('change',
   function () {
    CloseSalonDateResCount();
   }
)

function CloseSalonDateResCount() { 
   console.log("hihi"); 
  fetch(`http://localhost:80/beauty-craft/CloseDates/getCloseDateReservtaions/${CloseSalonDate.value}`)
     .then(response => response.json())  
     .then( reservations => {  
       reservationD = reservations;  
       console.log("got reservations ");  

       const ress = [];
                const ressReason = 'Salon will be closed on this day';

                for (var i = 0; i < reservationD.length; i++){
                    ress.push(reservationD[i]['reservationID']);
                }



      if (reservationD.length > 0)  
      {
         CloseSalonDateReservationDiv.style.display = "block";
         $reason = "Close salon";
         $
         //Reservation recall function call with click event listner after proceed with 
         AddCloseDateProceedBtn.addEventListener('click',
            function () {
            CloseSalonDateResRecall(ress,ressReason);
            }
            )

      }
      else 
      {
         CloseSalonDateReservationDiv.style.display = "none";
      }
     });
}
 
function CloseSalonDateResRecall(ress,ressReason){
   console.log('recall2');
   fetch(`http://localhost:80/beauty-craft/Reservations/recallReservationsFromUpdateService/${ress}/${ressReason}`)
   .then()
}


