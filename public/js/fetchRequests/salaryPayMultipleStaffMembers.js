console.log("salaries MULTIPLE");
const SalaryTablePayMultipleBtn = document.querySelector(".btnSalaryPayMultiple");
const SalaryPayMultipleAnchorTag = document.querySelector(".salaryPayMultipleAnchorTag");
let SalaryPayNowCheckbox;
console.log("hhhhhhhh");


// console.log(SalaryPayNowCheckbox.length);

SalaryTablePayMultipleBtn.addEventListener('click',
    function () {
        SalaryPayNowCheckbox = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'));
        let staffID = SalaryPayNowCheckbox[i].dataset.staffid;
        let month = SalaryPayNowCheckbox[i].dataset.month;
        
        console.log(staffID);
        SalaryPayMultipleAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryPayWithStaffID/" + staffID + "/" + month;
    })
// console.log("checked");

// for (var i = 0; i < SalaryPayNowCheckbox.length; i++) {
//     // console.log("hi hi");

//     let staffID = SalaryPayNowCheckbox[i].dataset.staffid;
//     let month = SalaryPayNowCheckbox[i].dataset.month;

//     if (SalaryPayNowCheckbox[i].checked) {

//         console.log("checked check box");

//         SalaryTablePayMultipleBtn.addEventListener('click',
//             function () {
//                 const SalaryPayNowCheckbox = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'));


//                 console.log(staffID);
//                 SalaryPayMultipleAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryPayWithStaffID/" + staffID + "/" + month;
//             })

//     }


// }



// function paySalaryPayeUrl(staffID,month){
//     fetch(`http://localhost:80/beauty-craft/Salary/salaryPayWithStaffID/${staffID}/${month}`)
// }

// checkbox.addEventListener('change', e => {

//     if(e.target.checked){
//         //do something
//     }

// });