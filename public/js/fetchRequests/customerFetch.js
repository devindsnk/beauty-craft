console.log('customer fetch connected');
const cusHeaderImg = document.querySelector(".profileIcon img");
console.log(cusHeaderImg.src);
fetch(`http://localhost:80/beauty-craft/User/getUserHeaderImg`)
      .then(response => response.json())
      .then(msg => {
          console.log(msg);
          
         cusHeaderImg.src=msg;
        
 

      });