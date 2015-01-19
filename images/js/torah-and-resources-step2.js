// JavaScript Document
function TorahResourcesStep2() {
ShortDescription    = document.getElementById('ShortDescription').value;
Description 		= document.getElementById('Description').value;
Keywords 	        = document.getElementById('Keywords').value;
	if(ShortDescription==""){
	  alert('Short Description is required field.');
	  document.getElementById('ShortDescription').focus();
      document.getElementById('ShortDescription').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('ShortDescription').style.backgroundColor='#fff';
	}
	if(Description==""){
	  alert('Description is required field.');
	  document.getElementById('Description').focus();
      document.getElementById('Description').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('Description').style.backgroundColor='#fff';
	}
	if(Keywords==""){
	  alert('Company Keywords is required field.');
	  document.getElementById('Keywords').focus();
      document.getElementById('Keywords').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('Keywords').style.backgroundColor='#fff';
	}

}
