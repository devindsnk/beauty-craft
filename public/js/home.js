/* ----------------- homePage Scripts----------------- */
/* ------------------------------------------------------ */
/* ----------------- JS ADDED BY DEVIN -------------------*/
/* ------------------------------------------------------ */

// menuBtn event listener
var menuBtn = document.querySelector(".menuBtn");
var closeBtn = document.querySelector(".closeBtn");
var sideNav = document.querySelector(".landingPage nav .links");
menuBtn.addEventListener("click", showSideMenu);
closeBtn.addEventListener("click", hideSideMenu);

function showSideMenu() {
   console.log("Open");
   sideNav.style.right = "0";
}

function hideSideMenu() {
   console.log("Close");
   sideNav.style.right = "-260px";
}

// profile menu event listener
var profileIcon = document.querySelector(".profileIcon");
var profileMenu = document.querySelector(".profile_menu");
if (profileIcon) {
   profileIcon.addEventListener("click", toggleProfileMenu);
}


// Collapse the profile menu if outside is clicked
document.addEventListener('click', function (event) {
   var clickOnIcon = profileIcon.contains(event.target);
   var clickOnMenu = profileMenu.contains(event.target);
   if (!(clickOnIcon || clickOnMenu)) {
      removeProfileMenu();
   }
});

function toggleProfileMenu() {
   profileIcon.classList.toggle('active');
   profileMenu.classList.toggle('active');
}

function removeProfileMenu() {
   profileIcon.classList.remove('active');
   profileMenu.classList.remove('active');
}


/* ------------------------------------------------------ */
/* ------------- END OF JS ADDED BY DEVIN ----------------*/
/* ------------------------------------------------------ */