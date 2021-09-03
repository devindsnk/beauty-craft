/* --------------------header Scripts-------------------- */
/* ------------------------------------------------------ */
/* ----------------- JS ADDED BY DEVIN -------------------*/
/* ------------------------------------------------------ */

// profile menu event listener
var headerProfile = document.querySelector(".header-profile");
var profileMenu = document.querySelector(".profile_menu");
headerProfile.addEventListener("click", toggleProfileMenu);

// Collapse the profile menu if outside is clicked
document.addEventListener('click', function (event) {
   var isClickInsideElement = headerProfile.contains(event.target);
   if (!isClickInsideElement) {
      removeProfileMenu();
   }
});

// Set the margin of the profile menu based on the width of the header_profile
// Repace this with JavaScript if possible
$(document).ready(function () {
   $(".profile_menu").css({
      'margin-right': ('max(calc((' + $(".header-profile").width() + 'px - 225px)/2) , 6px)')
   });
});

// Headerbar profile menu toggle
function toggleProfileMenu() {
   arrow = document.querySelector(".header-profile-arrow i");
   profileMenu.classList.toggle('active');
   arrow.classList.toggle("rotated180");
}

function removeProfileMenu() {
   profileMenu.classList.remove('active');
}

/* ------------------------------------------------------ */
/* ------------- END OF JS ADDED BY DEVIN ----------------*/
/* ------------------------------------------------------ */
