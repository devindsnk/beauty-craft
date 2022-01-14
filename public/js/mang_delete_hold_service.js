// ...........................START DELETE SERVICE...........................//

const trashServiceBtn = Array.from(document.querySelectorAll('.deletehref'));
const recallbtn = document.querySelector(".recallFromDelete");
const deleteHREF = document.querySelector('.deleteConfirmHref');

for (var i = 0; i < trashServiceBtn.length; i++) {

    let sID = trashServiceBtn[i].dataset.columns;

    trashServiceBtn[i].addEventListener('click',
        function () {

            document.getElementById("deleteServiceHead").innerHTML = "Delete Service - " + sID;

            checkForUpcomingReservationsForDeleteService(sID);
        }
    )
}
function checkForUpcomingReservationsForDeleteService(sID) {

    fetch(`http://localhost:80/beauty-craft/Services/getReservationListOfSelectedService/${sID}`)
        .then(response => response.json())
        .then(serviceDetails => {

            const ress = [];
            const ressReason = 'For delete the service';

            for (var i = 0; i < serviceDetails.length; i++) {
                ress.push(serviceDetails[i]['reservationID']);
            }

            if (ress.length !== 0) {
                document.getElementById("warningMsgDeleteService").innerHTML = "This service has upcomming reservations. <br>Confirm to Recall the reservations and Delete the service.";
            } else {
                document.getElementById("warningMsgDeleteService").innerHTML = "Are you sure you want to delete the service? <br> This action cannot be undone after proceeding.";
            }

            recallbtn.addEventListener('click',
                function () {
                    deleteTheService(sID);
                    recallReservationsFromDelete(ress, ressReason);
                }
            )

        }).catch(err => {
            // console.log("Error Reading data :" + err);
        });
}

function recallReservationsFromDelete(ress, ressReason) {

    fetch(`http://localhost:80/beauty-craft/Reservations/recallReservationsFromUpdateService/${ress}/${ressReason}`)
        .then()

        .catch(err => {
            // console.log("Error Reading data :" + err);
        });
}

function deleteTheService(sID) {

    deleteHREF.href = "http://localhost/beauty-craft/Services/deleteService/" + sID;

}

// ...........................END DELETE SERVICE...........................//




// ...........................START HOLD SERVICE...........................//

const holdServiceBtn = Array.from(document.querySelectorAll('.holdhref'));
const holdConfirmbtn = document.querySelector(".holdServiceConfirm");
const holdHREF = document.querySelector('.holdConfirmHref');

for (var i = 0; i < holdServiceBtn.length; i++) {

    let sID = holdServiceBtn[i].dataset.columns2;

    holdServiceBtn[i].addEventListener('click',
        function () {
            document.getElementById("holdServiceHead").innerHTML = "Hold Service - " + sID;
            document.getElementById("warningMsgHoldService").innerHTML = "Are you sure you want to hold the service? <br> This action cannot be undone after proceeding.";

            holdTheService(sID);
        }
    )
}
function holdTheService(sID) {
    holdHREF.href = "http://localhost/beauty-craft/Services/holdService/" + sID;
}

// ...........................END HOLD SERVICE...........................//
