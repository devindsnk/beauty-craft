console.log("salaries MULTIPLE");
const SalaryTablePayMultipleBtn = document.querySelector(".btnSalaryPayMultiple");
const SalaryPayMultipleAnchorTag = document.querySelector(".salaryPayMultipleAnchorTag");
let SalaryPayNowCheckbox;
var arrayStaffID = [];
var arrayMonth = [];
console.log("hhhhhhhh");


// console.log(SalaryPayNowCheckbox.length);

// SalaryPayNowCheckbox = Array.from(document.querySelectorAll('input[type="checkbox"]'));

// for (var i = 0; i < SalaryPayNowCheckbox.length; i++) {
//     SalaryPayNowCheckbox[i].addEventListener('click',
//         function () {
//             if (SalaryPayNowCheckbox[i].checked = true) {
//                 arrayStaffID.push(SalaryPayNowCheckbox[i].dataset.staffid)
//                 arrayMonth.push(SalaryPayNowCheckbox[i].dataset.month)
//             } else if (SalaryPayNowCheckbox[i].checked = false) {
//                 arrayStaffID.pop(SalaryPayNowCheckbox[i].dataset.staffid)
//             arrayMonth.pop(SalaryPayNowCheckbox[i].dataset.month)
//             }
//         })

// }


SalaryTablePayMultipleBtn.addEventListener('click',
    function () {
        SalaryPayNowCheckbox = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'));
        console.log(SalaryPayNowCheckbox.length);
        for (var i = 0; i < SalaryPayNowCheckbox.length; i++) {
            arrayStaffID.push(SalaryPayNowCheckbox[i].dataset.staffid)
            arrayMonth.push(SalaryPayNowCheckbox[i].dataset.month)
          }
          console.log(arrayStaffID);
          SalaryPayMultipleAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryPayMultipleStaffID/" + arrayStaffID + "/" + arrayMonth;   
    })


// SalaryTablePayMultipleBtn.addEventListener('click',
//     function () {
//         SalaryPayNowCheckbox = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'));
//         console.log(SalaryPayNowCheckbox.length);
//         for (var i = 0; i < SalaryPayNowCheckbox.length; i++) {
//             arrayStaffID.push(SalaryPayNowCheckbox[i].dataset.staffid)
//             arrayMonth.push(SalaryPayNowCheckbox[i].dataset.month)
//           }
//           console.log(arrayStaffID);
//         //   SalaryPayMultipleAnchorTag.href = "http://localhost:80/beauty-craft/Salary/salaryPayMultipleStaffID/" + arrayStaffID + "/" + arrayMonth;   
//           fetch(`http://localhost:80/beauty-craft/Salary/salaryPayMultipleStaffID/${arrayStaffID}/${arrayMonth}`)
//       .then()     
//     })