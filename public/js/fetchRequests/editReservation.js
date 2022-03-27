const dateSelector = document.querySelector(".dateSelect");
const dateError = document.querySelector(".date-error");
const sProviderSelector = document.querySelector(".serviceProviderSelect");
const sProvError = document.querySelector(".sProv-error");
const startTimeSelector = document.querySelector(".startTimeSelect");
const sTimeError = document.querySelector(".sTime-error");
const remarksInput = document.querySelector(".remarks");
const remarksError = document.querySelector(".remarks-error");
const serviceDurationBox = document.querySelector(".durationBox");
const reservationBox = document.querySelector(".reservationBox");

const editResBtnRecept = document.querySelector(".editResBtnRecept");

let reservationID = reservationBox.getAttribute("data-resID");
console.log(reservationID);
let startTime = null;
let selectedDate = null;
let selectedService = document.querySelector(".serviceSelect").getAttribute("data-serviceID");

// Initially variables are updated on page load
selectedDate = (!dateSelector.value) ? null : dateSelector.value;
startTime = (!startTimeSelector) ? null : startTimeSelector.value;

// performing checks on page load
updateStartTime();
checkDate();
performChecksAndUpdates();

// Change of date
dateSelector.addEventListener("change", function () {
    selectedDate = dateSelector.value;
    selectedDate = (!selectedDate) ? null : selectedDate; // Resolves the empty date issue TODO:Check this
    checkSelected(dateSelector, dateError); // Updating the error
    checkDate(); // Checking availability of the date
    updateStartTime();
    performChecksAndUpdates();
});

// Change of sTime
startTimeSelector.addEventListener("change", function () {
    startTime = startTimeSelector.value;
    checkSelected(startTimeSelector, sTimeError);
    performChecksAndUpdates();
});

// Change of sProvider
sProviderSelector.addEventListener("change", function () {
    checkSelected(sProviderSelector, sProvError);
    updateSProviderAvailability();
});

function performChecksAndUpdates() {
    if (selectedService && selectedDate && startTime) {
        checkResourcesAvailability();
    }
    if (selectedService) {
        updateServiceProvidersList();
    }
}

function updateServiceProvidersList() {
    fetch(`http://localhost:80/beauty-craft/Reservations/getUpdatedSProvidersListForEdit/${selectedService}/${selectedDate}/${startTime}/${reservationID}`)
        .then((response) => response.json())
        .then((sProvidersList) => {
            // Adding default option
            sProviderSelector.innerHTML = "";
            var option = document.createElement("option");
            option.text = "Select";
            option.disabled = true;
            option.selected = true;
            option.value = "";
            sProviderSelector.appendChild(option);

            // Adding service providers
            for (const staffID in sProvidersList) {
                let sProvider = sProvidersList[staffID];
                let option = document.createElement("option");
                let errorText = (sProvider.leave || sProvider.occupied) ? "⚠ " : "";
                // if(sProvider.leave) console.log(staffID + " " + sProvider.name + " is on LEAVE");
                // if(sProvider.occupied) console.log(staffID + " " + sProvider.name + " is OCCUPIED");
                option.text = errorText + sProvider.name;
                option.value = staffID;

                if (sProvider.leave) {
                    option.setAttribute("data-leave", 1);
                } else {
                    option.setAttribute("data-leave", 0);
                }

                if (sProvider.occupied) {
                    option.setAttribute("data-occupied", 1);
                } else {
                    option.setAttribute("data-occupied", 0);
                }

                sProviderSelector.appendChild(option);
            }

            sProvError.innerHTML = "";
        });
}

// Update the error accordingly to the selected SProvider
function updateSProviderAvailability() {
    if (sProviderSelector[sProviderSelector.selectedIndex].getAttribute("data-leave") == 1)
        sProvError.innerHTML = `Service provider is not available on ${dateSelector.value}.`;
    else if (sProviderSelector[sProviderSelector.selectedIndex].getAttribute("data-occupied") == 1)
        sProvError.innerHTML = "Service provider is already occupied.";
}




// Update the closed state of the selected date
function checkDate() {
    if (selectedDate) {
        fetch(`http://localhost:80/beauty-craft/Reservations/checkIfDatePossible/${selectedDate}`)
            .then((response) => response.json())
            .then((state) => {
                dateError.innerHTML = state;
            });
    }
}

// Check the availability of resources based on service, date, time
function checkResourcesAvailability() {
    fetch(`http://localhost:80/beauty-craft/reservations/checkResourcesAvailability/${selectedService}/${selectedDate}/${startTime}`)
        .then((response) => response.json())
        .then((eligibility) => {
            if (eligibility == 0) {
                serviceError.innerHTML = "Selected service can not be provided at the selected time.";
            }
        });
}

function updateStartTime() {
    let today = new Date();
    let d1 = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 5, 30, 0); // time is set to 5:30
    let d2 = new Date(selectedDate);
    let closeTime = 20 * 60 + 0;
    let sDuration = parseInt(serviceDurationBox.getAttribute("data-duration"));

    if (d1.getTime() === d2.getTime()) {
        let curTimeInMins = today.getHours() * 60 + today.getMinutes();

        for (var i = 0; i < startTimeSelector.length; i++) {
            let sTimeOption = startTimeSelector.options[i];
            let sTime = parseInt(sTimeOption.value);

            if ((sTime < curTimeInMins + 30) || (sTime + sDuration > closeTime)) {
                sTimeOption.disabled = true;
            }
        }
    } else {
        for (var i = 0; i < startTimeSelector.length; i++) {
            let sTimeOption = startTimeSelector.options[i];
            let sTime = parseInt(sTimeOption.value);

            if (sTime + sDuration > closeTime) {
                sTimeOption.disabled = true;
            } else {
                sTimeOption.disabled = false;
            }
        }
    }
    startTimeSelector.options[0].selected = true;
}

// Check empty state and update error
function checkSelected(element, errorContainer) {
    if (!element.value)
        errorContainer.innerHTML = "Select the value for the field.";
    else
        errorContainer.innerHTML = "";
}

function checkEmpty(element) {
    if (element.innerText === "")
        return true;
    else
        return false;
}

if (editResBtnRecept) {
    editResBtnRecept.addEventListener("click",
        async function () {

            let response = await editReservation();

            if (response) {
                window.location.replace("http://localhost:80/beauty-craft/Reservations/viewAllReservations/all/all/all");
            }
            // else {
            // 	window.location.reload();
            // }

        });
}

async function editReservation() {
    checkSelected(dateSelector, dateError);
    checkSelected(startTimeSelector, sTimeError);
    checkSelected(sProviderSelector, sProvError);

    // checkDate();
    updateSProviderAvailability();
    // console.log(checkEmpty(startTimeError));
    if (checkEmpty(sTimeError) && checkEmpty(dateError) && checkEmpty(sProvError)) {
        console.log("All empty");

        let response = await fetch(`http://localhost:80/beauty-craft/reservations/editReservation/${reservationID}/${sProviderSelector.value}/${selectedDate}/${startTime}/${remarksInput.value}`);

        if (response) {
            return 1;
        } else {
            return 0;
        }

    } else {
        console.log("bad");
        // return 0;
    }
}
