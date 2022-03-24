//************* Filters of Receptionis Daily View **************//
console.log('filter file connected');
if(document.getElementById("filterDailyViewBtn")){
const dailyViewFilterBtn = document.getElementById("filterDailyViewBtn");
}


if (dailyViewFilterBtn) {
    dailyViewFilterBtn.addEventListener("click", () => {
        const datePicker = document.getElementById("datePicker");
        const staffSelector = document.getElementById("staffSelector");
        let dateSelected = datePicker.value;
        let staffIDSelected = staffSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/ReceptDashboard/dailyView/${dateSelected}/${staffIDSelected}`);
    });
}

//**************************************************************//
//*************** Filters of Common Reservation ****************//
//**************************************************************//


const allResFilterBtn = document.getElementById("allResFilterBtn");

if (allResFilterBtn) {
    allResFilterBtn.addEventListener("click", () => {
        const sTypeSelector = document.getElementById("sTypeSelector");
        const staffSelector = document.getElementById("staffSelector");
        const statusSelector = document.getElementById("statusSelector");

        let sTypeSelected = sTypeSelector.value;
        let staffIDSelected = staffSelector.value;
        let statusSelected = statusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/Reservations/viewAllReservations/${sTypeSelected}/${staffIDSelected}/${statusSelected}`);
    });
}

//**************************************************************//

//************ Filters of SProvider Reservations ***************//

const leaveSelectorBtn = document.getElementById("SPleaveFilteerBtn").value;
const lTypeSelectorSP = document.getElementById("lTypeLeaveData").value;
const lStatusSelectorSP = document.getElementById("lStatusLeaveData").value;
let leaveSelectedType=null;
console.log(lTypeSelectorSP);

if(leaveSelectorBtn){
setupLeaveStatusSelector();
}


// lStatusSelectorSP.disabled = true;
function initializeLeavestatusSelector() {
    console.log("value changed");
    const lTypeSelectorSP = document.getElementById("lTypeLeaveData").value;
    const lStatusSelectorSP = document.getElementById("lStatusLeaveData").value;
    console.log(lTypeSelectorSP);
    
    setupLeaveStatusSelector();

    if (lTypeSelectorSP != "all") {
        lStatusSelectorSP.options[1].selected = true;
    }
}

function setupLeaveStatusSelector() {
   
const lTypeSelectorSP = document.getElementById("lTypeLeaveData").value;
const lStatusSelectorSP = document.getElementById("lStatusLeaveData");

  if (lTypeSelectorSP != "all") {
        lStatusSelectorSP.disabled = false;
        lStatusSelectorSP.options[0].hidden = true;
        lStatusSelectorSP.options[1].hidden = false;

        if (lTypeSelectorSP == "1") {
            // console.log("value 1");
            lStatusSelectorSP.options[0].hidden = true; //all
            lStatusSelectorSP.options[1].hidden = false; //approved
            lStatusSelectorSP.options[2].hidden = false; //pending
            lStatusSelectorSP.options[3].hidden = false; //reject
            lStatusSelectorSP.options[4].hidden = false; //rejected medical
            

        } else {
            //  console.log("value 2");
            lStatusSelectorSP.options[0].hidden = false;
            lStatusSelectorSP.options[1].hidden = false;
            lStatusSelectorSP.options[2].hidden = false;
            lStatusSelectorSP.options[3].hidden = false;
            lStatusSelectorSP.options[4].hidden = true;
            
            
        }
        console.log(lStatusSelectorSP.value);
    } else {
        lStatusSelectorSP.options[0].selected = true;
        lStatusSelectorSP.disabled = true;
    }
}
//************ Filters of SProvider Leaves ***************//

// if(document.getElementById("lTypeLeaveData")){
// const lTypeSelectorSP = document.getElementById("lTypeLeaveData");
// const lStatusSelectorSP = document.getElementById("lStatusLeaveData");
// console.log(lTypeSelectorSP.value);
// }

