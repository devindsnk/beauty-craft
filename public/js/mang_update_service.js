// ...........................START UPDATE SERVICE...........................//

const sProveChecker = Array.from(document.querySelectorAll('input[type="checkbox"]:checked[name="serProvCheckbox[]"]'));
const recallFromUpdateServiceModal = document.querySelector(".recall-reservation-from-update-service");
const recallFromUpdateServiceBtn = document.querySelectorAll(".sProvCheckBoxes");
const recallbtnFromUpdate = document.querySelector(".recallModalRecallBtn");
const cancelbtnFromUpdate = document.querySelector(".recallModalCancelBtn");

for (var i = 0; i < sProveChecker.length; i++) {
    // let myArray = JSON.parse(sProveChecker[i].value);
    let sProvID = sProveChecker[i].value;
    let sID =sProveChecker[i].dataset.columns;

    checkedItem = sProveChecker[i];

    sProveChecker[i].addEventListener('change',
        function () {
            if(!this.checked) {
                // console.log('myArray');
                checkForUpcomingReservations();
            }
            // if (this.checked) {
            //     console.log("Checkbox is checked..");
            //   } else {
            //     console.log("Checkbox is not checked..");
            //   }
        }
    )
    var modalToToggle = null;
    function checkForUpcomingReservations()
    {
        // console.log("Hello world! 5");

        fetch(`http://localhost:80/beauty-craft/Services/getReservationListOfCheckedSPRovList/${sProvID}/${sID}`)
            .then(response => response.json())
            .then(serProvDetails => {

                // console.log(serProvDetails);
                // console.log(serProvDetails[0]['reservationID']);

                const ress = [];
                const ressReson = 'For update the service';

                for (var i = 0; i < serProvDetails.length; i++){
                    ress.push(serProvDetails[i]['reservationID']);
                }
                // console.log(ress);
                // recallbtn.href = "http://localhost/beauty-craft/Services/updateService/"+myArray[1]+"/"+[ress]+"/"+ressReson;

                if(serProvDetails.length !== 0){
                    recallFromUpdateServiceBtn.forEach((btn) => {
                            modalToToggle = recallFromUpdateServiceModal;
                            toggleModal();
                    });
                }
                recallbtnFromUpdate.addEventListener('click',
                    function () {
                        // console.log('recall1');

                        recallReservations(ress, ressReson);
                    }
                )
                cancelbtnFromUpdate.addEventListener('click',
                    function () {
                        // console.log('awa cancel ekat');
                        // console.log(checkedItem);

                        checkedItem.checked=true;
                        
                    }
                )
        }).catch(err => {
            // Do something for an error here
            // console.log("Error Reading data :" + err);
          });
    }
 }
 function recallReservations(ress, ressReson) {
    console.log('recall2');
    fetch(`http://localhost:80/beauty-craft/Reservations/recallReservationsFromUpdateService/${ress}/${ressReson}`)
        .then()
        .catch(err => {
            // console.log("Error Reading data :" + err);
        });
 }

// ...........................END UPDATE SERVICE...........................//

