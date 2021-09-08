function showDiv(divId1, divId2,element)
{	
	for(let i=1;i<=element.value; i++){
		if (divId1=='slotdetails') {
    		document.getElementById(divId1).style.display = i<=element.value ? 'block' : 'none';
    	}
    	if (divId2=='intervaldetails'){
    		document.getElementById(divId2).style.display = i<=element.value  ? 'block' : 'none';
    	}
    }

}
