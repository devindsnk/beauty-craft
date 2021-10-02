/* ----------------- modal box Scripts----------------- */

const btnOpenN = document.querySelector('.btnOpen.normal');
const btnOpenF = document.querySelector('.btnOpen.full');
const modalContainerN = document.querySelector('.modal-container.normal');
const modalContainerF = document.querySelector('.modal-container.full');
const btnCloseN = document.querySelector('.btnClose.normal');
const btnCloseF = document.querySelector('.btnClose.full');

btnOpenN.addEventListener("click", toggleModalN);
btnCloseN.addEventListener("click", toggleModalN);
btnOpenF.addEventListener("click", toggleModalF);
btnCloseF.addEventListener("click", toggleModalF);

function toggleModalN() {
   modalContainerN.classList.toggle("show");
}

function toggleModalF() {
   modalContainerF.classList.toggle("show");
}
