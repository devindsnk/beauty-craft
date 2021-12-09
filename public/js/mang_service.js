
var i=1;
var j=0;
$(document).ready(function(){

    $('#add').click(function () {
        i++;
        j++;
        console.log("Hello world! 1");
        
        if (i < 4){
            $('#addDiv').append(

            "<div class='newService-sub' id='fullSlotDetail" + j + "'> <div class='btn-remove quantity-align'><a href='#fullSlotDetail " + j + "' name='remove' id='" + i + "' class='close-slot'><i class='fas fa-times fa-1g'></i><br /></a></div><h4 class='paddingBottom'>Slot " + i + "</h4><div class='row'><div class='column'>           <div class='row2' id='intervalDetails" + j + "'><label class='labels'>Interval Duration</label><br><select class='dropdownSelectBox     intervalSelectBox" + j + "    '           name='interval" + j + "Duration'></select><span class='error paddingLeft'></span></div>               <div class='row4' id='slotDetails" + i + "'><label class='labels'>Slot Duration</label><br><select class='dropdownSelectBox        slotDurationSelectBox" + i + "'         name='slot" + i + "Duration'></select><span class='error paddingLeft'></span></div></div>                     <div class='column' id=''><label class='labels'>Resources and Quantity</label> <div class='checkbox-div      resourceDetails" + i + "'><div class='divIndiv     resourceContentDiv" + i + "     '> <label class='lableInDiv         resourceName" + i + "' id='checkedItem'></label> <select class='dropdownSelectBox-small quantity-align resCount             resourceCountSelectBox" + i + "'       name='resourceCount" + i + "[]'></select><br></div><hr class='resHr'></div><span class='error paddingLeft'></span></div></div></div>"
            );
        }else{
            $('#addDiv').append("<div class='newService-sub' id='fullSlotDetail" + j + "'><div class='btn-remove quantity-align'><a href='#fullSlotDetail " + j + "' name='remove' id='" + i + "' class='close-slot'><i class='fas fa-times fa-1g'></i><br /></a></div><h4 class='paddingBottom'>You cannot have more that 3 slots!!</h4></div>");
        }
        
        const slotSelectDropDown = document.querySelector(".AddSlotToService");
        const intervalDurationSelectDropDown = document.querySelector(".intervalSelectBox" + j + "");
        const slotDurationSelectDropDown = document.querySelector(".slotDurationSelectBox" + i + "");
        const resourceDetailsDiv = document.querySelector(".resourceDetails" + i + "");
        const resourceContentDiv = document.querySelector(".resourceContentDiv" + i + "");
        const resourceNameLable = document.querySelector(".resourceName" + i + "");
        const resourceCountSelectDropDown = document.querySelector(".resourceCountSelectBox" + i + "");
        
        // slotSelectDropDown.innerHTML="hello";
        // function myFunction(){
            // slotSelectDropDown.addEventListener('change',
            // function () {
            //    console.log("Hello world! 2");
         
            //    durationsForInterval();
            //    durationsForSlot();
         
               
             //   resourceNameForLable();
             //   resorcesCountForResource();
            // }
        //  )
        // }

        console.log("Hello world! 2 i= "+i);
         
        durationsForInterval();
        durationsForSlot();
        resourceNameForLable();

        function durationsForInterval() {
           
            console.log("Hello world! 3");
        
                intervalDurationSelectDropDown.innerHTML = "";
                var option = document.createElement("option");
                option.text = 'Select duration';
                option.disabled = true;
                option.selected = true;
                option.value = '';
                intervalDurationSelectDropDown.appendChild(option);
        
                for (let i = 5; i <= 45; i+=5) {
                    var option = document.createElement("option");
        
                    option.text = i + ' mins';
                    
                    option.value = i;
                    intervalDurationSelectDropDown.appendChild(option);
                }
        
        }
        function durationsForSlot() {

            console.log("Hello world! 4");

            slotDurationSelectDropDown.innerHTML = "";
            var option = document.createElement("option");
            option.text = 'Select duration';
            option.disabled = true;
            option.selected = true;
            option.value = '';
            slotDurationSelectDropDown.appendChild(option);
        
            for (let i = 10; i <= 120; i+=10) {
                var option = document.createElement("option");
        
                if (i == 60 || i == 120){
                    option.text = (i / 60) + ' h';
                }else if (i > 60 && i < 120){
                    option.text = (i / i) + " h " + (i %  60) + "mins";
                }else{
                    option.text = i + " mins";
                }
                
                option.value = i;
                slotDurationSelectDropDown.appendChild(option);
            }
        }
        function resourceNameForLable(){
            console.log("Hello world! 5");

            fetch(`http://localhost:80/beauty-craft/Services/getResourceForSlots`)
              .then(response => response.json())
              .then(sResource => {
                console.log(sResource);
                resourceDetailsDiv.innerHTML = "";
                
                 sResource.forEach(sRes => {
                    resourceNameLable.innerHTML = sRes.resourceID + " - " +  sRes.name;
        
                    resourceCountSelectDropDown.innerHTML = "";
                    var option = document.createElement("option");
                    option.text = 0;
                    option.selected = true;
                    option.value = '';
                    resourceCountSelectDropDown.appendChild(option);
                    // console.log(sRes.quantity);
        
                    for (let i = 1; i <= sRes.quantity; i++) {
                        var option = document.createElement("option");
                        option.text = i;
                        option.value = i;
                        resourceCountSelectDropDown.appendChild(option);
                    }
                    resourceDetailsDiv.innerHTML += "<div class='divIndiv     resourceContentDiv     '>"+ resourceContentDiv.innerHTML +  "</div><hr class='resHr'>"
                  });
              });
        }
     });

});

