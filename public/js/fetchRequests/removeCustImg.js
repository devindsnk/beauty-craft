console.log('yyyyyy');
const custProfImg = document.getElementById("profileImg").src;
console.log(custProfImg);

function removeCustImg() {
    console.log('remove btn clicked');
    document.getElementById("profileImg").src = "http://localhost/beauty-craft/public/imgs/custProfileUpdate.png";

    fetch(`http://localhost:80/beauty-craft/CustDashboard/removeCustImg`)
      .then(response => response.json())
      .then(result => {
         
        // window.location.reload();
                window.location.replace(`http://localhost:80/beauty-craft/CustDashboard/profileSettings`);


      });

}
