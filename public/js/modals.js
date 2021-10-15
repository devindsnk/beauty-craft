// Script Files related all modals

// Contains the modal to toggle
var modalToToggle = null;

// Remove Service Modal Section
const removeServiceModal = document.querySelector(".remove-service");
const removeServiceBtnList = document.querySelectorAll(".btnRemoveService");
removeServiceBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeServiceModal;
        toggleModal();
    });
});


// Remove Staff Modal Section
const removeStaffModal = document.querySelector(".remove-staff");
const removeStaffBtnList = document.querySelectorAll(".btnRemoveStaff");
removeStaffBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeStaffModal;
        toggleModal();
    });
});

// Remove Customer Modal Section
const removeCustomerModal = document.querySelector(".remove-customer");
const removeCustomerBtnList = document.querySelectorAll(".btnRemoveCustomer");
removeCustomerBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeCustomerModal;
        toggleModal();
    });
});


// Reservation More info Modal Section
const resMoreInfoModal = document.querySelector(".reservation-more-info");
const resMoreInfoBtnList = document.querySelectorAll(".btnResMoreInfo");
resMoreInfoBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = resMoreInfoModal;
        toggleModal();
    });
});


// Reservation Recall Request Modal Section
const resRecallModal = document.querySelector('.reservation-recall');
const resRecallBtn = document.querySelector('.btnResRecall');
if (resRecallBtn) {
    resRecallBtn.addEventListener("click",
        function () {
            toggleModal();
            modalToToggle = resRecallModal;
            toggleModal();
        }
    );
}

/* ------------------------------------------------------------------- */
/* ----------------------- Manager Leaves ---------------------------- */

// Take Leave Modal Section
const takeLeaveModal = document.querySelector('.take-leave');
const takeLeaveBtn = document.querySelector('.btnTakenLeave');
if (takeLeaveBtn) {
    takeLeaveBtn.addEventListener("click",
        function () {
            modalToToggle = takeLeaveModal;
            toggleModal();
        }
    );
}

// Edit taken Leave Modal Section
const editTakenLeaveModal = document.querySelector('.edit-taken-leave');
const editTakeLeaveBtnList = document.querySelectorAll('.btnEditTakenLeave');
editTakeLeaveBtnList.forEach(btn => {
    btn.addEventListener("click",
        function () {
            modalToToggle = editTakenLeaveModal;
            toggleModal();
        }
    );
});

// Delete taken Leave Modal Section
const deleteTakenLeaveModal = document.querySelector('.delete-taken-leave');
const deleteTakeLeaveBtnList = document.querySelectorAll('.btnDeleteTakenLeave');
deleteTakeLeaveBtnList.forEach(btn => {
    btn.addEventListener("click",
        function () {
            modalToToggle = deleteTakenLeaveModal;
            toggleModal();
        });
});

/* ------------------------------------------------------------------- */
/* ----------------------- General Leaves ---------------------------- */

//Leave Request Modal Secrtion
const leaveRequestModal = document.querySelector(".leaverequest");
const leaveRequestBtn = document.querySelector(".btnleaveRequest");
if (leaveRequestBtn) {
    leaveRequestBtn.addEventListener("click", function () {
        modalToToggle = leaveRequestModal;
        toggleModal();
    });
}

// Edit Leave Request Modal Section
const editLeaveModal = document.querySelector(".edit-leave");
const editLeaveBtnList = document.querySelectorAll(".btnEditLeave");
if (editLeaveBtnList) {
    editLeaveBtnList.forEach((btn) => {
        btn.addEventListener("click", function () {
            modalToToggle = editLeaveModal;
            toggleModal();
        });
    });
}

// Delete Leave Request Modal Section
const deleteLeaveModal = document.querySelector(".delete-leave");
const deleteLeaveBtnList = document.querySelectorAll(".btnDeleteLeave");
if (deleteLeaveBtnList) {
    deleteLeaveBtnList.forEach((btn) => {
        btn.addEventListener("click", function () {
            modalToToggle = deleteLeaveModal;
            toggleModal();
        });
    });
}

/* ------------------------------------------------------------------- */
/* ------------------------ Common Section --------------------------- */

// Common section for all close buttons
const btnCloseList = document.querySelectorAll(".btnClose");
btnCloseList.forEach((btn) => {
    btn.addEventListener("click", toggleModal);
});


// Common section for all modal toggle operations
function toggleModal() {
    modalToToggle.classList.toggle("show");
}

/* ------------------------------------------------------------------- */
/* ------------------------------------------------------------------- */
