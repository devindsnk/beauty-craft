const staffNICInputField = document.querySelector('.staffNIC');
const NICErrorTextHolder = document.querySelector('.staffNICError');
const maleRadio = document.querySelector('.genderMale');
const femaleRadio = document.querySelector('.genderFemale');
const dobPicker = document.querySelector('.Date');

staffNICInputField.addEventListener('focusout',
    function () {
        let NIC = document.querySelector(".staffNIC").value
        validateNIC(NIC);

    }
)

function validateNIC(NIC) {
    let emptyCheck = (NIC == "");
    let formatCheckNew = (NIC.match(/^[0-9]{12}$/)) ? true : false;
    let formatCheckOld = (NIC.match(/^[0-9]{9}[V|X]$/)) ? true : false;
    console.log(emptyCheck);
    console.log(formatCheckOld);
    console.log(formatCheckNew);
    if (!emptyCheck && !formatCheckOld && !formatCheckNew) {
        console.log("Invalid");
        NICErrorTextHolder.textContent = "Invalid NIC format.";
        dobPicker.value = null;
        maleRadio.checked = false;
        femaleRadio.checked = false;

    } else {
        console.log("Valid");
        NICErrorTextHolder.textContent = "";
        getNICData(NIC);
    }
}
// function validateNIC($value)
// {
//    $emptyCheckResponse = emptyCheck($value);
//    if ($emptyCheckResponse == "" && !preg_match("/^[0-9]{12}$/", $value) && !preg_match("/^[0-9]{9}[V|X]$/", $value))
//    {
//       return "Invalid NIC format.";
//    }
//    else return $emptyCheckResponse;
// }


function getNICData(NIC) {
    let dateText = null;
    let year = null;
    let month = null;
    let date = null;
    let gender = null;

    if (NIC.length == 10) {
        year = "19" + NIC.substr(0, 2);
        dayVal = parseInt(NIC.substr(2, 3));
    } else if (NIC.length == 12) {
        year = NIC.substr(0, 4);
        dayVal = parseInt(NIC.substr(4, 3));
    }

    gender = (dayVal > 500) ? "Female" : "Male";
    dateText = (dayVal > 500) ? dayVal - 500 : dayVal;

    let dateSum = [0, 31, 60, 91, 121, 152, 182, 213, 244, 274, 305, 335, 366]
    let months = [01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12];

    for (let m = 0; m < dateSum.length; m++) {
        if (dateText <= dateSum[m]) {
            date = dateText - dateSum[m - 1];
            month = months[m - 1];
            break;
        }
    }

    // console.log("Bday: ", year, month, date);
    // console.log("Gender: ", gender);
    if (gender == "Male") {
        maleRadio.checked = true;
    } else if (gender == "Female") {
        femaleRadio.checked = true;
    }

    const d = new Date();
    d.setFullYear(year, month, date);
    // var dd = year + "-" + month "-" date ;
    var dob = `${year}-${String(month).padStart(2,'0')}-${String(date).padStart(2,'0')}`
    dobPicker.value = dob;

    // document.querySelector('.Date').innerHTML = $("#dateOfBirth").datepicker('setDate', new Date(year,month,date));
    // $("#dateOfBirth").datepicker('setDate', new Date(year,month,date));

}
