
console.log("hhh");
// console.log(document.querySelector(".test-class"));
const leaveRequestSelectedDate = document.querySelector(".addItemsModalLeaveRequestDate");
const dateError = document.querySelector(".date-error");
const dropdown = document.querySelector(".dropdowntype");

console.log(leaveRequestSelectedDate);
// console.log(dateError);

// leaveRequestSelectedDate.addEventListener('change',
// test
// )
dropdown.addEventListener("change",()=>{
   console.log('test');
})


function test(){
   console.log('testing');
}

function leaveRequestedDateValidation() {
   //  console.log("hihi");
   fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestDateValidate/${leaveRequestSelectedDate.value}`)
      .then(response => response.json())
      .then(dateValidationError => {
        //   console.log(dateValidationError);
         dateError.innerHTML =  dateValidationError;
         // sProvidersList.forEach(sProvider => {
         //    var option = document.createElement("option");
         //    option.text = sProvider.staffID + " - " + sProvider.fName + " " + sProvider.lName;
         //    option.value = sProvider.staffID;
         //    serviceProviderSelectDropDown.appendChild(option);
         // });
      });
}