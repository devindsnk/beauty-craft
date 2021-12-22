const dateSelector = document.querySelector(".selecteddate");
const time = document.querySelector(".sub-container2-card-time");
const resName = document.querySelector(".sub-container2-card-service");
const time = document.querySelector(".sub-container2-card-time");
const custName = document.querySelector(".name");

// Change of date
dateSelector.addEventListener('change',
   function () {
      getReservationList();      
   }
)

function getReservationList() {
    fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationListByDate/${dateSelector.value}`)
       .then(response => response.json())
       .then(state => {
          dateError.innerHTML = state;
    })
 }



// const leaveRequestSelectedDate = document.querySelector(".selecteddate");
// const dateError = document.querySelector(".date-error-test");
// // console.log(leaveRequestSelectedDate);
// // console.log(dateError);

// leaveRequestSelectedDate.addEventListener('change',
//    function () {
//       getdatetest();

//    }
// )

// function getdatetest() {
//    //  console.log("hihi");
//    fetch(`http://localhost:80/beauty-craft/SerProvDashboard/getReservationListByDate/${leaveRequestSelectedDate.value}`)
//       .then(response => response.json())
//       .then(dateValidationError => {
//           console.log('dateValidationError');
//          // dateError.innerHTML =  dateValidationError;
//          // sProvidersList.forEach(sProvider => {
//          //    var option = document.createElement("option");
//          //    option.text = sProvider.staffID + " - " + sProvider.fName + " " + sProvider.lName;
//          //    option.value = sProvider.staffID;
//          //    serviceProviderSelectDropDown.appendChild(option);
//          // });
//       });
// }