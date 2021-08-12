/* ------------------------------------------------------ */
/* ----------------- JS ADDED BY DEVIN -------------------*/
/* ------------------------------------------------------ */

// main menu links
var mainLinks = document.querySelectorAll(".sidebar-main_menu_item > .sidebar-menu_item-link");

// currently active main link
var activeLink = document.querySelector(".main-selected");

// main menu link event listener
for (var i = 0; i < mainLinks.length; i++){
   mainLinks[i].addEventListener('click', selectMainLink);
}

// Marks the main menu link as unselected
function toggleMainSelection(currentMainLink) {
      for (var i = 0; i < mainLinks.length; i++) {
         if (mainLinks[i] != activeLink) {
            if (mainLinks[i] != currentMainLink) {
               mainLinks[i].classList.remove("main-selected");
            }
            else {
               mainLinks[i].classList.toggle("main-selected");
            }
         }
      }
}

// Toggles the submenu
function toggleSubMenu(currentMainLink) {
   for (var i = 0; i < mainLinks.length; i++) {
      var subList = mainLinks[i].parentElement.querySelector('.sidebar-sub_menu');
      // toggle only if a sublist is available
      if (subList) {
         var arrow = mainLinks[i].querySelector('.sidebar-menu_item-arrow')
         // other sub menus are collapsed
         if (mainLinks[i] != currentMainLink) {
            subList.classList.remove("showSubMenu");
            arrow.classList.remove("rotated180");
         }
         // current sub menu is toggled
         else {
            subList.classList.toggle("showSubMenu");
            arrow.classList.toggle("rotated180");
         }
      }
   }
   
}

// Marks the main menu link as selected
function selectMainLink() {
   x = this.parentElement.querySelector(".sidebar-sub_menu")
   // toggles are performed only if a sidebar is available
   if (x) {
      toggleSubMenu(this);
      toggleMainSelection(this);
   }
}

/* ------------------------------------------------------ */
/* ------------- END OF JS ADDED BY DEVIN ----------------*/
/* ------------------------------------------------------ */