console.log("hhh");
const SalaryMonth = document.querySelector(".salaryMonth");
const SalaryReportViewIcon= Array.from(document.querySelectorAll('.salaryReportViewIcon'));
const SalaryReportViewIconAnchorTag = Array.from(document.querySelectorAll('.salaryReportViewAncorTag'));
// const SalaryReportViewIconAnchorTag = document.querySelector('.salaryReportViewAncorTag');



for ( var i = 0; i< SalaryReportViewIcon.length ; i++){
    // console.log("hi hi");
console.log(SalaryReportViewIcon[i].dataset.staffid);
let staffID = SalaryReportViewIcon[i].dataset.staffid;

// checkStaffmemberStatus(staffStatus);

SalaryMonth.addEventListener('change',
function(){
    console.log("month");
    console.log(SalaryMonth.value);
    SalaryReportViewIconAnchorTag[i].href = "http://localhost:80/beauty-craft/Salary/salaryReport/" + staffID + "/" + SalaryMonth.value;
    // SalaryReportViewIconAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryReport/" + staffID + "/" + SalaryMonth.value;
    console.log(SalaryReportViewIconAnchorTag[i].href);
}
)
}