
console.log("hhh");

const leaveRequestSelectedDate = document.querySelector(".LeaveRequestDate");
const dateError = document.querySelector(".request-date-error");
const dateSpan = document.querySelector(".dateEmpty");
const dropdown = document.querySelector(".dropdowntype");
dropdown.disabled=true;
console.log(dropdown);

leaveRequestSelectedDate.addEventListener('change',
   function () {
   console.log(leaveRequestSelectedDate.value);
      
      if(leaveRequestSelectedDate.value){
      dropdown.disabled=false;
      leaveRequestedDateValidation(); 
      }else{
         dropdown.disabled=true;
         dropdown.options[0].selected = true;
         dateError.innerHTML =  '';
      }                
   }
)

dropdown.addEventListener('change',
   function () {
      console.log(dropdown.value);
       fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestDateValidate/${leaveRequestSelectedDate.value}`)
      .then(response => response.json())
      .then(dateValidationError => {
          console.log(dateValidationError);
         dateSpan.innerHTML="";
         dateError.innerHTML =  dateValidationError;
        

      });
      
   }
)



function leaveRequestedDateValidation() {
   //  console.log("hihi");
   fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestDateValidate/${leaveRequestSelectedDate.value}`)
      .then(response => response.json())
      .then(dateValidationError => {
          console.log(dateValidationError);
         dateSpan.innerHTML="";
         dateError.innerHTML =  dateValidationError;
        

      });
}