console.log("hhh");
const CustomerTableTrashBtn= Array.from(document.querySelectorAll('.removeCustomerAnchor'));
const RemoveCustomerReservationDiv = document.querySelector('.ownRemCusError');
const RemoveCustomerBtnAnchorTag = document.querySelector(".removeCustomer");
RemoveCustomerReservationDiv.style.display = "none";
let rescount ;



for ( var i = 0; i< CustomerTableTrashBtn.length ; i++){
let cusID = CustomerTableTrashBtn[i].dataset.cusid;
let cusName = CustomerTableTrashBtn[i].dataset.cusname;
let cusMobileNo = CustomerTableTrashBtn[i].dataset.cusmobileno;

CustomerTableTrashBtn[i].addEventListener('click',
function(){
    document.querySelector(".ownRemCusData1").innerHTML = cusID;
    document.querySelector(".ownRemCusData2").innerHTML = cusName;

    checkforUpcomingReservationsAndCreateUrl(cusID,cusMobileNo);
}
)
}


function checkforUpcomingReservationsAndCreateUrl(cusID,cusMobileNo){
        console.log("checkforUpcomingReservations works");
    fetch(`http://localhost:80/beauty-craft/Customer/getReservataionCountByCustomerID/${cusID}`)
     .then(response => response.json())
     .then( reservationCount => {
       rescount = reservationCount;
      if (rescount > 0)
      {
         console.log("yo if called");
         RemoveCustomerReservationDiv.style.display = "block";
         RemoveCustomerBtnAnchorTag.href = "http://localhost:80/beauty-craft/Customer/remCustomer/" + cusID + "/" + cusMobileNo + "/" + rescount ;
      }
      else 
      { 
        RemoveCustomerReservationDiv.style.display = "none";
        RemoveCustomerBtnAnchorTag.href = "http://localhost:80/beauty-craft/Customer/remCustomer/" + cusID + "/" + cusMobileNo + "/" + rescount;
      } 
     }); 
}

