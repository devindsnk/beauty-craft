/////////// SP and RECEPTIONIST //////////
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
const editLeaveBtn = document.querySelector(".editleaveProceedBtn");
const editdropdown = document.querySelector(".editleaveDropdownType");

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


// cancel leave request
function cancelLeaveRequest(btn){
leaveDate=btn.getAttribute("data-id");
fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestCancel/${leaveDate}`)
.then((response) => response.json())
		.then((state) => {
			if (state) {
				window.location.reload();
			}
		});
}

//view leave data form
function viewLeaveRequest(btn){
   const viewLeaveDate = document.getElementById("date_pickerview");
   const viewLeaveType = document.getElementById("lstatusview");
   const viewLeaveReason = document.getElementById("takeLeaveReasonview");
   console.log("function view called");

leaveDate=btn.getAttribute("data-id");
leavestatus=btn.getAttribute("data-status");

   console.log(leaveDate);
   console.log(leavestatus);

   fetch(`http://localhost:80/beauty-craft/Leaves/getSelectedLeaveDetails/${leaveDate}/${leavestatus}`)
      .then(response => response.json())
      .then(leaveData => {
        
         console.log(leaveData);
         viewLeaveDate.innerHTML=leaveData['leaveDate'];
         viewLeaveDate.value=leaveData['leaveDate'];
         viewLeaveType.options[leaveData['leaveType']].selected = true;
         viewLeaveReason.innerHTML=leaveData['reason'];
      

      });
}

//edit leave request form data
function editLeaveRequest(btn){
   console.log("function edit called");
   leaveDate=btn.getAttribute("data-id");
   leavestatus=btn.getAttribute("data-status");

   const editLeaveDate = document.getElementById("date_pickeredit");
   const editLeaveType = document.getElementById("lstatusedit");
   const editLeaveReason = document.getElementById("takeLeaveReasonedit");

   console.log(editLeaveDate.value);
   console.log(editLeaveType.value);

   
   fetch(`http://localhost:80/beauty-craft/Leaves/getSelectedLeaveDetails/${leaveDate}/${leavestatus}`)
      .then(response => response.json())
      .then(leaveData => {
         console.log(leaveData);
         console.log(editLeaveDate);
         editLeaveDate.innerHTML=leaveData['leaveDate'];
         editLeaveDate.value=leaveData['leaveDate'];         
         editLeaveType.options[leaveData['leaveType']].selected = true;
         editLeaveReason.innerHTML=leaveData['reason'];
         editLeaveType.setAttribute('data-id', leaveData['leaveType']);
         editLeaveReason.setAttribute('data-id', leaveData['reason']);

        
      });

}

//edit leave form leave type error msg
function editleaveRequestSaveChanges(){
fetch(`http://localhost:80/beauty-craft/Leaves/leaveRequestTypeValidate/${editLeaveDate.value}/${editLeaveType.value}`)
      .then(response => response.json())
      .then(msg => {
          console.log(msg);
          console.log('msg');
         
         editLeaveError.innerHTML=msg;
          
        
      });


}

editLeaveBtn.addEventListener('click',
   function () {
  const oldType=editLeaveType.getAttribute('data-id'); 
    const oldReason=editLeaveReason.getAttribute('data-id'); 

   console.log(editLeaveDate.value); 
    console.log(oldType);   
     console.log(editLeaveType.value); 
    console.log(editLeaveReason.value);   
let nType=parseInt(editLeaveType.value);
console.log(nType);
    if(oldType !=editLeaveType.value || oldReason!=editLeaveType.value){
      fetch(`http://localhost:80/beauty-craft/Leaves/editLeaverequest/${editLeaveDate.value}/${oldType}/${nType}/${editLeaveReason.value}`)
      .then(response => response.json())
      .then(value => {
          console.log(value);
        
      });
       				window.location.reload();

    }else{
       				window.location.reload();

    }
//   
  


   }
)






///////////////////////////
// filter options
//////////////////////////








