function recallCancelReservation(btn) {
    let reservationID = btn.getAttribute("data-id");
    fetch(`http://localhost:80/beauty-craft/Reservations/recallCancelReservation/${reservationID}`)
        .then(response => response.json())
        .then(state => {
            if(state){
                window.location.replace("http://localhost:80/beauty-craft/ReceptDashboard/recallRequests");
            }
    })
 }

function cancelReservation(btn) {
    let reservationID = btn.getAttribute("data-id");
    fetch(`http://localhost:80/beauty-craft/Reservations/cancelReservation/${reservationID}`)
      .then(response => response.json())
      .then(state => {
        if(state){
            window.location.reload();
        }
   })
 }

 function markReservationNoShow(btn) {
    let reservationID = btn.getAttribute("data-id");
    fetch(`http://localhost:80/beauty-craft/Reservations/markReservationNoShow/${reservationID}`)
        .then(response => response.json())
        .then(state => {
            if(state){
                window.location.reload();
            }
    })
 }

 function checkoutReservation(btn) {
    let reservationID = btn.getAttribute("data-id");
    fetch(`http://localhost:80/beauty-craft/Reservations/checkoutReservation/${reservationID}`)
        .then(response => response.json())
        .then(state => {
            if(state){
                window.location.reload(); 
            }
    })
 }
