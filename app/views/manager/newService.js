
    var i=1;
    var j=0;
    $(document).ready(function(){
        
        $('#add').click(function(){
        i++;
        j++;

        $('#addDiv').append('<div class="newService-sub" id="intervaldetails'+j+'"><div class="btn-remove"> <a href="#" name="remove" id="'+i+'" class="close-slot">X</a></div> <div class="newService-sub-sub interval" >      <h4>Interval '+j+'</h4><div class="dropdown-Div"><div class="newService-sub-sub"><label class="labels">Duration</label><br><select class="dropdownSelectBox"><option value="val1">1 min</option>option value="val2">2 min</option><option value="val1">3 min</option></select></div></div></div>      <div class="newService-sub-sub slot" id="slotdetails'+i+'"> <h4>Slot '+i+'</h4><div class="dropdown-Div"><div class="newService-sub-sub"><label class="labels">Duration</label><br><select class="dropdownSelectBox"> <option value="val1">1 min</option><option value="val2">2 min</option></select></div><div class="newService-sub-sub"><label>Resorces</label><br><div class="checkbox-div"><input type="checkbox" name=""><span>Res111, Resource1</span><br><input type="checkbox" name=""><span>Res111, Resource1</span><br></div></div><div class="newService-sub-sub"><label>Quantity</label><br><div class="checkbox-div"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small"><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select><br><hr class="resHr"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small"><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select><br><hr class="resHr"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small"><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select><br><hr class="resHr"></div></div></div></div> </div>       ');
        
        });

        // $(document).ready(function()){
        // 	$('reschkbx').click(function()){
        // 		var result = $('input[type="checkbox"]:checked');
        // 		result.each(function()){
        // 			resultstring = $(this).val();
        // 		}
        // 		$('checkedItem').html(resultstring);
        // 	}
        // }
    });
    
    $(document).on('click', '.close-slot', function(){
        var button_id1 = $(this).attr("id"); 
        var button_id2 = button_id1-1;
        $('#slotdetails'+button_id1+'').remove();
        i--;
        $('#intervaldetails'+button_id2+'').remove();
        j--;
    });
    
    // $(function() {
    // 	$(":checkbox").change(function() {
    // 		var arr = $(":checkbox:checked").map(function() { return $(this).next().html(); }).get();
    // 		$("#checkedItem").html(arr.join(', '));

    // 		document.getElementById('selectcount').style.display = this.checked ? "block" : "none";
    // 	});
    // });





// <!-- $('#addDiv').append('<div class="newService-sub" id="intervaldetails'+j+'"><div class="btn-remove"> <button type="button" name="remove" id="'+i+'" class="btn-remove">X</button></div> <div class="newService-sub-sub interval" >      <h4>Intervals '+j+'</h4><div class="dropdown-Div"><div class="newService-sub-sub"><label class="labels">Duration</label><br><select class="dropdownSelectBox"><option value="val1">1 min</option>option value="val2">2 min</option><option value="val1">3 min</option></select></div></div></div>      <div class="newService-sub-sub slot" id="slotdetails'+i+'"> <h4>Slot '+i+'</h4><div class="dropdown-Div"><div class="newService-sub-sub"><label class="labels">Duration</label><br><select class="dropdownSelectBox"> <option value="val1">1 min</option><option value="val2">2 min</option></select></div><div class="newService-sub-sub"><label>Resorces</label><br><div class="checkbox-div"><input type="checkbox" name=""><span>Res111, Resource1</span><br><input type="checkbox" name=""><span>Res111, Resource1</span><br></div></div><div class="newService-sub-sub"><label>Quantity</label><br><div class="checkbox-div"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small"><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select><br><hr class="resHr"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small"><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select><br><hr class="resHr"><label class="labels">Res111, Resource1</label><select class="dropdownSelectBox-small"><option value="val1">1</option><option value="val2">2</option><option value="val1">3</option></select><br><hr class="resHr"></div></div></div></div> </div>       '); -->
