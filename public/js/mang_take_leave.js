// ...........................START ADD MANG LEAVE...........................//

const mangLeaveSelectedDate = document.querySelector(".mangSelectedDate");
const mangDateError = document.querySelector(".mangDateError");
const mangLeaveType = document.querySelector(".mangSelecedLeaveType");
const mangTypeError = document.querySelector(".mangTypeError");
console.log('leave awa');

mangLeaveSelectedDate.addEventListener('change',
    function () {
        console.log('listener awa');
        checkDateStatus();      
    }
)


function checkDateStatus() {
    console.log('func awa1');

    fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangLeave/${mangLeaveSelectedDate.value}`)
       .then(response => response.json())
       .then(state => {
        console.log('func awa2');

        mangDateError.innerHTML = state;
    })
 }

mangLeaveType.addEventListener('change',
    function () {
        console.log('listener awa2');
        checkForMedicals();      
    }
)
function checkForMedicals() {
    console.log('func awa3');

    fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangMedicalLeave/${mangLeaveType.value}`)
        .then(response => response.json())
        .then(state => {
        console.log('func awa4');

        mangTypeError.innerHTML = state;
    })
}
//  function passDateError(state) {
//     fetch(`http://localhost:80/beauty-craft/MangDashboard/takeLeave/${state}`)
//     .then()
//     console.log('func awa3');

//  }

// ...........................END ADD MANG LEAVE...........................//




// ...........................START EDIT MANG LEAVE...........................//

const mangLeaveSelectedDate2 = document.querySelector(".mangSelectedDate2");
const mangDateError2 = document.querySelector(".mangDateError2");
const mangLeaveType2 = document.querySelector(".mangSelecedLeaveType2");
const mangTypeError2 = document.querySelector(".mangTypeError2");

console.log('leave awa');

mangLeaveSelectedDate2.addEventListener('change',
    function () {
        console.log('listener awa');
        checkDateStatus2();      
    }
)

function checkDateStatus2() {
    console.log('func awa1');

    fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangLeave/${mangLeaveSelectedDate2.value}`)
       .then(response => response.json())
       .then(state => {
        console.log('func awa2');

        mangDateError2.innerHTML = state;

        // passDateError(state);

    })
 }

 mangLeaveType2.addEventListener('change',
    function () {
        console.log('listener awa2');
        checkForMedicals2();      
    }
)
function checkForMedicals2() {
    console.log('func awa3');

    fetch(`http://localhost:80/beauty-craft/Leaves/checkIfDatePossibleForMangMedicalLeave/${mangLeaveType2.value}`)
        .then(response => response.json())
        .then(state => {
        console.log('func awa4');

        mangTypeError2.innerHTML = state;
    })
}


const editLeaveBtn = Array.from(document.querySelectorAll('.editMangLeave'));
const proceedbtn = document.querySelector(".proceedBtn");
const mangSelectedDate2 = document.querySelector(".mangSelectedDate2");

console.log(editLeaveBtn.length);

for (var i = 0; i < editLeaveBtn.length; i++){

    let leaveID = editLeaveBtn[i].dataset.columns1;
    // let userID = editLeaveBtn[i].dataset.columns2;

    // console.log(leaveID);
    // console.log(userID);

    editLeaveBtn[i].addEventListener('click',
        function () {
            console.log('hello');

            document.getElementById("updateForm").action = "http://localhost:80/beauty-craft/MangDashboard/updateTakenLeave/"+leaveID;

            getLeaveDetails(leaveID);
        }
    )

    function getLeaveDetails(leaveID)
    {
        // console.log("checkForUpcomingReservations awa");

        fetch(`http://localhost:80/beauty-craft/MangDashboard/getOneMangLeaveDetails/${leaveID}`)
            .then(response => response.json())
            .then(leaveDetails => {
                console.log(leaveDetails);

                document.getElementById("mangLeaveDate").value = leaveDetails[0]['leaveDate'];
                document.getElementById("mangLeaveType").value = leaveDetails[0]['leaveType'];
                document.getElementById("mangLeaveReason").value = leaveDetails[0]['reason'];

        }).catch(err => {
            // console.log("Error Reading data :" + err);
        });
    }
    // proceedbtn.addEventListener('click',
    //     function () {
    //         console.log('hello2');

    //         document.getElementById("updateForm").action = "http://localhost:80/beauty-craft/MangDashboard/updateTakenLeave/"+leaveID+"/"+userID;
    //     }
    // )
}

// ...........................END EDIT MANG LEAVE...........................//




// ...........................START DELETE MANG LEAVE...........................//

const deleteLeaveBtn = Array.from(document.querySelectorAll('.deleteMangLeave'));
const deleteproceedbtn = document.querySelector(".deleteProceedBtn");
const deleteLeaveHREF = document.querySelector('.deleteConfirmHref');

for (var i = 0; i < deleteLeaveBtn.length; i++){
    let leaveDate = deleteLeaveBtn[i].dataset.columns3;

    deleteLeaveBtn[i].addEventListener('click',
        function () {
            console.log('del_hold');
            document.getElementById("deleteLeaveHead").innerHTML = "Delete Leave - ["+leaveDate+"]";

            deleteTheLeaveProceed(leaveDate);
        }
    )
}
function deleteTheLeaveProceed(leaveDate){
    deleteproceedbtn.addEventListener('click',
        function () {
            console.log('recall1');
            deleteLeaveHREF.href = "http://localhost/beauty-craft/MangDashboard/deleteLeave/"+leaveDate;
        }
    )
}

// ...........................END DELETE MANG LEAVE...........................//