function filterLeavesSpAndRecep() {
    console.log("filter function called");
    const lTypeSelectorSP = document.getElementById("lTypeLeaveData");
    console.log(lTypeSelectorSP.value);
    console.log("filter  leave function called");
    const lStatusSelectorSP = document.getElementById("lStatusLeaveData");
    console.log(lStatusSelectorSP.value);

    // if(lTypeSelectorSP.value==2){
    
    //     if (opt.value == "StackOverflow") {
    //     opt.disabled = true;

    // }
    
    // }
    window.location.replace(`http://localhost/beauty-craft/Leaves/leaves/${lTypeSelectorSP.value}/${lStatusSelectorSP.value}`);


}
<<<<<<< HEAD
function filterReservation() {
    console.log("filter reservatuion");
}
=======
// function filterReservation(){
//     console.log("filter reservatuion");
// }



>>>>>>> bfa900de78a12004f3a3244eb81ffba3a9c6cbee

//**************************************************************//

//*************** Filters of Receptionist Sales ****************//

const salesFilterBtn = document.getElementById("salesFilterBtn");
const iTypeSelector = document.getElementById("iTypeSelector");
const statusSelector = document.getElementById("statusSelector");
let selectedType = null;

if (salesFilterBtn) {
    setupInvoiceStatusSelector();
}
function initializeInvoiceStatusSelector() {
    setupInvoiceStatusSelector();

    if (selectedType != "all") {
        statusSelector.options[1].selected = true;
    }
}

// Sets up required status option on load based on type
function setupInvoiceStatusSelector() {
    selectedType = iTypeSelector.value;
    if (selectedType != "all") {
        statusSelector.disabled = false;
        statusSelector.options[0].hidden = true;
        statusSelector.options[1].hidden = false;

        if (selectedType == "1") {
            statusSelector.options[2].hidden = false;
            statusSelector.options[3].hidden = false;
            statusSelector.options[4].hidden = false;
            statusSelector.options[5].hidden = true;
            statusSelector.options[6].hidden = true;

        } else {
            statusSelector.options[2].hidden = true;
            statusSelector.options[3].hidden = true;
            statusSelector.options[4].hidden = true;
            statusSelector.options[5].hidden = false;
            statusSelector.options[6].hidden = false;
        }

    } else {
        statusSelector.options[0].selected = true;
        statusSelector.disabled = true;
    }
}

// Handles onchange events of type selector
function initializeInvoiceStatusSelector() {
    setupInvoiceStatusSelector();

    if (selectedType != "all") {
        statusSelector.options[1].selected = true;
    }
}

if (salesFilterBtn) {
    salesFilterBtn.addEventListener("click", () => {
        const iTypeSelector = document.getElementById("iTypeSelector");
        const statusSelector = document.getElementById("statusSelector");

        let iTypeSelected = iTypeSelector.value;
        let statusSelected = statusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/ReceptDashboard/sales/${iTypeSelected}/${statusSelected}`);
    });
}

//**************************************************************//

//*************** Filters of Common Services ****************//

const allServiceFilterBtn = document.getElementById("allServiceFilterBtn");

if (allServiceFilterBtn) {
    allServiceFilterBtn.addEventListener("click", () => {
        const serviceNameSelector = document.getElementById("serviceNameSelector");
        const serviceTypeSelector = document.getElementById("serviceTypeSelector");
        const serviceStatusSelector = document.getElementById("serviceStatusSelector");

        let serviceNameSelected = serviceNameSelector.value;
        let serviceTypeSelected = serviceTypeSelector.value;
        let serviceStatusSelected = serviceStatusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/Services/viewAllServices/${serviceNameSelected}/${serviceTypeSelected}/${serviceStatusSelected}`);
    });
}

//**************************************************************//

//*************** Filters of Manager Leave Requests Handling ****************//

const allLRequestsFilterBtn = document.getElementById("allLRequestsFilterBtn");

const lTyepeSelector = document.getElementById("leaveTypeSelector");
const lStatusSelector = document.getElementById("leaveStatusSelector");
let selectedLeaveType = null;

if (allLRequestsFilterBtn) {
    setupLeaveRequestStatusSelector();
}

function initializeMangLeaveTypeSelector() {
    setupLeaveRequestStatusSelector();
}

