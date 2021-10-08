// const btnOpenN = document.querySelector(".btnOpen.normal");
// const btnOpenF = document.querySelector(".btnOpen.full");
// const modalContainerN = document.querySelector(".modal-container.normal");
// const modalContainerF = document.querySelector(".modal-container.full");
// const btnCloseN = document.querySelector(".btnClose.normal");
// const btnCloseF = document.querySelector(".btnClose.full");

var modalToToggle = null;

const removeServiceModal = document.querySelector('.remove-service');
// const testServiceModal = document.querySelector('.test-service');


const btnRemoveServiceList = document.querySelectorAll('.btnRemoveService');
btnRemoveServiceList.forEach(btn => {
   btn.addEventListener("click",
      function () {
         modalToToggle = removeServiceModal;
         toggleModal();
      }
   );
});


// const btnTest = document.querySelector('.btnTest');
// btnTest.addEventListener("click",
//    function () {
//       modalToToggle = testServiceModal;
//       toggleModal();
//    }
// );

const btnCloseList = document.querySelectorAll('.btnClose');
btnCloseList.forEach(btn => {
   btn.addEventListener("click", toggleModal);
});


function toggleModal() {
   modalToToggle.classList.toggle("show");

   
// const btnOpenO = document.querySelector(".btnOpen.new");
// const modalContainerO = document.querySelector(".modal-container.new");
// const btnCloseO = document.querySelector(".btnClose.new");

// btnOpenN.addEventListener("click", toggleModalN);
// btnCloseN.addEventListener("click", toggleModalN);
// btnOpenF.addEventListener("click", toggleModalF);
// btnCloseF.addEventListener("click", toggleModalF);

// btnOpenO.addEventListener("click", toggleModalO);
// btnOpenO.addEventListener("click", toggleModalN);
// btnCloseO.addEventListener("click", toggleModalO);

// function toggleModalN() {
//     modalContainerN.classList.toggle("show");
// }

// function toggleModalF() {
//     modalContainerF.classList.toggle("show");
// }

// function toggleModalO() {
//     modalContainerO.classList.toggle("show");
// }