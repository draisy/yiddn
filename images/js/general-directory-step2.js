// JavaScript Document
function GeneralDirectoryStep2() {
Address             = document.getElementById('Address').value;	
Description   		= document.getElementById('Description').value;
Keywords 			= document.getElementById('Keywords').value;
	if(Address==""){
	  alert('Address is required field.');
	  document.getElementById('Address').focus();
      document.getElementById('Address').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('Address').style.backgroundColor='#fff';
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
	  alert('Keywords is required field.');
	  document.getElementById('Keywords').focus();
      document.getElementById('Keywords').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('Keywords').style.backgroundColor='#fff';
	}

}
