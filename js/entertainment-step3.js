// JavaScript Document
function EntertainmentStep3() {
upgrade 	    	= document.getElementById('upgrade');
Premium 			= document.getElementById("Premium"); 
upgrade2 	    	= document.getElementById('upgrade2');
Premium2 			= document.getElementById("Premium2"); 
upgrade3 	    	= document.getElementById('upgrade3');
Premium3 			= document.getElementById("Premium3");
City 				= document.getElementById('City').value;
	if(City==""){
	  alert('City is required field.');
	  document.getElementById('City').focus();
	  document.getElementById('City').style.backgroundColor='#ffa5a5';
	return false;
	}else{
	  document.getElementById('City').style.backgroundColor='#fff';
	}
}
