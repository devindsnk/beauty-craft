/****************** Scripts related to add new reservation *******************/

const dateSelector = document.querySelector(".dateSelect");
const dateError = document.querySelector(".date-error");
const serviceSelector = document.querySelector(".serviceSelect");
const sProviderSelector = document.querySelector(".serviceProviderSelect");
const startTimeSelector = document.querySelector(".startTimeSelect");
const serviceDurationBox = document.querySelector(".durationBox");

let startTime = null;
let selectedDate = null;
let selectedService = null;

// Change of date
dateSelector.addEventListener('change',
   function () {
      selectedDate = dateSelector.value;
      checkDate();      // Checkeing availability of the date
      performChecksAndUpdates();
   }
)

// Change of service
serviceSelector.addEventListener('change',
   function () {
      selectedService = serviceSelector.value;
      updateServiceDuration();          // Updating service duration
      performChecksAndUpdates();
   }
)

startTimeSelector.addEventListener('change',
   function () {
      startTime = startTimeSelector.value;
      performChecksAndUpdates();
   }
)

function performChecksAndUpdates(){
   if(selectedService !== null && selectedDate !== null && startTime !== null){
      checkResourcesAvailability();
   }
   if(selectedService !== null){
      updateServiceProvidersList();
   }
}

// trigger the below function in dateupdates and service updates accordingly
function updateServiceProvidersList() {   
   fetch(`http://localhost:80/beauty-craft/Reservations/getUpdatedSProvidersList/${selectedService}/${selectedDate}/${startTime}`)
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
         for (const staffID in sProvidersList) {
            let sProvider = sProvidersList[staffID];
            let option = document.createElement("option");
            let error = (sProvider.leave || sProvider.occupied ? "⚠ " : "");
            if(sProvider.leave) console.log(staffID + " " + sProvider.name + " is on LEAVE");
            if(sProvider.occupied) console.log(staffID + " " + sProvider.name + " is OCCUPIED");
            option.text = error + sProvider.name;
            option.value = staffID;
            sProviderSelector.appendChild(option);
         }
      });
}

function updateServiceDuration() {
   fetch(`http://localhost:80/beauty-craft/services/getServiceDuration/${selectedService}`)
      .then(response => response.json())
      .then(serviceDuration => {
         serviceDurationBox.innerHTML = "";
         serviceDurationBox.text = serviceDuration;
         serviceDurationBox.value = serviceDuration;
      });
}

function checkDate() {
   fetch(`http://localhost:80/beauty-craft/Reservations/checkIfDatePossible/${selectedDate}`)
      .then(response => response.json())
      .then(state => {
         dateError.innerHTML = state;
   })
}

function checkResourcesAvailability(){
   fetch(`http://localhost:80/beauty-craft/reservations/checkResourcesAvailability/${selectedService}/${selectedDate}/${startTime}`)
      .then(response => response.json())
      .then(eligibility => {
         if(eligibility == 1 ){
            console.log("Can Place");
         }
         else{
            console.log("Not Enough Resources");
         }
      });
}

