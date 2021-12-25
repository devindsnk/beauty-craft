console.log("hhh");
const CustomerTableTrashBtn= Array.from(document.querySelectorAll('.removeCustomerAnchor'));
const RemoveCustomerReservationDiv = document.querySelector('.ownRemCusError');
const RemoveCustomerBtnAnchorTag = document.querySelector(".removeCustomer");
RemoveCustomerReservationDiv.style.display = "none";
let rescount ;



for ( var i = 0; i< CustomerTableTrashBtn.length ; i++){
    // console.log("hi hi");
console.log(CustomerTableTrashBtn[i].dataset.cusid);
console.log(CustomerTableTrashBtn[i].dataset.cusname);
let cusID = CustomerTableTrashBtn[i].dataset.cusid;
let cusName = CustomerTableTrashBtn[i].dataset.cusname;

CustomerTableTrashBtn[i].addEventListener('click',
function(){
    document.querySelector(".ownRemCusData1").innerHTML = cusID;
    document.querySelector(".ownRemCusData2").innerHTML = cusName;

    checkforUpcomingReservations(cusID);
    // createRemoveCustomerUrl(cusID);
}
)
}


function checkforUpcomingReservations(cusID){
        console.log("checkforUpcomingReservations works");
    fetch(`http://localhost:80/beauty-craft/Customer/GetReservtaionCountByCustomerID/${cusID}`)
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
        RemoveCustomerBtnAnchorTag.href = "http://localhost:80/beauty-craft/Customer/remCustomer/" + cusID;
      }
     });
}

