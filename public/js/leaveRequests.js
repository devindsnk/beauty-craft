// ...........................START APPROVE LEAVE FROM TABLE...........................//
const approveLeaveBtn = Array.from(document.querySelectorAll('.approveLeavehref'));
const approveLeavConfirmbtn = document.querySelector(".approveLeaveConfirm");
const approveLeavHREF = document.querySelector('.approveLeaveConfirmHref');

for (var i = 0; i < approveLeaveBtn.length; i++) {

    let sID = approveLeaveBtn[i].dataset.columns1;
    let lDate = approveLeaveBtn[i].dataset.columns2;

    approveLeaveBtn[i].addEventListener('click',
        function () {
            document.getElementById("approveLeaveHead").innerHTML = "Approve Leave of SM " + sID + "<br> On " + lDate;
            document.getElementById("warningMsgApproveLeave").innerHTML = "Are you sure you want to Approve this leave? <br> This action cannot be undone after proceeding.";
            responce = 1;
            approveLeave(sID, lDate, responce);
        }
    )
}
function approveLeave(sID, lDate, responce) {
    approveLeavHREF.href = "http://localhost/beauty-craft/MangDashboard/approveLeaveRequestsFromTabel/" + sID + "/" + lDate + "/" + responce;
}

// ...........................END APPROVE LEAVE FROM TABLE...........................//


function approveLeaveRequest(btn) {
    console.log('ssa');

    let staffID = btn.getAttribute("data-staffID");
    let leaveDate = btn.getAttribute("data-leaveDate");
    console.log(staffID);
    console.log(leaveDate);

    let responce = 1;
    fetch(`http://localhost:80/beauty-craft/MangDashboard/approveRejectLeaveRequests/${staffID}/${leaveDate}/${responce}`)
        .then((response) => response.json())
        .then((state) => {
            console.log('asdsdwa');
            if (state) {
                window.location.reload();
            }
        });
}

function rejectLeaveRequest(btn) {
    let staffID = btn.getAttribute("data-staffID");
    let leaveDate = btn.getAttribute("data-leaveDate");
    let responce = 0;
    fetch(`http://localhost:80/beauty-craft/MangDashboard/approveRejectLeaveRequests/${staffID}/${leaveDate}/${responce}`)
        .then((response) => response.json())
        .then((state) => {
            if (state) {
                window.location.reload();
            }
        });
}