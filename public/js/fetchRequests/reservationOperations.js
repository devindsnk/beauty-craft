function recallCancelReservation(btn) {
    reservationID = btn.getAttribute("data-id");
    fetch(`http://localhost:80/beauty-craft/Reservations/recallCancelReservation/${reservationID}`)
        .then(response => response.json())
        .then(state => {
            if(state){
                window.location.replace("http://localhost:80/beauty-craft/ReceptDashboard/recallRequests");
            }
    })
 }

function cancelReservation(btn) {
    reservationID = btn.getAttribute("data-id");
    console.log(reservationID);
//     recordID = null;
//     fetch(`http://localhost:80/beauty-craft/Reservations/cancelReservation/${reservationID}`)
//       .then(response => response.json())
//       .then(state => {
//          console.log(state);
//    })
 }

 function markNoShowReservation(btn) {
    reservationID = btn.getAttribute("data-id");
    fetch(`http://localhost:80/beauty-craft/Reservations/markNoShowReservation/${reservationID}`)
        .then(response => response.json())
        .then(state => {
            if(state){
                window.location.reload();
            }
    })
 }
