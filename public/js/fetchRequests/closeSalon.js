// console.log("hhh");
const CloseSalonDate = document.querySelector(".addItemsModalDate");
const CloseSalonViewReservationUrl = document.querySelector(".closeSalonViewReservations");
let rescount = 0;
const CloseSalonDateReservationDiv = document.querySelector(".closeSalonReservationRecallAndErrorText");
// CloseSalonDateReservationDiv.innerHTML= "";
CloseSalonDateReservationDiv.style.display = "none";

CloseSalonDate.addEventListener('change',
   function () {
    CloseSalonDateCount();
    CloseSalonReservationViewUrl();
   }
)

// CloseSalonViewReservationUrl.addEventListener('click',
//    function () {
//       console.log("hi");
//       CloseSalonViewReservationUrl.href= "http://localhost:80/beauty-craft/closeDates/closeDateReservtaions/" + $CloseSalonDate.value ;
//    }
// )
function CloseSalonReservationViewUrl() {
   console.log(CloseSalonViewReservationUrl);
   CloseSalonViewReservationUrl.href= "http://localhost:80/beauty-craft/closeDates/closeDateReservtaions/" + CloseSalonDate.value;
}


function CloseSalonDateCount() {
   // console.log("hihi");
  fetch(`http://localhost:80/beauty-craft/CloseDates/getCloseDateReservtaionsCount/${CloseSalonDate.value}`)
     .then(response => response.json())
     .then( reservationCount => {
       rescount = reservationCount;
      //  console.log("yo");
      if (rescount > 0)
      {
         // console.log("yo");
         CloseSalonDateReservationDiv.style.display = "block";
         // CloseSalonDateReservationDiv.innerHTML= "";
      }
      else 
      {
         CloseSalonDateReservationDiv.style.display = "none";
      }
     });
}
 


