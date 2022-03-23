// Script Files related all modals
// Contains the modal to toggle
let modalToToggle = null;
// let recordID = null;

// Remove Service Modal Section
const removeServiceModal = document.querySelector(".remove-service");
const removeServiceBtnList = document.querySelectorAll(".btnRemoveService");
removeServiceBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeServiceModal;
        toggleModal();
    });
});

// Hold Service Modal Section
const holdServiceModal = document.querySelector(".hold-service");
const holdServiceBtnList = document.querySelectorAll(".btnHoldService");
holdServiceBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = holdServiceModal;
        toggleModal();
    });
});



// Remove Resource Modal Section
const removeResourceModal = document.querySelector(".remove-resource");
const removeResourceBtnList = document.querySelectorAll(".btnRemoveResource");
removeResourceBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeResourceModal;
        toggleModal(btn);
    });
});



// Add Resource Type Modal Section
const addResourceTypeModal = document.querySelector(".add-resource-type");
const addResourceTypeBtnList = document.querySelectorAll(".btnAddResourceType");
addResourceTypeBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = addResourceTypeModal;
        toggleModal(btn);
    });
});


// Salary payment Modal Section
const salaryPayModal = document.querySelector(".salary-payment");
const salaryPayBtnList = document.querySelectorAll(".btnSalaryPay");
salaryPayBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = salaryPayModal;
        toggleModal(btn);
    });
});


const salaryPayMultipleModal = document.querySelector(".salary-payment-multiple");
const salaryPayBtnMultipleBtn = document.querySelectorAll(".btnSalaryPayMultiple");
salaryPayBtnMultipleBtn.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = salaryPayMultipleModal;
        toggleModal(btn);
    });
});

// Add Close Date Modal Section
const addCloseDateModal = document.querySelector(".add-closeDate");
const addCloseDateBtnList = document.querySelectorAll(".btnAddCloseDate");
addCloseDateBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = addCloseDateModal;
        toggleModal(btn);
    });
});


// Remove Close Date Modal Section
const removeCloseDateModal = document.querySelector(".remove-closeDate");
const removeCloseDateBtnList = document.querySelectorAll(".btnRemoveCloseDate");
removeCloseDateBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeCloseDateModal;
        toggleModal(btn);
    });
});


// Remove Staff Modal Section
const removeStaffModal = document.querySelector(".remove-staff");
const removeStaffBtnList = document.querySelectorAll(".btnRemoveStaff");
removeStaffBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeStaffModal;
        toggleModal(btn);
    });
});

// Remove Customer Modal Section
const removeCustomerModal = document.querySelector(".remove-customer");
const removeCustomerBtnList = document.querySelectorAll(".btnRemoveCustomer");
removeCustomerBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = removeCustomerModal;
        toggleModal(btn);
    });
});


// Reservation More info Modal Section
const resMoreInfoModal = document.querySelector(".reservation-more-info");
const resMoreInfoBtnList = document.querySelectorAll(".btnResMoreInfo");
resMoreInfoBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = resMoreInfoModal;
        // recordID = btn.getAttribute("data-id")
        toggleModal(btn);
    });
});



// Reservation Recall Request Modal Section
const resRecallModal = document.querySelector('.reservation-recall');
const resRecallBtn = document.querySelector('.btnResRecall');
if (resRecallBtn) {
    resRecallBtn.addEventListener("click",
        function () {
            modalToToggle = resRecallModal;
            toggleModal(resRecallBtn);
            modalToToggle = resMoreInfoModal;
            closeModal(resRecallBtn);
            // resMoreInfoModal.remove("show");
        }
    );
}

