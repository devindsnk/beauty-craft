// const sProveChecker = document.querySelector(".sProvCheckBoxes");
const sProveChecker = Array.from(document.querySelectorAll('input[type="checkbox"]:checked[name="serProvCheckbox[]"]'));
// const sID = sProveChecker.dataset.sID;
const recallFromUpdateServiceModal = document.querySelector(".recall-reservation-from-update-service");
const recallFromUpdateServiceBtn = document.querySelectorAll(".sProvCheckBoxes");
const recallModel = document.querySelector(".recallModal");

for (var i = 0; i < sProveChecker.length; i++) {
    // let myArray = JSON.parse(sProveChecker[i].value);
    let sProvID = sProveChecker[i].value;
    let sID =sProveChecker[i].dataset.columns;

    console.log(sProvID);
    console.log(sID);

    // console.log(sProveChecker[i].dataset.columns );

    sProveChecker[i].addEventListener('change',
        function () {
            if(!this.checked) {
                // console.log('myArray');
                // console.log(sProvID);

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

                console.log(serProvDetails);
                // console.log(serProvDetails[0]['reservationID']);

                const ress = [];
                const ressReson = 'For update the service';

                for (var i = 0; i < serProvDetails.length; i++){
                    ress.push(serProvDetails[i]['reservationID']);
                }
                // console.log(ress);
                // recallModel.href = "http://localhost/beauty-craft/Services/updateService/"+myArray[1]+"/"+[ress]+"/"+ressReson;

                if(serProvDetails.length !== 0){
                    recallFromUpdateServiceBtn.forEach((btn) => {
                            modalToToggle = recallFromUpdateServiceModal;
                            toggleModal();
                    });
                }
                recallModel.addEventListener('click',
                    function () {
                        // console.log('recall1');

                        recallReservations(ress, ressReson);
                        // removeFromService(myArray[1]);
                    }
                )

                // console.log(recallModel);

                // document.body.appendChild(recallModel);
                
                // if (recallFromUpdateServiceBtn) {
                //     recallFromUpdateServiceBtn.addEventListener("click",
                //         function () {
                //             modalToToggle = recallFromUpdateServiceModal;
                //             toggleModal();
                //         }
                //     );
                // }
                // console.log("Hello world! 6");

            // }
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
//  function removeFromService(ress, ressReson) {
//     console.log('recall2');
//     fetch(`http://localhost:80/beauty-craft/Reservations/recallReservationsFromUpdateService/${ress}/${ressReson}`)
//        .then(response => response.json())
   
//  }
 
// sProveChecker.addEventListener('change',
//    function () {
//         if(!this.checked) {
//             console.log('myArray');
//             checkForUpcomingReservations();
//         }
//         // if (this.checked) {
//         //     console.log("Checkbox is checked..");
//         //   } else {
//         //     console.log("Checkbox is not checked..");
//         //   }
//    }
// )
// var modalToToggle = null;
// function checkForUpcomingReservations()
// {
//     console.log("Hello world! 5");
//     console.log('ll');

//     fetch(`http://localhost:80/beauty-craft/Services/getCheckedSPRovList/${myArray[0]}/${myArray[1]}`)
//         .then(response => response.json())
//         .then(serProvDetails => {
//             // if(serProvDetails !== null){
            
//             recallFromUpdateServiceBtn.forEach((btn) => {
//                 // btn.addEventListener("click", function () {
//                     modalToToggle = recallFromUpdateServiceModal;
//                     toggleModal();
//                 // });
//             });
//             console.log("Hello world! 6");

//             console.log(serProvDetails);
//         // }
//     });
// }
