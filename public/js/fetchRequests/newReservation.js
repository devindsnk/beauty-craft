/****************** Scripts related to add new reservation *******************/

const dateSelector = document.querySelector(".dateSelect");
const dateError = document.querySelector(".date-error");
const serviceSelector = document.querySelector(".serviceSelect");
const sProviderSelector = document.querySelector(".serviceProviderSelect");
const startTimeSelector = document.querySelector(".startTimeSelect");
const serviceDurationBox = document.querySelector(".durationBox");

// Change of date
dateSelector.addEventListener('change',
   function () {
      checkDate();      // Checkeing availability of the date
                        // Updating service providers availability if service is selected
   }
)

function checkDate() {
    fetch(`http://localhost:80/beauty-craft/Reservations/checkIfDatePossible/${dateSelector.value}`)
       .then(response => response.json())
       .then(state => {
          dateError.innerHTML = state;
    })
}
 
// Change of service
serviceSelector.addEventListener('change',
   function () {
      updateServiceProvidersList();     // Updating  service providers list
      updateServiceDuration();          // Updating service duration
   }
)

// trigger the below function in dateupdates and service updates accordingly
function updateServiceProvidersList() {
   // console.log("triggered");
   fetch(`http://localhost:80/beauty-craft/Reservations/getUpdatedSProvidersList/${serviceSelector.value}/${dateSelector.value}/${startTimeSelector.value}`)
      .then(response => response.json())
      .then(sProvidersList => {

         // Adding default option
         sProviderSelector.innerHTML = "";
         var option = document.createElement("option");
         option.text = 'Select';
         option.disabled = true;
         option.selected = true;
         option.value = '';
         sProviderSelector.appendChild(option);

         // Adding service providers 
         sProvidersList.forEach(sProvider => {
            console.log(sProvider);
            let option = document.createElement("option");
            let error = (sProvider.leave || sProvider.occupied ? "⚠ " : "");
            option.text = error + sProvider.name;
            option.value = sProvider.staffID;
            sProviderSelector.appendChild(option);
         });
      });
}

function updateServiceDuration() {
   fetch(`http://localhost:80/beauty-craft/services/getServiceDuration/${serviceSelector.value}`)
      .then(response => response.json())
      .then(serviceDuration => {
         serviceDurationBox.innerHTML = "";
         serviceDurationBox.text = serviceDuration;
         serviceDurationBox.value = serviceDuration;
      });
}

