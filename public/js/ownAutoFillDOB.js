console.log("nic");
const staffNICInputField = document.querySelector('.staffNIC');

staffNICInputField.addEventListener('change',
function(){
    let NIC = document.querySelector(".staffNIC").value
    console.log(NIC);
    getNICData(NIC);
}
)


function getNICData(NIC) {
    let dateText = null;
    let year = null;
    let month = null;
    let date = null;
    let gender = null;

    if (NIC.length == 10) {
        year = "19" + NIC.substr(0, 2);
        dayVal = parseInt(NIC.substr(2, 3));
    } else {
        year = NIC.substr(0, 4);
        dayVal = parseInt(NIC.substr(4, 3));
    }

    gender = (dayVal > 500) ? "Female" : "Male";
    dateText = (dayVal > 500) ? dayVal - 500 : dayVal;

    let dateSum = [0, 31, 60, 91, 121, 152, 182, 213, 244, 274, 305, 335, 366]
    let months = [01,02,03,04,05,06,07,08,09,10,11,12];

    for (let m = 0; m < dateSum.length; m++) {
        if (dateText <= dateSum[m]) {
            date = dateText - dateSum[m - 1];
            month = months[m - 1];
            break;
        }
    }

    console.log("Bday: ", year, month, date);
    console.log("Gender: ", gender);
    if (gender == "Male"){
        document.querySelector('.genderMale').checked = true;
    }
    else if (gender == "Female"){
        document.querySelector('.genderFemale').checked = true;
    }

    const d = new Date();
    d.setFullYear(year, month, date);
    var gg = document.querySelector('.Date')
    console.log(gg);
    // var dd = year + "-" + month "-" date ;
    var dob = `${year}-${String(month).padStart(2,'0')}-${String(date).padStart(2,'0')}`
    console.log(dob);
    gg.value = dob;
     
    // document.querySelector('.Date').innerHTML = $("#dateOfBirth").datepicker('setDate', new Date(year,month,date));
    // $("#dateOfBirth").datepicker('setDate', new Date(year,month,date));
    
}
