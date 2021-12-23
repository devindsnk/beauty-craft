/****************** Scripts related to add new reservation *******************/

const dateSelector = document.querySelector(".dateSelect");
const dateError = document.querySelector(".date-error");
const serviceSelectDropDown = document.querySelector(".serviceSelect");
const serviceProviderSelectDropDown = document.querySelector(".serviceProviderSelect");
const serviceDurationBox = document.querySelector(".durationBox");

// Change of date
dateSelector.addEventListener('change',
   function () {
      checkDate();      // Checkeing availability of the date
                        // Updating service providers availability if service is selected
      console.log("hi")
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
serviceSelectDropDown.addEventListener('change',
   function () {
      updateServiceProvidersList();     // Updating  service providers list
      updateServiceDuration();          // Updating service duration
   }
)

function updateServiceProvidersList() {
   fetch(`http://localhost:80/beauty-craft/Services/getServiceProvidersByService/${serviceSelectDropDown.value}/`)
      .then(response => response.json())
      .then(sProvidersList => {

         serviceProviderSelectDropDown.innerHTML = "";
         var option = document.createElement("option");
         option.text = 'Select';
         option.disabled = true;
         option.selected = true;
         option.value = '';
         serviceProviderSelectDropDown.appendChild(option);

         sProvidersList.forEach(sProvider => {
            var option = document.createElement("option");
            option.text = "S" + sProvider.staffID + " - " + sProvider.fName + " " + sProvider.lName;
            option.value = sProvider.staffID;
            serviceProviderSelectDropDown.appendChild(option);
         });
      });
}

function updateServiceDuration() {
   fetch(`http://localhost:80/beauty-craft/services/getServiceDuration/${serviceSelectDropDown.value}`)
      .then(response => response.json())
      .then(serviceDuration => {
         serviceDurationBox.innerHTML = "";
         serviceDurationBox.text = serviceDuration;
         serviceDurationBox.value = serviceDuration;
      });
}

