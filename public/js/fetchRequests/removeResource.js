const ResourceViewMoreTableTrashBtn = Array.from (document.querySelectorAll(".resourceViewMoreTableTrash"));
const RemoveResourceBtnAnchorTag = document.querySelector(".removeResourceAnchorTag");

for ( var i = 0 ; i < ResourceViewMoreTableTrashBtn.length ; i++ ){
let ResID = ResourceViewMoreTableTrashBtn[i].dataset.resourceid;
let PurchID = ResourceViewMoreTableTrashBtn[i].dataset.purchaseid; 
  createRemoveResourceUrl(ResID,PurchID);

}


function createRemoveResourceUrl(ResID,PurchID){
    console.log("rem resource");
    RemoveResourceBtnAnchorTag.href = "http://localhost:80/beauty-craft/Resources/removePurchaseRecord/" + ResID + "/" +PurchID ;
}