/****************** Scripts related to add new reservation *******************/

const custError = document.querySelector(".cust-error");
const walkinToggle = document.querySelector(".walkin-status .togglecheckbox-dd");
const dateSelector = document.querySelector(".dateSelect");
const dateError = document.querySelector(".date-error");
const serviceSelector = document.querySelector(".serviceSelect");
const serviceError = document.querySelector(".service-error");
const sProviderSelector = document.querySelector(".serviceProviderSelect");
const sProvError = document.querySelector(".sProv-error");
const startTimeSelector = document.querySelector(".startTimeSelect");
const sTimeError = document.querySelector(".sTime-error");
const remarksInput = document.querySelector(".remarks");
const remarksError = document.querySelector(".remarks-error");
const serviceDurationBox = document.querySelector(".durationBox");

const addResBtnCust = document.querySelector(".addResBtnCust");
const addResBtnRecept = document.querySelector(".addResBtnRecept");

let startTime = null;
let selectedDate = null;
let selectedService = null;

// Initially variables are updated on page load
selectedDate = (!dateSelector.value) ? null : dateSelector.value;
selectedService = (!serviceSelector) ? null : serviceSelector.value;
startTime = (!startTimeSelector) ? null : startTimeSelector.value;

// performing checks on page load
updateStartTime();
checkDate();
updateServiceDuration();
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

// Change of service
serviceSelector.addEventListener("change", function () {
	selectedService = serviceSelector.value;
	checkSelected(serviceSelector, serviceError); // Updating the error
	updateServiceDuration(); // Updating service duration
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

// trigger the below function in dateupdates and service updates accordingly
function updateServiceProvidersList() {
	fetch(`http://localhost:80/beauty-craft/Reservations/getUpdatedSProvidersList/${selectedService}/${selectedDate}/${startTime}`)
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

// Update the duration of the selected service
function updateServiceDuration() {
	if (selectedService) {
		fetch(`http://localhost:80/beauty-craft/services/getServiceDuration/${selectedService}`)
			.then((response) => response.json())
			.then((serviceDuration) => {
				serviceDurationBox.innerHTML = "";
				serviceDurationBox.text = serviceDuration;
				serviceDurationBox.value = serviceDuration;
			});
	}
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
	let sDuration = parseInt(serviceDurationBox.value);

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


// For cust place reservation
if (addResBtnCust) {
	addResBtnCust.addEventListener("click",
		async function () {
			let custID = null;
			await placeReservation(custID);

			window.location.replace("http://localhost:80/beauty-craft/custDashboard/myReservations");

		});
}


// For recept place reservation
if (addResBtnRecept) {
	addResBtnRecept.addEventListener("click",
		async function () {
			//TODO: add empty cust check here  - Done but check again
			const custNameBox = document.querySelector(".profile-info .cust-name");
			let custID = (walkinToggle.checked) ? "000001" : custNameBox.getAttribute("data-custid");
			// console.log(custID);
			if (!custID) {
				custError.innerHTML = "Select customer";
			} else {
				let response = await placeReservation(custID);

				if (response) {
					window.location.replace("http://localhost:80/beauty-craft/Reservations/viewAllReservations/all/all/all");
				}
				// else {
				// 	window.location.reload();
				// }
			}
		});
}


async function placeReservation(custID) {
	checkSelected(dateSelector, dateError);
	checkSelected(serviceSelector, serviceError);
	checkSelected(startTimeSelector, sTimeError);
	checkSelected(sProviderSelector, sProvError);

	// checkDate();
	updateSProviderAvailability();
	// console.log(checkEmpty(startTimeError));
	if (checkEmpty(sTimeError) && checkEmpty(dateError) && checkEmpty(serviceError) && checkEmpty(sProvError)) {
		console.log("All empty");

		let response = await fetch(`http://localhost:80/beauty-craft/reservations/placeReservation/${selectedService}/${sProviderSelector.value}/${selectedDate}/${startTime}/${custID}/${remarksInput.value}`);

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
