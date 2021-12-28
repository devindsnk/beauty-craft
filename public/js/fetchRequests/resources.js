console.log("hi hi");
// console.log(document.querySelector(".test-class"));
// const leaveRequestSelectedDate = document.querySelector(".addItemsModalDate");
const ResourceTypeDropDown = document.querySelector(".resourceTypes");
// const RemoveResourceTypeErrorText = document.querySelector(".removeResourceType");
// const RemoveResourceTypeBtn = document.querySelector(".removeResourceTypeAnchor");
// let resCount = 0;
// RemoveResourceTypeErrorText.style.display = "none";

// const dateError = document.querySelector(".date-error");
// console.log(leaveRequestSelectedDate);
// console.log(dateError);

ResourceTypeDropDown.addEventListener('click',
   function () {
      console.log("clicked");
      
      getAllResourceTypes();
   } 
) 

// RemoveResourceTypeBtn.addEventListener('click',
//    function () {
//       console.log("clicked");
//       GetResourceCount();
//    }
// )
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

// console.log("yo");

// function GetResourceCount() {
//    // console.log("hihi");
//   fetch(`http://localhost:80/beauty-craft/Resources/getResourceCountByResourceTypeID/${CloseSalonDate.value}`)
//      .then(response => response.json())
//      .then( resourceCount => {
//        resCount = resourceCount;
//        console.log("yo");
//       if (resCount > 0)
//       {
//          // console.log("yo");
//          RemoveResourceTypeErrorText.style.display = "block";
//          // CloseSalonDateReservationDiv.innerHTML= "";
//       }
//       else 
//       {
//          RemoveResourceTypeErrorText.style.display = "none";
//       }
//      });
// }