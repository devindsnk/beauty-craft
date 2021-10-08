/* ----------------- modal box Scripts----------------- */

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
}