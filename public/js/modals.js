// Script Files related all modals

// Contains the modal to toggle
var modalToToggle = null;

// Remove Service Modal Section
const removeServiceModal = document.querySelector(".remove-service");
const removeServiceBtnList = document.querySelectorAll(".btnRemoveService");
removeServiceBtnList.forEach((btn) => {
    btn.addEventListener("click", function() {
        modalToToggle = removeServiceModal;
        toggleModal();
    });
});

// Remove Staff Modal Section
const removeStaffModal = document.querySelector(".remove-staff");
const removeStaffBtnList = document.querySelectorAll(".btnRemoveStaff");
removeStaffBtnList.forEach((btn) => {
    btn.addEventListener("click", function() {
        modalToToggle = removeStaffModal;
        toggleModal();
    });
});

// Remove Customer Modal Section
const removeCustomerModal = document.querySelector(".remove-customer");
const removeCustomerBtnList = document.querySelectorAll(".btnRemoveCustomer");
removeCustomerBtnList.forEach((btn) => {
    btn.addEventListener("click", function() {
        modalToToggle = removeCustomerModal;
        toggleModal();
    });
});

// Edit Leave Modal Section
const editLeaveModal = document.querySelector(".edit-leave");
const editLeaveBtnList = document.querySelectorAll(".btnEditLeave");
console.log(editLeaveModal);
if (editLeaveBtnList) {
    editLeaveBtnList.forEach((btn) => {
        btn.addEventListener("click", function() {
            modalToToggle = editLeaveModal;
            toggleModal();
        });
    });
}

// Delete Leave Modal Section
const deleteLeaveModal = document.querySelector(".delete-leave");
const deleteLeaveBtnList = document.querySelectorAll(".btnDeleteLeave");
console.log(deleteLeaveModal);
if (deleteLeaveBtnList) {
    deleteLeaveBtnList.forEach((btn) => {
        btn.addEventListener("click", function() {
            modalToToggle = deleteLeaveModal;
            toggleModal();
        });
    });
}

// Reservation Recall Modal Section
const resRecallModal = document.querySelector('.reservation-recall');
const resRecallBtn = document.querySelector('.btnResRecall');
resRecallBtn.addEventListener("click",
   function () {
      toggleModal();
      modalToToggle = resRecallModal;
      toggleModal();
   }
);

// Take Leave Modal Section
const takeLeaveModal = document.querySelector('.take-leave');
const takeLeaveBtnList = document.querySelector('.btnTakenLeave');
takeLeaveBtnList.addEventListener("click",
   function () {
      modalToToggle = takeLeaveModal;
      toggleModal();
   }
);

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

// Edit taken Leave Modal Section
const deleteTakenLeaveModal = document.querySelector('.delete-taken-leave');
const deleteTakeLeaveBtnList = document.querySelectorAll('.btnDeleteTakenLeave');
deleteTakeLeaveBtnList.forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = deleteTakenLeaveModal;
         toggleModal();
      }
   );
const resRecallModal = document.querySelector(".reservation-recall");
const resRecallBtn = document.querySelector(".btnResRecall");
// console.log(resRecallModal);
if (resRecallBtn) {
    resRecallBtn.addEventListener("click", function() {
        toggleModal();
        modalToToggle = resRecallModal;
        toggleModal();
    });
}

//Leave Request Modal Secrtion
const leaveRequestModal = document.querySelector(".leaverequest");
const leaveRequestBtn = document.querySelector(".btnleaveRequest");
// console.log(leaveRequestModal);
if (leaveRequestBtn) {
    leaveRequestBtn.addEventListener("click", function() {
        modalToToggle = leaveRequestModal;
        toggleModal();
    });
}

// Reservation More info Modal Section
const resMoreInfoModal = document.querySelector(".reservation-more-info");
const resMoreInfoBtnList = document.querySelectorAll(".btnResMoreInfo");
console.log(resMoreInfoBtnList);
resMoreInfoBtnList.forEach((btn) => {
    btn.addEventListener("click", function() {
        modalToToggle = resMoreInfoModal;
        toggleModal();
    });
});

// Common section for all close buttons
const btnCloseList = document.querySelectorAll(".btnClose");
btnCloseList.forEach((btn) => {
    btn.addEventListener("click", toggleModal);
});
// Common section for all modal toggle operations
function toggleModal() {
    modalToToggle.classList.toggle("show");
}