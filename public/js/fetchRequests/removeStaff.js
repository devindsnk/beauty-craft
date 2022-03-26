console.log("hhh");
const StaffTableTrashBtn= Array.from(document.querySelectorAll('.removeStafftrash'));
const RemoveStaffReservationDiv = document.querySelector('.remStaffError');
const RemoveStaffBtnAnchorTag = document.querySelector(".removeStaffAnchorTag");
const RemoveStaffProceedBtn = document.querySelector(".removeStaffBtn");
RemoveStaffReservationDiv.style.display = "none";
let rescount ;

const checkbox = document.querySelector(".remStaffReservationRecallCheckBox");



for ( var i = 0; i< StaffTableTrashBtn.length ; i++){
let staffID = StaffTableTrashBtn[i].dataset.staffid;
let staffName = StaffTableTrashBtn[i].dataset.staffname;
let staffType = StaffTableTrashBtn[i].dataset.stafftype;
let staffStatus = StaffTableTrashBtn[i].dataset.staffstatus;
let staffMobileNo = StaffTableTrashBtn[i].dataset.staffmobileno;


StaffTableTrashBtn[i].addEventListener('click',
function(){
    document.querySelector(".staffID").innerHTML = staffID;
    document.querySelector(".staffName").innerHTML = staffName;
    document.querySelector(".staffType").innerHTML = staffType;

    checkforUpcomingReservations(staffID,staffMobileNo);
}
)}

function checkforUpcomingReservations(staffID,staffMobileNo){
    fetch(`http://localhost:80/beauty-craft/Staff/getAllReservtaionDetailsByStaffID/${staffID}`)
     .then(response => response.json()) 
     .then( reservations => {
        reservationD = reservations;
       console.log(reservationD);
      //  console.log("yo");
      
      if (reservationD.length > 0)
      {

        const ress = [];
        const ressReason = 'For remove the staff member';

        for (var i = 0; i < reservationD.length; i++)
        {
            ress.push(reservationD[i]['reservationID']);
        }


         RemoveStaffReservationDiv.style.display = "block";

         // Default link creation to reservation count gtreater than zero
         RemoveStaffBtnAnchorTag.href = "http://localhost:80/beauty-craft/Staff/RemoveStaff/" + staffID + "/" + staffMobileNo;

         checkbox.addEventListener('click', function() {
            if (this.checked) {
        // Link creation to remove staff member with recall request (after tick the checked box) reservation count greater than zero
              SendResRecallByResIDs(ress,ressReason);
            } else { 
        // Link creation to remove staff member without recall request (after untick the checked box) reservation count greater than zero
             RemoveStaffBtnAnchorTag.href = "http://localhost:80/beauty-craft/Staff/RemoveStaff/" + staffID + "/" + staffMobileNo;
            } 
          }); 
      } 
      else 
      { 
          console.log("Url to remove the staff member without recall requests");
          RemoveStaffReservationDiv.style.display = "none";
        RemoveStaffBtnAnchorTag.href = "http://localhost:80/beauty-craft/Staff/RemoveStaff/" + staffID + "/" + staffMobileNo;
      } 
    
     });
}



function SendResRecallByResIDs(ress,ressReason){
  console.log(ress);
  RemoveStaffProceedBtn.addEventListener('click',
  function () {
    fetch(`http://localhost:80/beauty-craft/Reservations/recallReservationsFromUpdateServiceStaff/${ress}/${ressReason}`)
    .then()
  }
  )

 
}