// Reservation Recall BackBtn  Modal Section
const resBackRecallBtn = document.querySelector('.btnBack');
// console.log(resBackRecallBtn);
if (resBackRecallBtn) {
    resBackRecallBtn.addEventListener("click",
        function () {
            modalToToggle = resMoreInfoModal;
            toggleModal(resRecallBtn);
            modalToToggle = resRecallModal;
            closeModal(resRecallBtn);
        }
    );
}
const modelCloseBtn = document.querySelector('.modelbtnClose');
if (modelCloseBtn) {
    modelCloseBtn.addEventListener("click",
        function () {
            modalToToggle = resMoreInfoModal;
            closeModal(resRecallBtn);
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
const editLeaveModal = document.querySelector(".edit-leave.request");
const editLeaveBtnList = document.querySelectorAll(".btnEditLeave");
if (editLeaveBtnList) {
    editLeaveBtnList.forEach((btn) => {
        btn.addEventListener("click", function () {
            modalToToggle = editLeaveModal;
            console.log(btn);
            toggleModal(btn);
        });
    });
}

// view Leave Request Modal Section
const viewLeaveModal = document.querySelector(".view-leave.request");
const viewLeaveBtnList = document.querySelectorAll(".btnViewLeave");
if (viewLeaveBtnList) {
    viewLeaveBtnList.forEach((btn) => {
        btn.addEventListener("click", function () {
            modalToToggle = viewLeaveModal;
            console.log(btn);
            toggleModal(btn);
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
            toggleModal(btn);
        });
    });
}

/* ------------------------------------------------------------------- */
/* ---------------------- Staff Changepassword ----------------------- */

//Password reset-staff Modal Secrtion
const changePasswordModal = document.querySelector(".change-password");
const changePasswordBtn = document.querySelector(".changepw");
if (changePasswordBtn) {
    changePasswordBtn.addEventListener("click", function () {
        modalToToggle = changePasswordModal;
        toggleModal();
    });
}

/* ------------------------------------------------------------------- */
/* --------------------- Reservation Handling ------------------------ */

// Reservation Cancel Modal Section
const resCancelModal = document.querySelector('.reservation-cancel');
const resCancelBtnList = document.querySelectorAll('.btnResCancel');
resCancelBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = resCancelModal;
        toggleModal(btn);
    });
});

// Reservation No Show Modal Section
const resNoShowModal = document.querySelector('.reservation-noShow');
const resNoShowBtnList = document.querySelectorAll('.btnResNoShow');
resNoShowBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = resNoShowModal;
        toggleModal(btn);
    });
});

// Reservation Checkout Modal Section
const resCheckoutModal = document.querySelector('.reservation-checkout');
const resCheckoutBtnList = document.querySelectorAll('.btnResCheckout');
resCheckoutBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = resCheckoutModal;
        toggleModal(btn);
    });
});

// Customer Provide Feedback Modal Section
const provideFeedbackModal = document.querySelector('.provide-feedback');
const provideFeedbackBtnList = document.querySelectorAll('.btnProvFeedback');
provideFeedbackBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = provideFeedbackModal;
        toggleModal(btn);
    });
});


// Approve leave Modal Section
const approveLeaveModal = document.querySelector(".approve-leave");
const approveLeaveBtnList = document.querySelectorAll(".btnApproveLeave");
approveLeaveBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = approveLeaveModal;
        toggleModal(btn);
        let staffID = btn.getAttribute("data-staffID") // get id from the clicked btn of the list
        let leaveDate = btn.getAttribute("data-leaveDate") // get id from the clicked btn of the list

        const approveBtn = modalToToggle.querySelector('.approveBtn'); // get the approveBtn btn of the modal
        if (approveBtn) {
            approveBtn.setAttribute('data-staffID', staffID);
            approveBtn.setAttribute('data-leaveDate', leaveDate);
        }
    });
});
console.log(approveLeaveModal);

// Reject leave Modal Section
const rejectLeaveModal = document.querySelector('.reject-leave');
const rejectLeaveBtnList = document.querySelectorAll('.btnRejectLeave');
rejectLeaveBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = rejectLeaveModal;
        toggleModal(btn);
        let staffID = btn.getAttribute("data-staffID") // get id from the clicked btn of the list
        let leaveDate = btn.getAttribute("data-leaveDate") // get id from the clicked btn of the list

        const rejectBtn = modalToToggle.querySelector('.rejectBtn'); // get the rejectBtn btn of the modal
        if (rejectBtn) {
            rejectBtn.setAttribute('data-staffID', staffID);
            rejectBtn.setAttribute('data-leaveDate', leaveDate);
        }
    });
});

/* ------------------------------------------------------------------- */
/* ------------------------------------------------------------------- */

