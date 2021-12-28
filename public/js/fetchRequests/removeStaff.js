console.log("hhh");
const StaffTableTrashBtn= Array.from(document.querySelectorAll('.removeStafftrash'));
const RemoveStaffReservationDiv = document.querySelector('.remStaffError');
const RemoveStaffBtnAnchorTag = document.querySelector(".removeStaffAnchorTag");
RemoveStaffReservationDiv.style.display = "none";
let rescount ;

const checkbox = document.querySelector(".remStaffReservationRecallCheckBox");

// checkbox.addEventListener('change', function() {
//   if (this.checked) {
//     console.log("Checkbox is checked..");
//   } else {
//     console.log("Checkbox is not checked..");
//   }
// });

for ( var i = 0; i< StaffTableTrashBtn.length ; i++){
   // console.log("hi hi");
console.log(StaffTableTrashBtn[i].dataset.staffid);
console.log(StaffTableTrashBtn[i].dataset.staffname);
console.log(StaffTableTrashBtn[i].dataset.stafftype);
console.log(StaffTableTrashBtn[i].dataset.staffstatus);
let staffID = StaffTableTrashBtn[i].dataset.staffid;
let staffName = StaffTableTrashBtn[i].dataset.staffname;
let staffType = StaffTableTrashBtn[i].dataset.stafftype;
let staffStatus = StaffTableTrashBtn[i].dataset.staffstatus;

// checkStaffmemberStatus(staffStatus);

StaffTableTrashBtn[i].addEventListener('click',
function(){
    document.querySelector(".staffID").innerHTML = staffID;
    document.querySelector(".staffName").innerHTML = staffName;
    document.querySelector(".staffType").innerHTML = staffType;

    checkforUpcomingReservations(staffID);

    // checkforcheckbox
    // createRemoveCustomerUrl(cusID);
}
)}

function checkforUpcomingReservations(staffID){
        console.log("checkforUpcomingReservations works");
    fetch(`http://localhost:80/beauty-craft/Staff/GetReservtaionCountByStaffID/${staffID}`)
     .then(response => response.json())
     .then( reservationCount => {
        console.log("checkforUpcomingReservations works");
       rescount = reservationCount;
       console.log(rescount);
       console.log("checkforUpcomingReservations works");
      //  console.log("yo");
      
      if (rescount > 0)
      {
         console.log("yo if called");
         RemoveStaffReservationDiv.style.display = "block";

         // Default link creation to reservation count gtreater than zero
         RemoveStaffBtnAnchorTag.href = "http://localhost:80/beauty-craft/Staff/RemoveStaff/" + staffID;

         checkbox.addEventListener('click', function() {
            if (this.checked) {
        // Link creation to remove staff member with recall request (after tick the checked box) reservation count greater than zero
              RemoveStaffBtnAnchorTag.href = "http://localhost:80/beauty-craft/Staff/RemoveStaffWithRecall/" + staffID;
            } else {
        // Link creation to remove staff member without recall request (after untick the checked box) reservation count greater than zero
             RemoveStaffBtnAnchorTag.href = "http://localhost:80/beauty-craft/Staff/RemoveStaff/" + staffID;
            }
          });

        //  document.querySelector(".removeStaffBtn").disabled = true;
        //  document.querySelector(".removeStaffBtn").className = "btn ModalCancelButton ModalButton removeStaffBtn";
        //  .btn.btn-filled.btn-grey
        
         // CloseSalonDateReservationDiv.innerHTML= "";
      } 
      else 
      { 
          console.log("Url to remove the staff member without recall requests");
          RemoveStaffReservationDiv.style.display = "none";
        // document.querySelector(".removeStaffBtn").disabled = false;
        // document.querySelector(".removeStaffBtn").className = "btn ModalBlueButton ModalButton removeStaffBtn";
        RemoveStaffBtnAnchorTag.href = "http://localhost:80/beauty-craft/Staff/RemoveStaff/" + staffID;
      }
    
     });
}

