$(function () {
   //clicks on the checkbox. changes the color of a row and the checkbox status.
   $('table tbody :checkbox').change(function (event) {
      $(this).closest('tr').toggleClass("selected_row", this.checked);
   });

   // clicks on the row.
   //  $('table tbody tr').click(function(event) {
   //      if (event.target.type !== 'checkbox') {
   //       $(':checkbox', this).trigger('click');
   //    }
   // });
});

//clicks on all the checkboxes and select all rows
function selects(){  
   var ele=document.getElementsByName('chk');  
   for(var i=0; i<ele.length; i++){  
      if(ele[i].type=='checkbox') { 
         ele[i].checked=true;  
         $(ele[i]).closest('tr').addClass("selected_row");
      }
   }  
}  

//unclicks on all the checkboxes and unselect all rows
function deSelect(){  
   var ele=document.getElementsByName('chk');  
   for(var i=0; i<ele.length; i++){  
      if(ele[i].type=='checkbox')  
         ele[i].checked=false;
         $(ele[i]).closest('tr').removeClass("selected_row");
   }  
}

