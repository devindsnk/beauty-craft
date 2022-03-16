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