function setupLeaveRequestStatusSelector() {
    selectedLeaveType = lTyepeSelector.value;

    if (selectedLeaveType == "1") {
        lStatusSelector.options[2].hidden = false;
        lStatusSelector.options[1].hidden = false;
        lStatusSelector.options[3].hidden = false;
        lStatusSelector.options[4].hidden = false;
    } else {
        lStatusSelector.options[2].hidden = false;
        lStatusSelector.options[1].hidden = false;
        lStatusSelector.options[3].hidden = false;
        lStatusSelector.options[4].hidden = true;
    }
}

if (allLRequestsFilterBtn) {
    allLRequestsFilterBtn.addEventListener("click", () => {
        console.log('fdffdf');
        const sProvSelector = document.getElementById("sProvSelector");
        const leaveDateSelector = document.getElementById("leaveDateSelector");
        const managerSelector = document.getElementById("managerSelector");
        const leaveTypeSelector = document.getElementById("leaveTypeSelector");
        const leaveStatusSelector = document.getElementById("leaveStatusSelector");

        let sProvSelected = sProvSelector.value;
        let leaveDateSelected = leaveDateSelector.value;
        let managerSelected = managerSelector.value;
        let leaveTypeSelected = leaveTypeSelector.value;
        let leaveStatusSelected = leaveStatusSelector.value;

        if (!leaveDateSelected) {
            leaveDateSelected = 'all';
        }

        window.location.replace(`http://localhost:80/beauty-craft/MangDashboard/leaveRequests/${sProvSelected}/${leaveDateSelected}/${managerSelected}/${leaveTypeSelected}/${leaveStatusSelected}`);
    });
}

//**************************************************************//

//*************** Filters of Common Manager Take Leave ****************//

const allTakenLeavesFilterBtn = document.getElementById("allTakenLeavesFilterBtn");

if (allTakenLeavesFilterBtn) {
    allTakenLeavesFilterBtn.addEventListener("click", () => {
        const leaveTypeMSelector = document.getElementById("leaveTypeSelector");
        const leaveDateMSelector = document.getElementById("leaveDateSelector");
        const markedDateMSelector = document.getElementById("markedDateSelector");

        let leaveTypeMSelected = leaveTypeMSelector.value;
        let leaveDateMSelected = leaveDateMSelector.value;
        let markedDateMSelected = markedDateMSelector.value;

        if (!leaveDateMSelected) {
            leaveDateMSelected = 'all';
        }
        if (!markedDateMSelected) {
            markedDateMSelected = 'all';
        }

        window.location.replace(`http://localhost:80/beauty-craft/MangDashboard/takeLeave/${leaveTypeMSelected}/${leaveDateMSelected}/${markedDateMSelected}`);
    });
}

//**************************************************************//


//************ Filters of Staff members table ***************//

const allStaffFilterBtn = document.getElementById("allStaffFilterBtn");
// console.log("hi staff filters");
if (allStaffFilterBtn) {
    allStaffFilterBtn.addEventListener("click", () => {
        const sTypeSelector = document.getElementById("sTypeSelector");
        const staffNameSelector = document.getElementById("staffNameSelector");
        const statusSelector = document.getElementById("statusSelector");

        let sTypeSelected = sTypeSelector.value;
        
        let x = staffNameSelector.value;
        let staffNameSelected = (x =="")? "all" : x;
        console.log(staffNameSelected);
        let statusSelected = statusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/Staff/viewAllStaffMembers/${sTypeSelected}/${statusSelected}/${staffNameSelected}`);
    });
}

//************ Filters of Resources table ***************//

const allResourcesFilterBtn = document.getElementById("allResourcesFilterBtn");
// console.log("hi staff filters");
if (allResourcesFilterBtn) {
    allResourcesFilterBtn.addEventListener("click", () => {
        console.log("resource filters");
        const resourceNameInput = document.getElementById("resourceNameInput");
        const resourceIDInput = document.getElementById("resourceIDInput");
        // const statusSelector = document.getElementById("statusSelector");
<<<<<<< HEAD

        let resourceNameInputTyped = resourceNameInput.value;
        let resourceIDInputTyped = resourceIDInput.value;
        console.log(resourceNameInputTyped);
        console.log(resourceIDInputTyped);
=======
        let x = resourceNameInput.value;
        let y = resourceIDInput.value;
        let resourceNameInputTyped = (x == "")? "all":x;
        let resourceIDInputTyped = (y == "")? "all":y;
        // console.log(x);
        // console.log( resourceNameInputTyped);
        // console.log(y);
>>>>>>> bfa900de78a12004f3a3244eb81ffba3a9c6cbee
        // let statusSelected = statusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/Resources/viewAllResources/${resourceNameInputTyped}/${resourceIDInputTyped}`);
    });
}

