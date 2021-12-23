// const sProveChecker = document.querySelector(".sProvCheckBoxes");
const sProveChecker = Array.from(document.querySelectorAll('input[type="checkbox"]:checked[name="serProvCheckbox[]"]'));
console.log(sProveChecker.values);
const recallFromUpdateServiceModal = document.querySelector(".recall-reservation-from-update-service");
const recallFromUpdateServiceBtn = document.querySelectorAll(".sProvCheckBoxes");

for (var i = 0; i < sProveChecker.length; i++) {
    let myArray = JSON.parse(sProveChecker[i].value);
    console.log(myArray[0]);
    sProveChecker[i].addEventListener('change',
        function () {
                if(!this.checked) {
                    console.log('myArray');
                    console.log(myArray[0]);

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
        console.log("Hello world! 5");

        fetch(`http://localhost:80/beauty-craft/Services/getCheckedSPRovList/${myArray[0]}/${myArray[1]}`)
            .then(response => response.json())
            .then(serProvDetails => {

                console.log(serProvDetails);

                if(serProvDetails === 1){
                    recallFromUpdateServiceBtn.forEach((btn) => {
                            modalToToggle = recallFromUpdateServiceModal;
                            toggleModal();
                    });
                }

                
                // if (recallFromUpdateServiceBtn) {
                //     recallFromUpdateServiceBtn.addEventListener("click",
                //         function () {
                //             modalToToggle = recallFromUpdateServiceModal;
                //             toggleModal();
                //         }
                //     );
                // }
                console.log("Hello world! 6");

            // }
        }).catch(err => {
            // Do something for an error here
            console.log("Error Reading data :" + err);
          });
}
 }
 
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
