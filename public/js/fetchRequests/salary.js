console.log("salaries");
const SalaryTablePayBtn = Array.from (document.querySelectorAll(".btnSalaryPay"));
const SalaryPayBtnAnchorTag = document.querySelector(".salaryPayAnchorTag");
// console.log("hi hi");

for ( var i = 0 ; i < SalaryTablePayBtn.length ; i++ ){

console.log (SalaryTablePayBtn[i].dataset.staffid);
console.log (SalaryTablePayBtn[i].dataset.month);
let staffID = SalaryTablePayBtn[i].dataset.staffid;
let month = SalaryTablePayBtn[i].dataset.month; 

SalaryTablePayBtn[i].addEventListener('click',
function(){
    SalaryPayBtnAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryPayWithStaffID/" + staffID + "/" + month ;
})


}

