
var i=1;
var j=0;
$(document).ready(function(){

    $('#add').click(function () {
        i++;
        j++;
        
        $('#addDiv').append(

           "<div class='newService-sub' id='fullSlotDetail" + j + "'> <div class='btn-remove quantity-align'><a href='#fullSlotDetail " + j + "' name='remove' id='" + i + "' class='close-slot'><i class='fas fa-times fa-1g'></i><br /></a></div><h4 class='paddingBottom'>Slot " + i + "</h4><div class='row'><div class='column'><div class='row2' id='intervalDetails" + j + "'><label class='labels'>Interval Duration</label><br><select class='dropdownSelectBox'><option class='unbold' value='val0' option selected='true' disabled='disabled'>Select duration</option><option value='val1'>1 min</option><option value='val2'>2 min</option></select><span class='error paddingLeft'></span></div><div class='row4' id='slotDetails" + i + "'><label class='labels'>Slot Duration</label><br><select class='dropdownSelectBox'><option class='unbold' value='val0' option selected='true' disabled='disabled'>Select duration</option><option value='val1'>1 min</option><option value='val2'>2 min</option></select><span class='error paddingLeft'></span></div></div> <div class='column' id='resorceDetails" + i + "'><label class='labels'>Resources and Quantity</label> <div class='checkbox-div'><div class='divIndiv'> <label class='lableInDiv' id='checkedItem'> </label> <select class='dropdownSelectBox-small quantity-align resCount'></select><br></div><hr class='resHr'></div><span class='error paddingLeft'></span></div></div></div>"
        );

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
                    <label class='lableInDiv' id='checkedItem'> </label> 
                    <select class='dropdownSelectBox-small quantity-align resCount resourceSelectBox" + i + "' name='resouceSelect" + i + "'>
                    </select><br>
                </div>
                <hr class='resHr'>
            </div>
            <span class='error paddingLeft'></span>
        </div>
    </div>
</div> */}

const slotSelectDropDown = document.querySelector(".AddSlotToService");
const intervalDurationSelectDropDown = document.querySelector(".intervalSelectBox" + j + "");
const slotDurationSelectDropDown = document.querySelector(".slotDurationSelectBox" + i + "");
const resourceCountSelectDropDown = document.querySelector(".resourceSelectBox" + i + "");

slotSelectDropDown.addEventListener('change',
   function () {
      durationsForInterval();
      durationsForSlot();
      resorcesForResource();
   }
)

function durationsForInterval() {
   fetch(`http://localhost:80/beauty-craft/Services/..../${slotSelectDropDown.value}`)
   .then(responce => responce.json())
   .then(xxxx => {
        intervalDurationSelectDropDown.innerHTML = "";
        var option = document.createElement("option");
        option.text = 'Select duration';
        option.disabled = true;
        option.selected = true;
        option.value = '';
        intervalDurationSelectDropDown.appendChild(option);

        for (let i = 10; i <= 120; i+=10) {
            var option = document.createElement("option");

            if (i == 60 || i == 120){
                option.text = (i / 60) + ' h';
            }else if (i > 60 && i < 120){
                option.text = (i / i) + " h " + (i %  60) + "mins";
            }else{
                option.text = i + " mins";
            }
            
            option.selected = true;
            option.value = i;
            intervalDurationSelectDropDown.appendChild(option);
        }

   })

}
function durationsForSlot() {

}

function resorcesForResource() {
    fetch(`http://localhost:80/beauty-craft/Services/getServiceProvidersByService/${serviceSelectDropDown.value}`)
      .then(response => response.json())
      .then(sResource => {
        resourceCountSelectDropDown.innerHTML = "";
         var option = document.createElement("option");
         option.text = 'Select';
         option.disabled = true;
         option.selected = true;
         option.value = '';
         resourceCountSelectDropDown.appendChild(option);
         
      });
}
