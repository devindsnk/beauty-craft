
console.log("hhh");

const leaveRequestSelectedDate = document.querySelector(".LeaveRequestDate");
const dateError = document.querySelector(".request-date-error");
const dropdown = document.querySelector(".dropdowntype");

console.log(dateError);
leaveRequestSelectedDate.addEventListener('change',
   function () {
      leaveRequestedDateValidation();      // Checkeing availability of the date
                        // Updating service providers availability if service is selected
   }
)



function leaveRequestedDateValidation() {
   //  console.log("hihi");
   fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestDateValidate/${leaveRequestSelectedDate.value}`)
      .then(response => response.json())
      .then(dateValidationError => {
         //  console.log(dateValidationError);
         dateError.innerHTML =  dateValidationError;
         dateError.text = dateValidationError;
         dateError.value = dateValidationError;

      });
}