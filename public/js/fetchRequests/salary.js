console.log("salaries");
const SalaryTableTablePayBtn = Array.from (document.querySelectorAll(".btnSalaryPay"));
const SalaryPayBtnAnchorTag = document.querySelector(".salaryPayAnchorTag");
// console.log("hi hi");

for ( var i = 0 ; i < SalaryTableTablePayBtn.length ; i++ ){
    //  console.log("hi hi");
console.log (SalaryTableTablePayBtn[i].dataset.staffid);
// console.log (SalaryTableTablePayBtn[i].dataset.month);
let staffID = SalaryTableTablePayBtn[i].dataset.staffid;
let month = SalaryTableTablePayBtn[i].dataset.month; 
// console.log(staffID);
createSalaryPayeUrl(staffID,month);

}


function createSalaryPayeUrl(staffID,month){
    // console.log(staffID);
    // SalaryPayBtnAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryPayWithStaffID/" + staffID + "/" + month ;
}