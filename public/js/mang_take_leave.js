// ...........................START ADD MANG LEAVE...........................//

const mangLeaveSelectedDate = document.querySelector(".mangSelectedDate");
const mangDateError = document.querySelector(".mangDateError");
const mangLeaveType = document.querySelector(".mangSelecedLeaveType");
const mangTypeError = document.querySelector(".mangTypeError");

if (mangLeaveSelectedDate != null) {
    mangLeaveSelectedDate.addEventListener('change',
        function () {
            checkDateStatus();
        }
    )
}

function checkDateStatus() {

    fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangLeave/${mangLeaveSelectedDate.value}`)
        .then(response => response.json())
        .then(state => {

            mangDateError.innerHTML = state;
            if (state != '') {
                document.getElementById("takeLeaveProceed").disabled = true;
            } else {
                document.getElementById("takeLeaveProceed").disabled = false;
            }
        });
    if (mangLeaveType.value !== null) {
        fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangMedicalLeave/${mangLeaveType.value}/${mangLeaveSelectedDate.value}`)
            .then(response => response.json())
            .then(state => {

                mangTypeError.innerHTML = state;
                if (state != '') {
                    document.getElementById("takeLeaveProceed").disabled = true;
                }
            });
    }
}
if (mangLeaveType != null) {
    mangLeaveType.addEventListener('change',
        function () {
            checkForMedicals();
        }
    )
}
function checkForMedicals() {

    fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangMedicalLeave/${mangLeaveType.value}/${mangLeaveSelectedDate.value}`)
        .then(response => response.json())
        .then(state => {

            mangTypeError.innerHTML = state;
            if (state != '') {
                document.getElementById("takeLeaveProceed").disabled = true;
            } else {
                document.getElementById("takeLeaveProceed").disabled = false;
            }
        });
    if (mangLeaveSelectedDate.value !== null) {
        fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangLeave/${mangLeaveSelectedDate.value}`)
            .then(response => response.json())
            .then(state => {

                mangDateError.innerHTML = state;
                if (state != '') {

                    document.getElementById("takeLeaveProceed").disabled = true;
                }
            });
    }
}

// ...........................END ADD MANG LEAVE...........................//




// ...........................START EDIT MANG LEAVE...........................//

const editLeaveBtn = Array.from(document.querySelectorAll('.editMangLeave'));
const proceedbtn = document.querySelector(".proceedBtn");
const mangSelectedDate2 = document.querySelector(".mangSelectedDate2");

for (var i = 0; i < editLeaveBtn.length; i++) {

    let leaveID = editLeaveBtn[i].dataset.columns1;

    editLeaveBtn[i].addEventListener('click',
        function () {
            document.getElementById("updateForm").action = "http://localhost:80/beauty-craft/MangDashboard/updateTakenLeave/" + leaveID;
            getLeaveDetails(leaveID);
        }
    )

    function getLeaveDetails(leaveID) {
        fetch(`http://localhost:80/beauty-craft/MangDashboard/getOneMangLeaveDetails/${leaveID}`)
            .then(response => response.json())
            .then(leaveDetails => {

                document.getElementById("mangLeaveDate").value = leaveDetails[0]['leaveDate'];
                // document.getElementById("mangLeaveDate").disabled = true; /////////////date disable krnn oni
                document.getElementById("mangLeaveType").value = leaveDetails[0]['leaveType'];
                document.getElementById("mangLeaveReason").value = leaveDetails[0]['reason'];

            }).catch(err => {
                // console.log("Error Reading data :" + err);
            });
    }

}
const mangLeaveSelectedDate2 = document.querySelector(".mangSelectedDate2");
const mangDateError2 = document.querySelector(".mangDateError2");
const mangLeaveType2 = document.querySelector(".mangSelecedLeaveType2");
const mangTypeError2 = document.querySelector(".mangTypeError2");

if (mangLeaveSelectedDate2 != null) {
    mangLeaveSelectedDate2.addEventListener('change', ////////////date disable kroth oni ne
        function () {

            let state = 'You cannot change the date';
            mangDateError2.innerHTML = state;

            document.getElementById("editLeaveProceed").disabled = true;

        }
    )
}

if (mangLeaveType2 != null) {
    mangLeaveType2.addEventListener('change',
        function () {
            checkForMedicals2();
        }
    )
}
function checkForMedicals2() {
    let st = 1;

    if (document.getElementById("mangLeaveDate").value !== null) {
        fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangMedicalLeave/${mangLeaveType2.value}/${document.getElementById("mangLeaveDate").value}/${st}`)
            .then(response => response.json())
            .then(state => {

                mangTypeError2.innerHTML = state;
                if (state != '') {
                    document.getElementById("editLeaveProceed").disabled = true;
                } else {
                    document.getElementById("editLeaveProceed").disabled = false;
                }
            });
    }
}


// ...........................END EDIT MANG LEAVE...........................//




// ...........................START DELETE MANG LEAVE...........................//

const deleteLeaveBtn = Array.from(document.querySelectorAll('.deleteMangLeave'));
const deleteproceedbtn = document.querySelector(".deleteProceedBtn");
const deleteLeaveHREF = document.querySelector('.deleteConfirmHref');

for (var i = 0; i < deleteLeaveBtn.length; i++) {
    let leaveDate = deleteLeaveBtn[i].dataset.columns3;

    deleteLeaveBtn[i].addEventListener('click',
        function () {
            document.getElementById("deleteLeaveHead").innerHTML = "Delete Leave - [" + leaveDate + "]";

            deleteTheLeaveProceed(leaveDate);
        }
    )
}
function deleteTheLeaveProceed(leaveDate) {
    deleteproceedbtn.addEventListener('click',
        function () {
            deleteLeaveHREF.href = "http://localhost/beauty-craft/MangDashboard/deleteLeave/" + leaveDate;
        }
    )
}

// ...........................END DELETE MANG LEAVE...........................//
