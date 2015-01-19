// JavaScript Document
function GeneralDirectoryStep3() {
ad_large 			= document.getElementById('large');
ad_stantard 		= document.getElementById('stantard');
ad_small 			= document.getElementById('small');
City 				= document.getElementById('City').value;
	if(!ad_large.checked && !ad_stantard.checked && !ad_small.checked){
		  alert('Choose your Ad Type is required field.');
		  return false;
	}
	if(City==""){
	  alert('City is required field.');
	  document.getElementById('City').focus();
	  document.getElementById('City').style.backgroundColor='#ffa5a5';
	return false;
	}else{
	  document.getElementById('City').style.backgroundColor='#fff';
	}
	
}
