const serviceSelectDropDown = document.querySelector(".serviceSelect");
const serviceProviderSelectDropDown = document.querySelector(".serviceProviderSelect");

serviceSelectDropDown.addEventListener('change',
   function () {
      updateServiceProvidersList();
      // updateServiceDuration();
   }
)


function updateServiceProvidersList() {
   console.log("Hi");
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

// function updateServiceDuration() {
//    console.log("Bye");
// }