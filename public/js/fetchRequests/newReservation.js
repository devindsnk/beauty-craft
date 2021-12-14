/****************** Scripts related to add new reservation *******************/

const dateSelector = document.querySelector(".dateSelect");
const dateError = document.querySelector(".date-error");

// Checking date
dateSelector.addEventListener('change',
   function () {
      checkDate();
   }
)

function checkDate() {
    fetch(`http://localhost:80/beauty-craft/Reservations/checkIfDatePossible/${dateSelector.value}`)
       .then(response => response.json())
       .then(state => {
          // console.log(state);
          // console.log(dateError);
          dateError.innerHTML = state;
    })
 }
 