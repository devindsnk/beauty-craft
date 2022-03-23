function recallCancelReservation(btn) {
	let reservationID = btn.getAttribute("data-id");
	fetch(`http://localhost:80/beauty-craft/Reservations/recallCancelReservation/${reservationID}`)
		.then((response) => response.json())
		.then((state) => {
			if (state) {
				window.location.replace("http://localhost:80/beauty-craft/ReceptDashboard/recallRequests");
			}
		});
}

function cancelReservation(btn) {
	let reservationID = btn.getAttribute("data-id");
	fetch(`http://localhost:80/beauty-craft/Reservations/cancelReservation/${reservationID}`)
		.then((response) => response.json())
		.then((state) => {
			if (state) {
				window.location.reload();
			}
		});
}

function markReservationNoShow(btn) {
	let reservationID = btn.getAttribute("data-id");
	fetch(`http://localhost:80/beauty-craft/Reservations/markReservationNoShow/${reservationID}`)
		.then((response) => response.json())
		.then((state) => {
			if (state) {
				window.location.reload();
			}
		});
}

function markReservationConfirmed(btn) {
	let reservationID = btn.getAttribute("data-id");
	fetch(`http://localhost:80/beauty-craft/Reservations/confirmReservation/${reservationID}`)
		.then((response) => response.json())
		.then((state) => {
			if (state) {
				window.location.reload();
			}
		});
}

function markSProvOnLeave(btn) {
	let sProvID = btn.getAttribute("data-id");
	fetch(`http://localhost:80/beauty-craft/Leaves/sProvUninformedLeaveOnDate/${sProvID}`)
		.then((response) => response.json())
		.then((state) => {
			if (state) {
				window.location.reload();
			}
		});
}

function checkoutReservation(btn) {
	let reservationID = btn.getAttribute("data-id");
	fetch(`http://localhost:80/beauty-craft/Reservations/checkoutReservation/${reservationID}`)
		.then((response) => response.json())
		.then((state) => {
			if (state) {
				window.location.reload();
			}
		});
}

function provideFeedback(btn) {
	let reservationID = btn.getAttribute("data-id");
	const feedbackModal = btn.parentNode.parentNode;
	const rating = feedbackModal.querySelector(".ratingBox").value;
	const comment = feedbackModal.querySelector(".commentBox").value;

	fetch(`http://localhost:80/beauty-craft/Reservations/provideFeedback/${reservationID}/${rating}/${comment}`)
		.then((response) => response.json())
		.then((state) => {
			window.location.reload();
		});
}
