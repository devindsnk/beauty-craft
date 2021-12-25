
const trashServiceBtn = Array.from(document.querySelectorAll('.deletehref'));
const recallbtn = document.querySelector(".recallFromDelete");
const deleteHREF = document.querySelector('.deleteConfirmHref');


console.log("hi");
for (var i = 0; i < trashServiceBtn.length; i++){
    console.log(trashServiceBtn[i].dataset.columns);
    let sID = trashServiceBtn[i].dataset.columns;

    trashServiceBtn[i].addEventListener('click',
        function () {
            console.log('del_hold');
            document.getElementById("deleteServiceHead").innerHTML = "Delete Service - "+sID;

            checkForUpcomingReservations(sID);
        }
    )
}
function checkForUpcomingReservations(sID)
    {
        console.log("checkForUpcomingReservations awa");

        fetch(`http://localhost:80/beauty-craft/Services/getReservationListOfSelectedService/${sID}`)
        .then(response => response.json())
        .then(serviceDetails => {
            console.log("fetch awa");

            console.log(serviceDetails);
            console.log(serviceDetails.length);
            // console.log(serProvDetails[0]['reservationID']);

            const ress = [];
            const ressReason = 'For delete the service';

            for (var i = 0; i < serviceDetails.length; i++){
                ress.push(serviceDetails[i]['reservationID']);
            }

            console.log(ress);

            if(ress.length !== 0){
                document.getElementById("warningMsgDeleteService").innerHTML = "This service has upcomming reservations. <br>Confirm to Recall the reservations and Delete the service.";
            }else{
                document.getElementById("warningMsgDeleteService").innerHTML = "Are you sure you want to delete the service? <br> This action cannot be undone after proceeding.";
            }

            recallbtn.addEventListener('click',
                function () {
                    console.log('recall1');

                    deleteTheService(sID);
                    recallReservationsFromDelete(ress, ressReason);
                    // removeFromService(myArray[1]);
                }
            )

        }).catch(err => {
            console.log("Error Reading data :" + err);
        });
}

function recallReservationsFromDelete(ress, ressReason)
{
    console.log('recallReservationsFromDelete awa');
    fetch(`http://localhost:80/beauty-craft/Reservations/recallReservationsFromUpdateService/${ress}/${ressReason}`)
        .then()
       
        .catch(err => {
            console.log("Error Reading data :" + err);
        });
}
// function deleteTheService(sID)
// {
//     console.log('recallReservationsFromDelete awa');
//     fetch(`http://localhost:80/beauty-craft/Services/deleteService/${sID}`)
//         .then()
       
//         .catch(err => {
//             console.log("Error Reading data :" + err);
//         });
// }
// recallModel.href = "http://localhost/beauty-craft/Services/updateService/"+myArray[1]+"/"+[ress]+"/"+ressReson;
function deleteTheService(sID)
{
    console.log('set');
    deleteHREF.href = "http://localhost/beauty-craft/Services/deleteService/"+sID;
    console.log(deleteHREF);
}