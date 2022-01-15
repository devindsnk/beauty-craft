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


 function filterReservationsSpReservation() {
    console.log("filter function called");
    const rTypeSelectorSP =  document.getElementById("rTypeSelectorSP");
    console.log(rTypeSelectorSP.value);

    window.location.replace(`http://localhost/beauty-craft/SerProvDashboard/reservations/${rTypeSelectorSP.value}`);
}

function filterLeavesSpAndRecep() {
    console.log("filter  leave function called");
    const lTypeSelectorSP =  document.getElementById("lTypeLeaveData");
    console.log(lTypeSelectorSP.value);
    const lStatusSelectorSP =  document.getElementById("lStatusLeaveData");
    console.log(lStatusSelectorSP.value);

    window.location.replace(`http://localhost/beauty-craft/Leaves/leaves/${lTypeSelectorSP.value}/${lStatusSelectorSP.value}`);

    
}
// const salesFilterBtn = document.getElementById("salesFilterBtn");

// if (salesFilterBtn) {
//     salesFilterBtn.addEventListener("click", () => {
//         const iTypeSelector = document.getElementById("iTypeSelector");
//         const statusSelector = document.getElementById("statusSelector");

//         let iTypeSelected = iTypeSelector.value;
//         let statusSelected = statusSelector.value;

//         window.location.replace(`http://localhost:80/beauty-craft/Reservations/viewAllReservations/${sTypeSelected}/${staffIDSelected}/${statusSelected}`);
//     });
// }
