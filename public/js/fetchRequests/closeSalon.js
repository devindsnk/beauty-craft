const CloseSalonDate = document.querySelector(".addItemsModalDate");
const AddCloseDateProceedBtn = document.querySelector(".addCloseDateProceed");
const AddCloseDateBtn = document.querySelector(".btnAddCloseDate");
const closeDatesReasonTextArea = document.getElementById("close_salon_reason");
const datePicker = document.getElementById("date_picker_close_salon");
let rescount = 0;
const CloseSalonDateReservationDiv = document.querySelector(".closeSalonReservationRecallAndErrorText");
CloseSalonDateReservationDiv.style.display = "none";

//call the function with two event listners two do both jobs(disable ealier dates and call the close date reservation count function)
AddCloseDateBtnCallWithEventListners(['click', 'change']);

function AddCloseDateBtnCallWithEventListners(events) {
   for (var i = 0; i < events.length; i += 1) {
      CloseSalonDate.addEventListener(events[i],
         function () {

             //codes related to disable the ealier days from date picker
            const todayDate = new Date();
            todayDate.setDate(todayDate.getDate() + 1);
            console.log(todayDate); 
            let today = todayDate.toISOString().split('T')[0];
            console.log(today);
            datePicker.setAttribute('min', today);
            datePicker.setAttribute('format', 'yyyy-MM-dd')

            CloseSalonDateResCount();
         }
      )
   }
}

closeDatesReasonTextArea.addEventListener('change',
   function () {
      CloseSalonDateResCount();
   }
)


function CloseSalonDateResCount() {
   fetch(`http://localhost:80/beauty-craft/CloseDates/getCloseDateReservtaions/${CloseSalonDate.value}`)
      .then(response => response.json())
      .then(reservations => {
         reservationD = reservations;
         // console.log(reservationD);
         console.log("got reservations ");


         var ress = [];
         var ressReason = 'Salon will be closed on this day';

         for (var i = 0; i < reservationD.length; i++) {
            ress.push(reservationD[i]['reservationID']);
         }


        console.log(closeDatesReasonTextArea.value.length)
        console.log(datePicker.value.length)
         if (ress.length > 0) {
            CloseSalonDateReservationDiv.style.display = "block";
            $reason = "Close salon";
            //Reservation recall function call with click event listner after proceed with 
            AddCloseDateProceedBtn.addEventListener('click',
               function () {
                  if(closeDatesReasonTextArea.value.length != 0 && datePicker.value.length != 0 ){
                  console.log("AddCloseDateProceedBtn called");
                  CloseSalonDateResRecall(ress, ressReason);
                  }
               }
            )

         } else {
            CloseSalonDateReservationDiv.style.display = "none";
         }
      
      });
}

function CloseSalonDateResRecall(ress, ressReason) {
   fetch(`http://localhost:80/beauty-craft/Reservations/recallReservationsFromUpdateServiceStaff/${ress}/${ressReason}`)
      .then()
}