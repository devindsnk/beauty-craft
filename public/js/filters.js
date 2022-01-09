const dailyViewFilterBtn = document.getElementById("filterDailyViewBtn");

if(dailyViewFilterBtn){
    dailyViewFilterBtn.addEventListener("click",()=>{
        const datePicker =  document.getElementById("datePicker");
        const staffSelector = document.getElementById("staffSelector");
        let dateSelected = datePicker.value;
        let staffIDSelected = staffSelector.value;
    
        window.location.replace(`http://localhost:80/beauty-craft/ReceptDashboard/dailyView/${dateSelected}/${staffIDSelected}`);
    });
}


const allResFilterBtn = document.getElementById("allResFilterBtn");

if(allResFilterBtn){
    allResFilterBtn.addEventListener("click",()=>{
        const sTypeSelector =  document.getElementById("sTypeSelector");
        const staffSelector = document.getElementById("staffSelector");
        const statusSelector =  document.getElementById("statusSelector");

        let sTypeSelected = sTypeSelector.value;
        let staffIDSelected = staffSelector.value;
        let statusSelected = statusSelector.value;
    
        window.location.replace(`http://localhost:80/beauty-craft/Reservations/viewAllReservations/${sTypeSelected}/${staffIDSelected}/${statusSelected}`);
    });
}