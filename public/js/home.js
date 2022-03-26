/* ----------------- homePage Scripts----------------- */
/* ------------------------------------------------------ */
/* ----------------- JS ADDED BY DEVIN -------------------*/
/* ------------------------------------------------------ */

window.onscroll = function () {
   scrollFunction()
};

// menuBtn event listener
const menuBtn = document.querySelector(".menuBtn");
const closeBtn = document.querySelector(".closeBtn");
const nav = document.querySelector(".landingPage nav");
const navLiAll = document.querySelectorAll(".landingPage nav li");
const navLinks = document.querySelector(".landingPage nav .links");
const headerLogo = document.querySelector(".landingPage nav .logo img");


menuBtn.addEventListener("click", showSideMenu);
closeBtn.addEventListener("click", hideSideMenu);

function showSideMenu() {
   // console.log("Open");
   navLinks.style.right = "0";
}

function hideSideMenu() {
   // console.log("Close");
   navLinks.style.right = "-260px";
}

// profile menu event listener
var profileIcon = document.querySelector(".profileIcon");
var profileMenu = document.querySelector(".profile_menu");
if (profileIcon) {
   profileIcon.addEventListener("click", toggleProfileMenu);
}


// Collapse the profile menu if outside is clicked
if (profileIcon) {
   document.addEventListener('click', function (event) {
      var clickOnIcon = profileIcon.contains(event.target);
      var clickOnMenu = profileMenu.contains(event.target);
      if (!(clickOnIcon || clickOnMenu)) {
         removeProfileMenu();
      }
   });
}

function toggleProfileMenu() {
   profileIcon.classList.toggle('active');
   profileMenu.classList.toggle('active');
}

function removeProfileMenu() {
   profileIcon.classList.remove('active');
   profileMenu.classList.remove('active');
}

function scrollFunction() {
   if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      nav.style.background = "var(--theme-black)";
      nav.style.opacity = "0.95";
      nav.style.height = "80px";
      headerLogo.style.height = "40px";
      navLiAll.forEach(li => {
         li.style.paddingTop = "10px";
      });
   } else {
      nav.style.background = "transparent";
      headerLogo.style.height = "70px";
      nav.style.height = "100px";
      navLiAll.forEach(li => {
         li.style.paddingTop = "20px";
      });
   }
}



/* ------------------------------------------------------ */
/* ------------- END OF JS ADDED BY DEVIN ----------------*/
/* ------------------------------------------------------ */



/* ------------------------------------------------------ */
/* ------------- JS ADDED BY RAVINDU ---------------------*/
/* ------------------------------------------------------ */

// var slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}    
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";  
//   }
//   for (i = 0; i < dots.length; i++) {
//       dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";  
//   dots[slideIndex-1].className += " active";
// }



/* ------------------------------------------------------ */
/* ------------- END OF JS ADDED BY RAVINDU ---------------------*/
/* ------------------------------------------------------ */

function scrollImgL() {
   console.log('hsdd');
   let left = document.querySelector(".scroll-images");
   left.scrollBy(350, 0);
}

function scrollImgR() {
   let right = document.querySelector(".scroll-images");
   right.scrollBy(-350, 0);
}
