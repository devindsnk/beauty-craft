console.log("hhh");
const CloseDatesTableTrashBtn= Array.from(document.querySelectorAll('.removeCloseDatetrash'));
const RemoveCloseDateBtnAnchorTag = document.querySelector(".closeDateAnchorTag");




for ( var i = 0; i< CloseDatesTableTrashBtn.length ; i++){
console.log(CloseDatesTableTrashBtn[i].dataset.closedateid);
let closeDateID = CloseDatesTableTrashBtn[i].dataset.closedateid;

CloseDatesTableTrashBtn[i].addEventListener('click',
function(){
    RemoveCloseDateBtnAnchorTag.href = "http://localhost:80/beauty-craft/CloseDates/remCloseDate/" + closeDateID;
}
)
}