/* ------------------------------------------------------------------- */
/* ------------------------- Sales Section --------------------------- */

// Refund Invoice Modal Section
const refundInvModal = document.querySelector('.refund-invoice');
const refundInvBtnModal = document.querySelectorAll('.btnRefundInv');
refundInvBtnModal.forEach((btn) => {
    btn.addEventListener("click", function () {
        console.log("yo");
        modalToToggle = refundInvModal;
        toggleModal(btn);
    });
});

// Void payment Invoice Modal Section
const voidPayInvModal = document.querySelector('.void-payInvoice');
const voidPayInvBtnModal = document.querySelectorAll('.btnVoidPayInv');
voidPayInvBtnModal.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = voidPayInvModal;
        toggleModal(btn);
    });
});

// Void Refund Invoice Modal Section
const voidRefInvModal = document.querySelector('.void-refInvoice');
const voidRefInvBtnModal = document.querySelectorAll('.btnVoidRefInv');
voidRefInvBtnModal.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = voidRefInvModal;
        toggleModal(btn);
    });
});

/* ------------------------------------------------------------------- */
/* -------------------- customer profile picture ------------------------ */

// remove picture
const imgRemovePayModal = document.querySelector(".img-remove");
const imgRemoveBtn = document.querySelector(".removebtn");
if (imgRemoveBtn) {
    imgRemoveBtn.addEventListener("click", function () {
        modalToToggle = imgRemovePayModal;
        toggleModal();
    });
}

/* ------------------------------------------------------------------- */
/* ------------------------ Recept Test Section ---------------------- */

// Mark on leave Modal Section
const custMarkLeaveModal = document.querySelector('.sProv-markLeave');
const custMarkLeaveBtnList = document.querySelectorAll('.btnMarkLeave');
custMarkLeaveBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = custMarkLeaveModal;
        toggleModal(btn);
    });
});


// Confirm reservation Modal Section
const resConfirmModal = document.querySelector('.reservation-confirm');
const resConfirmBtnList = document.querySelectorAll('.btnResConfirm');
resConfirmBtnList.forEach((btn) => {
    btn.addEventListener("click", function () {
        modalToToggle = resConfirmModal;
        toggleModal(btn);
    });
});

/* ------------------------------------------------------------------- */
/* ------------------------------------------------------------------- */



/* ------------------------------------------------------------------- */
/* ------------------------ Common Section --------------------------- */

// Common section for all close buttons
const btnCloseList = document.querySelectorAll(".btnClose");
btnCloseList.forEach((btn) => {
    btn.addEventListener("click", function () {
        closeModal();
    });
});


// get the id assigned to the clicked btn and assign id to the proceed btn of the modal
function transferIDToModal(btn) {
    <<
    <<
    <<
    <
    HEAD
    let recordID = btn.getAttribute("data-id") // get id from the clicked btn of the list
    const proceedBtn = modalToToggle.querySelector('.proceedBtn'); // get the proceed btn of the modal
    if (proceedBtn) {
        proceedBtn.setAttribute('data-id', recordID);
    } // assign id as a data attribute to the proceed btn
    ===
    ===
    =
    let recordID = btn.getAttribute("data-id") // get id from the clicked btn of the list
    const proceedBtn = modalToToggle.querySelector('.proceedBtn'); // get the proceed btn of the modal
    if (proceedBtn) {
        proceedBtn.setAttribute('data-id', recordID);
    } // assign id as a data attribute to the proceed btn
    >>>
    >>>
    >
    7 be5b41f8eee635b5bad59be2d9a3d9fa7b041a8
}



// Common section for all modal toggle operations
function toggleModal(btn) {
    // console.log('toggle model')
    <<
    <<
    <<
    <
    HEAD
        ===
        ===
        =

        >>>
        >>>
        >
        7 be5b41f8eee635b5bad59be2d9a3d9fa7b041a8
    if (btn) {
        transferIDToModal(btn);
    }

    modalToToggle.classList.add("show");
}

// Common section for all modal close operations
function closeModal() {
    modalToToggle.classList.remove("show");
}


/* ------------------------------------------------------------------- */
/* ------------------------------------------------------------------- */
