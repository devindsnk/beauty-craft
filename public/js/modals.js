// Script Files related all modals

// Contains the modal to toggle
var modalToToggle = null;

// Remove Service Modal Section
const removeServiceModal = document.querySelector('.remove-service');
const removeServiceBtnList = document.querySelectorAll('.btnRemoveService');
removeServiceBtnList.forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = removeServiceModal;
         toggleModal();
      }
   );
});

// Remove Staff Modal Section
const removeStaffModal = document.querySelector('.remove-staff');
const removeStaffBtnList = document.querySelectorAll('.btnRemoveStaff');
removeStaffBtnList.forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = removeStaffModal;
         toggleModal();
      }
   );
});

// Remove Customer Modal Section
const removeCustomerModal = document.querySelector('.remove-customer');
const removeCustomerBtnList = document.querySelectorAll('.btnRemoveCustomer');
removeCustomerBtnList.forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = removeCustomerModal;
         toggleModal();
      }
   );
});

// Reservation More info Modal Section
const resMoreInfoModal = document.querySelector('.reservation-more-info');
const resMoreInfoBtnList = document.querySelectorAll('.btnResMoreInfo');
resMoreInfoBtnList.forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = resMoreInfoModal;
         toggleModal();
      }
   );
});


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


// Resources rmemove Modal Section
const removeResourceModal = document.querySelector('.remove-resource');
const removeResourceBtnList = document.querySelectorAll('.btnRemoveResource');
removeResourceBtnList .forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = removeResourceModal;
         toggleModal();
      }
   );
});

//  Resources add Modal Section
const addResourceModal = document.querySelector('.add-resource');
const addResourceBtnList = document.querySelectorAll('.btnAddResource');
addResourceBtnList .forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = addResourceModal;
         toggleModal();
      }
   );
});

//  Resources update Modal Section
const updateResourceModal = document.querySelector('.update-resource');
const updateResourceBtnList = document.querySelectorAll('.btnUpdateResource');
updateResourceBtnList .forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = updateResourceModal;
         toggleModal();
      }
   );
});


//  Close date remove Modal Section
const removeCloseDateModal = document.querySelector('.remove-closeDate');
const removeCloseDateModalBtnList = document.querySelectorAll('.btnRemoveCloseDate');
removeCloseDateModalBtnList .forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = removeCloseDateModal;
         toggleModal();
      }
   );
});

//  Close date add Modal Section
const addCloseDateModal = document.querySelector('.add-closeDate');
const addCloseDateModalBtnList = document.querySelectorAll('.btnAddCloseDate');
addCloseDateModalBtnList .forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = addCloseDateModal;
         toggleModal();
      }
   );
});


//  Salary Payment Modal Section
const salaryPaymentModal = document.querySelector('.salary-payment');
const salaryPaymentModalBtnList = document.querySelectorAll('.btnSalaryPayment');
salaryPaymentModalBtnList .forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = salaryPaymentModal;
         toggleModal();
      }
   );
});





// Common section for all close buttons
const btnCloseList = document.querySelectorAll('.btnClose');
btnCloseList.forEach(btn => {
   btn.addEventListener("click", toggleModal);
});

// Common section for all modal toggle operations
function toggleModal() {
   modalToToggle.classList.toggle("show");
}
