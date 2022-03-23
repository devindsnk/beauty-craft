
const leaveRequestSelectedDate = document.querySelector(".LeaveRequestDate");
const dateError = document.querySelector(".request-date-error1");
const dateSpan = document.querySelector(".dateEmpty");
const typeSpan = document.querySelector(".typeEmpty");
const dropdown = document.querySelector(".dropdowntype");
const requestBtn = document.querySelector(".btn2");
const editIcon = document.querySelector(".editicon.btnEditLeave");
const editLeaveDate = document.querySelector(".editLeaveRequestDate");
const editLeaveType = document.querySelector(".editleavetype");
const editLeaveError = document.querySelector(".edit-type-error");
const editLeaveReason = document.querySelector(".editTextArea");
const editdropdown = document.querySelector(".editleaveDropdownType");


// console.log(editdropdown);
dropdown.disabled=true;

leaveRequestSelectedDate.addEventListener('change',
   function () {
   
            dropdown.disabled=true;
         dropdown.options[0].selected = true;
         dateError.innerHTML =  '';
   
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

function leaveRequestedDateValidation() {
    
   fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestDateValidate/${leaveRequestSelectedDate.value}`)
      .then(response => response.json())
      .then(dateValidationError => {
         console.log(dateError);
         console.log(dateValidationError );
         dateSpan.innerHTML="";
         dateError.innerHTML =dateValidationError;
        
        

      });
}

dropdown.addEventListener('change',
   function () {
      dateSpan.innerHTML='';
      typeSpan.innerHTML='';
      console.log(dropdown.value);
      console.log(leaveRequestSelectedDate.value);
       fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestTypeValidate/${leaveRequestSelectedDate.value}/${dropdown.value}`)
      .then(response => response.json())
      .then(msg => {
          console.log(msg);
          console.log('msg');
         if(!dateError.innerHTML){
   dateError.innerHTML =  msg;
         }
     
 

      });
      
   }
)

editdropdown.addEventListener('change',
   function () {

   console.log(editdropdown.value);

   console.log('edit dropdown');
   const editLeaveDateBtn = document.querySelector(".editleavebtn");
     console.log( editLeaveDateBtn.getAttribute("data-id")); 
   }
   
   
)


// editleavebtn

function cancelLeaveRequest(btn){
leaveDate=btn.getAttribute("data-id");
fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestCancel/${leaveDate}`)
}

function editLeaveRequest(btn){
   console.log("function edit called");
leaveDate=btn.getAttribute("data-id");
   console.log(leaveDate);

   // console.log(btn);
   fetch(`http://localhost:80/beauty-craft/Leaves/getSelectedLeaveDetails/${leaveDate}`)
      .then(response => response.json())
      .then(leaveData => {
         // console.log(leaveData);
         // console.log(editLeaveDate);
         editLeaveDate.innerHTML=leaveData['leaveDate'];
         editLeaveDate.value=leaveData['leaveDate'];
         
         editLeaveType.options[leaveData['leaveType']].selected = true;
        editLeaveReason.innerHTML=leaveData['reason'];
        

      });
}

function leaveRequestSaveChanges(btn){

      console.log(editLeaveDate.value);
   //    console.log(editLeaveType.value);
   //    console.log("gggggg");
   //    console.log(btn);

   // fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestTypeValidate/${editLeaveDate.value}/${editLeaveType.value}`)
   //    .then(response => response.json())
   //    .then(msg => {
   //        console.log(msg);
   //       console.log(dateError);
   //       dateError.innerHTML =  msg;
   //    });

      // if(){

      // }
   // fetch(`http://localhost:80/beauty-craft/Leaves/getSelectedLeaveDetails/${leaveDate}`)
   //    .then(response => response.json())
   //    .then(leaveData => {
         
        

   //    });
}

editLeaveType.addEventListener('change',
   function () {
      console.log('drop down changed');
      dateError.innerHTML =  '';
      console.log(dropdown.value);
      console.log(leaveRequestSelectedDate.value);
       fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestTypeValidate/${leaveRequestSelectedDate.value}/${dropdown.value}`)
      .then(response => response.json())
      .then(msg => {
          console.log(msg);
          console.log('msg');
         
        dateError.innerHTML =  msg;
 

      });
      
   }
)
///////////////////////////
// filter options
//////////////////////////








