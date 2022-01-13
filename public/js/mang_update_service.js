// ...........................START UPDATE SERVICE...........................//

const sProveChecker = Array.from(document.querySelectorAll('input[type="checkbox"]:checked[name="serProvCheckbox[]"]'));
const recallFromUpdateServiceModal = document.querySelector(".recall-reservation-from-update-service");
const recallFromUpdateServiceBtn = document.querySelectorAll(".sProvCheckBoxes");
const recallbtnFromUpdate = document.querySelector(".recallModalRecallBtn");
const cancelbtnFromUpdate = document.querySelector(".recallModalCancelBtn");

var spar = 0;
for (var i = 0; i < sProveChecker.length; i++) {

    let sProvID = sProveChecker[i].value;
    let sID = sProveChecker[i].dataset.columns;

    checkedItem = sProveChecker[i];
    eachsProveChecker(checkedItem, sProvID, sID);
}
function eachsProveChecker(checkedItem, sProvID, sID) {
    checkedItem.addEventListener('change',
        function () {
            if (!this.checked) {
                checkForUpcomingReservations();
            }
        }
    )

    function checkForUpcomingReservations() {
        fetch(`http://localhost:80/beauty-craft/Services/getReservationListOfCheckedSPRovList/${sProvID}/${sID}`)
            .then(response => response.json())
            .then(serProvDetails => {

                const ress = [];
                const ressReson = 'For update the service';

                for (var i = 0; i < serProvDetails.length; i++) {
                    ress.push(serProvDetails[i]['reservationID']);
                }

                if (serProvDetails.length !== 0) {
                    modalToToggleUS = recallFromUpdateServiceModal;
                    toggleModalUS();
                }
                recallbtnFromUpdate.addEventListener('click',
                    function () {
                        // if (spar == 0) {
                        //     createSessionArray();
                        //     spar++;
                        // }
                        recallReservations(sProvID, ress);
                        closeModalUS()
                    }
                )
                cancelbtnFromUpdate.addEventListener('click',
                    function () {
                        checkedItem.checked = true;
                    }
                )
            }).catch(err => {
                // Do something for an error here
                // console.log("Error Reading data :" + err);
            });
    }
}
function createSessionArray() {
    console.log('qqqq');
    fetch(`http://localhost:80/beauty-craft/Services/createSessionArray`)
        .then()
        .catch(err => {
            // console.log("Error Reading data :" + err);
        });
}
function recallReservations(sProvID, ress) {
    console.log(sProvID);
    fetch(`http://localhost:80/beauty-craft/Services/recallReservationsFromUpdateService/${sProvID}/${ress}`)
        .then()
        .catch(err => {
            // console.log("Error Reading data :" + err);
        });
}

//  start model for recall request
let modalToToggleUS = null;
if (cancelbtnFromUpdate) {
    cancelbtnFromUpdate.addEventListener("click", function () {
        closeModalUS();
    });
}

function toggleModalUS() {
    modalToToggleUS.classList.add("show");
}
function closeModalUS() {
    modalToToggleUS.classList.remove("show");
}
//  end model for recall request

// ...........................END UPDATE SERVICE...........................//

