sProvColumnsList = document.querySelectorAll(".sProvResContainer");

getReservationData()

function getReservationData() {
    //TODO : Pass date properly
    let date = '2022-03-23';
    let offset = 0;

    fetch(`http://localhost:80/beauty-craft/Reservations/getResDailyOverviewData/${date}/${offset}`)
        .then(response => response.json())
        .then(reservationData => {
            loadData(reservationData);
        })
}

// function request


function loadData(reservationData) {
    let x = 0;

    let sProvI = 0;
    for (let sProv in reservationData) {
        let sProvData = reservationData[sProv];
        let sProvColumn = sProvColumnsList[sProvI];

        for (let reservation in sProvData) {
            let resData = sProvData[reservation];
            let sName = resData['sName'];
            let resSlots = resData['slots'];
            let resStatus = resData['status'];

            for (let i = 0; i < resSlots.length; i++) {
                resSlot = resSlots[i];
                let resBox = createResBox(resStatus, resSlot[0], resSlot[1], sName, i + 1, reservation, x);
                sProvColumnsList[sProvI].appendChild(resBox);
            }

            x++;
        }
        sProvI++;
    }
    // let resBox = createResBox();
    // console.log(reservationData);
    // sProvColumnsList[0].appendChild(resBox);
    // console.log(resBox);
}

// Creates a reservations and load data to it.
function createResBox(status, startTime, duration, service, slotNo, resID, x) {

    let endTime = parseInt(startTime) + parseInt(duration);
    const statusColors = {
        1: '#FFBF02', // Pending
        2: '#1BC657', // Confirmed
        3: '#50515A', // No Show
        4: '#50515A', // Completed
        5: '#DA2346' // Recalled
    };

    const resIDColours = ['#FF8B4A', '#139AD3', '#9A4AFF', '#FF006B', '#FEA828'];

    let resBox = document.createElement("div");
    resBox.style.left = 0 + 'px';
    resBox.style.top = (startTime - 540) * 2 + 'px';
    resBox.style.height = duration * 2 + 'px';
    resBox.classList.add("resBox");

    let resBoxInner = document.createElement("div");
    resBoxInner.classList.add("resBoxInner");
    resBox.appendChild(resBoxInner);

    let statusSection = document.createElement("div");
    statusSection.classList.add("statusSection");
    resBoxInner.appendChild(statusSection);
    statusSection.style.backgroundColor = statusColors[status];

    let infoSection = document.createElement("div");
    infoSection.classList.add("infoSection");
    resBoxInner.appendChild(infoSection);

    let timeSpan = document.createElement("span");
    timeSpan.classList.add("time");
    timeSpan.textContent = minsToTime(startTime) + ' - ' + minsToTime(endTime);
    infoSection.appendChild(timeSpan);

    let serviceSpan = document.createElement("span");
    serviceSpan.classList.add("service");
    serviceSpan.textContent = service + ' - ' + slotNo;
    infoSection.appendChild(serviceSpan);

    let idSection = document.createElement("div");
    idSection.classList.add("idSection");
    resBoxInner.appendChild(idSection);
    let resIDSpan = document.createElement("span");
    resIDSpan.classList.add("alphanumeric");
    resIDSpan.textContent = 'R' + resID;
    resIDSpan.style.backgroundColor = resIDColours[x % 5];
    idSection.appendChild(resIDSpan);

    return resBox;
}

function minsToTime(timeInMins) {
    let hours24 = Math.floor(timeInMins / 60);
    let suffix = (hours24 >= 12) ? "PM" : "AM";
    let hours12 = (hours24 > 12) ? hours24 - 12 : hours24;
    let mins12 = timeInMins % 60;
    let time = hours12.toString().padStart(2, '0') + ':' + mins12.toString().padStart(2, '0') + suffix;
    return time;
}

// public static function minsToTime($timeInMins)
//    {
//       $hours24 = intdiv($timeInMins, 60);
//       $suffix = ($hours24 >= 12) ? " PM" : " AM";
//       $hours12 = ($hours24 > 12) ? $hours24 - 12 : $hours24;
//       $mins12 = $timeInMins % 60;
//       $time = str_pad($hours12, 2, "0", STR_PAD_LEFT) . ':' . str_pad($mins12, 2, "0", STR_PAD_LEFT) . $suffix;
//       return $time;
//    }
