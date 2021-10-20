const serviceSelectDropDown = document.querySelector(".serviceSelect");
const serviceProviderSelectDropDown = document.querySelector(".serviceProviderSelect");
const serviceDurationBox = document.querySelector(".durationBox");

serviceSelectDropDown.addEventListener('change',
   function () {
      updateServiceProvidersList();
      updateServiceDuration();
   }
)

function updateServiceProvidersList() {
   fetch(`http://localhost:80/beauty-craft/Services/getServiceProvidersByService/${serviceSelectDropDown.value}`)
      .then(response => response.json())
      .then(sProvidersList => {
         console.log(sProvidersList);
         serviceProviderSelectDropDown.innerHTML = "";
         sProvidersList.forEach(sProvider => {
            var option = document.createElement("option");
            option.text = sProvider.staffID + " - " + sProvider.fName + " " + sProvider.lName;
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
         // sProvidersList.forEach(sProvider => {
         //    var option = document.createElement("option");
         //    option.text = sProvider.staffID + " - " + sProvider.fName + " " + sProvider.lName;
         //    option.value = sProvider.staffID;
         //    serviceProviderSelectDropDown.appendChild(option);
         // });
      });
}