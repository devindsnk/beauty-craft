console.log("hhh");
const StaffTableTrashBtn= Array.from(document.querySelectorAll('.removeStaffAnchor'));
const RemoveStaffReservationDiv = document.querySelector('.remStaffError');
const RemoveStaffBtn = document.querySelector(".removeStaff");
RemoveStaffReservationDiv.style.display = "none";
let rescount ;



for ( var i = 0; i< StaffTableTrashBtn.length ; i++){
    // console.log("hi hi");
console.log(StaffTableTrashBtn[i].dataset.staffid);
console.log(StaffTableTrashBtn[i].dataset.staffname);
console.log(StaffTableTrashBtn[i].dataset.stafftype);
let staffID = StaffTableTrashBtn[i].dataset.staffid;
let staffName = StaffTableTrashBtn[i].dataset.staffname;
let staffType = StaffTableTrashBtn[i].dataset.stafftype;

StaffTableTrashBtn[i].addEventListener('click',
function(){
    document.querySelector(".staffID").innerHTML = staffID;
    document.querySelector(".staffName").innerHTML = staffName;
    document.querySelector(".staffType").innerHTML = staffType;

    checkforUpcomingReservations(staffID);
    // createRemoveCustomerUrl(cusID);
}
)
}


function checkforUpcomingReservations(cusID){
        console.log("checkforUpcomingReservations works");
    fetch(`http://localhost:80/beauty-craft/Customer/getReservtaionCountByCustomerID/${cusID}`)
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
         RemoveCustomerReservationDiv.style.display = "block";
         document.querySelector(".removeCustomerBtn").disabled = true;
         document.querySelector(".removeCustomerBtn").className = "btn ModalCancelButton ModalButton removeCustomerBtn";
        //  .btn.btn-filled.btn-grey

         // CloseSalonDateReservationDiv.innerHTML= "";
      }
      else 
      {
          console.log("else called");
        RemoveCustomerReservationDiv.style.display = "none";
        document.querySelector(".removeCustomerBtn").disabled = false;
        document.querySelector(".removeCustomerBtn").className = "btn ModalBlueButton ModalButton removeCustomerBtn";
        RemoveCustomerBtn.href = "http://localhost:80/beauty-craft/Customer/remCustomer/" + cusID;
      }
     });
}

