// Contains the logic required to properly set up the close btn in layout template 2

// Steps : add onclick session storage update line for the button that leads to a full screen view
//         make sure this file is connected properly to the full screen view 

let returnReferer = sessionStorage.getItem("returnReferer");
const backBtn = document.querySelector(".top-right-closeBtn");

if(backBtn){
    backBtn.onclick = function() {
        window.location.replace(returnReferer);
        sessionStorage.removeItem("returnReferer");
        returnReferer = null;
    };
}
