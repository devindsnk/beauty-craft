function Previous() {
    location.replace("http://localhost/beauty-craft/MangDashboard/services");
}
function Previous2() {
    location.replace("http://localhost/beauty-craft/MangDashboard/leaveRequests");
}

var i=1;
var j=0;
$(document).ready(function(){
    
    // $('#add').click(function(){
    // i++;
    // j++;
    
    // $('#addDiv').append('<div class="newService-sub" id="intervaldetails'+j+'"><div class="btn-remove quantity-align"> <a href="#slotdetails'+j+'" name="remove" id="'+i+'" class="close-slot">X</a></div> <div class="newService-sub-sub interval" >      <h4>Interval '+j+'</h4><div class="dropdown-Div"><div class="newService-sub-sub"><label class="labels">Duration</label><br><select class="dropdownSelectBox"><option value="val1">1 min</option>option value="val2">2 min</option><option value="val1">3 min</option></select></div></div></div>      <div class="newService-sub-sub slot" id="slotdetails'+i+'"> <h4>Slot '+i+'</h4><div class="dropdown-Div"><div class="newService-sub-sub"><label class="labels">Duration</label><br><select class="dropdownSelectBox"> <option value="val1">1 min</option><option value="val2">2 min</option></select></div><div class="newService-sub-sub"><label>Resources and Quantity</label><div class="checkbox-div"><div class="divIndiv"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small quantity-align"><option value="val1">0</option><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select></div><hr class="resHr"><div class="divIndiv"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small quantity-align"><option value="val1">0</option><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select></div><hr class="resHr"><div class="divIndiv"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small quantity-align"><option value="val1">0</option><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select></div><hr class="resHr"></div></div></div></div> </div>       ');
    
    // });
    
    // $(document).on('click', '.close-slot', function(){
    //     var button_id1 = $(this).attr("id"); 
    //     var button_id2 = button_id1-1;
    //     $('#slotdetails'+button_id1+'').remove();
    //     i--;
    //     $('#intervaldetails'+button_id2+'').remove();
    //     j--;
    // });

    // $('#addDiv').append('<div class="newService-sub" id="fullSlotDetail'+j+'"><div class="btn-remove quantity-align"> <a href="#fullSlotDetail'+j+'" name="remove" id="'+i+'" class="close-slot"><i class="fas fa-times fa-1g"></i><br/></a></div><h4 class="paddingBottom">Slot '+i+'</h4><div class="row"><div class="column"><div class="row2" id="intervalDetails'+j+'"><label class="labels">Interval Duration</label><br><select class="dropdownSelectBox"><option class="unbold" value="val0" option selected="true" disabled="disabled" >Select duration</option><option value="val1">1 min</option><option value="val2">2 min</option><option value="val1">3 min</option></select><span class="error paddingLeft">error</span></div><div class="row4" id="slotDetails'+i+'"><label class="labels">Slot Duration</label><br><select class="dropdownSelectBox"><option class="unbold" value="val0" option selected="true" disabled="disabled" >Select duration</option> <option value="val1">1 min</option><option value="val2">2 min</option></select><span class="error paddingLeft">error</span></div></div><div class="column" id="resorceDetails'+i+'"><label class="labels">Resources and Quantity</label><div class="checkbox-div"><div class="divIndiv"><label>Res111, Resource1</label><select class="dropdownSelectBox-small quantity-align"><option value="val1">0</option><option value="val1">1</option></select></div><hr class="resHr"><div class="divIndiv"><label>Res111, Resource1</label><select class="dropdownSelectBox-small quantity-align"><option value="val1">0</option><option value="val1">1</option></select></div><hr class="resHr"><div class="divIndiv"><label>Res111, Resource1</label><select class="dropdownSelectBox-small quantity-align"><option value="val1">0</option><option value="val1">1</option></select></div><hr class="resHr"></div></div></div></div> </form>');

    // });

    // $('#addDiv').append('<div class="newService-sub" id="fullSlotDetail'+j+'"><div class="btn-remove quantity-align"> <a href="#fullSlotDetail'+j+'" name="remove" id="'+i+'" class="close-slot"><i class="fas fa-times fa-1g"></i><br/></a></div><h4 class="paddingBottom">Slot '+i+'</h4><div class="row"><div class="column"><div class="row2" id="intervalDetails'+j+'"><label class="labels">Interval Duration</label><br><select class="dropdownSelectBox"><option class="unbold" value="val0" option selected="true" disabled="disabled" >Select duration</option><option value="val1">1 min</option><option value="val2">2 min</option><option value="val1">3 min</option></select><span class="error paddingLeft">error</span></div><div class="row4" id="slotDetails'+i+'"><label class="labels">Slot Duration</label><br><select class="dropdownSelectBox"><option class="unbold" value="val0" option selected="true" disabled="disabled" >Select duration</option> <option value="val1">1 min</option><option value="val2">2 min</option></select><span class="error paddingLeft">error</span></div></div><div class="column" id="resorceDetails'+i+'"><label class="labels">Resources and Quantity</label><div class="checkbox-div">'+'<?php foreach($data['sResArray'] as $sResource) : ?>'+'<div class="divIndiv"><label class="lableInDiv" id="checkedItem">'+'<?php echo $sResource->resourceID; ?> - <?php echo $sResource->name; ?>'+'</label><select class='dropdownSelectBox-small quantity-align resCount'></select><br></div><hr class='resHr'>'+'<?php endforeach; ?>'+'</div><span class="error paddingLeft">error</span></div></div>');

    // });

    $('#add').click(function () {
        i++;
        j++;
        var resPHP1 = "<?php foreach ($data['sResArray'] as $sResource) : ?>";
        var sample = "<?php echo $sResource->resourceID; echo $sResource->name; ?>";
        var resPHP2 = "<?php endforeach; ?>";
        $('#addDiv').append(

           "<div class='newService-sub' id='fullSlotDetail" + j + "'> <div class='btn-remove quantity-align'><a href='#fullSlotDetail " + j + "' name='remove' id='" + i + "' class='close-slot'><i class='fas fa-times fa-1g'></i><br /></a></div><h4 class='paddingBottom'>Slot " + i + "</h4><div class='row'><div class='column'><div class='row2' id='intervalDetails" + j + "'><label class='labels'>Interval Duration</label><br><select class='dropdownSelectBox'><option class='unbold' value='val0' option selected='true' disabled='disabled'>Select duration</option><option value='val1'>1 min</option><option value='val2'>2 min</option></select><span class='error paddingLeft'>error</span></div><div class='row4' id='slotDetails" + i + "'><label class='labels'>Slot Duration</label><br><select class='dropdownSelectBox'><option class='unbold' value='val0' option selected='true' disabled='disabled'>Select duration</option><option value='val1'>1 min</option><option value='val2'>2 min</option></select><span class='error paddingLeft'>error</span></div></div> <div class='column' id='resorceDetails" + i + "'><label class='labels'>Resources and Quantity</label> <div class='checkbox-div'>" + resPHP1 + "<div class='divIndiv'> <label class='lableInDiv' id='checkedItem'>" + sample + " </label> <select class='dropdownSelectBox-small quantity-align resCount'></select><br></div><hr class='resHr'>" + resPHP2 + "</div><span class='error paddingLeft'>error</span></div></div></div>"
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