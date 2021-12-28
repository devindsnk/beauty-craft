console.log("hi hi");
const ResourceTypeDropDown = document.querySelector(".resourceTypes");


ResourceTypeDropDown.addEventListener('click',
   function () {
      console.log("clicked");
      
      getAllResourceTypes();
   } 
) 


// document.getElementById('inner').addEventListener('click', function(event) {
//    event.stopPropagation();
// });

function getAllResourceTypes() {
   fetch(`http://localhost:80/beauty-craft/Resources/getResourceTypeDetails/`)
      .then(response => response.json())
      .then(ResTypeList => {
         
         ResourceTypeDropDown.innerHTML = "";
         var option = document.createElement("option");
         option.text = 'Select';
         option.disabled = true;
         option.selected = true;
         option.value = '';
         // ResourceTypeDropDown.option.removeEventListener('click');
         ResourceTypeDropDown.appendChild(option);
         ResTypeList.forEach(resTypes => {
            var option = document.createElement("option");
            option.text = resTypes.resourceID + " - " + resTypes.name;
            option.value = resTypes.resourceID;
            ResourceTypeDropDown.appendChild(option);
         });
      });
}