$(document).on('click', '.close-slot', function(){
    
    var button_id1 = $(this).attr("id"); 
    var button_id2 = button_id1-1;

    $('#fullSlotDetail'+button_id2+'').remove();
    // $('#intervalDetails'+button_id2+'').remove();
    // $('#slotDetails'+button_id1+'').remove();
    // $('#resorceDetails'+button_id2+'').remove();
   
    j--;
    i--;

});


{/* <div class='newService-sub' id='fullSlotDetail" + j + "'> 
    <div class='btn-remove quantity-align'>
        <a href='#fullSlotDetail " + j + "' name='remove' id='" + i + "' class='close-slot'>
            <i class='fas fa-times fa-1g'></i><br />
        </a>
    </div>
    <h4 class='paddingBottom'>Slot " + i + "</h4>
    <div class='row'>
        <div class='column'>
            <div class='row2' id='intervalDetails" + j + "'>
                <label class='labels'>Interval Duration</label><br>
                <select class='dropdownSelectBox intervalSelectBox" + j + "'  name="interval" + j + "Duration">
                    <option class='unbold' value='val0' option selected='true' disabled='disabled'>Select duration</option>
                </select>
                <span class='error paddingLeft'></span>
            </div>
            <div class='row4' id='slotDetails" + i + "'>
                <label class='labels'>Slot Duration</label><br>
                <select class='dropdownSelectBox slotDurationSelectBox" + i + "' name="slot" + i + "Duration">
                    <option class='unbold' value='val0' option selected='true' disabled='disabled'>Select duration</option>
                    <option value='val1'>1 min</option>
                    <option value='val2'>2 min</option>
                </select>
                <span class='error paddingLeft'></span>
            </div>
        </div> 
        <div class='column' id='resorceDetails" + i + "'>
            <label class='labels'>Resources and Quantity</label> 
            <div class='checkbox-div'>
                <div class='divIndiv'>
                    <label class='lableInDiv resourceDetails" + i + "' id='checkedItem'> </label> 
                    <select class='dropdownSelectBox-small quantity-align resCount resourceCountSelectBox" + i + "' name='resouceSelect" + i + "'>
                    </select><br>
                </div>
                <hr class='resHr'>
            </div>
            <span class='error paddingLeft'></span>
        </div>
    </div>
</div> */}
