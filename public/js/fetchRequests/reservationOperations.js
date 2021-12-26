function recallCancelReservation(reservationID) {
    recordID = null;
    fetch(`http://localhost:80/beauty-craft/Reservations/recallCancelReservation/${reservationID}`)
        .then(response => response.json())
        .then(state => {
            if(state){
                window.location.replace("http://localhost:80/beauty-craft/ReceptDashboard/recallRequests");
            }
          
    })
 }


// function cancelReservation(reservationID) {
//     recordID = null;
//     fetch(`http://localhost:80/beauty-craft/Reservations/cancelReservation/${reservationID}`)
//       .then(response => response.json())
//       .then(state => {
//          console.log(state);
//    })
//  }
