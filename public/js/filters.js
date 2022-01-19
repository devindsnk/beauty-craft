console.log("hi staff");
//************* Filters of Receptionis Daily View **************//

const dailyViewFilterBtn = document.getElementById("filterDailyViewBtn");

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

function filterReservationsSpReservation() {
    console.log("filter function called");
    const rTypeSelectorSP = document.getElementById("rTypeSelectorSP");
    console.log(rTypeSelectorSP.value);

    window.location.replace(`http://localhost/beauty-craft/SerProvDashboard/reservations/${rTypeSelectorSP.value}`);
}

function filterLeavesSpAndRecep() {
    console.log("filter  leave function called");
    const lTypeSelectorSP = document.getElementById("lTypeLeaveData");
    console.log(lTypeSelectorSP.value);
    const lStatusSelectorSP = document.getElementById("lStatusLeaveData");
    console.log(lStatusSelectorSP.value);

    window.location.replace(`http://localhost/beauty-craft/Leaves/leaves/${lTypeSelectorSP.value}/${lStatusSelectorSP.value}`);


}

//**************************************************************//

//*************** Filters of Receptionist Sales ****************//

const salesFilterBtn = document.getElementById("salesFilterBtn");
const iTypeSelector = document.getElementById("iTypeSelector");
const statusSelector = document.getElementById("statusSelector");
let selectedType = null;

if (salesFilterBtn) {
    setupInvoiceStatusSelector();
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



//************ Filters of Staff members table ***************//

const allStaffFilterBtn = document.getElementById("allStaffFilterBtn");
console.log("hi staff filters");
if (allStaffFilterBtn) {
    allStaffFilterBtn.addEventListener("click", () => {
        const sTypeSelector = document.getElementById("sTypeSelector");
        // const staffSelector = document.getElementById("staffSelector");
        const statusSelector = document.getElementById("statusSelector");

        let sTypeSelected = sTypeSelector.value;
        let staffNameSelected = staffNameSelector.value;
        let statusSelected = statusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/Staff/viewAllStaffMembers/${sTypeSelected}/${statusSelected}`);
    });
}



//************ Filters of Staff members salary table ***************//

const allStaffFilterBtn = document.getElementById("allSalaryFilterBtn");
console.log("hi staff filters");
if (allStaffFilterBtn) {
    allStaffFilterBtn.addEventListener("click", () => {
        const sTypeSelector = document.getElementById("sMonthSelector");
        const staffSelector = document.getElementById("sTypeSelector");
        const statusSelector = document.getElementById("statusSelector");

        let sTypeSelected = sTypeSelector.value;
        let staffNameSelected = staffNameSelector.value;
        let statusSelected = statusSelector.value;

        window.location.replace(`http://localhost:80/beauty-craft/Staff/viewAllStaffMembers/${sTypeSelected}/${statusSelected}`);
    });
}
