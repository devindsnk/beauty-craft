const SalaryTablePayBtn = Array.from (document.querySelectorAll(".btnSalaryPay"));
const SalaryPayBtnAnchorTag = document.querySelector(".salaryPayAnchorTag");

for ( var i = 0 ; i < SalaryTablePayBtn.length ; i++ ){

let staffID = SalaryTablePayBtn[i].dataset.staffid;
let month = SalaryTablePayBtn[i].dataset.month; 
let mobileNo = SalaryTablePayBtn[i].dataset.mobileno; 

SalaryTablePayBtn[i].addEventListener('click',
function(){
    SalaryPayBtnAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryPayWithStaffID/" + staffID + "/" + month + "/" + mobileNo;
})


}

