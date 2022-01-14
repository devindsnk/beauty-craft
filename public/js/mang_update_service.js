// ...........................START UPDATE SERVICE...........................//

const sProveChecker = Array.from(document.querySelectorAll('input[type="checkbox"]:checked[name="serProvCheckbox[]"]'));
const recallFromUpdateServiceModal = document.querySelector(".recall-reservation-from-update-service");
const recallFromUpdateServiceBtn = document.querySelectorAll(".sProvCheckBoxes");
const recallbtnFromUpdate = document.querySelector(".recallModalRecallBtn");
const cancelbtnFromUpdate = document.querySelector(".recallModalCancelBtn");

let recallResList = null;
for (var i = 0; i < sProveChecker.length; i++) {

    let sProvID = sProveChecker[i].value;
    let sID = sProveChecker[i].dataset.columns;

    sProveChecker[i].addEventListener('change',
        async function () {
            if (!this.checked) {
                await checkForUpcomingReservations(sProvID, sID);

                console.log(recallResList);
                if (recallResList.length !== 0) {
                    modalToToggleUS = recallFromUpdateServiceModal;
                    toggleModalUS();
                }
            }
            else {
                await checkForUpcomingReservations(sProvID, sID);
                removeFromRecallQueue();
            }
        }
    )
}

// recallbtnFromUpdate.addEventListener('click',
//     function () {
//         console.log('ssa');
//         recallReservations();
//     }
// )

async function checkForUpcomingReservations(sProvID, sID) {

    await fetch(`http://localhost:80/beauty-craft/Services/getReservationListOfCheckedSPRovList/${sProvID}/${sID}`)
        .then(response => response.json())
        .then(resDetails => {

            let resList = [];
            for (var i = 0; i < resDetails.length; i++) {
                resList.push(resDetails[i]['reservationID']);
            }
            console.log(resList);
            recallResList = resList;
        }
        );
}

function addToRecallQueue() {
    recallResList.forEach(resID => {
        console.log(resID);
        fetch(`http://localhost:80/beauty-craft/Services/addToRecallQueue/${resID}`);
    });
    recallResList = null;
    closeModalUS();
}

function removeFromRecallQueue() {
    recallResList.forEach(resID => {
        fetch(`http://localhost:80/beauty-craft/Services/removeFromRecallQueue/${resID}`);
    });
    recallResList = null;
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

// // ...........................END UPDATE SERVICE...........................//