//************ Filters of Staff members salary table ***************//

const allPurchaseRecordsFilterBtn = document.getElementById("allPurchaseRecordsFilterBtn");
if (allPurchaseRecordsFilterBtn) {
    allPurchaseRecordsFilterBtn.addEventListener("click", () => {
        const manufacturerNameInput = document.getElementById("manufacturerNameInput");
        // console.log(allPurchaseRecordsFilterBtn.dataset.resourceid);
        let resourceID = allPurchaseRecordsFilterBtn.dataset.resourceid;
        let a = manufacturerNameInput.value;        
        let manufacturerNameInputTyped = (a == "")? "all" : a;
          
        console.log(manufacturerNameInputTyped);
        console.log(resourceID);
        window.location.replace(`http://localhost:80/beauty-craft/Resources/viewResources/${resourceID}/${manufacturerNameInputTyped}`);
    });
}


//************ Filters of Customers table ***************//

const allCustomersFilterBtn = document.getElementById("allCustomersFilterBtn");
// console.log("hi customer filters");
if (allCustomersFilterBtn) {
    allCustomersFilterBtn.addEventListener("click", () => {
        console.log("customers filters");
        const cusNameInput = document.getElementById("cusNameInput");
        const cusCotactInput = document.getElementById("cusContactInput");
        const statusSelector = document.getElementById("statusSelector");
     
        let x = cusNameInput.value;
        let y = cusCotactInput.value;
        let cusNameInputTyped = (x=="")? "all": x;
        let cusCotactInputTyped = (y=="")? "all":y;

        console.log(cusNameInputTyped);
        console.log(cusCotactInputTyped);
        let statusSelected = statusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/Customer/viewAllCustomers/${cusNameInputTyped}/${cusCotactInputTyped}/${statusSelected}`);
    });
}


//************ Filters of Staff members salary table ***************//

const allSalaryFilterBtn = document.getElementById("allSalaryFilterBtn");
// console.log("hi salary filters");
if (allSalaryFilterBtn) {
    allSalaryFilterBtn.addEventListener("click", () => {
        // console.log("salaries");
        const staffNameInput = document.getElementById("staffNameInput");
        const staffIDInput = document.getElementById("staffIDInput");
        const paidTypeSelector = document.getElementById("paidTypeSelector");
        const sMonthSelector = document.getElementById("sMonthSelector");
        // const statusSelector = document.getElementById("statusSelector");

        let x = staffNameInput.value;
        let y = staffIDInput.value;
        let z = sMonthSelector.value;
        let paidTypeSelected = paidTypeSelector.value;
        let staffNameTyped = (x == "")? "all" : x;
        let staffIDTyped = (y =="")? "all" : y;
        let monthSelected = (z =="")? "all" : z;
        
        console.log("salary filters");
        console.log(staffNameTyped);
        console.log(staffIDTyped);
        console.log(paidTypeSelected);
        console.log(monthSelected);
        window.location.replace(`http://localhost:80/beauty-craft/Salary/salaryTableView/${staffNameTyped}/${staffIDTyped}/${paidTypeSelected}/${monthSelected}`);
    });
}


//************ Filters of close salon table ***************//

const allCloseDateInputFilter = document.getElementById("allCloseDateInputFilter");
if (allCloseDateInputFilter) {
    allCloseDateInputFilter.addEventListener("change", () => {
        let z = allCloseDateInputFilter.value;
        let monthSelected = (z =="0000-00")? "all" : z;
        console.log("close salon");
        console.log(monthSelected);
        window.location.replace(`http://localhost:80/beauty-craft/OwnDashboard/closeSalon/${monthSelected}`);
    });
}

